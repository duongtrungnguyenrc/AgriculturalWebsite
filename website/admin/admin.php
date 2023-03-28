<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../bootstrap-5.3.0-alpha1-dist/css/bootstrap.css">
    <script src="../bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="./admin.js"></script>  
</head>
<body>
    <header id="navbar-left">
        <div id="brand">
            <img  id="logo" src="../pictures/logo.png" alt="logo" width="50px">
            <label id="brand-name" class="ms-2">NongSanSach</label>
        </div>
        <ul id="navbar-navigation" class="list-unstyled">
            <li class="navbar-item active">
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
                <a href="../login/login.php">
                    <i class='bx bx-log-out'></i>
                    <label>Log out</label>
                </a>
            </li>
        </ul>
    </header>
    <section id="content">
        <nav class="navbar navbar-expand-lg bg-light d-flex" id="navbar-top">
            <button class="btn d-flex" id="menu-btn"><i class='bx bx-menu'></i></button>
            <form id="search-form" class="d-flex w-50" role="search">
                <input id="search-input" class="form-control" type="search" placeholder="Search" aria-label="Search">
                <button id="search-submit" class="btn btn-outline-secondary" type="submit"><i class='bx bx-search d-flex'></i></button>
            </form>
            <button class="btn btn-outline-secondary">button</button>
        </nav>
        