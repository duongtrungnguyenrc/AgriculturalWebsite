<?php
    session_start();
    unset($_SESSION['login']);
    unset($_SESSION['lg-user']);
    unset($_SESSION['cart']);
    unset($_SESSION['role']);
?>