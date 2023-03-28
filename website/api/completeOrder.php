<?php
    include '../model/handler.php';

    if(empty($_POST['id'])) {
        die(json_encode(array('status' => false, 'data' => 'Parameters not valid')));
    }
    
    $billID = $_POST['id'];
    $handler = new handler();
    $handler->updateBillStatus($billID, "completed");
?>