<?php    
    include '../part/home.php';
?>
            <div id="payment">
                <div id="payment-page" class="w-100">
                    <div class="col-lg-8 col-12">
                        <div id="purchase-process">
                            <div id="process-line"></div>
                            <ul class="d-flex w-100 list-unstyled">
                                <li class="active"><span>Cart</span></li>
                                <li class="active"><span>Ordered</span></li>
                                <li class=""><span>Delivery</span></li>
                                <li><span>Completed</span></li>
                            </ul>
                        </div>
                        <div id="delivery-info">
                            <div id="delivery-address-info" class="col-lg-8">
                                <div id="delivery-info-heading">
                                    <h4>Delivery address</h4>
                                    <div id="login-group" class="mt-3">
                                        <a href="">
                                            Login
                                        </a>
                                        <a href="">
                                            Register
                                        </a>
                                    </div>
                                    <label class="mt-3 mb-2">Sign in / Sign up to skip entering information step and receive many offers</label>
                                </div>
                                <div id="input-delivery-info" class="mt-4">
                                    <form id="input-delivery-address-form" class="row g-3">
                                        <div class="col-md-6">
                                          <input type="text" class="form-control" id="payment-full-name" placeholder="Full name" <?php echo $login ? "value=\"". $customer['name'] ."\"" . " disabled" : ""?> required>
                                        </div>
                                        <div class="col-md-6">
                                          <input type="text" class="form-control" id="payment-phone" placeholder="Phone" <?php echo $login ? "value=\"". $customer['phone'] ."\"" . " disabled" : ""?> required>
                                        </div>
                                        <div class="col-md-6">
                                          <select class="form-select" id="payment-city" <?php echo $login ? 'disabled' : '' ?> required>
                                            <option selected <?php echo $login ? "value=\"" . explode("-", explode(",",$customer['address'])[0])[0]  . "\"" : 'disabled' ?>"><?php echo $login ? explode("-", explode(",",$customer['address'])[0])[1] : 'City' ?></option>
                                          </select>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-select" id="payment-district" <?php echo $login ? 'disabled' : '' ?> required>
                                              <option selected <?php echo $login ? "value=\"" . explode("-", explode(",",$customer['address'])[1])[0] . "\"" : 'disabled' ?>"><?php echo $login ? explode("-", explode(",",$customer['address'])[1])[1] : 'District' ?></option>
                                            </select>
                                          </div>
                                        <div class="col-md-12">
                                            <select class="form-select" id="payment-ward" <?php echo $login ? 'disabled' : '' ?> required>
                                                <option selected <?php echo $login ? "value=\"". explode("-", explode(",",$customer['address'])[2])[0]  . "\"" : 'disabled' ?>"><?php echo $login ? explode("-", explode(",",$customer['address'])[2])[1] : 'Ward' ?></option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" id="payment-address" placeholder="Address" <?php echo $login ? "disabled " . "value=\"". explode("-", explode(",",$customer['address'])[3])[0] . "" : '' ?>" required>
                                        </div>
                                        <?php
                                            if(!$login){
                                        ?>
                                        <div class="col-md-6">
                                          <select class="form-select" id="payment-gender" required>
                                            <option selected disabled>Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                          </select>
                                        </div>
                                        <div class="col-md-6">
                                          <input type="date" class="form-control" id="payment-birth" placeholder="birth" required>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" id="payment-email" placeholder="Email" required>
                                        </div>
                                        <?php
                                            }
                                        ?>
                                    </form>
                                </div>
                            </div>
                            <div id="delivery-method-info" class="col-lg-4">
                                <div id="delivery-info-heading">
                                    <h4>Delivery method</h4>
                                </div>
                                <div id="delivery-method" class="mt-3">
                                    <div class="delivery-option">
                                        <input type="radio" id="fast-delivery" name="fast-delivery" value="1">
                                        <label for="fast-delivery">Fast delivery</label>
                                    </div>
                                    <div class="delivery-option">
                                        <input type="radio" id="normal-delivery" name="normal-delivery" value="2">
                                        <label for="normal-delivery">Normal delivery</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        $sumPrices = 0;
                        $numberOfProducts = 0;
                        if(isset($_SESSION['paymentSessionProducts']) && $_SESSION['paymentSessionProducts'] != null) {
                            $listProducts = $_SESSION['paymentSessionProducts'];
                            $numberOfProducts = count($listProducts);
                            foreach($listProducts as $product) {
                                $sumPrices += (float) $product['price'];
                            }
                        }
                    ?>
                    <div class="col-lg-4 col-12" id="order-summary-frame">
                        <div id="discount-group">
                            <h4>Discount</h4>
                            <input type="text" id="discount-code" class="form-control" placeholder="Discount code">
                            <button id="get-discount-btn" class="btn btn-outline-dark">Get discount</button>
                        </div>
                        <div id="order-summary">
                            <h3 class="mb-3">Invoice summary</h3>
                            <div>
                                <p>Number of products:</p>
                                <p><?php echo $numberOfProducts ?></p>
                            </div>
                            <div>
                                <p>Total prices:</p>
                                <p id="total-prices"><?php echo $sumPrices ?> VNĐ</p>
                            </div>
                            <div>
                                <p>Delivery prices:</p>
                                <p id="delivery-price">0 VNĐ</p>
                            </div>
                            <div>
                                <p>Discount: </p>
                                <p id="discount">0 %</p>
                            </div>
                            <div>
                                <p>Last prices:</p>
                                <h4 class="prices-txt" id="last-prices">0 VNĐ</h4>
                            </div>
                        </div>
                        <button id="purchase-button" class="mt-4">Complete</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../assets/js/payment.js"></script>
</body>
</html>