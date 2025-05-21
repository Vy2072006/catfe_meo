<?php
include 'layout/header.php'
?>

<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thông tin các bé mèo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .cat-card {
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
      width: 100%;
      max-width: 350px;
      transition: transform 0.3s;
    }

    .cat-card:hover {
      transform: scale(1.05);
    }

    .cat-img-wrapper {
      height: 200px;
      overflow: hidden;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .cat-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .cat-info {
      background-color: #f8f9fa;
      padding: 15px;
    }

    .cat-desc {
      font-size: 14px;
      color: #555;
      padding: 0 15px 15px;
    }
  </style>
</head>

<body>
  <header class="bg-light text-center py-3">
    <h1>Trang thông tin các bé mèo</h1>
  </header>
  <div class="container my-5">
    <h2 class="text-center mb-4">Thông tin các bé mèo</h2>
    <div class="row g-4 justify-content-center">

      <?php
      $cats = [
        [
          "name" => "Bé Gà",
          "gender" => "Đực",
          "birth" => "2018",
          "breed" => "Scottish",
          "image" => "image/meo1.jpg",
          "desc" => "Thức ăn yêu thích: đồ sấy, hạt Canin.<br>Hoạt động: ngủ nhiều vào ban ngày, thích phơi nắng ở cửa sổ, tầm trưa sẽ đi ăn thật no và lại chìm vào giấc ngủ.<br>Tính cách: Trưởng thành, điềm đạm.<br>Đặc điểm nhận dạng: Thích bới đồ ăn ra khỏi bát rồi mới ăn."
        ],
        [
          "name" => "Bé Sam",
          "gender" => "Cái",
          "birth" => "2022",
          "breed" => "Munchkin",
          "image" => "image/meo2.jpg",
          "desc" => "Thức ăn yêu thích: Ciao.<br>Hoạt động: Ngủ ngày, chiều dậy đi tìm người để nựng.<br>Tính cách: Cô nàng hướng nội.<br>Đặc điểm nhận dạng: Hay ngủ gục đầu vào chân bàn hay chân ghế."
        ],
        [
          "name" => "Bé Đậu Phộng",
          "gender" => "Đực",
          "birth" => "2020",
          "breed" => "Munchkin",
          "image" => "image/meo3.jpg",
          "desc" => "Thức ăn yêu thích: đồ sấy.<br>Hoạt động: Ngủ ngày, trưa sẽ đi dạo tìm đối tượng để chọc ghẹo.<br>Tính cách: Ngỗ nghịch.<br>Đặc điểm nhận dạng: thích đứng bằng 2 chân."
        ],
        [
          "name" => "Bé Matcha",
          "gender" => "Đực",
          "birth" => "2019",
          "breed" => "Scottish",
          "image" => "image/meo4.jpg",
          "desc" => "Thức ăn: Thịt than heo, Ciao, Pate tùy loại.<br>Hoạt động: Ngủ nguyên ngày, có thể không buồn ăn uống, phải gọi dậy để cho ăn, thích được đút ăn.<br>Tính cách: Nhẹ nhàng, tình cảm.<br>Đặc điểm: Ngủ mọi lúc mọi nơi."
        ]
      ];

      foreach ($cats as $cat) {
        echo '<div class="col-md-6 col-lg-4 d-flex justify-content-center">';
        echo '  <div class="card cat-card">';
        echo '    <div class="cat-img-wrapper">';
        echo '      <img src="' . $cat["image"] . '" alt="' . $cat["name"] . '" class="cat-img">';
        echo '    </div>';
        echo '    <div class="cat-info">';
        echo '      <h5 class="card-title mb-1">' . $cat["name"] . ' <small class="text-muted">– ' . $cat["gender"] . '</small></h5>';
        echo '      <p class="mb-1"><strong>Ngày sinh:</strong> ' . $cat["birth"] . '</p>';
        echo '      <p class="mb-1"><strong>Giống:</strong> ' . $cat["breed"] . '</p>';
        echo '    </div>';
        echo '    <div class="cat-desc">' . $cat["desc"] . '</div>';
        echo '  </div>';
        echo '</div>';
      }
      ?>

    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
include 'layout/footer.php'
?>