<?php
    include '../../../model/handler.php';

    $handler = new handler();
    $data = $handler->getAllProducts();
    echo json_encode(array('data' => $data));
?>