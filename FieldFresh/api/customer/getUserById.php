<?php
    include '../../model/sever.php';

    $server = new Sever();

    echo json_encode(array("data" => $server->getUserInfo($_POST['user_name'])));
?>