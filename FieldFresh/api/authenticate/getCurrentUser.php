<?php
    session_start();
    if(isset($_SESSION['userName'])) {
        echo json_encode(array('status' => true, 'data' => $_SESSION['userName']));
    }
    else {
        echo json_encode(array('status' => false, 'data' => null));
    }
?>