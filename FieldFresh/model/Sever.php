<?php
    require 'config.php';

    class Sever{

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

        private function get($sql) {
            try {
                $result = $this->conn->query($sql);
                return $result;
                if($result->num_rows > 0) {
                } 
                else {
                    return false;
                }
            } catch (Exception $e) {
                die($e);
                return false;
            }
        }

        private function update($sql) {
            try {
                $this->conn->query($sql);
                return true;
            } catch (Exception $e) {
                return false;
            }
        }

        private function delete($sql) {
            try {
                $result = $this->conn->query($sql);
                if ($result === false) {
                    throw new Exception('Lỗi khi xóa dữ liệu');
                }
                return true;
            } catch (Exception $e) {
                die("Lỗi khi xóa đơn hàng: " . $e->getMessage());
                return false;
            }
        }

        private function disableConnect(){
            $this->conn->close();
        }

        public function getAllUsers($return) {
            $users = array();
            $sql = "select * from User";
            $result = $this->get($sql);
            if($result){
                while($user = $result->fetch_assoc()){
                    array_push($users, $user);
                }
                return $return ? $users : json_encode(array('data' => $users, 'status' => true, 'description' => "Successfully to get all users!"));
            }
            else {
                return $return ? $users : json_encode(array('data' => null, 'status' => false, 'description' => "Failed to get all users!"));
            }
        }

        public function login($userName, $password) {
            $sql = "SELECT * FROM User WHERE user_name='$userName'";
            if($data = $this->conn->query($sql)->fetch_assoc()) {
                if(password_verify($password, $data['password'])) {
                    return $data['role'];
                }
            }
            return false;  
        }

        public function getUser($user) {
            $sql = "SELECT * FROM User WHERE `user_name`='$user'";
            $user = $this->conn->query($sql)->fetch_assoc();
            $user['password'] = null;
            return $user;
        }

        public function getUserInfo($user) {
            $sql = "SELECT user_name, full_name, birth, gender, email, phone, address  FROM User WHERE user_name='$user'";
            return $this->get($sql)->fetch_assoc();
        }

        public function addNewUser($userName, $password, $name, $birth, $gender, $email, $phone, $address) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "insert into User(user_name, password, full_name, birth, gender, email, phone, address) values('$userName', '$hashed_password', '$name', '$birth', '$gender', '$email','$phone', '$address')";
            if($this->insert($sql)) {
                $newUser = $this->get("select * from User where user_name='$userName'")->fetch_assoc();
                return json_encode(array('user' => $newUser, 'status' => true, 'description' => "Successfully to add new user!"));
            }
            else {
                return json_encode(array('user' => null, 'status' => false, 'description' => "Failed to add new user!"));
            }
        }

        public function updateUser($userName, $password, $name, $birth, $gender, $email, $phone, $address) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "update User set user_name='$userName', password='$hashed_password', full_name='$name', phone='$phone', address='$address', gender='$gender', email='$email', birth='$birth' where user_name='$userName'";
            if($this->update($sql)) {
                return json_encode(array('status' => true, 'description' => "Successfully to update $name!"));
            }
            else {
                return json_encode(array('status' => false, 'description' => "Failed to update $name!"));
            }
        }

        public function deleteUser($userName) {
            $sql = "delete from User where user_name='$userName'";
            if($this->delete($sql)) {
                return json_encode(array('status' => true, 'description' => "Successfully to delete $userName!"));
            }
            else {
                return json_encode(array('status' => false, 'description' => "Failed to delete $userName!"));
            }
        }

        public function getAllProducts($return) {
            $products = array();
            $sql = "select * from Product";
            $result = $this->get($sql);
            if($result){
                while($product = $result->fetch_assoc()){
                    array_push($products, $product);
                }
                return $return ? $products : json_encode(array('data' => $products, 'status' => true, 'description' => "Successfully to get all products!"));
            }
            else {
                return $return ? null : json_encode(array('data' => null, 'status' => false, 'description' => "Failed to get all products!"));
            }
        }

        public function getProductsByType($type, $return) {
            $products = array();
            $sql = "select * from Product where type='$type'";
            $result = $this->get($sql);
            if($result){
                while($product = $result->fetch_assoc()){
                    array_push($products, $product);
                }
                return $return ? $products : json_encode(array('data' => $products, 'status' => true, 'description' => "Successfully to get all '$type'!"));
            }
            else {
                return $return ? $products : json_encode(array('data' => null, 'status' => false, 'description' => "Failed to get all '$type'!"));
            }
        }

        public function getProduct($type, $productName) {
            $sql = "select * from Product where type='$type' and product_name='$productName'";
            $product = $this->get($sql)->fetch_assoc();
            if($product){
                return json_encode(array('data' => $product, 'status' => true, 'description' => "Successfully to get '$productName'!"));
            }
            else {
                return json_encode(array('data' => null, 'status' => false, 'description' => "Failed to get '$productName'!"));
            }
        }

        public function addNewProduct($type, $name, $basePrice, $salePrice, $unit, $description, $img) {
            $sql = "insert into Product(type, product_name, base_price, sale_price, unit, description, image) values ('$type', '$name', '$basePrice', '$salePrice', '$unit', '$description', '$img')";
            if($this->insert($sql)) {
                return json_encode(array('status' => true, 'description' => "Successfully to add new product!"));
            }
            else {
                return json_encode(array('status' => false, 'description' => "Failed to add new product!"));
            }
        }

        public function updateProduct($type, $name, $basePrice, $salePrice, $unit, $description, $img) {
            $sql = "update Product set type='$type', product_name='$name', base_price='$basePrice', sale_price='$salePrice', unit='$unit', description='$description', image='$img' where product_name='$name'";
            if($this->update($sql)) {
                return json_encode(array('status' => true, 'description' => "Successfully to update $name!"));
            }
            else {
                return json_encode(array('status' => false, 'description' => "Failed to update $name!"));
            }
        }

        public function deleteProduct($productName) {
            $sql = "delete from Product where product_name='$productName'";
            if($this->delete($sql)) {
                return json_encode(array('status' => true, 'description' => "Successfully to delete $productName!"));
            }
            else {
                return json_encode(array('status' => false, 'description' => "Failed to delete $productName!"));
            }
        }

        ///////////////

        public function getAllTypes($return) {
            $types = array();
            $sql = "select * from Type";
            $result = $this->get($sql);
            if($result){
                while($type = $result->fetch_assoc()){
                    array_push($types, $type);
                }
                return $return ? $types : json_encode(array('data' => $types, 'status' => true, 'description' => "Successfully to get all types!"));
            }
            else {
                return $return ? $types : json_encode(array('data' => null, 'status' => false, 'description' => "Failed to get all types!"));
            }
        } 

        public function addNewType($type) {
            $sql = "insert into Type(type) values ('$type')";
            if($this->insert($sql)) {
                return json_encode(array('status' => true, 'description' => "Successfully to add new Type!"));
            }
            else {
                return json_encode(array('status' => false, 'description' => "Failed to add new Type!"));
            }
        }

        public function updateType($type, $newType){
            $sql = "update Type set type='$newType' where type='$type'";
            if($this->update($sql)) {
                return json_encode(array('status' => true, 'description' => "Successfully to update $type!"));
            }
            else {
                return json_encode(array('status' => false, 'description' => "Failed to update $type!"));
            }
        }

        public function deleteType($type){
            $sql = "delete from Type where type='$type'";
            if($this->delete($sql)) {
                return json_encode(array('status' => true, 'description' => "Successfully to delete $type!"));
            }
            else {
                return json_encode(array('status' => false, 'description' => "Failed to delete $type!"));
            }
        }

        //// handle order bill ////

        public function getAllOrders($return) {
            $orders = array();
            $sql = "select * from `Order`";
            $result = $this->get($sql);
            if($result){
                while($order = $result->fetch_assoc()){
                    array_push($orders, $order);
                }
                return $return ? $orders : json_encode(array('data' => $orders, 'status' => true, 'description' => "Successfully to get all orders!"));
            }
            else {
                return $return ? null : json_encode(array('data' => null, 'status' => false, 'description' => "Failed to get all orders!"));
            }
        } 


        ///

        public function createOrder($sumPrices, $creationDate, $userName) {
            $sql = "insert into `Order`(sum_prices, creation_date, user_name) values('$sumPrices', '$creationDate', '$userName')";
            if($this->insert($sql)){
                return $this->get("SELECT LAST_INSERT_ID() as id")->fetch_assoc();
            }
            return false;
        }

        public function updateOrderStatus($id, $status) {
            $sql = "update `Order` set status='$status' where id='$id'";
            if($this->update($sql)) {
                return json_encode(array('status' => true, 'description' => "Successfully to change order status!"));
            }
            else {
                return json_encode(array('status' => false, 'description' => "Failed to change order status!"));
            }
        }

        public function deleteOrder($id) {
            $sql = "delete from `Order` where id='$id'";
            return $this->delete($sql);
        }

        public function getNewOrdersQuantity() {
            $sql = "select count(*) as quantity from `Order` where status='pending'";
            return $this->get($sql)->fetch_assoc();
        }

        public function getOrdersQuantity() {
            $sql = "select count(*) as quantity from `Order`";
            return $this->get($sql)->fetch_assoc();
        }

        ////
        private function checkCurrentDayReport($currentDate) {
            $sql = "select count(*) as report from Date_Report where update_date='$currentDate'";
            $result = $this->get($sql)->fetch_assoc();
            return (intval($result['report']) > 0);
        }

        private function createDateReport($date) {
            $sql = "insert into Date_Report(update_date) values('$date')";
            return $this->insert($sql);
        }

        public function getRevenueStatistics() {
            $revenues = array();
            $sql = "select revenue from Date_Report order by update_date desc limit 14";
            $result =  $this->get($sql);
            if($result){
                while($revenue = $result->fetch_assoc()){
                    array_push($revenues, $revenue);
                }
            }
            return json_encode(array("status" => true, "data" => $revenues, "description" => "Success fully to get revenue of last 14 day!"));
        }

        public function updateRevenue($updateDate, $revenue) {
            if(!$this->checkCurrentDayReport($updateDate)){
                $this->createDateReport($updateDate);
            }
            $sql = "update Date_Report set completed_order=completed_order+1, revenue=revenue+$revenue where update_date='$updateDate'";
            if($this->update($sql)) {
                return $this->getRevenueStatistics();
            }
            else {
                return json_encode(array('status' => false, 'description' => "Failed to update revenue!"));
            }
        }

        public function getSumRevenue() {
            $sql = "select sum(revenue) as revenue from Date_Report";
            return $this->get($sql)->fetch_assoc();
        }
        
    }
?>