<?php
    session_start();
    if(isset($_SESSION['login']) && $_SESSION['login'] == true) {
        echo json_encode(array("status" => true, 'data' => $_SESSION['userName'], 'customerId' =>  $_SESSION['customerId']));
    }else {
        echo json_encode(array("status" => false, 'data' => null, 'customerId' => null));
    }
?>