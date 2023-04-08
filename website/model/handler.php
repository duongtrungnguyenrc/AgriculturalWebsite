<?php
    require_once 'config.php';
?>
<?php
    class handler{

        private $conn;
        public function __construct() {
            $this->conn = new mysqli(host, user, pass, db_name);
            if (!$this->conn) {
            die("Connection failed: " . $conn->connect_error);
            }
        }

        private function insert($sql) {
            try {
                $this->conn->query($sql);
                return true;
            } catch (Exception $e) {
                return false;
            }
        }

        private function getData($sql) {
            try {
                return $this->conn->query($sql);
            } catch (Exception $e) {
                return null;
            }
        }

        private function updateData($sql) {
            try {
                $this->conn->query($sql);
                return true;
            } catch (Exception $e) {
                return false;
            }
        }

        private function deleteData($sql) {
            try {
                $this->conn->query($sql);
                return true;
            } catch (Exception $e) {
                return false;
            }
        }

        private function disableConnect(){
            $this->conn->close();
        }

        public function getAllUsers() {
            $users = array();
            $sql = "select * from users";
            $result = $this->getData($sql);
            if($result){
                while($user = $result->fetch_assoc()){
                    array_push($users, $user);
                }
            }
            return $users;
        }

        public function login($user, $password) {
            $sql = "SELECT * FROM users WHERE user='$user'";
            if($data = $this->conn->query($sql)->fetch_assoc()) {
                if(password_verify($password, $data['password'])) {
                    return $data['role'];
                }
            }
            return false;  
        }

        public function getUser($user) {
            $sql = "SELECT * FROM users WHERE user='$user'";
            return $this->conn->query($sql)->fetch_assoc();
        }

        public function addNewUser($user, $password, $name, $birth, $gender, $phone, $address) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "insert into users(user, password, name, birth, gender, phone, address) values('$user', '$hashed_password', '$name', '$birth', '$gender', '$phone', '$address')";
            return $this->insert($sql);
        }

        public function updateUser($id, $user, $password, $name, $phone, $address, $gender, $birth) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "update users set user='$user', password='$hashed_password', name='$name', phone='$phone', address='$address', gender='$gender', birth='$birth' where id='$id'";
            return $this->updateData($sql);
        }

        public function deleteUser($id) {
            $sql = "delete from users where id='$id'";
            return $this->deleteData($sql);
        }

        public function getAllProducts() {
            $products = array();
            $sql = "select * from products";
            $result = $this->getData($sql);
            if($result){
                while($product = $result->fetch_assoc()){
                    array_push($products, $product);
                }
            }
            return $products;
        }

        public function getProductsByType($id) {
            $products = array();
            $sql = "select * from products where type='$id'";
            $result = $this->getData($sql);
            if($result){
                while($product = $result->fetch_assoc()){
                    array_push($products, $product);
                }
            }
            return $products;
        }

        public function getProduct($type, $name) {
            $sql = "select * from products where type='$type' and name='$name'";
            return $this->getData($sql)->fetch_assoc(); 
        }

         public function getProductByID($id) {
            $sql = "select * from products where id='$id'";
            return $this->getData($sql)->fetch_assoc(); 
        }

        public function addNewProduct($type, $name, $price, $description, $img) {
            $sql = "insert into products(type, name, price, description, img) values ('$type', '$name', '$price', '$description', '$img')";
            return $this->insert($sql);
        }

        public function updateProduct($id, $type, $name, $price, $description, $img) {
            $sql = "update products set type='$type', name='$name', price='$price', description='$description', img='$img' where id='$id'";
            return $this->updateData($sql);
        }

        public function deleteProduct($id) {
            $sql = "delete from products where id='$id'";
            return $this->deleteData($sql);
        }

        ///////////////

        public function getAllTypes() {
            $types = array();
            $sql = "select * from types order by id ASC";
            $result = $this->getData($sql);
            if($result){
                while($type = $result->fetch_assoc()){
                    array_push($types, $type);
                }
            }
            return $types;
        } 

        public function getType($id) {
            $sql = "select * from types where id='$id'";
            return $this->getData($sql)->fetch_assoc();
        }

        public function addNewType($type) {
            $sql = "insert into types(type) values ('$type')";
            return $this->insert($sql);
        }

        public function updateType($id, $type){
            $sql = "update types set type='$type' where id='$id'";
            return $this->updateData($sql);
        }

        public function deleteType($id){
            $sql = "delete from types where id='$id'";
            return $this->updateData($sql);
        }

        ///////////////////////

        public function getCartItems($id) {
            $items = array();
            $sql = "select * from carts where userID='$id'";
            $result = $this->getData($sql);
            if($result){
                while($item = $result->fetch_assoc()){
                    array_push($items, $item);
                }
            }
            return $items;
        }

        //// handle order bill ////

        public function getAllOrders() {
            $bills = array();
            $sql = "select * from bills";
            $result = $this->getData($sql);
            if($result){
                while($bill = $result->fetch_assoc()){
                    array_push($bills, $bill);
                }
            }
            return $bills;
        } 


        ///

        public function updateOrderStatus($id, $status) {
            $sql = "update bills set status='$status' where id='$id'";
            if( $this->updateData($sql)){
                return $this->getData("select status from bills where id='$id'")->fetch_assoc();
            }
            return null;
        }

        public function deleteBill($id) {
            $sql = "delete from bills where id='$id'";
            return this->deleteData($sql);
        }
    }
?>