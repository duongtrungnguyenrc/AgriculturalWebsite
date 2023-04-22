<?php
    include '../../model/Sever.php';

    $sever = new Sever();
    echo $sever-> getRevenueStatistics(true);
?>