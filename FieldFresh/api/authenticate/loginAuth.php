<?php
    session_start();
    if(isset($_SESSION['login']) && $_SESSION['login'] == true) {
        echo json_encode(array("status" => true));
    }else {
        echo json_encode(array("status" => false));
    }
?>