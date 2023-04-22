<?php
    include '../../model/Sever.php';

    $sever = new Sever();
    echo $sever->getAllProducts(false);
?>