<?php
    include '../part/header.php';
    session_start();
?>
            <div id="cart">
                <div id="header">
                    <h1>Cart</h1>
                    <div class="check-all-group">
                        <label for="check-all">Chose all</label>
                        <input type="checkbox" name="" id="check-all">
                    </div>
                </div>
                <ul class="w-100 h-100 m-0 p-0">
                    <?php
                        if(isset($_SESSION["cart"])) {
                            $cart = $_SESSION["cart"];
                        
                        // Hiển thị thông tin giỏ hàng
                            foreach($cart as $item) {
                    ?>
                    <li class="cart-item">
                        <div class="cart-item-content">
                            <input type="checkbox" class="item-purchase-check">
                            <img src="<?php echo $item["img"] ?>" alt="" class="img-thumbnail m-2">
                            <div class="cart-item-info">
                                <h4 class="cart-item-name"><?php echo $item["name"] ?></h4>
                                <div class="quantity-group">
                                    <button class="decrease">-</button>
                                    <div class="quantity"><?php echo $item["quantity"] ?></div>
                                    <button class="increase">+</button>
                                </div>
                                <p class="cart-item-price"><?php echo $item["price"] ?></p>
                            </div>
                        </div>
                        <div class="cart-item-control">
                            <button class="btn btn-danger remove-btn"><i class='bx bx-trash'></i></button>
                        </div>
                    </li>
                    <?php
                        }
                    }

                    ?>
                </ul>
                <div id="purchase-group">
                    <div id="customer-info w-100">
                        <div id="customer-contact-info" class="d-flex">
                            <p id="customer-name" class="m-0"><b>Đường Trung Nguyên</b></p>
                            <p id="customer-phone"class="m-0" >0855004714</p>
                        </div>
                        <p class="m-0 mt-1">Xã Ân Tường Tây, huyện Hoài Ân, Tỉnh Bình Định</p>
                    </div>
                    <hr>
                    <div id="total-prices-group" class="d-flex">
                        <p class="m-0 me-2">Total prices:</p>
                        <p id="total-prices" class="m-0"><b>0 VNĐ</b></p>
                    </div>
                    <div id="purchase-button-group" class="mt-1 w-100 d-flex">
                        <button class="btn btn-danger">Delete</button>
                        <button class="btn btn-success">Purchase</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../assets/js/cart.js"></script>
</body>
</html>
