<?php
    include '../../model/Sever.php';

    $name = $_POST['productName'];
    $type = $_POST['type'];
    $basePrice = $_POST['basePrice'];
    $salePrice = $_POST['basePrice'];
    $unit = $_POST['unit'];
    $description = $_POST['description'];
    $img = $_POST['img'];
    $sever = new Sever();
    echo  $sever->updateProduct($type, $name, $basePrice, $salePrice, $unit, $description, $img);
?>