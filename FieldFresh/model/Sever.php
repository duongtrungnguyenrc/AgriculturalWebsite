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
                die($e);
                return false;
            }
        }

        private function insertMultiple($sql) {
            try {
                $this->conn->multi_query($sql);
                return true;
            } catch (Exception $e) {
                die($e);
                return false;
            }
        }

        private function get($sql) {
            try {
                $result = $this->conn->query($sql);
                if($result->num_rows > 0) {
                    return $result;
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
                die($e);
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
            $sql = "select * from User, Customer where Customer.id = User.customer_id";
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

        public function getAccountByCustomer($customerId) {
            $sql = "SELECT * FROM User WHERE customer_id='$customerId'";
            $result = $this->get($sql);
            if ($result) {
                return $this->get($sql)->fetch_assoc();
            }
            else {
                return null;
            }
        }

        public function getCustomerByUser($userName){
            $sql = "SELECT * FROM Customer WHERE id=(SELECT customer_id FROM User WHERE user_name='$userName')";
            $result = $this->get($sql);
            if ($result) {
                return $this->get($sql)->fetch_assoc();
            }
            else {
                return null;
            }
        }

        public function login($userName, $password) {
            $sql = "SELECT * FROM User WHERE user_name='$userName'";
            if($data = $this->conn->query($sql)->fetch_assoc()) {
                if(password_verify($password, $data['password'])) {
                    return array("role" => $data['role'], "customer_id" => $data['customer_id']);
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

        public function getUserInfo($customerId) {
            $sql = "SELECT user_name, password, role FROM User WHERE customer_id='$customerId'";
            $result = $this->get($sql);
            if ($result) {
                return $this->get($sql)->fetch_assoc();
            }
            else {
                return null;
            }
        }

        public function getCustomerInfo($customerId) {
            $sql = "SELECT name, birth, gender, email, phone, address  FROM Customer WHERE id='$customerId'";
            $result = $this->get($sql);
            if ($result) {
                return $this->get($sql)->fetch_assoc();
            }
            else {
                return null;
            }
        }
        

        public function getUsersQuantity() {
            $sql = "SELECT COUNT(*) as quantity from `Customer`";
            return $this->get($sql)->fetch_assoc();
        }

        public function addNewUser($userName, $password, $name, $birth, $gender, $email, $phone, $address) {
            $sql = "SELECT * FROM User WHERE user_name='$userName'";
            if ($this->get($sql) === false) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
                // Thêm thông tin vào bảng Customer
                $sql = "INSERT INTO Customer(name, birth, gender, email, phone, address) VALUES ('$name', '$birth', '$gender', '$email','$phone', '$address')";
                if ($customer_id = $this->addNewCustomer($name, $birth, $gender, $email, $phone, $address)) {
                    // Thêm thông tin vào bảng User
                    $sql = "INSERT INTO User(user_name, password, customer_id) VALUES ('$userName', '$hashed_password', '$customer_id')";
                    if ($this->insert($sql)) {
                        $newUser = $this->get("SELECT * FROM User WHERE user_name='$userName'")->fetch_assoc();
                        return json_encode(array('user' => $newUser, 'status' => true, 'description' => "Successfully to add new user!"));
                    } else {
                        return json_encode(array('user' => null, 'status' => false, 'description' => "Failed to add new user!"));
                    }
                } else {
                    return json_encode(array('user' => null, 'status' => false, 'description' => "Failed to add new customer!"));
                }
            } else {
                return json_encode(array('user' => null, 'status' => false, 'description' => "User already exists!"));
            }
        }

        public function addNewCustomer($name, $birth, $gender, $email, $phone, $address) {
            $sql = "INSERT INTO Customer(name, birth, gender, email, phone, address) VALUES ('$name', '$birth', '$gender', '$email','$phone', '$address')";
                if ($this->insert($sql)) {
                    // Lấy ID của customer vừa được tạo tự động
                    $customer_id = mysqli_insert_id($this->conn);
                    return $customer_id;
                }
            return false;
        }
        
        public function updateCustomerInfo($currentUser, $name, $birth, $gender, $email, $phone, $address) { 
            $sql = "update Customer SET name='$name', phone='$phone', address='$address', gender='$gender', email='$email', birth='$birth' 
            WHERE id=(SELECT customer_id FROM User WHERE user_name='$currentUser')";
            if($this->update($sql)) {
                return true;
            }
            else {
                return false;
            }
        }

        public function updateUser($currentUser, $password, $name, $birth, $gender, $email, $phone, $address) { 
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "update User SET password='$hashed_password' WHERE user_name='$currentUser'";
            if($this->update($sql) && $this->updateCustomerInfo($currentUser, $name, $birth, $gender, $email, $phone, $address)) {
                return json_encode(array('status' => true, 'description' => "Successfully to update $name!"));
            }
            else {
                return json_encode(array('status' => false, 'description' => "Failed to update $name!"));
            }
        }

        

        public function deleteUser($userName) {
            $sql = "delete from User WHERE user_name='$userName'";
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
            $sql = "select * from Product WHERE type='$type'";
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
            $sql = "select * from Product WHERE type='$type' and product_name='$productName'";
            $product = $this->get($sql)->fetch_assoc();
            if($product){
                return json_encode(array('data' => $product, 'status' => true, 'description' => "Successfully to get '$productName'!"));
            }
            else {
                return json_encode(array('data' => null, 'status' => false, 'description' => "Failed to get '$productName'!"));
            }
        }

        public function getProductByName($productName) {
            $sql = "select * from Product WHERE product_name='$productName'";
            $product = $this->get($sql)->fetch_assoc();
            if($product){
                return json_encode(array('data' => $product, 'status' => true, 'description' => "Successfully to get '$productName'!"));
            }
            else {
                return json_encode(array('data' => null, 'status' => false, 'description' => "Failed to get '$productName'!"));
            }
        }

        public function getProductByReturn($type, $productName) {
            $sql = "select * from Product WHERE type='$type' and product_name='$productName'";
            $product = $this->get($sql)->fetch_assoc();
            if($product){
                return $product;
            }
            else {
                return false;
            }
        }

        public function addNewProduct($type, $name, $basePrice, $salePrice, $unit, $description, $img) {
            $sql = "INSERT INTO Product(type, product_name, base_price, sale_price, unit, description, image) values ('$type', '$name', '$basePrice', '$salePrice', '$unit', '$description', '$img')";
            if($this->insert($sql)) {
                return json_encode(array('status' => true, 'description' => "Successfully to add new product!"));
            }
            else {
                return json_encode(array('status' => false, 'description' => "Failed to add new product!"));
            }
        }

        public function updateProduct($type, $name, $basePrice, $salePrice, $unit, $description, $img) {
            $sql = "update Product SET type='$type', product_name='$name', base_price='$basePrice', sale_price='$salePrice', unit='$unit', description='$description', image='$img' WHERE product_name='$name'";
            if($this->update($sql)) {
                return json_encode(array('status' => true, 'description' => "Successfully to update $name!"));
            }
            else {
                return json_encode(array('status' => false, 'description' => "Failed to update $name!"));
            }
        }

        public function deleteProduct($productName) {
            $sql = "delete from Product WHERE product_name='$productName'";
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
            $sql = "INSERT INTO Type(type) values ('$type')";
            if($this->insert($sql)) {
                return json_encode(array('status' => true, 'description' => "Successfully to add new Type!"));
            }
            else {
                return json_encode(array('status' => false, 'description' => "Failed to add new Type!"));
            }
        }

        public function updateType($type, $newType){
            $sql = "update Type SET type='$newType' WHERE type='$type'";
            if($this->update($sql)) {
                return json_encode(array('status' => true, 'description' => "Successfully to update $type!"));
            }
            else {
                return json_encode(array('status' => false, 'description' => "Failed to update $type!"));
            }
        }

        public function deleteType($type){
            $sql = "delete from Type WHERE type='$type'";
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

        public function getOrdersByCustomer($customerId, $return) {
            $orders = array();
            $sql = "select * from `Order` WHERE customer_id = '$customerId'";
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

        public function createOrder($totalPrices, $deliveryPrices, $discount, $creationDate, $customerId, $products) {
            $sql = "INSERT INTO `Order`(total_prices, delivery_prices, discount,creation_date, customer_id) values('$totalPrices', '$deliveryPrices', '$discount', '$creationDate', '$customerId');";
            if($this->insert($sql)){
                $sql = "";
                $newOrder = $this->get("SELECT LAST_INSERT_ID() as id")->fetch_assoc();
                foreach($products as $product) {
                    $sql .= "INSERT INTO Order_Detail(order_id, product_name, quantity, unit, price) VALUES('". $newOrder['id'] . "', '". $product['name'] . "','". $product['quantity'] . "','". $product['unit'] . "','". $product['price'] . "');";
                }
                if($this->insertMultiple($sql))
                    return $newOrder;
                else {
                    return false;
                }
            }
            return false;
        }

        public function updateOrderStatus($id, $status) {
            $sql = "update `Order` SET status='$status' WHERE id='$id'";
            if($this->update($sql)) {
                return json_encode(array('status' => true, 'description' => "Successfully to change order status!"));
            }
            else {
                return json_encode(array('status' => false, 'description' => "Failed to change order status!"));
            }
        }

        public function deleteOrder($id) {
            $sql = "delete from `Order` WHERE id='$id'";
            return $this->delete($sql);
        }

        public function getOrderById($id) {
            $sql = "SELECT * from `Order` WHERE id='$id'";
            return $this->get($sql)->fetch_assoc();
        }


        public function getNewOrdersQuantity() {
            $sql = "SELECT COUNT(*) as quantity from `Order` WHERE status='pending'";
            return $this->get($sql)->fetch_assoc();
        }

        public function getOrdersQuantity() {
            $sql = "SELECT COUNT(*) as quantity from `Order`";
            return $this->get($sql)->fetch_assoc();
        }

        public function getOrderDetail($id) {
            $detail = array();
            $sql = "SELECT * FROM `Order_Detail` WHERE order_id='$id'";
            if($result = $this->get($sql)) {
                while($row = $result->fetch_assoc()) {
                    array_push($detail, $row);
                }
                return $detail;
            }
            return [];
        }

        ////
        private function checkCurrentDayReport($currentDate) {
            $sql = "SELECT COUNT(*) as report from Date_Report WHERE update_date='$currentDate'";
            $result = $this->get($sql)->fetch_assoc();
            return (intval($result['report']) > 0);
        }

        private function createDateReport($date) {
            $sql = "INSERT INTO Date_Report(update_date) values('$date')";
            return $this->insert($sql);
        }

        public function getRevenueStatistics() {
            $revenues = array();
            $sql = "SELECT revenue from Date_Report order by update_date desc limit 14";
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
            $sql = "UPDATE Date_Report SET completed_order=completed_order+1, revenue=revenue+$revenue WHERE update_date='$updateDate'";
            if($this->update($sql)) {
                return $this->getRevenueStatistics();
            }
            else {
                return json_encode(array('status' => false, 'description' => "Failed to update revenue!"));
            }
        }

        public function getSumRevenue() {
            $sql = "SELECT sum(revenue) as revenue from Date_Report";
            return $this->get($sql)->fetch_assoc();
        }

        // Notification handle

        public function sendNotification($userName, $message) {
            $sql = "INSERT INTO Notifycations(user_name, message) VALUES('$userName', '$message');";
            if($this->insert($sql)) {
                return json_encode(array('status' => true, 'description' => "Successfully to send notifications!"));
            }
            else {
                return json_encode(array('status' => false, 'description' => "Failed to send notifications!"));
            }
        }

        public function sendNotificationForAll($message) {
            $sql = "SELECT * FROM User";
            $result = $this->get($sql);
            if($result){
                while($user = $result->fetch_assoc()){
                    $userName = $user['user_name'];
                    $sql = "INSERT INTO Notifycations(user_name, message) VALUES('$userName', '$message');";
                    $this->insert($sql);
                }
                return json_encode(array('status' => true, 'description' => "Successfully to send notifications!"));
            }
            else {
                return json_encode(array('data' => null, 'status' => false, 'description' => "Failed to get all comments!"));
            }
        }

        public function getNotificationsByUser($userName , $return) {
            $notifications = array();
            $sql = "select * from Notifycations WHERE user_name='$userName'";
            $result = $this->get($sql);
            if($result){
                while($notification = $result->fetch_assoc()){
                    array_push($notifications, $notification);
                }
                return $return ? $notifications : json_encode(array('data' => $notifications, 'status' => true, 'description' => "Successfully to get all notifications!"));
            }
            else {
                return $return ? null : json_encode(array('data' => null, 'status' => false, 'description' => "Failed to get all notifications!"));
            }
        }

        // Comment handle
        
        public function sendComment($commentTime, $userName, $productName, $comment) {
            $comment = addslashes($comment);
            $sql = "INSERT INTO Comment(comment_time, user_name, product_name, comment) VALUES ('$commentTime', '$userName', '$productName', '$comment');";
            if($this->insert($sql)) {
                return json_encode(array('status' => true, 'description' => "Successfully to add a comment!"));
            }
            else {
                return json_encode(array('status' => false, 'description' => "Failed to add a comment!"));
            }
        }

        public function getCommentsByProduct($productName , $return) {
            $comments = array();
            $sql = "select * from Comment WHERE product_name='$productName'";
            $result = $this->get($sql);
            if($result){
                while($comment = $result->fetch_assoc()){
                    array_push($comments, $comment);
                }
                return $return ? $comments : json_encode(array('data' => $comments, 'status' => true, 'description' => "Successfully to get all comments!"));
            }
            else {
                return $return ? null : json_encode(array('data' => null, 'status' => false, 'description' => "Failed to get all comments!"));
            }
        }

        public function getAllComments($return) {
            $comments = array();
            $sql = "select * from Comment";
            $result = $this->get($sql);
            if($result){
                while($comment = $result->fetch_assoc()){
                    array_push($comments, $comment);
                }
                return $return ? $comments : json_encode(array('data' => $comments, 'status' => true, 'description' => "Successfully to get all comments!"));
            }
            else {
                return $return ? null : json_encode(array('data' => null, 'status' => false, 'description' => "Failed to get all comments!"));
            }
        }

        // discount

        public function getAllDiscounts($return) {
            $discounts = array();
            $sql = "select * from Discount";
            $result = $this->get($sql);
            if($result){
                while($discount = $result->fetch_assoc()){
                    array_push($discounts, $discount);
                }
                return $return ? $discounts : json_encode(array('data' => $discounts, 'status' => true, 'description' => "Successfully to get all discounts!"));
            }
            else {
                return $return ? null : json_encode(array('data' => null, 'status' => false, 'description' => "Failed to get all discounts!"));
            }
        }

        public function getDiscount($discountCode, $return) {
            $comments = array();
            $sql = "select * from Discount WHERE discount_code='$discountCode'";
            $query = $this->get($sql);
            if($query){
                $result = $query->fetch_assoc();
                return $return ? $result : json_encode(array('data' => $result, 'status' => true, 'description' => "Successfully to get discount!"));
            }
            else {
                return $return ? null : json_encode(array('data' => null, 'status' => false, 'description' => "Failed to get discount!"));
            }
        }

        public function createDiscount($validDate, $invalidDate, $discountCode, $discountPercentage) {
            $sql = "INSERT INTO Discount(valid_date, invalid_date, discount_code, discount_percentage) VALUES('$validDate', '$invalidDate', '$discountCode', '$discountPercentage')";
            if($this->insert($sql)) {
                echo json_encode(array("status" => true, "description" => "Successfully to create discount"));
            }
            else {
                echo json_encode(array("status" => false, "description" => "Failed to create discount"));
            }
        }
    }
?>