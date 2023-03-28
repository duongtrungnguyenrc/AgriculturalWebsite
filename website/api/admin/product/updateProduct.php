<?php
    include '../../../model/handler.php';

    $id = $_POST['id'];
    $type = $_POST['type'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $img = $_POST['img'];
    $handler = new handler();
    $handler->updateProduct($id, $type, $name, $price, $description, $img);
?>