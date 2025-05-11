<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $confirm_password = trim($_POST["confirm_password"]);

    if (strlen($password) < 6 || !preg_match("/[0-9]/", $password) || !preg_match("/[\W]/", $password)) {
        $error = "❌ Mật khẩu phải có ít nhất 6 ký tự, chứa số và ký tự đặc biệt!";
    } elseif ($password !== $confirm_password) {
        $error = "❌ Mật khẩu nhập lại không khớp!";
    } else {
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        if ($stmt->get_result()->num_rows > 0) {
            $error = "❌ Email đã tồn tại!";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $role = 'user';

            $stmt = $conn->prepare("INSERT INTO users (email, password, role) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $email, $hashed_password, $role);

            if ($stmt->execute()) {
                $success = "✅ Đăng ký thành công!";
            } else {
                $error = "❌ Lỗi khi đăng ký. Vui lòng thử lại!";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Đăng ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
    <link rel="icon" href="./image/logo1.jpg">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }

        .register-box {
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            background: white;
            border-radius: 1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>

<body>
    <div class="register-box">
        <h2 class="text-center mb-4">Đăng ký</h2>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php elseif (isset($success)): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>

        <form action="register.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Địa chỉ email</label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="mb-3">
                <label class="form-label">mật khẩu</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" required>
                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>
                <div class="form-text">Tối thiểu 6 ký tự, gồm số và ký tự đặc biệt.</div>
            </div>

            <div class="mb-3">
                <label class="form-label">Xác nhận mật khẩu</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>
                <div class="form-text">Nhập lại mật khẩu.</div>
            </div>

            <button type="submit" class="btn btn-primary w-100" name="register">Đăng ký</button>
        </form>

        <a class="d-block text-center mt-3" href="login.php">Quay lại trang đăng nhập</a>
    </div>

    <script>
        document.getElementById("togglePassword").addEventListener("click", function() {
            const passwordInput = document.getElementById("password");
            const icon = this.querySelector("i");
            passwordInput.type = passwordInput.type === "password" ? "text" : "password";
            icon.classList.toggle("bi-eye");
            icon.classList.toggle("bi-eye-slash");
        });

        document.getElementById("toggleConfirmPassword").addEventListener("click", function() {
            const confirmPasswordInput = document.getElementById("confirm_password");
            const icon = this.querySelector("i");
            confirmPasswordInput.type = confirmPasswordInput.type === "password" ? "text" : "password";
            icon.classList.toggle("bi-eye");
            icon.classList.toggle("bi-eye-slash");
        });
    </script>
</body>

</html>