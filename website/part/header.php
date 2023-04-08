<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/general.css">
    <link rel="stylesheet" href="../assets/css/home.css">
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="../assets/js/home.js"></script>
</head>
<body>
    <section id="navbar-left">
        <div id="brand">
            <img  id="logo" src="../pictures/logo.png" alt="logo">
            <label id="brand-name" class="ms-2" for="">Field Fresh</label>
        </div>
        <ul id="navbar-navigation" class="list-unstyled">
            <li class="navbar-item active">
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
            <li class="navbar-item">
                <a class="nav-btn">
                    <i class='bx bx-user'></i>
                    <label for="user">User</label>
                </a>
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
            <button class="btn" id="menu-btn"><i class='bx bx-menu'></i></button>
            <form id="search-form" class="d-flex w-50" role="search">
                <input id="search-input" class="form-control" type="text" placeholder="Search">
                <button id="search-submit" class="" type="submit">
                    <i class='bx bx-search d-flex'></i>
                </button>
            </form>
            <div class="btn-group">
                <button class="chat-btn me-1"><i class='bx bx-conversation'></i> Chat</button>
                <button class="share-btn"><i class='bx bx-share-alt' ></i> Share</button>
            </div>
        </nav>
        <div id="main-content-frame">