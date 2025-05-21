<?php
include "layout/header.php";
?>
<?php
// Xử lý khi form được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $comment = htmlspecialchars($_POST["comment"]);
    $rating = intval($_POST["rating"]);

    // Lưu vào file đơn giản (nên dùng database trong ứng dụng thực tế)
    $data = "$name|$rating|$comment\n";
    file_put_contents("comments_data.txt", $data, FILE_APPEND);
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Đánh giá & Bình luận</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .comment-box {
            margin-top: 20px;
        }

        .star-rating {
            direction: rtl;
            display: inline-flex;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            font-size: 25px;
            color: #ccc;
            cursor: pointer;
            transition: 0.2s;
        }

        .star-rating input:checked~label,
        .star-rating label:hover,
        .star-rating label:hover~label {
            color: gold;
        }

        .comment {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }
    </style>
</head>

<body>

    <h2>Gửi đánh giá của bạn</h2>

    <form method="POST" action="">
        <label>Tên:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Đánh giá sao:</label><br>
        <div class="star-rating">
            <?php for ($i = 5; $i >= 1; $i--): ?>
                <input type="radio" id="star<?= $i ?>" name="rating" value="<?= $i ?>" required>
                <label for="star<?= $i ?>">★</label>
            <?php endfor; ?>
        </div><br><br>

        <label>Bình luận:</label><br>
        <textarea name="comment" rows="4" cols="50" required></textarea><br><br>

        <button type="submit">Gửi</button>
    </form>

    <h3>Bình luận đã gửi:</h3>

    <div class="comment-box">
        <?php
        if (file_exists("comments_data.txt")) {
            $lines = file("comments_data.txt");
            foreach ($lines as $line) {
                list($name, $rating, $comment) = explode("|", trim($line));
                echo "<div class='comment'>";
                echo "<strong>$name</strong><br>";
                echo str_repeat("★", $rating) . str_repeat("☆", 5 - $rating) . "<br>";
                echo nl2br(htmlspecialchars($comment));
                echo "</div>";
            }
        }
        ?>
    </div>

</body>

</html>
<?php
include "layout/footer.php";
?>