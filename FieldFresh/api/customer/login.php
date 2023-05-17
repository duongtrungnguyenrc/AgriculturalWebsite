<?php
    include '../../model/Sever.php';
    $sever = new Sever();
    session_start();
  
    if(isset($_POST['userName']) && isset($_POST['password'])){
      if ($data = $sever->login($_POST['userName'], $_POST['password'])) {
          $_SESSION['userName'] = $_POST['userName'];
          $_SESSION['login'] = true;
          $_SESSION['role'] = $data['role'];
          $_SESSION['customerId'] = $data['customer_id'];
          echo json_encode(array('status' => true, 'role' => $data['role'], 'description' => 'Login success!'));
          exit();
      }
      else {
        $_SESSION['login'] = false;
        echo json_encode(array('status' => false, 'description' => 'Login fail!'));
      }
    }
?>