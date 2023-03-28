<?php
    include '../model/handler.php';

    $billID = $_POST['id'];
    $handler = new handler();
    $handler->deleteBill($billID);
?>