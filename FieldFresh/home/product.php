<?php
    include '../part/home.php';
    $product = $sever->getProductByReturn($_GET['type'], $_GET['name']);
?>
<div id="main-content">
    <div id="product-page" class="w-100 h-100 d-flex">
        <div id="product-page-left" class="pe-5 col-lg-8 col-12">
            <div id="product" class="product col-12">
                <div class="product-top">
                    <div class="product-img">
                        <img src="<?php echo $product['image'] ?>" class="img w-25">
                    </div>
                    <div class="product-content">
                        <div class="product-info">
                            <h1 id="product-name" class="product-name"><?php echo $product['product_name'] ?></h1>
                            <h2 class="prices">$ <?php echo $product['sale_price'] ?></h2>
                        </div>
                        <div class="description">
                        <?php echo $product['description'] ?>
                        </div>
                        <div class="sale-unit mt-2">
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
                    <button class="add-to-cart-btn w-50 p-2">Add to cart</button>
                </div>
            </div>
            <div id="comments">
                <div id="comment-form">
                    <div id="comment-input-group">
                        <input id="comment-input" type="text" class="form-control" placeholder="Give a comment">
                    </div>
                    <div id="comment-button-group">
                        <button id="cancel-comment-btn">Cancel</button>
                        <button id="comment-btn" disabled>Comment</button>
                    </div>
                </div>
                <div id="comments-frame">
                    <ul id="comment-list">
                        <?php
                            $comments = $sever->getCommentsByProduct($_GET['name'], true);
                            if(isset($comments)){
                            foreach($comments as $comment) {
                                $user = $sever->getUserInfo($comment['user_name']);
                        ?>
                        <li class="comment">
                            <div class="comment-avatar">
                            <?php echo isset($comment) ? substr(implode(" ", array_reverse(explode(" ", $user['full_name']))), 0, 1) : 'G' ?>
                            </div>
                            <div class="comment-content">
                                <div class="comment-content-top">
                                    <span class="comment-user"><?php echo $user['full_name'] ?></span>
                                    <?php
                                        $currentDate = new DateTime();
                                        $targetDateObj = DateTime::createFromFormat("Y-m-d H:i:s", $comment['comment_time']);
                                        if ($targetDateObj !== false) {
                                            $interval = $currentDate->diff($targetDateObj);
                                        
                                            $hours = $interval->h;
                                            $minutes = $interval->i;
                                            $seconds = $interval->s;
                                            
                                        } else {
                                            echo "Invalid date format";
                                        }
                                        if($minutes <= 0) {
                                            $time = $seconds . " seconds ago";
                                        }
                                        else if($hours <= 0) {
                                            $time = $minutes . " minutes ago";
                                        }
                                        else {
                                            $time = $comment['comment_time'];
                                        }
                                    ?>
                                    <span class="comment-time"><?php echo $time ?></span>
                                </div>
                                <span class="comment-text"><?php echo $comment['comment'] ?></span>
                            </div>
                        </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div id="products-category" class="col-lg-4 col-12">
            <div class="products-list">
                <div class="products-header pb-4">
                    <h3>Related products</h3>
                </div>
                <ul class="products">
                    <?php
                        foreach($sever->getProductsByType($_GET['type'], true) as $product){
                            $name = $product['product_name'];
                    ?>
                    <li class="product col-12">
                        <div class="product-frame">
                            <div class="product-top">
                                <div class="product-img">
                                <img src="<?php echo $product['image'] ?>" class="img">
                                </div>
                                <div class="product-content">
                                    <div class="product-info">
                                        <a href="./product.php?name=<?php echo $product['product_name'] ?>&type=<?php echo $_GET['type']?>">
                                            <p class="product-name"><?php echo $product['product_name'] ?></p>
                                        </a>
                                        <label class="prices">$ <?php echo $product['sale_price'] ?></label>
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
</div>