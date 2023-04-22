<?php
    include '../../model/Sever.php';

    $sever = new Sever();
    $sumPrices = $_POST['lastPrices'];
    $customer = $_POST['customer'];
    $creationDate = date("Y-m-d");
    $order = $sever->createOrder($sumPrices, $creationDate, $customer);
    if($order) {
        session_start();
        $_SESSION['order_id'] = $order['id'];
        $_SESSION['total_money'] = $sumPrices;
        echo json_encode(array("status" => true, "data" => $order['id']));
    }
    else {
        echo json_encode(array("status" => false, "data" => null));
    }
?>