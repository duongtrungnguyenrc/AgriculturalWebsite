<?php
  include 'config.php';
?>

<?php
class DBInteract {
  protected $conn;
  function __construct() {
    $this->conn = new mysqli(host, user, pass, db_name);
    if (!$this->conn) {
      die("Connection failed: " . $conn->connect_error);
    }
  }
  
  protected function insert($sql) {
    return ($this->conn->query($sql) === TRUE ? true : false);
  }

  protected function getData($sql) {
    $result = $this->conn->query($sql);
    return $result;
  }

  protected function updateData($sql) {
    return ($this->conn->query($sql) === TRUE ? true : false);
  }

  protected function deleteData($sql) {
    return $this->conn->query($sql);
  }

  protected function disableConnect(){
    $this->conn->close();
  }
}
?>
