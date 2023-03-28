<?php
    include '../../../model/handler.php';

    $handler = new handler();
    $data = $handler->getAllOrders();
    echo json_encode(array('data' => $data));
?>