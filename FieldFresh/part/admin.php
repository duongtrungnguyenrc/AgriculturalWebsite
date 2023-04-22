<?php
    session_start();
    if(!isset($_SESSION['login']) || $_SESSION['login'] == false) {
        header("Location: ../login/login.php");
        exit();
    }
    else {
        if($_SESSION['role'] != "admin") {
            header("Location: ../home/home.php");
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/general.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
    <script src="../assets/js/admin.js"></script>  
</head>
<body>
    <header id="navbar-left">
        <div id="brand">
            <img  id="logo" src="../pictures/logo.png" alt="logo" width="50px">
            <label id="brand-name">Field Fresh</label>
        </div>
        <ul id="navbar-navigation" class="list-unstyled">
            <li class="navbar-item">
                <a class="nav-btn" href="dashboard.php">
                    <i class='bx bxs-dashboard'></i>
                    <label>Dashboard</label>
                </a>
            </li>
            <li class="navbar-item">
                <a href="customers.php">
                    <i class='bx bxs-user-account'></i>
                    <label>Customers</label>
                </a>
            </li>
            <li class="navbar-item">
                <a href="types.php">
                    <i class='bx bxs-customize'></i>
                    <label>Types</label>
                </a>
            </li>
            <li class="navbar-item">
                <a href="products.php">
                    <i class='bx bxs-package'></i>
                    <label>Products</label>
                </a>
            </li>
            <hr>
            <li class="navbar-item">
                <a href="../home/home.php">
                    <i class='bx bxs-navigation'></i>
                    <label>View website</label>
                </a>
            </li>
            <li class="navbar-item">
                <a href="" id="logout">
                    <i class='bx bx-log-out'></i>
                    <label>Log out</label>
                </a>
            </li>
        </ul>
    </header>
    <section id="content">
        <nav class="navbar navbar-expand-lg bg-light d-flex" id="navbar-top">
            <button class="btn d-flex" id="menu-btn"><i class='bx bx-menu'></i></button>
                <h2 id="clock"></h2>
            <div class="btn-group">
                <button class="chat-btn me-1"><i class='bx bx-conversation'></i> Chat</button>
                <button class="share-btn"><i class='bx bx-share-alt' ></i> Share</button>
            </div>
        </nav>