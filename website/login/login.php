<?php
  include '../model/handler.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="../assets/js/login.js"></script>
</head>
<?php

  $handler = new handler();
  session_start();

  if(isset($_SESSION['lg-user']) && isset($_SESSION['lg-password'])){
    header("Location: ../home/home.php");
  }
  if(isset($_POST['lg-user']) && isset($_POST['lg-password'])){
    if ($role = $handler->login($_POST['lg-user'], $_POST['lg-password'])) {
        $_SESSION['lg-user'] = $_POST['lg-user'];
        $_SESSION['login'] = true;
        if(strcasecmp($role, 'admin') != 0)
          header("Location: ../home/home.php");
        else {
          header("Location: ../admin/dashboard.php");
        }
        exit();
    }
    else {
        $_SESSION['login'] = false;
        echo '<div id="notifycation"><b>Login failed</b></div>';
    }
  }
?>
<body>
    <div id="container">
      <?php
          if(isset($_SESSION['login']) && $_SESSION['login'] == false) {
            echo '<div id="notifycation"><b>Login failed!</b></div>';
          }
      ?>
      <div class="content col-12 col-lg-8">
        <div class="col-lg-5 col-0" id="intro">
          <img src="../pictures/slider1.jpg" alt="" class="w-100 h-100">
          <div class="intro">
            <h1>Field Fresh</h1>
            <p>Bringing essence to every home</p>
          </div>
        </div>
        <div class="col-lg-7 col-12" id="form-frame">
          <div class="form-title mb-5">
            <h1 class="mb-4"><b>Hello!</b></h1>
            <div class="contact-info">
              <div id="facebook">
                <a href="https://www.facebook.com/duongtrungnguyen.it/">
                  <i class='bx bxl-facebook-circle'></i>
                </a>
              </div>
              <div id="github">
                <a href="https://github.com/duongtrungnguyenrc">
                  <i class='bx bxl-github'></i>
                </a>
              </div>
              <div id="email">
                <a href="https://www.facebook.com/duongtrungnguyen.it/">
                  <i class='bx bx-envelope'></i>
                </a>
              </div>
              <div id="phone">
                <a href="https://www.facebook.com/duongtrungnguyen.it/">
                  <i class='bx bx-phone'></i>
                </a>
              </div>
            </div>
          </div>
          <div class="w-100 h-100" id="data-form">
            <form id="login-form" action="login.php" method="post" class="w-100 login show">
              <div class="mb-2 mt-2">
                <label for="lg-user" class="form-label">User name:</label>
                <input type="text" class="form-control" id="lg-user" placeholder="Enter user name" name="lg-user">
              </div>
              <div class="mb-2">
                <label for="lg-password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="lg-password" placeholder="Enter password" name="lg-password">
              </div>
              <div class="mb-2">
                <label id="register-navigation">Don't have account? <a href="">Create one!</a></label>
              </div>
              <button type="submit" id="login" class="mt-2"><i class='bx bx-right-arrow-alt'></i></button>
            </form>
            <form action="login.php" method="post" class="w-100 register">
              <div class="form-group mb-2">
                  <div class="input-group">
                      <span class="input-group-text"><i class='bx bxs-user-rectangle'></i></span>
                      <input type="text" class="form-control rounded-right" placeholder="Full name" name="rg-name" id="rg-name" required>
                  </div>
                  <div class="input-group">
                      <span class="input-group-text"><i class='bx bxs-calendar' ></i></span>
                      <input type="date" class="form-control rounded-right" placeholder="Birth" name="rg-birth" id="rg-birth" required>
                  </div>
              </div>
  
              <div class="form-group gender-group mb-2">
                  <div class="input-group">
                      <span class="input-group-text"><i class='bx bx-male-female'></i></span>
                      <select name="" class="form-select" name="rg-gender" id="rg-gender" required>
                          <option value="" disabled selected>Chose gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                      </select>
                  </div>
                  <div class="input-group">
                      <span class="input-group-text"><i class='bx bxs-phone'></i></span>
                      <input type="text" class="form-control rounded-right" placeholder="Phone" name="rg-phone" id="rg-phone" required>
                  </div>
              </div>
  
              <div class="form-group mb-2">
                  <div class="input-group">
                      <span class="input-group-text"><i class='bx bx-current-location'></i></span>
                      <textarea class="form-control" aria-label="Address" name="rg-address" id="rg-address" required></textarea>
                  </div>
              </div>
  
              <div class="form-group mb-2">
                  <div class="input-group">
                      <span class="input-group-text"><i class='bx bxs-user-circle'></i></span>
                      <input type="text" class="form-control rounded-right" placeholder="User name" name="rg-user" id="rg-user" required>
                  </div>
                  <div class="input-group">
                      <span class="input-group-text"><i class='bx bxs-lock' ></i></span>
                      <input type="text" class="form-control rounded-right" placeholder="Password" name="rg-password" id="rg-password" required>
                  </div>
              </div>
  
              <div class="form-group mb-2">
                  <label id="login-navigation">Already have account? <a href="">Log in!</a></label>
              </div>
              
              <button id="register-button" type="submit" class="mt-2"><i class='bx bx-right-arrow-alt'></i></button>
            </form>
          </div>
        </div>
      </div>
    </div>
</body>
</html>

