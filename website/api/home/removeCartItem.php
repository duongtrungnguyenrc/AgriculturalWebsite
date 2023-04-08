<?php
    session_start();
    if (isset($_POST['remove_product']) && isset($_SESSION["cart"])) {
        $name = $_POST['remove_product'];
        $cart = $_SESSION["cart"];
        $index = -1;
        foreach ($cart as $key => $value) {
            if ($value["name"] == $name) {
                $index = $key;
                break;
            }
        }
        if ($index != -1) {
            unset($cart[$index]);
            $_SESSION["cart"] = array_values($cart);
        }
    }
?>