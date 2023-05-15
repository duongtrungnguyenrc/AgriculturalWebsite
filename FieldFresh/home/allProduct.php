<?php
    include '../part/home.php';
?>
<style>
    #products-category .products-list .products .product:nth-child(n+13){
    display: block;
}
</style>
        <div id="main-content">
                <div id="categories" class="w-100">
                    <?php
                        $type = $_GET['type'];
                    ?>
                    <div id="products-category">
                        <div class="products-list">
                            <div class="products-header">
                                <h3><?php echo $type; ?></h3>
                            </div>
                            <ul class="products">
                                <?php
                                    foreach($sever->getProductsByType($type, true) as $product){
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
                                                    <a href="./product.php?id=<?php echo $product['product_name'] ?>&type=<?php echo $type; ?>">
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
                </div>
            </div>
        </div>
    </section>
</body>
</html>
