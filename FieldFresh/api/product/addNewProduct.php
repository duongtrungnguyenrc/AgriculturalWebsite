<?php
    $data = array(
        "type" => "",
        "name" => "",
        "basePrice" => "",
        "salePrice" => "",
        "unit" => "",
        "description" => "",
        "image" => "",
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
        if(!is_numeric($data['basePrice'])) {
            $error = true;
            $error_message = "Base price must be numeric data!";
        }
        else if(!is_numeric($data['salePrice'])) {
            $error = true;
            $error_message = "Sale price must be numeric data!";
        }
    }
    if ($error) {
        echo json_encode(array('status' => false, 'description' => $error_message));
        exit();
    }
    include '../../model/Sever.php';
    $sever = new Sever();
    echo $sever->addNewProduct($data['type'], $data['name'], $data['basePrice'], $data['salePrice'], $data['unit'], $data['description'], $data['image']);
?>