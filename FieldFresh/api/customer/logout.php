<?php
    session_start();
    unset($_SESSION['login']);
    unset($_SESSION['lg-user']);
    unset($_SESSION['cart']);
    unset($_SESSION['role']);
    unset($_SESSION['userName']);
    unset($_SESSION['customerId']);
?>