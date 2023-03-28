<?php
    include '../../../model/handler.php';

    $billID = $_POST['id'];
    $newStatus = $_POST['status'];
    $handler = new handler();
    $respond = $handler->updateOrderStatus($billID, $newStatus);
    echo json_encode(array('status' => $respond));
?>