<?php
    include '../../model/sever.php';

    $server = new Sever();
    if(isset($_POST['discountCode'])){
       echo $server->getDiscount($_POST['discountCode'], false);
    }
?>