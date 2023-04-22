<?php
    include './part/header.php';
?>
    <body>
        <?php
        require_once("./config.php");
        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        ?>
        <!--Begin display -->
        <div class="container">
            <div class="header clearfix">
                <h3 class="text-muted">VNPAY RESPONSE</h3>
            </div>
            <div class="table-responsive">
                <div class="form-group mb-4 d-flex align-items-center alert <?php echo $_GET['vnp_ResponseCode'] == '00' ? 'alert-success' : 'alert-danger' ?>">
                    <h3 class="m-0"><?php echo $_GET['vnp_ResponseCode'] == '00' ? 'Giao dịch thành công. Chuyển hướng sau:' :'Giao dịch đã bị hủy bỏ. Chuyển hướng sau:'?></h3>
                    <h3 id="navigation-count-down" class="m-0 ms-2">5s</h3>
                </div>
                <div class="form-group">
                    <label >Mã đơn hàng:</label>

                    <label id="order-id"><?php echo $_GET['vnp_TxnRef'] ?></label>
                </div>    
                <div class="form-group">

                    <label >Số tiền:</label>
                    <label><?php echo $_GET['vnp_Amount'] ?></label>
                </div>  
                <div class="form-group">
                    <label >Nội dung thanh toán:</label>
                    <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã phản hồi (vnp_ResponseCode):</label>
                    <label id="respond-code"><?php echo $_GET['vnp_ResponseCode'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã GD Tại VNPAY:</label>
                    <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã Ngân hàng:</label>
                    <label><?php echo $_GET['vnp_BankCode'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Thời gian thanh toán:</label>
                    <label><?php echo $_GET['vnp_PayDate'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Kết quả:</label>
                    <label>
                        <?php
                        if ($secureHash == $vnp_SecureHash) {
                            if ($_GET['vnp_ResponseCode'] == '00') {
                                echo "<span style='color:blue'>GD Thanh cong</span>";
                            } else {
                                echo "<span style='color:red'>GD Khong thanh cong</span>";
                            }
                        } else {
                            echo "<span style='color:red'>Chu ky khong hop le</span>";
                        }
                        ?>

                    </label>
                </div> 
            </div>
            <p>
                &nbsp;
            </p>
            <footer class="footer">
                   <p>&copy; VNPAY <?php echo date('Y')?></p>
            </footer>
        </div>  
        <script>
            var time = 5;
            const countDown = setInterval(() => {
                time--;
                $("#navigation-count-down").html(time + "s");
                if (time === 0) {
                    $("#respond-code").html() == '00' ? orderSuccess() : orderFailed();
                    clearInterval(countDown);
                }
            }, 1000);
            function orderSuccess() {
                $.get("../api/payment/clearPaymentSession.php",
                    function (data, textStatus, jqXHR) {  
                    },
                    "json"
                );
                window.location.href = "../home/order.php";
            }
            async function orderFailed() {
                await $.post("../api/payment/deleteOrder.php",{deleteId: $("#order-id").html()},
                function (data, textStatus, jqXHR) {  
                },
                "json"
                );
                window.location.href = "../home/payment.php";
            }
        </script>
    </body>
</html>
