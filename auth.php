<?php
session_start();
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $confirm_password = trim($_POST["confirm_password"]);

    if (strlen($password) < 6 || !preg_match("/[0-9]/", $password) || !preg_match("/[\W]/", $password)) {
        $_SESSION['register_error'] = "❌ Mật khẩu phải có ít nhất 6 ký tự, chứa số và ký tự đặc biệt!";
        header("Location: register.php");
        exit();
    }

    if ($password !== $confirm_password) {
        $_SESSION['register_error'] = "❌ Mật khẩu nhập lại không khớp!";
        header("Location: register.php");
        exit();
    }

    // Check email tồn tại
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    if ($stmt->get_result()->num_rows > 0) {
        $_SESSION['register_error'] = "❌ Email đã tồn tại!";
        header("Location: register.php");
        exit();
    }

    // Thêm user mới
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $role = "user";
    $stmt = $conn->prepare("INSERT INTO users (email, password, role) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $hashed_password, $role);

    if ($stmt->execute()) {
        $_SESSION['register_success'] = "✅ Đăng ký thành công! Hãy đăng nhập.";
        header("Location: login.php");
        exit();
    } else {
        $_SESSION['register_error'] = "❌ Lỗi khi đăng ký.";
        header("Location: register.php");
        exit();
    }

    $stmt->close();
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $stmt = $conn->prepare("SELECT id, password, role FROM users WHERE email = ?");
    if (!$stmt) {
        die("Lỗi prepare: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // So sánh mật khẩu
        if (password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["email"] = $email;
            $_SESSION["role"] = $user["role"];

            if ($user["role"] === "admin") {
                header("Location: admin.php");
            } else {
                header("Location: dashboard.php");
            }
            exit();
        } else {
            $_SESSION['login_error'] = "❌ Sai mật khẩu!";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['login_error'] = "❌ Email không tồn tại!";
        header("Location: login.php");
        exit();
    }

    $stmt->close();
}
