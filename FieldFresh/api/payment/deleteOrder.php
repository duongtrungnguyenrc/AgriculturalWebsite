<?php
    include '../../model/Sever.php';

    $sever = new Sever();

    if($sever->deleteOrder($_POST['deleteId'])) {
        echo json_encode(array("status" => true, "description" => "Successfully to delete Order!"));
    } else {
        echo json_encode(array("status" => false, "description" => "Failed to delete Order!"));
    }
    
?>