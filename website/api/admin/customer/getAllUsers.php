<?php
    include '../../../model/handler.php';

    $handler = new handler();
    $data = $handler->getAllUsers();
    echo json_encode(array('data' => $data));
?>