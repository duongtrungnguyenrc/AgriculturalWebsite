<?php
    include "../../model/Sever.php";

    $server = new Sever();

    $productName = $_POST['productName'];
    $commentTime = $_POST['commentTime'];
    $userName = $_POST['userComment'];
    $comment= $_POST['comment'];
    echo $server->sendComment($commentTime, $userName, $productName, $comment);
?>