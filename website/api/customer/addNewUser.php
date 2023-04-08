<?php
    include '../../model/handler.php';

    $user = $_POST['user'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $birth = $_POST['birth'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $handler = new handler();
    if($handler->addNewUser($user, $password, $name, $birth, $gender, $phone, $address)){
        $data = $handler->getUser($user);
        echo json_encode(array('data' => $data, 'status' => true));
    }
    else {
        echo json_encode(array('data' => null, 'status' => false));
    }
?>