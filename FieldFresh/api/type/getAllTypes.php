<?php
    include '../../model/Sever.php';

    $sever = new Sever();
    echo $sever->getAllTypes(false);
?>