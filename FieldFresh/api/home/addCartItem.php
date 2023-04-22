<?php
    session_start();
    $product = array(
        "name" => $_POST['name'],
        "quantity" => $_POST['quantity'],
        "price" => $_POST['price'],
        "unit" => $_POST['unit'],
        "img" => $_POST['img'],
    );
    
    // Thêm sản phẩm vào giỏ hàng
    if(!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array($product);
    } else {
        $cart = $_SESSION["cart"];
        $index = -1;
        foreach($cart as $key => $value) {
            if($value["name"] ==  $_POST['name']) {
                $index = $key;
                break;
            }
        }
        if($index == -1) {
            array_push($_SESSION["cart"], $product);
        } else {
            $cart[$index]["quantity"]++;
            $_SESSION["cart"] = $cart;
        }
    }
?>