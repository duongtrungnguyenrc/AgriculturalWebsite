<?php
    include '../../../model/handler.php';

    $type = $_POST['type'];
    $handler = new handler();
    $data = $handler->getType($type);
    echo json_encode(array('data' => $data, 'status' => "success"));
?>