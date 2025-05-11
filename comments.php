<?php
include "header.php";
?>

<?php
// Kết nối cơ sở dữ liệu
include 'config.php';

// Xử lý gửi bình luận
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $comment = htmlspecialchars(trim($_POST['comment']));

    if (!empty($name) && !empty($comment)) {
        $stmt = $conn->prepare("INSERT INTO comments (name, comment, created_at) VALUES (?, ?, NOW())");
        $stmt->bind_param("ss", $name, $comment);
        $stmt->execute();
        $stmt->close();
    }
    header("Location: comments.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bình luận</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial;
            margin: 40px;
        }

        .comment-box {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 15px;
        }

        .comment-form {
            margin-top: 30px;
        }

        textarea,
        input[type=text] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }

        input[type=submit] {
            padding: 10px 20px;
        }
    </style>
</head>

<body>
    <h2>đánh giá</h2>

    <?php
    // Lấy bình luận từ DB
    $result = $conn->query("SELECT * FROM comments ORDER BY created_at DESC");

    while ($row = $result->fetch_assoc()) {
        echo "<div class='comment-box'>";
        echo "<strong>" . htmlspecialchars($row['name']) . "</strong> - <small>" . $row['created_at'] . "</small><br>";
        echo nl2br(htmlspecialchars($row['comment']));
        echo "</div>";
    }
    ?>

    <div class="comment-form">
        <h3>Gửi bình luận</h3>
        <form method="post" action="comments.php">
            <input type="text" name="name" placeholder="Tên của bạn" required>
            <textarea name="comment" rows="5" placeholder="Viết bình luận..." required></textarea>
            <input type="submit" value="Gửi bình luận">
        </form>
    </div>
</body>

</html>
<?php
include "footer.php";
?>