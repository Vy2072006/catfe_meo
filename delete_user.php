<?php 

include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id'])) {
    $user_id = intval($_POST['user_id']); // Chuyển ID thành số nguyên

    // Xóa user theo ID
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    
    if ($stmt->execute()) {
        echo "<script>alert('User deleted successfully!'); window.location.href='admin.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
    
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request!";
}

?>