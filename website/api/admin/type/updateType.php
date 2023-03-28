<?php
    include '../../../model/handler.php';

    $id = $_POST['id'];
    $type = $_POST['type'];
    $handler = new handler();
    $handler->updateType($id, $type);
?>