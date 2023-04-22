<?php
    session_start();
    if($data = $_SESSION['paymentSessionProducts']){
        echo json_encode(array("data" => $data));
    }
    else {
        echo json_encode(array("data" => null));
    }
?>