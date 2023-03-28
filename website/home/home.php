<?php
    include '../model/handler.php';

    $handler = new handler();
    if($handler->login()) {
        // header("Location: ../login/login.php?login=fail");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./home.css">
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../bootstrap-5.3.0-alpha1-dist/css/bootstrap.css">
    <script src="../bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="./home.js"></script>
</head>
<body>
    <div class="offcanvas offcanvas-end" id="cart">
        <div class="offcanvas-header">
          <h1 class="offcanvas-title"><i class='bx bx-cart'></i> Cart</h1>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="w-100 h-100 m-0 p-0">
            <li class="cart-item">
                <input type="checkbox" class="item-purchase-check">
                <img src="../pictures/egg.jpg" alt="" class="img-thumbnail m-2">
                <div class="cart-item-info">
                    <h4>trứng gà</h4>
                    <div class="quantity-group">
                        <div class="btn-group" name="quantity">
                            <button type="button" class="btn btn-outline-secondary">-</button>
                            <button type="button" class="btn btn-outline-secondary">1</button>
                            <button type="button" class="btn btn-outline-secondary">+</button>
                        </div>
                    </div>
                    <p class="cart-item-price">50000 VNĐ</p>
                </div>
            </li>
            <li class="cart-item">
                <input type="checkbox" class="item-purchase-check">
                <img src="../pictures/egg.jpg" alt="" class="img-thumbnail m-2">
                <div class="cart-item-info">
                    <h4>trứng gà</h4>
                    <div class="quantity-group">
                        <div class="btn-group" name="quantity">
                            <button type="button" class="btn btn-outline-secondary">-</button>
                            <button type="button" class="btn btn-outline-secondary">1</button>
                            <button type="button" class="btn btn-outline-secondary">+</button>
                        </div>
                    </div>
                    <p class="cart-item-price">50000 VNĐ</p>
                </div>
            </li>
            <li class="cart-item">
                <input type="checkbox" class="item-purchase-check">
                <img src="../pictures/egg.jpg" alt="" class="img-thumbnail m-2">
                <div class="cart-item-info">
                    <h4>trứng gà</h4>
                    <div class="quantity-group">
                        <div class="btn-group" name="quantity">
                            <button type="button" class="btn btn-outline-secondary">-</button>
                            <button type="button" class="btn btn-outline-secondary">1</button>
                            <button type="button" class="btn btn-outline-secondary">+</button>
                        </div>
                    </div>
                    <p class="cart-item-price">50000 VNĐ</p>
                </div>
            </li>
            <li class="cart-item">
                <input type="checkbox" class="item-purchase-check">
                <img src="../pictures/egg.jpg" alt="" class="img-thumbnail m-2">
                <div class="cart-item-info">
                    <h4>trứng gà</h4>
                    <div class="quantity-group">
                        <div class="btn-group" name="quantity">
                            <button type="button" class="btn btn-outline-secondary">-</button>
                            <button type="button" class="btn btn-outline-secondary">1</button>
                            <button type="button" class="btn btn-outline-secondary">+</button>
                        </div>
                    </div>
                    <p class="cart-item-price">50000 VNĐ</p>
                </div>
            </li>
            <li class="cart-item">
                <input type="checkbox" class="item-purchase-check">
                <img src="../pictures/egg.jpg" alt="" class="img-thumbnail m-2">
                <div class="cart-item-info">
                    <h4>trứng gà</h4>
                    <div class="quantity-group">
                        <div class="btn-group" name="quantity">
                            <button type="button" class="btn btn-outline-secondary">-</button>
                            <button type="button" class="btn btn-outline-secondary">1</button>
                            <button type="button" class="btn btn-outline-secondary">+</button>
                        </div>
                    </div>
                    <p class="cart-item-price">50000 VNĐ</p>
                </div>
            </li>
            <li class="cart-item">
                <input type="checkbox" class="item-purchase-check">
                <img src="../pictures/egg.jpg" alt="" class="img-thumbnail m-2">
                <div class="cart-item-info">
                    <h4>trứng gà</h4>
                    <div class="quantity-group">
                        <div class="btn-group" name="quantity">
                            <button type="button" class="btn btn-outline-secondary">-</button>
                            <button type="button" class="btn btn-outline-secondary">1</button>
                            <button type="button" class="btn btn-outline-secondary">+</button>
                        </div>
                    </div>
                    <p class="cart-item-price">50000 VNĐ</p>
                </div>
            </li>
            <li class="cart-item">
                <input type="checkbox" class="item-purchase-check">
                <img src="../pictures/egg.jpg" alt="" class="img-thumbnail m-2">
                <div class="cart-item-info">
                    <h4>trứng gà</h4>
                    <div class="quantity-group">
                        <div class="btn-group" name="quantity">
                            <button type="button" class="btn btn-outline-secondary">-</button>
                            <button type="button" class="btn btn-outline-secondary">1</button>
                            <button type="button" class="btn btn-outline-secondary">+</button>
                        </div>
                    </div>
                    <p class="cart-item-price">50000 VNĐ</p>
                </div>
            </li>
          </ul>
        </div>
        <div id="purchase-group">
            <div id="customer-info w-100">
                <div id="customer-contact-info" class="d-flex">
                    <p id="customer-name" class="m-0"><b>Đường Trung Nguyên</b></p>
                    <p id="customer-phone"class="m-0" >0855004714</p>
                </div>
                <p class="m-0 mt-1">Xã Ân Tường Tây, huyện Hoài Ân, Tỉnh Bình Định</p>
            </div>
            <hr>
            <div id="total-prices-group" class="d-flex">
                <p class="m-0 me-2">Total prices:</p>
                <p id="total-prices" class="m-0"><b>500000 VNĐ</b></p>
            </div>
            <div id="purchase-button-group" class="mt-1 w-100 d-flex">
                <button class="btn btn-danger">Delete</button>
                <button class="btn btn-success">Purchase</button>
            </div>
        </div>
    </div>
    <div class="offcanvas offcanvas-end" id="oder">
        <div class="offcanvas-header">
          <h1 class="offcanvas-title"><i class='bx bx-bar-chart-alt-2'></i> Oder</h1>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <div id="oders-status" class="w-100 h-100">
                <div class=" w-100 h-100 oder-items">
                    <div class="oder-status oder-steps-group">
                        <p class="title mb-2"><b>Oder status</b>:</p>
                        <div class="oder-steps">
                            <div class="step-line"></div>
                            <div class="step completed" data-bs-toggle="tooltip" title="Your order has been receive!">
                                <i class='bx bx-notepad'></i>
                            </div>
                            <div class="step ms-5 me-5" data-bs-toggle="tooltip" title="Your order is being shipped!">
                                <i class='bx bxs-package'></i>
                            </div>
                            <div class="step" data-bs-toggle="tooltip" title="Your order has been successfully delivered!">
                                <i class='bx bx-check-double'></i>
                            </div>
                        </div>
                    </div>
                    <div class="oder-list w-100 mt-3 oder-status">
                        <ul class="w-100 h-100 m-0 p-0">
                            <li class="oder-item">
                                <img src="../pictures/egg.jpg" alt="" class="img-thumbnail m-2">
                                <div class="cart-item-info">
                                    <h4>trứng gà</h4>
                                    <div class="quantity-group">
                                        <label>Số lượng: 1</label>
                                        <p class="cart-item-price mb-0">50000 VNĐ</p>
                                    </div>
                                </div>
                            </li>
                            <li class="oder-item">
                                <img src="../pictures/egg.jpg" alt="" class="img-thumbnail m-2">
                                <div class="cart-item-info">
                                    <h4>trứng gà</h4>
                                    <div class="quantity-group">
                                        <label>Số lượng: 1</label>
                                        <p class="cart-item-price mb-0">50000 VNĐ</p>
                                    </div>
                                </div>
                            </li>
                            <li class="oder-item">
                                <img src="../pictures/egg.jpg" alt="" class="img-thumbnail m-2">
                                <div class="cart-item-info">
                                    <h4>trứng gà</h4>
                                    <div class="quantity-group">
                                        <label>Số lượng: 1</label>
                                        <p class="cart-item-price mb-0">50000 VNĐ</p>
                                    </div>
                                </div>
                            </li>
                            <li class="oder-item">
                                <img src="../pictures/egg.jpg" alt="" class="img-thumbnail m-2">
                                <div class="cart-item-info">
                                    <h4>trứng gà</h4>
                                    <div class="quantity-group">
                                        <label>Số lượng: 1</label>
                                        <p class="cart-item-price mb-0">50000 VNĐ</p>
                                    </div>
                                </div>
                            </li>
                            <li class="oder-item">
                                <img src="../pictures/egg.jpg" alt="" class="img-thumbnail m-2">
                                <div class="cart-item-info">
                                    <h4>trứng gà</h4>
                                    <div class="quantity-group">
                                        <label>Số lượng: 1</label>
                                        <p class="cart-item-price mb-0">50000 VNĐ</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="oder-prices w-100">
                        <p class="mb-0">Tổng giá trị: <b>500000 VNĐ</b></p>
                    </div>
                    <div class="oder-control w-100">
                        <button class="btn btn-outline-secondary w-100" onclick="document.querySelector('.oder-items').classList.toggle('active')">Chose</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="purchase-group">
            <div id="customer-info w-100">
                <div id="customer-contact-info" class="d-flex">
                    <p id="customer-name" class="m-0"><b>Đường Trung Nguyên</b></p>
                    <p id="customer-phone"class="m-0" >0855004714</p>
                </div>
                <p class="m-0 mt-1">Xã Ân Tường Tây, huyện Hoài Ân, Tỉnh Bình Định</p>
            </div>
            <hr>
            <div id="total-prices-group" class="d-flex">
                <p class="m-0 me-2">Delete status:</p>
                <p id="total-prices" class="m-0"><b>Can't cancel this oder!</b></p>
            </div>
            <div id="purchase-button-group" class="mt-1 w-100 d-flex">
                <button class="btn btn-danger w-100">Delete</button>
            </div>
        </div>
        
    </div>
    <div class="offcanvas offcanvas-end" id="setting">
        <div class="offcanvas-header">
          <h1 class="offcanvas-title"><i class='bx bx-cog' ></i> Setting</h1>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
        </div>
    </div>
    <div class="offcanvas offcanvas-end" id="user">
        <div class="offcanvas-header">
          <h1 class="offcanvas-title"><i class='bx bx-user'></i> User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <div id="user-infomation" class="w-100 h-100">
                <div id="user-img-group">
                    <img src="../pictures/logo.png" alt="" id="avata" class="img-thumbnail rounded-circle">
                </div>
                <div id="user-name-group" class="text-center">
                    <h2>Duong Trung Nguyen</h2>
                </div>
                <div id="img-control-group" class="d-flex">
                    <button type="button" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-light ms-2"><i class='bx bx-pencil'></i></button>
                </div>
                <div id="info-group">
                    <form action="" method="post">
                        <div class="input-group">
                            <span class="input-group-text">User:</span>
                            <input type="text" class="form-control" placeholder="nguyendeptrai" disabled>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">Password:</span>
                            <input type="password" class="form-control" placeholder="******" disabled>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">Name:</span>
                            <input type="text" class="form-control" placeholder="Duong Trung Nguyen" disabled>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">Birth:</span>
                            <div id="gender-control">
                                <input type="date"class="form-control" disabled>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">Gender:</span>
                            <div id="gender-control">
                                <input type="radio"> male  
                                <input type="radio" class="ms-2"> female
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">Phone:</span>
                            <input type="text" class="form-control" placeholder="0855004714" disabled>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">Adress:</span>
                            <textarea type="text" class="form-control" placeholder="Đội 6 - thông Tân Thạnh - xã Ân Tường Tây - huyện Hoài Ân - tỉnh Bình Định" disabled cols="30" rows="5"></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <header id="navbar-left">
        <div id="brand">
            <img  id="logo" src="../pictures/logo.png" alt="logo" width="50px">
            <label id="brand-name" class="ms-2" for="">NongSanSach</label>
        </div>
        <ul id="navbar-navigation" class="list-unstyled">
            <li class="navbar-item active">
                <button class="nav-btn">
                    <i class='bx bx-store'></i>
                    <label for="">Store</label>
                </button>
            </li>
            <li class="navbar-item">
                <button class="nav-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#cart">
                    <i class='bx bx-cart'></i>
                    <label for="">Cart</label>
                </button>
            </li>
            <li class="navbar-item">
                <button class="nav-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#oder">
                    <i class='bx bx-bar-chart-alt-2'></i>
                    <label for="oder">Oder</label>
                </button>
            </li>
            <li class="navbar-item">
                <button class="nav-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#setting">
                    <i class='bx bx-cog' ></i>
                    <label for="setting">Setting</label>
                </button>
            </li>
            <hr>
            <li class="navbar-item">
                <button class="nav-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#user">
                    <i class='bx bx-user'></i>
                    <label for="user">User</label>
                </button>
            </li>
            <li class="navbar-item">
                <a href="../login/login.php">
                    <i class='bx bx-log-out'></i>
                    <label for="">Log out</label>
                </a>
            </li>
        </ul>
    </header>
    <section id="content">
        <nav class="navbar navbar-expand-lg bg-body-tertiary d-flex" id="navbar-top">
            <button class="btn d-flex" id="menu-btn"><i class='bx bx-x'></i></button>
            <form id="search-form" class="d-flex w-50" role="search">
                <input id="search-input" class="form-control" type="search" placeholder="Search" aria-label="Search">
                <button id="search-submit" class="btn btn-outline-secondary" type="submit"><i class='bx bx-search d-flex'></i></button>
            </form>
            <button class="btn btn-outline-secondary">button</button>
        </nav>
        <div id="content-scroll-land">
            <div id="main-content">
                <div id="slider" class="carousel slide" data-bs-ride="carousel">
    
                    <!-- Indicators/dots -->
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#slider" data-bs-slide-to="0" class="active"></button>
                      <button type="button" data-bs-target="#slider" data-bs-slide-to="1"></button>
                      <button type="button" data-bs-target="#slider" data-bs-slide-to="2"></button>
                    </div>
                    
                    <!-- The slideshow/carousel -->
                    <div class="carousel-inner" style="border-radius: 10px; overflow: hidden;">
                      <div class="carousel-item active">
                        <img src="../pictures/slider1.jpg" alt="Los Angeles" class="d-block">
                        <div class="carousel-caption">
                          <h3>Los Angeles</h3>
                          <p>We had such a great time in LA!</p>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="../pictures/slider2.jpg" alt="Chicago" class="d-block">
                        <div class="carousel-caption">
                          <h3>Chicago</h3>
                          <p>Thank you, Chicago!</p>
                        </div> 
                      </div>
                      <div class="carousel-item">
                        <img src="../pictures/slider3.jpg" alt="New York" class="d-block">
                        <div class="carousel-caption">
                          <h3>New York</h3>
                          <p>We love the Big Apple!</p>
                        </div>  
                      </div>
                    </div>
                    
                    <!-- Left and right controls/icons -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
                      <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
                <div class="content-element">
                    <div class="content-header">
                       <h1>hàng gì đó</h1> 
                    </div>
                    <div class="products">
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top" src="../pictures/egg.jpg" alt="Card image" style="width:100%;">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top w-100" src="../pictures/egg.jpg" alt="Card image">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top w-100" src="../pictures/egg.jpg" alt="Card image">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top w-100" src="../pictures/egg.jpg" alt="Card image">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top w-100" src="../pictures/egg.jpg" alt="Card image">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top w-100" src="../pictures/egg.jpg" alt="Card image">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top w-100" src="../pictures/egg.jpg" alt="Card image">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top w-100" src="../pictures/egg.jpg" alt="Card image">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top w-100" src="../pictures/egg.jpg" alt="Card image">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top w-100" src="../pictures/egg.jpg" alt="Card image">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top w-100" src="../pictures/egg.jpg" alt="Card image">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top w-100" src="../pictures/egg.jpg" alt="Card image">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top w-100" src="../pictures/egg.jpg" alt="Card image">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top w-100" src="../pictures/egg.jpg" alt="Card image">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top w-100" src="../pictures/egg.jpg" alt="Card image">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top w-100" src="../pictures/egg.jpg" alt="Card image">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top w-100" src="../pictures/egg.jpg" alt="Card image">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top w-100" src="../pictures/egg.jpg" alt="Card image">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top w-100" src="../pictures/egg.jpg" alt="Card image">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top w-100" src="../pictures/egg.jpg" alt="Card image">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        
                    </div>
                    <div class="control">
                        <button class="more-btn btn btn-outline-info">more 
                            <i class='bx bxs-down-arrow'></i>
                        </button>
                    </div>
                </div>
                <div class="content-element">
                    <div class="content-header">
                       <h1>hàng gì đó</h1> 
                    </div>
                    <div class="products">
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top w-100" src="../pictures/egg.jpg" alt="Card image">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top w-100" src="../pictures/egg.jpg" alt="Card image">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top w-100" src="../pictures/egg.jpg" alt="Card image">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top w-100" src="../pictures/egg.jpg" alt="Card image">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top w-100" src="../pictures/egg.jpg" alt="Card image">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top w-100" src="../pictures/egg.jpg" alt="Card image">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top w-100" src="../pictures/egg.jpg" alt="Card image">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top w-100" src="../pictures/egg.jpg" alt="Card image">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top w-100" src="../pictures/egg.jpg" alt="Card image">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top w-100" src="../pictures/egg.jpg" alt="Card image">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        
                    </div>
                    <div class="control w-100">
                        <button class="more-btn btn btn-outline-info">more 
                            <i class='bx bxs-down-arrow'></i>
                        </button>
                    </div>
                </div>
                <div class="content-element">
                    <div class="content-header">
                       <h1>hàng gì đó</h1> 
                    </div>
                    <div class="products">
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top w-100" src="../pictures/egg.jpg" alt="Card image">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top w-100" src="../pictures/egg.jpg" alt="Card image">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top w-100" src="../pictures/egg.jpg" alt="Card image">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top w-100" src="../pictures/egg.jpg" alt="Card image">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top w-100" src="../pictures/egg.jpg" alt="Card image">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top" src="../pictures/egg.jpg" alt="Card image" style="width:100%; height: 250px;">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top" src="../pictures/egg.jpg" alt="Card image" style="width:100%; height: 250px;">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top" src="../pictures/egg.jpg" alt="Card image" style="width:100%; height: 250px;">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top" src="../pictures/egg.jpg" alt="Card image" style="width:100%; height: 250px;">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        <div class="product card col-6 col-md-4 col-lg-2">
                            <a href="">
                                <img class="card-img-top" src="../pictures/egg.jpg" alt="Card image" style="width:100%; height: 250px;">
                                <div class="card-body">
                                  <h4 class="product-name card-title">Egg</h4>
                                  <p class="prices card-text">50000 VND</p>
                                </div>
                            </a>
                        </div>
                        
                    </div>
                    <div class="control w-100">
                        <button class="more-btn btn btn-outline-info">more 
                            <i class='bx bxs-down-arrow'></i>
                        </button>
                    </div>
                </div>
                <div id="policy" class="row">
                    <div class="policy-content col-4">
                        <div class="row">
                            <i class='bx bx-diamond'></i>
                            <h1>Tiêu chí chất lượng</h1>
                            <label for="">100% sản phẩm thông qua kiểm định chất lượng đạt chuẩn 5*</label>
                        </div>
                        <div class="row">
                            <i class='bx bx-money'></i>
                            <h1>Chính sách ưu đãi</h1>
                            <label for="">Nhiều chính sách ưu đãi và giao hàng tận nơi</label>
                        </div>
                    </div>
                    <div id="demo" class="col-4">
                        <img src="../pictures/tomato.jpg" alt="">
                    </div>
                    <div class="policy-content col-4">
                        <div class="row">
                            <i class='bx bx-group' ></i>
                            <h1>Bảo vệ khách hàng</h1>
                            <label for="">Cam kết bảo vệ quyền lợi của khách hàng, ghi nhận các góp ý</label>
                        </div>
                        <div class="row">
                            <i class='bx bx-transfer-alt'></i>
                            <h1>Chính sách đổi trả</h1>
                            <label for="">Đổi trả và hoàn tiền nếu có vấn đề về chất lượng sản phẩm</label>
                        </div>
                    </div>
                </div>
                <div id="contact" class="w-100">
                    <div class="row">
                        <div class="col-6">
                            <i class='bx bx-time-five' ></i>
                            <label for="">Đặt online giao tận nhà đúng giờ</label>
                        </div>
                        <div class="col-6">
                            <i class='bx bx-transfer-alt'></i>
                            <label for="">Đổi, trả sản phẩm Trong vòng 7 ngày</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <i class='bx bx-phone-call'></i>
                            <label for="">Tổng đài: 0855004714 (0:00 - 23:00)</label>
                        </div>
                        <div class="col-6">
                            <i class='bx bx-message-dots'></i>
                            <label for="">duongtrungnguyen.it</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>