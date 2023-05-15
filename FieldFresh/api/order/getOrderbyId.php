<?php
    include '../../model/sever.php';

    $server = new Sever();
    $order = $server->getOrderById($_POST['id']);
    $user = $server->getUserInfo($order['user_name']);
    $detail = $server->getOrderDetail($_POST['id']);
    echo json_encode(array("order" => $order, "user" => $user, "detail" => $detail));
?>