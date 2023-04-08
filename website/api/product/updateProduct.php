<?php
    include '../../model/handler.php';

    $id = $_POST['id'];
    $type = $_POST['type'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $img = $_POST['img'];
    $handler = new handler();
    if($handler->updateProduct($id, $type, $name, $price, $description, $img)) {
        echo json_encode(array("status" => true));
    }
    else {
        echo json_encode(array("status" => false));
    }
?>