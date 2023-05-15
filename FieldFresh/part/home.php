<?php
    session_start();
    if(!isset($_SESSION['login']) || $_SESSION['login'] == false) {
        // header("Location: ../login/login.php");
        $login = false;
    }
    else {

        $login = $_SESSION['login'];
    }
    include '../model/sever.php';
    $sever = new Sever();
    if(isset($_SESSION['userName']) && $_SESSION['userName'] != null){
        $user = $sever->getUserInfo($_SESSION['userName']);
        $notifications = $sever->getNotificationsByUser($user['user_name'], true);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../assets/css/general.css">
    <link rel="stylesheet" href="../assets/css/home.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&display=swap" rel="stylesheet">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Chart.js -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- blockui -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
    <!-- js pdf -->
    <script src="https://unpkg.com/jspdf-invoice-template@1.4.3/dist/index.js"></script>
    <!-- local js -->
    <script src="../assets/js/general.js"></script>
    <script src="../assets/js/home.js"></script>
</head>
<body>
    <div class="offcanvas offcanvas-end" id="user">
        <div class="offcanvas-header">
          <h1 class="offcanvas-title"><i class='bx bx-user'></i> User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <div id="user-infomation" class="w-100 h-100">
                <div id="user-img-group">
                    <div id="avata"><?php echo isset($user) ? substr(implode(" ", array_reverse(explode(" ", $user['full_name']))), 0, 1) : 'G' ?></div>
                </div>
                <div id="user-name-group" class="text-center">
                    <h2><?php echo isset($user) ? $user['full_name'] : '' ?></h2>
                </div>
                <div id="img-control-group" class="d-flex">
                    <button id="save-user-info-btn" type="button" class="btn btn-primary" disabled>Save</button>
                    <button id="edit-user-info-btn" type="button" class="btn btn-light ms-2"><i class='bx bx-pencil'></i></button>
                </div>
                <div id="info-group">
                    <form action="" method="post">
                        <div class="input-group">
                            <span class="input-group-text">User:</span>
                            <input type="text" name="user-name" id="user-name" class="form-control user-name" value="<?php echo isset($user) ? $user['user_name'] : '' ?>" disabled>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">Password:</span>
                            <input type="password" name="password" id="password" class="form-control" value="<?php echo isset($user) ? $user['password'] : ''?>" disabled>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">Name:</span>
                            <input type="text" name="full-name" id="full-name"  class="form-control" value="<?php echo isset($user) ? $user['full_name'] : '' ?>" disabled>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">Email:</span>
                            <input type="text" name="email" id="email" class="form-control" value="<?php echo isset($user) ? $user['email'] : '' ?>" disabled>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">Birth:</span>
                            <div>
                                <input type="date" name="birth" id="birth" class="form-control" value="<?php echo isset($user) ? $user['birth'] : '' ?>" disabled>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">Gender:</span>
                            <div id="gender-control">
                                <select name="gender" id="gender" class="form-select w-100" disabled>
                                    <option value="Male" <?php echo isset($user) && strcasecmp($user['gender'], "male") ? "checked" : "" ?>>Male</option>
                                    <option value="Female" <?php echo isset($user) && strcasecmp($user['gender'], "female") ? "checked" : "" ?>>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">Phone:</span>
                            <input type="text" name="phone" id="phone" class="form-control" value="<?php echo isset($user) ? $user['phone'] : '' ?>" disabled>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">Adress:</span>
                            <div class="d-flex flex-column" id="address-group">
                                <select class="form-select" name="rg-priovince" id="rg-province" disabled>
                                    <option value="<?php echo isset($user) ?  explode(",", $user['address'])[0] : '' ?>" selected><?php echo isset($user) ?  preg_replace("/[0-9-]/", "", explode(",", $user['address'])[0]) : '' ?></option>
                                </select>
                                <select class="form-select" name="rg-district" id="rg-district" disabled>
                                    <option value="<?php echo isset($user) ?  explode(",", $user['address'])[1] : '' ?>" selected><?php echo isset($user) ?  preg_replace("/[0-9-]/", "", explode(",", $user['address'])[1]) : '' ?></option>
                                </select>
                                <select class="form-select" name="rg-ward" id="rg-ward" disabled>
                                <option value="<?php  echo isset($user) ?  explode(",", $user['address'])[2] : '' ?>" selected><?php echo isset($user) ?  preg_replace("/[0-9-]/", "", explode(",", $user['address'])[2]) : '' ?></option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <section id="navbar-left">
        <div id="brand">
            <img  id="logo" src="../pictures/logo.png" alt="logo">
            <label id="brand-name" class="ms-2" for="">Field Fresh</label>
        </div>
        <ul id="navbar-navigation" class="list-unstyled">
            <li class="navbar-item">
                <a class="nav-btn" href="./home.php">
                    <i class='bx bx-store'></i>
                    <label for="">Store</label>
                </a>
            </li>
            <li class="navbar-item">
                <a class="nav-btn" href="./cart.php">
                    <i class='bx bx-cart'></i>
                    <label for="">Cart</label>
                </a>
            </li>
            <li class="navbar-item">
                <a class="nav-btn" href="./order.php">
                    <i class='bx bx-bar-chart-alt-2'></i>
                    <label for="oder">Oder</label>
                </a>
            </li>
            <li class="navbar-item">
                <a class="nav-btn">
                    <i class='bx bx-cog' ></i>
                    <label for="setting">Setting</label>
                </a>
            </li>
            <hr>
            <?php
            if(isset($_SESSION['role'])){
                if (!strcasecmp($_SESSION['role'],  "admin")) {
            ?>
            <li class="navbar-item">
                <a href="../admin/dashboard.php" class="nav-btn">
                    <i class='bx bx-navigation'></i>
                    <label for="user">Admin</label>
                </a>
            </li>
            <?php
                }
            }
            ?>
            <li class="navbar-item">
                <button class="nav-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#user">
                    <i class='bx bx-user'></i>
                    <label for="user">User</label>
                </button>
            </li>
            <li class="navbar-item" id="logout">
                <a>
                    <i class='bx bx-log-out'></i>
                    <label for="">Log out</label>
                </a>
            </li>
        </ul>
    </section>
    <section id="content">
        <nav class="navbar navbar-expand-lg bg-body-tertiary d-flex" id="navbar-top">
            <button id="menu-btn"><i class='bx bx-menu'></i></button>
            <div id="search-form" class="d-flex w-50" role="search">
                <input id="search-input" class="form-control" type="text" placeholder="Search">
                <button id="search-submit" type="button">
                    <i class='bx bx-search d-flex'></i>
                </button>
                <ul id="search-result" class="w-100 m-0">
                <button id="hide-result"><i class='bx bx-x'></i></button>
                </ul>
            </div>
            <div class="btn-group">
                <div id="notification-btn-group">
                    <button id="notification-btn" class="notifycation-btn me-1"><i class='bx bxs-bell-ring'></i></button>
                    <span id="notification-tag"><?php echo isset($notifications) ? count($notifications) : '0' ?></span>
                </div>
                <button id="user-btn" class="user-btn" data-bs-toggle="offcanvas" data-bs-target="#user"><?php echo isset($user) ? substr(implode(" ", array_reverse(explode(" ", $user['full_name']))), 0, 1)  : "G" ?></button>
            </div>
            <div id="notification-popup" class="notification-popup">
                <div class="notification-popup-top">
                    <h5>your Notifications <i class='bx bxs-bell-ring'></i></h5>
                    <button id="hide-notification-popup"><i class='bx bx-x'></i></button>
                </div>
                <div class="notification-popup-body">
                    <?php
                    if(isset($notifications)){
                        foreach($notifications as $notification) {
                        
                    ?>
                    <div class="notification">
                        <div class="notification-top">
                            <h6>From: System</h6>
                        </div>
                        <span><?php echo $notification['message'] ?></span>
                    </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </nav>
        <div id="main-content-frame">
