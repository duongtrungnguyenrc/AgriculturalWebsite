<?php
    include '../../model/Sever.php';
    session_start();
    $sever = new Sever();
    $totalPrices = $_POST['totalPrices'];
    $deliveryPrices = $_POST['deliveryPrices']; 
    $discount = $_POST['discount'];
    $customer = "";
    if(!isset($_POST['customer']) || $_POST['customer'] == null) {
        $name = $_POST['name']; 
        $birth = $_POST['birth'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $customer = $sever->addNewCustomer($name, $birth, $gender, $email, $phone, $address);
    }
    else {
        $customer = $_POST['customer'];
    }

    $creationDate = date("Y-m-d");
    $products = $_SESSION['paymentSessionProducts'];
    $order = $sever->createOrder($totalPrices, $deliveryPrices, $discount, $creationDate, $customer, $products);
    if($order) {
        $_SESSION['order_id'] = $order['id'];
        $_SESSION['total_money'] = $totalPrices + $deliveryPrices - $discount;
        echo json_encode(array("status" => true, "data" => $order['id']));
    }
    else {
        echo json_encode(array("status" => false, "data" => null));
    }

    

?>