<?php
    include '../../model/handler.php';

    $id = $_POST['id'];
    $user = $_POST['user'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $birth = $_POST['birth'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $handler = new handler();
    if($handler->updateUser($id, $user, $password, $name, $phone, $address, $gender, $birth)) {
        echo json_encode(array("status" => true));
    } else {
        echo json_encode(array("status" => false));
    }
?>