<?php    
    include '../part/home.php';
?>
             <div id="cart">
                <div id="cart-page" class="w-100">
                    <div class="col-lg-8 col-12">
                        <div id="purchase-process">
                            <div id="process-line"></div>
                            <ul class="d-flex w-100 list-unstyled">
                                <li class="active"><span>Cart</span></li>
                                <li class=""><span>Ordered</span></li>
                                <li class=""><span>Delivery</span></li>
                                <li><span>Completed</span></li>
                            </ul>
                        </div>
                        <div id="cart-list">
                            <div id="cart-list-header">
                                <h2>Your cart <label id="cart-quantity" class="prices-txt">has 2 products</label></h2>
                            </div>
                            <table class="w-100">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Total price</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if(isset( $_SESSION['cart'])){
                                        $cart = $_SESSION['cart'];
                                        foreach($cart as $key => $value) {
                                    ?>
                                    <tr class="cart-item">
                                        <td class="product-info">
                                            <img src="<?php echo $value['img']?>" alt="">
                                            <div class="product-content">
                                                <h4 class="name"><?php echo $value['name']?></h4>
                                                <p>Price: <label class="price"><?php echo $value['price']?></label></p>
                                                <p>Unit: <label class="unit"><?php echo $value['unit']?></label></p>
                                            </div>
                                        </td>
                                        <td class="quantity-info">
                                            <div class="quantity-group">
                                                <button class="decrease">-</button>
                                                <div class="quantity"><?php echo $value['quantity']?></div>
                                                <button class="increase">+</button>
                                            </div>
                                        </td>
                                        <td class="total-price">
                                            <h4 class="prices-txt"></h4>
                                        </td>
                                        <td class="control">
                                            <button class="remove-btn"><i class='bx bx-trash'></i></button>
                                        </td>
                                    </tr>
                                    <?php  
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12" id="order-summary-frame">
                        <div id="order-summary">
                            <h3 class="mb-4">Total prices of cart</h3>
                            <div>
                                <p>Number of products:</p>
                                <p id="number-of-products"></p>
                            </div>
                            <div>
                                <p>Total prices:</p>
                                <p id="last-prices" class="prices-txt"></p>
                            </div>
                        </div>
                        <button id="purchase-button" class="mt-4">Purchase</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../assets/js/cart.js"></script>
</body>
</html>
