<?php
    include '../../model/Sever.php';

    $type = $_POST['type'];
    $newType = $_POST['newType'];
    $sever = new Sever();
    echo $sever->updateType($type, $newType);
?>