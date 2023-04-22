<?php
    include '../../model/Sever.php';
    $currentDate = date("Y-m-d");
    $revenue = $_POST['revenue'];
    $sever = new Sever();
    echo $sever->updateRevenue($currentDate, $revenue);
?>