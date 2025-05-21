<?php
include "layout/header.php";
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <title>Đặt vé - Dịch vụ</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container py-5">
    <h2 class="mb-4">Dịch vụ - Đặt vé vào quán</h2>

    <script>
      function quayLaiTrangDatVe() {
        const thanhToanAlert = document.getElementById("thanh-toan-thanh-cong");
        const form = document.querySelector("form");
        if (thanhToanAlert) thanhToanAlert.remove();
        if (form) form.reset();
        if (window.history.replaceState) {
          window.history.replaceState(null, "", window.location.pathname);
        }
      }
    </script>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['thanh_toan'])) {
      $loai_ve = $_POST['loai_ve'];
      $so_luong = $_POST['so_luong'];
      $gio_den = $_POST['gio_den'];
      $ghi_chu = $_POST['ghi_chu'];

      list($gio, $phut) = explode(":", $gio_den);
      $gio = intval($gio);
      $phut = intval($phut);

      $is_gio_cao_diem = ($gio >= 11 && $gio < 8) || ($gio >= 23 && $gio < 20);
      $is_gio_mo_cua = ($gio >= 10 && $phut >= 00) || ($gio > 6);
      $is_gio_dong_cua = ($gio >= 21 && $phut >= 30) || ($gio < 6);

      if ($is_gio_cao_diem) {
        echo '<div class="alert alert-danger">';
        echo "<h5>🚫 Đã đầy khách</h5>";
        echo "Khung giờ <strong>$gio_den</strong> đã hết chỗ, vui lòng chọn giờ khác.";
        echo '<div class="mt-3"><a href="" class="btn btn-danger btn-sm">Quay lại</a></div>';
        echo '</div>';
      } elseif ($is_gio_dong_cua) {
        echo '<div class="alert alert-warning">';
        echo "<h5>⏰ Quán tạm đóng cửa</h5>";
        echo "Chúng tôi chỉ nhận khách từ <strong>06:00 sáng đến 23:30 tối</strong>. Vui lòng chọn giờ khác.";
        echo '<div class="mt-3"><a href="" class="btn btn-danger btn-sm">Quay lại</a></div>';
        echo '</div>';
      } else {
        $gia = $loai_ve == '1h' ? 98000 : ($loai_ve == '2h' ? 70000 : 120000);
        $tong_tien = $gia * intval($so_luong);

        echo '<div id="thong-bao-dat-ve" class="alert alert-success">';
        echo "<h5>✅ Đặt vé thành công</h5>";
        echo "• Loại vé: $loai_ve<br>";
        echo "• Số lượng: $so_luong<br>";
        echo "• Giờ đến: $gio_den<br>";
        echo "• Ghi chú: " . (!empty($ghi_chu) ? $ghi_chu : "Không có") . "<br>";
        echo "• Tổng tiền: " . number_format($tong_tien, 0, ',', '.') . "đ<br>";
        echo '<form id="form-thanh-toan" method="post" class="mt-3">';
        echo '<input type="hidden" name="thanh_toan" value="1">';
        echo "<input type='hidden' name='loai_ve' value='$loai_ve'>";
        echo "<input type='hidden' name='so_luong' value='$so_luong'>";
        echo "<input type='hidden' name='gio_den' value='$gio_den'>";
        echo "<input type='hidden' name='ghi_chu' value='$ghi_chu'>";
        echo '<button type="submit" class="btn btn-success btn-sm">Thanh toán</button>';
        echo '</form>';
        echo '</div>';
      }
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['thanh_toan'])) {
      $loai_ve = $_POST['loai_ve'];
      $so_luong = $_POST['so_luong'];
      $gio_den = $_POST['gio_den'];
      $ghi_chu = $_POST['ghi_chu'];
      $gia = $loai_ve == '1h' ? 98000 : ($loai_ve == '2h' ? 70000 : 120000);
      $tong_tien = $gia * intval($so_luong);

      $message = "Có khách vừa đặt vé:\n";
      $message .= "• Loại vé: $loai_ve\n";
      $message .= "• Số lượng: $so_luong\n";
      $message .= "• Giờ đến: $gio_den\n";
      $message .= "• Ghi chú: " . (!empty($ghi_chu) ? $ghi_chu : "Không có") . "\n";
      $message .= "• Tổng tiền: " . number_format($tong_tien, 0, ',', '.') . "đ\n";

      $mail = new PHPMailer(true);
      try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'thaovynguyen2072006@gmail.com';
        $mail->Password = 'wljjzacigenzvjal';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';
        $mail->setFrom('thaovynguyen2072006@gmail.com', 'Website Đặt Vé');
        $mail->addAddress('thaovynguyen2072006@gmail.com');
        $mail->isHTML(false);
        $mail->Subject = '🧾 Có khách đã thanh toán đặt vé';
        $mail->Body = $message;
        $mail->send();

        echo '<div id="thanh-toan-thanh-cong" class="alert alert-success">';
        echo '<h5>🎉 Thanh toán thành công!</h5>';
        echo 'Thông tin vé đã được xác nhận.';
        echo '<div class="mt-3"><button class="btn btn-success btn-sm" onclick="quayLaiTrangDatVe()">Quay lại</button></div>';
        echo '</div>';
      } catch (Exception $e) {
        echo '<div class="alert alert-danger">Gửi email thất bại: ' . $mail->ErrorInfo . '</div>';
      }
    }
    ?>

    <form method="post" class="bg-white p-4 rounded shadow-sm border">
      <div class="mb-3">
        <label for="loai-ve" class="form-label">Chọn loại vé</label>
        <select id="loai-ve" name="loai_ve" class="form-select" required>
          <option value="1h">Vé ngày thường - 98.000</option>
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
    <p class="text-muted mt-4">* Lưu ý: Ngày lễ vé sẽ là 110.000/người. Chi tiết liên hệ quán.</p>

  </div>
</body>

</html>

<?php include 'layout/footer.php'; ?>