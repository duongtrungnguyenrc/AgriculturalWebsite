<?php
    include '../../model/Sever.php';

    $type = $_POST['type'];
    $name = $_POST['name'];
    $basePrice = $_POST['basePrice'];
    $salePrice = $_POST['salePrice'];
    $unit = $_POST['unit'];
    $description = $_POST['description'];
    $img = $_POST['image'];
    $sever = new Sever();
    echo $sever->addNewProduct($type, $name, $basePrice, $salePrice, $unit, $description, $img);
?>