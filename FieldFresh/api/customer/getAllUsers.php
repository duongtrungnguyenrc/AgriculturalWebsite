<?php
    include '../../model/Sever.php';

    $Sever = new Sever();
    echo $Sever->getAllUsers(false);
?>