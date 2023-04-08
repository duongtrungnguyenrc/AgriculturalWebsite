<?php
    include '../../model/handler.php';

    $type = $_POST['type'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $img = $_POST['img'];
    $handler = new handler();
    if($handler->addNewProduct($type, $name, $price, $description, $img)){
        $data = $handler->getProduct($type, $name);
        echo json_encode(array('data' => $data, 'status' => true));
    }
    else {
        echo json_encode(array('data' => null, 'status' => false));
    }
?>