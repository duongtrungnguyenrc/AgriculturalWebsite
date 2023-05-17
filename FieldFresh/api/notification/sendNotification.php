<?php
    include '../../model/sever.php';
    
    $server = new Sever();
    $message = $_POST['message'];
    
    if(isset($_POST['customerId']) && !empty($_POST['customerId'])) {
        $customerId = $_POST['customerId'];
        $user = $server->getAccountByCustomer($customerId);
        echo $server->sendNotification($user['user_name'], $message);
        exit();
    }
    else if(isset($_POST['userName']) && !empty($_POST['userName'])) {
        echo $server->sendNotification($_POST['userName'], $message);
        exit();
    }
    else {
        echo $server->sendNotificationForAll($message);
    }
?>