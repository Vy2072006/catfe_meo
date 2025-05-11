<?php
session_start();
include 'config.php';

if (isset($_SESSION['login_error'])) {
    $error = $_SESSION['login_error'];
    unset($_SESSION['login_error']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="icon" href="./image/logo1.jpg">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }

        .login-box {
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
    <div class="login-box">
        <h2 class="text-center mb-4">Đăng nhập</h2>

        <?php if (isset($error)) : ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="auth.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Địa chỉ email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label class="form-label">mật khẩu</label>
                <div class="input-group">
                    <input type="password" class="form-control" name="password" id="password" required>
                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100" name="login">Đăng nhập</button>
            <a href="register.php" class="d-block text-center mt-3">Bạn chưa có tài khoản? Đăng ký</a>
        </form>
    </div>

    <script>
        document.getElementById("togglePassword").addEventListener("click", function() {
            let passwordInput = document.getElementById("password");
            let icon = this.querySelector("i");
            passwordInput.type = passwordInput.type === "password" ? "text" : "password";
            icon.classList.toggle("bi-eye");
            icon.classList.toggle("bi-eye-slash");
        });
    </script>
</body>

</html>