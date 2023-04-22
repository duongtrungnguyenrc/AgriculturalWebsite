<?php
    include '../../model/Sever.php';

    $orderId = $_POST['id'];
    $newStatus = $_POST['status'];
    $sever = new Sever();
    echo $sever->updateOrderStatus($orderId, $newStatus);
?>