<?php
    session_start();
    unset($_SESSION['login']);
    unset($_SESSION['lg-user']);
    unset($_SESSION['lg-password']);
    unset($_SESSION['cart']);
?>