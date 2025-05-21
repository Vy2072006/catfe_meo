<?php
include 'layout/header.php'
?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Trang chủ - MeoMeo Cafe</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .thumbnail {
      width: 150px;
      cursor: pointer;
      margin: 10px;
      border: 2px solid #ccc;
      transition: 0.3s;
    }

    .thumbnail:hover {
      border-color: #666;
    }

    #overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.8);
      justify-content: center;
      align-items: center;
      z-index: 1000;
    }

    #overlay img {
      max-width: 90%;
      max-height: 90%;
      border: 4px solid white;
      box-shadow: 0 0 15px black;
    }

    #overlay:active {
      display: none;
    }
  </style>
</head>

<body>
  <div class="container py-5">
    <section id="gioithieu" class="mb-5">
      <h2 class="mb-3">Giới thiệu</h2>
      <p>MeoMeo Cafe là nơi bạn có thể thưởng thức đồ uống thơm ngon trong không gian ấm cúng, vui chơi cùng các bé mèo đáng yêu. Với tiêu chí tạo ra trải nghiệm thư giãn, thân thiện và dễ thương, chúng tôi luôn sẵn sàng chào đón bạn.</p>
    </section>

    <section id="noibat" class="mb-5">
      <h2 class="mb-3">Điểm nổi bật</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card h-100 text-center">
            <div class="card-body">
              <h5 class="card-title">🐾 Mèo thân thiện</h5>
              <p class="card-text">Hơn 40 bé mèo được chăm sóc kỹ lưỡng, quen người và rất đáng yêu.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 text-center">
            <div class="card-body">
              <h5 class="card-title">☕ Thực đơn đa dạng</h5>
              <p class="card-text">Từ cà phê, trà sữa đến bánh ngọt - tất cả đều được chuẩn bị từ nguyên liệu chất lượng.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 text-center">
            <div class="card-body">
              <h5 class="card-title">📸 Góc sống ảo</h5>
              <p class="card-text">Không gian decor xinh xắn phù hợp với mọi khung hình Instagram của bạn.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="gallery" class="mb-5">
      <div class="row g-3">
        <!-- Ảnh thu nhỏ -->
        <div class="col-md-4">
          <h2 class="mb-3">Mèo</h2>
          <img src="./image/meo6.jpg" class="img-fluid rounded" onclick="showImage(this.src)">
          <img src="./image/meo5.jpg" class="img-fluid rounded" onclick="showImage(this.src)">
        </div>
        <div class=" col-md-4">
          <h2 class="mb-3">Thực đơn</h2>
          <img src="./image/drink3.jpg" class="img-fluid rounded" onclick="showImage(this.src)">
          <img src="./image/drink4.jpg" class="img-fluid rounded" onclick="showImage(this.src)">
        </div>
        <div class="col-md-4">
          <h2 class="mb-3"> Không gian quán</h2>
          <img src="./image/space5.jpg" class="img-fluid rounded" onclick="showImage(this.src)">
          <img src="./image/space6.jpg" class="img-fluid rounded" onclick="showImage(this.src)">
          <img src="./image/space4.jpg" class="img-fluid rounded" onclick="showImage(this.src)">
        </div>
        <!-- Overlay hiển thị hình ảnh -->
        <div id="overlay" onclick="hideImage()">
          <img id="fullImage" src="">
        </div>
      </div>
    </section>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function showImage(src) {
      document.getElementById("fullImage").src = src;
      document.getElementById("overlay").style.display = "flex";
    }

    function hideImage() {
      document.getElementById("overlay").style.display = "none";
    }
  </script>
</body>

</html>

<?php
include 'layout/footer.php'
?>