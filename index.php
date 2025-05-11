<?php
include 'header.php'
?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Trang chủ - MeoMeo Cafe</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
              <p class="card-text">Hơn 20 bé mèo được chăm sóc kỹ lưỡng, quen người và rất đáng yêu.</p>
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
        <div class="col-md-4">
          <h2 class="mb-3">Mèo</h2>
          <img src="./image/cat1.jpg" alt="Mèo dễ thương" class="img-fluid rounded">
          <img src="./image/cat2.jpg" alt="Mèo dễ thương" class="img-fluid rounded">
        </div>
        <div class="col-md-4">
          <h2 class="mb-3">Đồ uống</h2>
          <img src="./image/drink1.jpg" alt="Đồ uống ngon" class="img-fluid rounded">
          <img src="./image/drink2.jpg" alt="Đồ uống ngon" class="img-fluid rounded">
        </div>
        <div class="col-md-4">
          <h2 class="mb-3"> Không gian quán</h2>
          <img src="./image/space1.jpg" alt="Không gian quán" class="img-fluid rounded">
          <img src="./image/space2.jpg" alt="Không gian quán" class="img-fluid rounded">
          <img src="./image/space4.jpg" alt="Không gian quán" class="img-fluid rounded">
        </div>
      </div>
    </section>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
include 'footer.php'
?>