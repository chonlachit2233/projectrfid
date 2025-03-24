<?php
include("../include/db.php");
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="styleslogin1.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<div class="login-container d-flex align-items-center justify-content-center">
  <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
    <div class="card-body">
      <h2 class="text-center mb-4"><i class='bx bxs-user-circle'style="font-size: 100px;" ></i></h2>
      <form action="checklogin.php" method="POST">

        <div class="form-group">
          <label for="username">UserName:</label>
          <input type="text" class="form-control" id="username" placeholder="Enter UserName" name="username" required>
        </div>

        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" required>
        </div>

        <div class="form-text text-center mb-3">เข้าสู่ระบบสำหรับ
          <a href="login.php" class="text-primary">Adminเท่านั้น</a>
          



        <button type="submit" class="btn btn-primary btn-block" name="login" id="login">Login</button>
       
        </div>

      </form>
    </div>
  </div>
</div>

<div class="footer text-center mt-4">
  <p>© 2024 MySite | Crafted with ❤️</p>
</div>

</body>
</html>
