<?php
    include './part/header.php';
    session_start();
?>

    <body>
        <?php require_once("./config.php"); ?>             
        <div class="container">
        <h2 class="mb-5">Phương thức thanh toán trực tuyến</h2>
            <div class="table-responsive">
                <form action="vnpay_create_payment.php" id="frmCreateOrder" method="post">   
                    <div class="form-group mb-3">
                        <label for="amount">Mã hóa đơn</label>
                        <input class="form-control" id="order-id" name="order-id" type="text" value="<?php echo $_SESSION['order_id'] ?>" readonly/>
                    </div>     
                    <div class="form-group mb-3">
                        <label for="amount">Số tiền</label>
                        <input class="form-control" data-val="true" data-val-number="The field Amount must be a number." data-val-required="The Amount field is required." id="amount" max="100000000" min="1" name="amount" type="number" value="<?php echo (int) $_SESSION['total_money'] ?>"readonly/>
                    </div>
                     <h4>Chọn phương thức thanh toán</h4>
                    <div class="form-group mb-3">
                        <h5>Cách 1: Chuyển hướng sang Cổng VNPAY chọn phương thức thanh toán</h5>
                       <input type="radio" Checked="True" id="bankCode" name="bankCode" value="">
                       <label for="bankCode">Cổng thanh toán VNPAYQR</label><br>
                       
                       <h5 class="mt-3">Cách 2: Tách phương thức tại site của đơn vị kết nối</h5>
                       <input type="radio" id="bankCode" name="bankCode" value="VNPAYQR">
                       <label for="bankCode">Thanh toán bằng ứng dụng hỗ trợ VNPAYQR</label><br>
                       
                       <input type="radio" id="bankCode" name="bankCode" value="VNBANK">
                       <label for="bankCode">Thanh toán qua thẻ ATM/Tài khoản nội địa</label><br>
                       
                       <input type="radio" id="bankCode" name="bankCode" value="INTCARD">
                       <label for="bankCode">Thanh toán qua thẻ quốc tế</label><br>
                       
                    </div>
                    <div class="form-group mb-3">
                        <h5>Chọn ngôn ngữ giao diện thanh toán:</h5>
                         <input type="radio" id="language" Checked="True" name="language" value="vn">
                         <label for="language">Tiếng việt</label><br>
                         <input type="radio" id="language" name="language" value="en">
                         <label for="language">Tiếng anh</label><br>
                         
                    </div>
                    <button type="submit" class="btn btn-primary w-100" href>Thanh toán</button>
                </form>
            </div>
            <p>
                &nbsp;
            </p>
            <footer class="footer">
                <p>&copy; VNPAY 2020</p>
            </footer>
        </div>  
        <script>
            $(window).on('beforeunload', function(e) {
                if (!window.location.href.includes("vnpay_pay")) {
                    var deleteId = $("#order-id").val();
                    var data = { deleteId: deleteId };

                    var blob = new Blob([JSON.stringify(data)], { type: 'application/json' });
                    navigator.sendBeacon("../api/payment/deleteOrder.php", blob);
                }
            });
         </script>
    </body>
</html>
