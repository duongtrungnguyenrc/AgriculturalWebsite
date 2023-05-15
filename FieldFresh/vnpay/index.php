<?php
    include './part/header.php';
?>

    <body>
    <div class="container">
           <div class="header clearfix">

                <h3 class="text-muted">VNPAY DEMO</h3>
            </div>
                <div class="form-group">
                    <button onclick="pay()">Giao dịch thanh toán</button><br>
                </div>
                <div class="form-group">
                    <button onclick="querydr()">API truy vấn kết quả thanh toán</button><br>
                </div>
                <div class="form-group">
                    <button onclick="refund()">API hoàn tiền giao dịch</button><br>
                </div>
            <p>
                &nbsp;
            </p>
            <footer class="footer">
                   <p>&copy; VNPAY <?php echo date('Y')?></p>
            </footer>
        </div> 
        <script>
            function pay() {
              window.location.href = "./vnpay_pay.php";
            }
            function querydr() {
              window.location.href = "./vnpay_querydr.php";
            }
             function refund() {
              window.location.href = "./vnpay_refund.php";
            }
        </script>
    </body>
</html>
