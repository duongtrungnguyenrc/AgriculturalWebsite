<?php
    include '../../model/Sever.php';
    $sever = new Sever();
    if(!isset($_POST['userName']) || empty($_POST['userName'])){
        echo json_encode(array('status' => false, 'description' => 'Can not delete invalid user!'));
    }
    echo $sever->deleteUser($_POST['userName']);
?>