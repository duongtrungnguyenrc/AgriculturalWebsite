<?php
    include '../../../model/handler.php';

    $type = $_POST['type'];
    $handler = new handler();
    if($handler->addNewType($type)) {
        $data = $handler->getType($type);
        echo json_encode(array('data' => $data, 'status' => "success"));
    }
    else {
        echo json_encode(array('data' => "", 'status' => "failed"));
    }
?>