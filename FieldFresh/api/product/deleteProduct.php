<?php
    include '../../model/Sever.php';

    $name = $_POST['name'];
    $sever = new Sever();
    echo $sever->deleteProduct($name);
?>