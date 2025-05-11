<?php
include "header.php";
?>

<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <title>Menu - Quán Cafe Mèo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .card {
      transition: transform 0.2s;
    }

    .card:hover {
      transform: scale(1.02);
    }

    .bg-drink {
      background-color: rgb(149, 232, 255);
    }

    .bg-main {
      background-color: rgb(252, 239, 195);
    }

    .bg-cat {
      background-color: rgb(244, 215, 225);
    }

    .card-title i {
      margin-right: 5px;
    }
  </style>
</head>

<body class="bg-light">
  <div class="container py-5">
    <h2 class="mb-4">Menu quán - Gọi món tại chỗ</h2>
    <div class="row g-4">

      <!-- Nước uống -->
      <div class="col-md-4">
        <div class="card shadow-sm h-100 bg-drink">
          <div class="card-body">
            <h5 class="card-title"><i class="bi bi-cup-straw"></i>Nước uống</h5>
            <ul class="list-unstyled">
              <li>Matcha đá xay - 38.000đ</li>
              <li>Matcha latte - 35.000đ</li>
              <li>Sinh tố xoài - 35.000đ</li>
              <li>Sữa tươi trân châu - 32.000đ</li>
              <li>Hồng trà sữa - 30.000đ</li>
              <li>Trà sữa - 30.000đ</li>
              <li>Cafe sữa đá - 28.000đ</li>
              <li>Trà chanh đào - 25.000đ</li>
              <li>Nước cam - 22.000đ</li>
              <li>Trà tắc - 20.000đ</li>
              <li>Nước suối - 10.000đ</li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Đồ ăn chính -->
      <div class="col-md-4">
        <div class="card shadow-sm h-100 bg-main">
          <div class="card-body">
            <h5 class="card-title"><i class="bi bi-basket"></i>Đồ ăn chính</h5>
            <ul class="list-unstyled">
              <li>bánh cheesecake - 35.000đ</li>
              <li>bánh bông lan - 30.000đ</li>
              <li>Bánh muffin việt quất - 25.000đ</li>
              <li>Bánh muffin socola - 25.000đ</li>
              <li>Tiramisu socola - 25.000đ</li>
              <li>Tiramisu trà xanh matcha - 25.000đ</li>
              <li>Tiramisu chanh dây - 25.000đ</li>
              <li>bánh quy sô-cô-la - 20.000đ</li>
              <li>bánh quy matcha - 20.000đ</li>
              <li></li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Đồ ăn cho mèo -->
      <div class="col-md-4">
        <div class="card shadow-sm h-100 bg-cat">
          <div class="card-body">
            <h5 class="card-title"><i class="bi bi-heart-fill"></i>Đồ ăn cho mèo</h5>
            <ul class="list-unstyled">
              <li>Bánh thưởng - 15.000đ</li>
              <li>Thịt hộp - 25.000đ</li>
              <li>Pate gà - 18.000đ</li>
              <li>Snack cá ngừ - 20.000đ</li>
              <li>Thức ăn hạt - 10.000đ</li>
              <li>Súp mèo - 12.000đ</li>
              <li>Gà viên mềm - 22.000đ</li>
              <li>Thanh cá phô mai - 30.000đ</li>
              <li>Thức ăn dinh dưỡng - 28.000đ</li>
              <li>Đùi gà mini - 26.000đ</li>
            </ul>
          </div>
        </div>
      </div>

    </div>
    <p class="text-muted mt-4">* Vui lòng gọi món trực tiếp tại quầy hoặc với nhân viên phục vụ.</p>
  </div>

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</body>

</html>

<?php
include 'footer.php'
?>