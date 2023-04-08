<?php
    include '../../model/handler.php';

    $handler = new handler();
    $data = $handler->getAllTypes();
    echo json_encode(array('data' => $data));
?>