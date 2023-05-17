<?php
    include '../part/home.php';
?>
            <div id="order" class="w-100 h-100">
                <div id="order-left" class="col-4 h-100">
                    <div id="order-filter" class="col-12">
                        <div class="head">
                            <h1>Your orders</h1>
                        </div>
                        <div class="filter-form">
                            <div class="form-group">
                                <select id="filter-slt" class="form-select">
                                    <option value="all">All orders</option>
                                    <option value="pending">Pending orders</option>
                                    <option value="processing">Processing orders</option>
                                    <option value="completed">Completed orders</option>
                                    <option value="rejected">Rejected orders</option>
                                </select>
                            </div>
                            <div class="form-group filter-group">
                                <input id="filter-input" type="text" class="form-control" placeholder="Order id">
                                <button id="apply-filter-btn"><i class='bx bxs-filter-alt'></i></button>
                                <button id="clear-filter-btn">clear</button>
                            </div>
                        </div>
                    </div>
                    <div id="order-list">
                        <?php
                        if(isset($_SESSION['customerId'])){
                            $orders = $sever->getOrdersByCustomer($_SESSION['customerId'], true);
                            if(isset($orders)){
                            foreach($orders as $key => $order) {
                                $details = $sever->getOrderDetail($order['id']);
                        ?>
                        <div class="order <?php echo $key === 0 ? "active" : ''?>">
                            <div class="order-top">
                                <div class="status <?php echo $order['status'] ?>">
                                    <?php echo $order['status'] ?>
                                </div>
                                <div class="prices">
                                    <?php echo $order['total_prices'] + $order['delivery_prices'] - $order['discount']?> VNĐ
                                </div>
                            </div>
                            <div class="order-body">
                                <div class="order-id">
                                    Order id: <?php echo $order['id'] ?>
                                </div>
                                <div class="order-name">
                                    <?php
                                        $orderName = "";
                                        foreach($details as $i => $detail) {
                                            $i != count($details) - 1 ? $orderName .= $detail['product_name'] . ", " : $orderName .= $detail['product_name'];
                                        }
                                        echo $orderName;
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
                <div id="order-right" class="col-8 h-100">
                    <div class="detail-top">
                        <div class="heading">
                            <h1 class="order-id">
                                <?php
                                    if($login){
                                        echo isset($orders) && count($orders) > 0 ? "Order id: " . $orders[0]['id'] : "You don't have any orders yet!";
                                    }
                                    else {
                                        echo "Please login to view your orders";
                                    }
                                ?>
                            </h1>
                            <button>
                                <i class='bx bx-dots-horizontal-rounded'></i>
                            </button>
                        </div>
                        <div class="short-info">
                            <span class="order-name">
                                <?php 
                                if (isset($details)) {
                                    $details = $sever->getOrderDetail($orders[0]['id']);
                                    $orderName = "";
                                        foreach($details as $i => $detail) {
                                            $i != count($details) - 1 ? $orderName .= $detail['product_name'] . ", " : $orderName .= $detail['product_name'];
                                        }
                                    echo $orderName;
                                }
                                ?>
                             </span>
                        </div>
                    </div>
                    <div class="detail-body">
                    <?php
                        if(isset($orders) && count($orders) > 0){
                            $order = $sever->getOrderById($orders[0]['id']);
                            $user = $sever->getCustomerInfo($order['customer_id']);
                            $details = $sever->getOrderDetail($orders[0]['id']);
                    ?>
                        <div class="order-detail">
                            <div class="order-top">
                                <div class="avatar">
                                    <?php
                                        echo substr(implode(" ", array_reverse(explode(" ", $user['name']))), 0, 1) ;
                                    ?>
                                </div>
                                <div class="order-info">
                                    <h4 class="customer-name">
                                        <?php
                                            echo $user['name'];
                                        ?>
                                    </h4>
                                    <span class="order-id">
                                        <?php
                                            echo "Order id: " . $orders[0]['id'];
                                        ?>
                                    </span>
                                    <span class="date-order">
                                        <?php
                                            echo "Date: " . $orders[0]['creation_date'];
                                        ?>
                                    </span>
                                </div>
                            </div>
                            <div class="address-info">
                                <div class="form">
                                    <h5>From<br>Field Fresh</h5>
                                    <span>25/26 Nguyen Dinh Chieu - Vinh Tho - Nha Trang</span>
                                </div>
                                <div class="to">
                                    <h5>To</h5>
                                    <h5 class="to-name">
                                        <?php
                                            echo $user['name'];
                                        ?>
                                    </h5>
                                    <span class="to-address">
                                    <?php
                                            echo preg_replace('/,/', ' - ', preg_replace('/\d+-/', '', $user['address']));
                                        ?>
                                    </span>
                                </div>
                            </div>
                            <div class="order-body">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>
                                                Quantity
                                            </th>
                                            <th>
                                                Unit
                                            </th>
                                            <th>
                                                Price
                                            </th>
                                            <th>
                                                Name
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($details as $detail) {
                                        ?>
                                        <tr>
                                        <td><?php echo $detail['quantity']?></td>
                                            <td><?php echo $detail['unit']?></td>
                                            <td><?php echo $detail['price']?></td>
                                            <td><?php echo $detail['product_name']?></td>
                                        </tr>

                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="prices-info">
                                <div class="row">
                                    <div>
                                        Total prices: 
                                    </div>
                                    <div class="total-prices">
                                        <strong>  <?php echo $order['total_prices']?> VNĐ</strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <div>
                                        Delivery:
                                    </div>
                                    <div class="delivery-prices">
                                        <strong> <?php echo $order['delivery_prices'] ?> VNĐ</strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <div>
                                        Discount:
                                    </div>
                                    <div class="discount">
                                        <strong> <?php echo $order['discount'] ?> %</strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <div>
                                        Last prices:
                                    </div>
                                    <div class="last-prices">
                                        <strong> <?php echo $order['total_prices'] + $order['delivery_prices'] - $order['discount']?> VNĐ</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="order-footer">
                                <span>Bill by letter and email</span>
                                <button id="export-pdf-btn">
                                    <i class='bx bxs-file-pdf' ></i>
                                    View PDF
                                </button>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../assets/js/order.js"></script>
</body>
</html>
