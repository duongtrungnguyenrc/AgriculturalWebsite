<?php
    include '../../model/Sever.php';

    $type = $_POST['type'];
    $sever = new Sever();
    echo $sever->deleteType($type);
?>