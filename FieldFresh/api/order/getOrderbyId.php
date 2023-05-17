<?php
    include '../../model/sever.php';

    $server = new Sever();
    $order = $server->getOrderById($_POST['id']);
    $customer = $server->getCustomerInfo($order['customer_id']);
    $detail = $server->getOrderDetail($_POST['id']);
    echo json_encode(array("order" => $order, "customer" => $customer, "detail" => $detail));
?>