<?php
 include "header.php";
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Đặt vé - Dịch vụ</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script>
    function thanhToan() {
      alert("Bạn đã thanh toán thành công!");
      setTimeout(() => {
        window.location.href = window.location.href;
      }, 1000);
    }
  </script>
</head>
<body class="bg-light">
<div class="container py-5">
  <h2 class="mb-4">Dịch vụ - Đặt vé vào quán</h2>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $loai_ve = $_POST['loai_ve'];
      $so_luong = $_POST['so_luong'];
      $gio_den = $_POST['gio_den'];
      $ghi_chu = $_POST['ghi_chu'];

      $gia = $loai_ve == '1h' ? 40000 : ($loai_ve == '2h' ? 70000 : 120000);
      $tong_tien = $gia * intval($so_luong);

      echo '<div class="alert alert-success">';
      echo "<h5>✅ Đặt vé thành công</h5>";
      echo "• Loại vé: $loai_ve<br>";
      echo "• Số lượng: $so_luong<br>";
      echo "• Giờ đến: $gio_den<br>";
      echo "• Ghi chú: " . (!empty($ghi_chu) ? $ghi_chu : "Không có") . "<br>";
      echo '<div class="d-flex align-items-center mt-2">';
      echo '<strong class="me-3 text-success">Tổng tiền: ' . number_format($tong_tien, 0, ',', '.') . 'đ</strong>';
      echo '<button class="btn btn-success btn-sm" onclick="thanhToan()">Thanh toán</button>';
      echo '</div>';
      echo '</div>';
  }
  ?>

  <form method="post" class="bg-white p-4 rounded shadow-sm border">
    <div class="mb-3">
      <label for="loai-ve" class="form-label">Chọn loại vé</label>
      <select id="loai-ve" name="loai_ve" class="form-select" required>
        <option value="1h">Vé 1 tiếng - 40.000đ</option>
        <option value="2h">Vé 2 tiếng - 70.000đ</option>
        <option value="buffet">Vé Buffet cả ngày - 120.000đ</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="so-luong" class="form-label">Số lượng vé</label>
      <input type="number" id="so-luong" name="so_luong" class="form-control" min="1" max="10" required>
    </div>

    <div class="mb-3">
      <label for="gio-den" class="form-label">Giờ đến (dự kiến)</label>
      <input type="time" id="gio-den" name="gio_den" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="ghi-chu" class="form-label">Ghi chú thêm</label>
      <textarea id="ghi-chu" name="ghi_chu" class="form-control" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Đặt vé</button>
  </form>
</div>
</body>
</html>

<?php
include 'footer.php'
?>