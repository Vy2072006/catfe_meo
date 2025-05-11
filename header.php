<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cafe Mèo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="./image/logo1.jpg">
  <style>
    html {
      scroll-behavior: smooth;
    }

    .navbar-brand img {
      height: 70px;
      width: auto;
      object-fit: contain;
    }

    .nav-link {
      font-weight: 500;
    }

    .btn-login {
      margin-left: auto;
    }

    .navbar-nav {
      align-items: center;
    }

    .navbar-collapse {
      justify-content: space-between;
    }

    @media (max-width: 991.98px) {
      .navbar-brand {
        order: 0;
      }

      .navbar-nav {
        justify-content: start;
      }

      .btn-login {
        margin-left: 0;
        margin-top: 1rem;
      }
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm px-3">
    <div class="container-fluid">
      <!-- Logo ở giữa -->
      <a class="navbar-brand mx-auto order-0" href="index.php">
        <img src="./image/logo1.jpg" alt="Logo">
      </a>

      <!-- Nút toggle khi mobile -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Các mục điều hướng và nút -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Trang chủ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="demomeo.php">Các Boss</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Dichvu.php">Dịch vụ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#lienhe">Liên hệ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Menu.php">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="comments.php">đánh giá</a>
          </li>
        </ul>

        <!-- Nút đăng nhập/đăng ký -->
        <div class="btn-login d-flex">
          <a href="login.php" class="btn btn-outline-primary">Đăng nhập</a>
          <a href="register.php" class="btn btn-primary ms-2">Đăng ký</a>
        </div>
      </div>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>