<?php    
    include '../part/header.php';
?>
            <div id="main-content">
            <a class="btn btn-success" id="scroll-to-top">
                <i class='bx bxs-to-top'></i>
            </a>
                <div id="content-header-frame" class="position-relative">
                    <div id="content-header">
                        <div class="col-7 content">
                            <h1>Field Fresh - Fresh farm produce for everyone!</h1>
                            <p>Field Fresh is a reliable online marketplace for fresh and high-quality produce sourced directly from farms across the country. 
                                The website provides customers with a user-friendly interface for convenient and hassle-free online shopping.
                            </p>
                            <div class="button-group mt-3">
                                <button class="btn btn-danger">Enjoy shopping</button>
                                <?php
                                    if(!$login){
                                ?>
                                <button class="btn btn-success">Log in now <i class='bx bx-log-in-circle'></i></button>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-5 intro">
                            <!-- <img src="../pictures/background.png" alt=""> -->
                        </div>
                    </div>
                </div>
                <div id="categories" class="w-100">
                    <?php
                        foreach($sever->getAllTypes(true) as $type){
                    ?>
                    <div id="products-category">
                        <div class="products-list">
                            <div class="products-header">
                                <h3><?php echo $type['type']; ?></h3>
                                <a href="allProduct.php?type=<?php echo $type['type']?>">View all<i class='bx bx-chevron-right'></i></a>
                            </div>
                            <ul class="products">
                                <?php
                                    foreach($sever->getProductsByType($type['type'], true) as $product){
                                        $name = $product['product_name'];
                                ?>
                                <li class="product-frame col-lg-3 col-md-6 col-12">
                                    <div class="product w-100 h-100">
                                        <div class="product-top">
                                            <div class="product-img">
                                                <img src="<?php echo $product['image'] ?>" class="img">
                                            </div>
                                            <div class="product-content">
                                                <div class="product-info">
                                                    <a href="./product.php?id=<?php echo $product['product_name'] ?>&type=<?php echo $type['type']; ?>">
                                                        <p class="product-name"><?php echo $product['product_name'] ?></p>
                                                    </a>
                                                    <label class="prices">$ <?php echo $product['sale_price'] ?></label>
                                                </div>
                                                <div class="description">
                                                <?php echo $product['description'] ?>
                                                </div>
                                                <div class="sale-unit">
                                                    sale Unit: 
                                                    <?php echo $product['unit'] ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <div class="quantity-group">
                                                <button class="decrease">-</button>
                                                <div class="quantity">1</div>
                                                <button class="increase">+</button>
                                            </div>
                                            <button class="add-to-cart-btn w-50">Add to cart</button>
                                        </div>
                                    </div>
                                </li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>

                <div id="policy" class="row">
                    <div class="policy-content col-4">
                        <div class="row">
                            <i class='bx bx-diamond'></i>
                            <h1>Tiêu chí chất lượng</h1>
                            <label for="">100% sản phẩm thông qua kiểm định chất lượng đạt chuẩn 5*</label>
                        </div>
                        <div class="row">
                            <i class='bx bx-money'></i>
                            <h1>Chính sách ưu đãi</h1>
                            <label for="">Nhiều chính sách ưu đãi và giao hàng tận nơi</label>
                        </div>
                    </div>
                    <div id="demo" class="col-4">
                        <img src="../pictures/tomato.jpg" alt="">
                    </div>
                    <div class="policy-content col-4">
                        <div class="row">
                            <i class='bx bx-group' ></i>
                            <h1>Bảo vệ khách hàng</h1>
                            <label for="">Cam kết bảo vệ quyền lợi của khách hàng, ghi nhận các góp ý</label>
                        </div>
                        <div class="row">
                            <i class='bx bx-transfer-alt'></i>
                            <h1>Chính sách đổi trả</h1>
                            <label for="">Đổi trả và hoàn tiền nếu có vấn đề về chất lượng sản phẩm</label>
                        </div>
                    </div>
                </div>
                <div id="contact" class="w-100">
                    <div class="row">
                        <div class="col-6">
                            <i class='bx bx-time-five' ></i>
                            <label for="">Đặt online giao tận nhà đúng giờ</label>
                        </div>
                        <div class="col-6">
                            <i class='bx bx-transfer-alt'></i>
                            <label for="">Đổi, trả sản phẩm Trong vòng 7 ngày</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <i class='bx bx-phone-call'></i>
                            <label for="">Tổng đài: 0855004714 (0:00 - 23:00)</label>
                        </div>
                        <div class="col-6">
                            <i class='bx bx-message-dots'></i>
                            <label for="">duongtrungnguyen.it</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $("#scroll-to-top").click(function() {
            $("#main-content").animate({ scrollTop: 0 }, "slow");
        });
    </script>
</body>
</html>
