<?php
    include "handler.php";
    $handler = new handler();
    $res = $handler->deleteUser(3);
    var_dump($res);
?>

</html>
