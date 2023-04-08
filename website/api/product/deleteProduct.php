<?php
    include '../../model/handler.php';

    $id = $_POST['id'];
    $handler = new handler();
    if($handler->deleteProduct($id)) {
        echo json_encode(array("status" => true));
    }
    else {
        echo json_encode(array("status" => false));
    }
?>