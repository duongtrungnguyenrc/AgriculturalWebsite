<?php
    include '../model/handler.php';
    $handler = new handler();
    session_start();
    if(!isset($_SESSION['login']) || $_SESSION['login'] == false) {
        header("Location: ../login/login.php");
    }
    include '../part/header.php';
?>
            <div id="main-content">

                <div id="content-header">
                    <div class="col-6 content">
                        <h1>Faker What what's that??</h1>
                        <p>Hãy chuẩn bị các bộ testcase, testdata và kết quả mong
                            muốn của mỗi trường hợp sao cho đầy đủ nhất để kiểm
                            thử bài toán sau: Cho bộ 3 số nguyên a,b,c. Kiểm tra a,
                            b,c có là độ dài của 1 tam giác.Nếu phải thì cho biết đó
                            là tam giác gì?</p>
                        <div class="button-group">
                            <button class="btn btn-danger">Enjoy shopping</button>
                            <button class="btn btn-success">Log in now <i class='bx bx-log-in-circle'></i></button>
                        </div>
                    </div>
                    <div class="col-6 intro">
                        <img src="../pictures/background.png" alt="">
                    </div>
                </div>
                <div id="categories" class="w-100">
                    <?php
                        foreach($handler->getAllTypes() as $type){
                    ?>
                    <div id="products-category">
                        <div class="products-list">
                            <div class="products-header">
                                <h3><?php echo $type['type']; ?></h3>
                                <button>View all<i class='bx bx-chevron-right'></i></button>
                            </div>
                            <ul class="products">
                                <?php
                                    foreach($handler->getProductsByType($type['id']) as $product){
                                        $name = $product['name'];
                                ?>
                                <li class="product">
                                        <div class="product-top">
                                            <img src="<?php echo $product['img'] ?>" class="img">
                                            <div class="product-content">
                                                <div class="product-info">
                                                    <a href="./product.php?id=<?php echo $product['id'] ?>&type=<?php echo $type['id']; ?>">
                                                        <p class="product-name"><?php echo $product['name'] ?></p>
                                                    </a>
                                                    <label class="prices">$ <?php echo $product['price'] ?></label>
                                                </div>
                                                <div class="description">
                                                <?php echo $product['description'] ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <div class="quantity-group">
                                                <button class="decrease">-</button>
                                                <div class="quantity">1</div>
                                                <button class="increase">+</button>
                                            </div>
                                            <button class="add-to-cart-btn">Add to cart</button>
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
</body>
</html>
