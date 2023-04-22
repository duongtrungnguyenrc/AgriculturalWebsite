<?php
    include 'Sever.php';

    $sever = new Sever();
    // var_dump($sever->getProductsByType("Fruit", true));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <ul class="products">
            <?php
                foreach($sever->getProductsByType("Fruit", true) as $product){
                    echo $product;
            ?>
            <li class="product-frame col-lg-3 col-md-6 col-12">
                <div class="product w-100 h-100">
                    <div class="product-top">
                        <div class="product-img">
                            <img src="<?php echo $product['image'] ?>" class="img">
                        </div>
                        <div class="product-content">
                            <div class="product-info">
                                <a href="./product.php?id=<?php echo $product['product_name'] ?>&type=<?php echo $type ?>">
                                    <p class="product-name"><?php echo $product['product_name'] ?></p>
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
                        <button class="add-to-cart-btn w-50">Add to cart</button>
                    </div>
                </div>
            </li>
            <?php
                }
            ?>
        </ul>
</body>
</html>