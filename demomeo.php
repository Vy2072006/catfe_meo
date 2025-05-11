<?php
include 'config.php';
include 'header.php';
?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cafe Mèo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .cat-card {
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }

    .cat-img {
      object-fit: cover;
      height: 100%;
      width: 100%;
    }

    .cat-info {
      background-color: #f8f9fa;
      padding: 15px;
    }

    .cat-desc {
      font-size: 14px;
      color: #555;
    }

    .cat-card:hover {
      transform: scale(1.05);
      transition: 0.3s;
    }

    /* Điều chỉnh giãn cách các nút phân trang */
    .pagination .page-item .page-link {
      border-radius: 50%;
      padding: 12px 18px;
      font-size: 16px;
      margin: 0 5px;
      /* Giãn cách các nút */
      color: #007bff;
    }

    .pagination .page-item .page-link:hover {
      background-color: #007bff;
      color: white;
    }

    .pagination .page-item.disabled .page-link {
      color: #ddd;
    }

    .pagination .page-item.active .page-link {
      background-color: #28a745;
      border-color: #28a745;
      color: white;
    }

    .pagination .page-item .page-link {
      border: 1px solid #ccc;
    }

    /* Canh giữa ảnh mèo */
    .cat-img-wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 200px;
    }

    .cat-card-wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    /* Thu nhỏ card mèo */
    .cat-card {
      width: 100%;
      max-width: 350px;
    }

    /* Canh giữa toàn bộ container */
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }
  </style>
</head>

<body>
  <div class="container my-4">
    <div class="row g-4 justify-content-center">
      <?php
      // Xác định số lượng mèo mỗi trang
      $limit = 8;

      // Xác định trang hiện tại
      $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
      if ($page < 1) $page = 1;
      $offset = ($page - 1) * $limit;

      // Truy vấn để lấy mèo theo phân trang
      $stmt = $conn->prepare("SELECT * FROM cats LIMIT ? OFFSET ?");
      $stmt->bind_param("ii", $limit, $offset);
      $stmt->execute();
      $result = $stmt->get_result();

      while ($cat = $result->fetch_assoc()):
      ?>
        <div class="col-md-6 col-lg-4 cat-card-wrapper">
          <div class="card cat-card">
            <div class="row g-0">
              <div class="col-md-5 cat-img-wrapper">
                <img src="<?= htmlspecialchars($cat['image']) ?>" alt="Ảnh mèo" class="cat-img">
              </div>
              <div class="col-md-7 p-3 cat-info">
                <h5 class="card-title mb-1">
                  <?= htmlspecialchars($cat['name']) ?>
                  <small class="text-muted">– <?= htmlspecialchars($cat['gender']) ?></small>
                </h5>
                <p class="mb-1"><strong>Ngày sinh:</strong> <?= date('d.m.Y', strtotime($cat['birthday'])) ?></p>
                <p class="mb-1"><strong>Giống:</strong> <?= htmlspecialchars($cat['breed']) ?></p>
              </div>
            </div>
            <div class="p-3 pt-2">
              <p class="cat-desc mb-0">
                <?= nl2br(htmlspecialchars($cat['description'])) ?>
              </p>
            </div>
          </div>
        </div>
      <?php endwhile; ?>

    </div>

    <?php
    // Tính tổng số mèo
    $stmt = $conn->query("SELECT COUNT(*) AS total FROM cats");
    $totalCats = $stmt->fetch_assoc()['total'];
    $totalPages = ceil($totalCats / $limit);
    ?>

    <nav aria-label="Page navigation">
      <ul class="pagination justify-content-center mt-4">
        <li class="page-item <?= ($page == 1) ? 'disabled' : '' ?>">
          <a class="page-link" href="?page=<?= $page - 1 ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
          <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
            <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
          </li>
        <?php endfor; ?>
        <li class="page-item <?= ($page == $totalPages) ? 'disabled' : '' ?>">
          <a class="page-link" href="?page=<?= $page + 1 ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
include 'footer.php'
?>