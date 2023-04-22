<?php
    include '../../model/Sever.php';
    $sever = new Sever();
    session_start();
  
    if(isset($_POST['userName']) && isset($_POST['password'])){
      if ($role = $sever->login($_POST['userName'], $_POST['password'])) {
          $_SESSION['userName'] = $_POST['userName'];
          $_SESSION['login'] = true;
          $_SESSION['role'] = $role;
          echo json_encode(array('status' => true, 'role' => $role, 'description' => 'Login success!'));
          exit();
      }
      else {
        $_SESSION['login'] = false;
        echo json_encode(array('status' => false, 'description' => 'Login fail!'));
      }
    }
?>