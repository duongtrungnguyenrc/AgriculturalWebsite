<?php
    include '../part/header.php';
    $product = $handler->getProductByID($_GET['id']);
?>
<div id="main-content">
    <div class="product col-12 h-75">
        <div class="product-top">
            <div class="product-img">
                <img src="<?php echo $product['img'] ?>" class="img w-25">
            </div>
            <div class="product-content">
                <div class="product-info">
                    <h1 class="product-name"><?php echo $product['name'] ?></h1>
                    <h2 class="prices">$ <?php echo $product['price'] ?></h2>
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
            <button class="add-to-cart-btn w-50 p-2">Add to cart</button>
        </div>
    </div>
    <div id="products-category">
        <div class="products-list">
            <div class="products-header">
                <h3>Related products</h3>
            </div>
            <ul class="products">
                <?php
                    foreach($handler->getProductsByType($_GET['type']) as $product){
                        $name = $product['name'];
                ?>
                <li class="product col-6 col-lg-3">
                    <div class="product-frame">
                        <div class="product-top">
                            <div class="product-img">
                            <img src="<?php echo $product['img'] ?>" class="img">
                            </div>
                            <div class="product-content">
                                <div class="product-info">
                                    <a href="./product.php?id=<?php echo $product['id'] ?>&type=<?php echo $_GET['type']?>">
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
                    </div>
                </li>
                <?php
                    }
                ?>
            </ul>
        </div>
    </div>
</div>