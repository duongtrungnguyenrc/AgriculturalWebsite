<?php
    include '../../model/sever.php';
    
    $server = new Sever();
    $userName = $_POST['userName'];
    $orderId = $_POST['orderId'];
    $message = $_POST['message'];

    echo $server->sendNotification($userName, $orderId, $message);
?>