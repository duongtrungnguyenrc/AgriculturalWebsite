<?php
    $data = array(
        'fullName' => "",
        'birth' => "",
        'gender' => "",
        'phone' => "",
        'address' => "",
        'email' => "",
        'currentUser' => "",
        'password' => "",
    );
    
    $error = false;
    $error_message = '';
    
    foreach ($data as $key => $value) {
        if (!isset($_POST[$key]) || empty($_POST[$key])) {
            $error = true;
            $error_message = "Invalid your $key!";
            break;
        }
        else {
            $data[$key] = $_POST[$key];
        }
    }
    
    if (!$error) {
        $current_date = new DateTime();
        $birth = new DateTime($data['birth']);
        $interval = $current_date->diff($birth);
        if ($interval->format('%R') === '+' && $interval->format('%a') >= 1) {
            $error = true;
            $error_message = "Birth day must not future day!";
        }
        else if(!preg_match("/^[0-9]{10}$/", $data['phone'])){
            $error = true;
            $error_message = "Phone number must has type 0xxxxxxxxx";
        }
        else if(!preg_match("/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/", $data['email'])){
            $error = true;
            $error_message = "Email must has type your_name@gmail.com!";
        }
        else if (strlen($data['password']) < 6) {
            $error = true;
            $error_message = "Password must be more than 6 characters!";
        }
    }
    
    if ($error) {
        echo json_encode(array('status' => false, 'description' => $error_message));
        exit();
    }
    
    include '../../model/Sever.php';
    $sever = new Sever();
    echo $sever->updateUser($_POST['currentUser'], $data['password'], $data['fullName'], $data['birth'], $data['gender'], $data['email'], $data['phone'], $data['address']);
?>