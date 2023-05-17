<?php
    include '../../model/sever.php';
    
    $server = new Sever();
    $validDate = $_POST['validDate'];
    $invalidDate = $_POST['invalidDate'];
    $discountCode =  $_POST['discountCode'];
    $discountPercentage = $_POST['discountPercentage'];

    echo $server->createDiscount($validDate, $invalidDate, $discountCode, $discountPercentage);
?>