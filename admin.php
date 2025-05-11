<?php
include 'config.php';

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cafe Mèo</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
  <link rel="icon" href="./image/logo1.jpg">
</head>

<body>
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Cafe Mèo</a>
      <a href="login.php" class="btn btn-danger">
        <i class="bi bi-box-arrow-right"></i> Logout
      </a>
    </div>
  </nav>

  <div class="container mt-4">
    <h2 class="mb-4">Quản lý người dùng</h2>

    <div class="card">
      <div class="card-header bg-primary text-white">
        <h5><i class="bi bi-people"></i> Danh sách người dùng</h5>
      </div>
      <div class="card-body">
        <table class="table table-striped">
          <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>Email</th>
              <th>Password</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
              <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td>
                  <input type="password" value="<?php echo htmlspecialchars($row['password']); ?>"
                    readonly class="form-control form-control-sm d-inline-block"
                    style="border:none; background:transparent; width:auto;" />
                  <button type="button" onclick="togglePassword(this)" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-eye"></i>
                  </button>
                </td>
                <td>
                  <form action='delete_user.php' method='POST' style='display:inline;'>
                    <input type='hidden' name='user_id' value='<?php echo htmlspecialchars($row['id']); ?>'>
                    <button type='submit' class='btn btn-danger btn-sm' onclick='return confirm("Are you sure?");'>
                      <i class='bi bi-trash'></i> Delete
                    </button>
                  </form>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script>
    function togglePassword(button) {
      const input = button.previousElementSibling;
      if (input.type === "password") {
        input.type = "text";
        button.innerHTML = '<i class="bi bi-eye-slash"></i>';
      } else {
        input.type = "password";
        button.innerHTML = '<i class="bi bi-eye"></i>';
      }
    }
  </script>
</body>

</html>