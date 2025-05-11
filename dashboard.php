<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
  <link rel="icon" href="./image/logo1.jpg">
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .sidebar {
      width: 250px;
      height: 100vh;
      position: fixed;
      background: #343a40;
      padding-top: 20px;
    }

    .sidebar a {
      color: white;
      padding: 10px;
      display: block;
      text-decoration: none;
    }

    .sidebar a:hover {
      background: #495057;
      border-radius: 5px;
    }

    .content {
      margin-left: 260px;
      padding: 20px;
    }
  </style>
</head>

<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <h4 class="text-white text-center">Dashboard</h4>
    <a href="#"><i class="bi bi-house-door"></i> Home</a>
    <a href="#"><i class="bi bi-people"></i> Users</a>
    <a href="#"><i class="bi bi-cart"></i> Orders</a>
    <a href="#"><i class="bi bi-bar-chart"></i> Reports</a>
    <a href="login.php" class="text-danger"><i class="bi bi-box-arrow-right"></i> Logout</a>
  </div>

  <!-- Main Content -->
  <div class="content">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm mb-4">
      <div class="container-fluid">
        <span class="navbar-brand">Welcome, user</span>
      </div>
    </nav>

    <!-- Dashboard Cards -->
    <div class="row">
      <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
          <div class="card-body">
            <h5 class="card-title">
              <i class="bi bi-people"></i> Total Users
            </h5>
            <p class="card-text fs-3">1,245</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
          <div class="card-body">
            <h5 class="card-title">
              <i class="bi bi-cart"></i> Total Orders
            </h5>
            <p class="card-text fs-3">320</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-white bg-warning mb-3">
          <div class="card-body">
            <h5 class="card-title"><i class="bi bi-cash"></i> Revenue</h5>
            <p class="card-text fs-3">$12,500</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>