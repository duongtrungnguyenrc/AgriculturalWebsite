<?php
    include '../../../model/handler.php';

    $id = $_POST['id'];
    $handler = new handler();
    $handler->deleteType($id);
?>