<?php
    session_start();
    if(isset($_POST['data']) && $_POST['data'] != null){
        $data = $_POST['data'];
        $_SESSION['paymentSessionProducts'] = $data;
        echo json_encode(array("status" => true));
    }
?>