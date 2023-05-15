<?php
    include '../part/admin.php';
	include '../model/Sever.php';

	$sever = new Sever();
	$newOrderQuantity = $sever->getNewOrdersQuantity();
	$orderQuantity = $sever->getOrdersQuantity();
	$totalSales = $sever->getSumRevenue();
?>

		<main>
			<div class="head-title">
				<div class="left">
					<h1>Admin</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Admin</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Dashboard</a>
						</li>
					</ul>
				</div>
				<div class="btn-upload">
					<i class='bx bxs-cloud-upload' ></i>
					<label for="file-input" class="chose-file">
						Chose file
					</label>
					<input id="file-input" type="file" class="text" accept=".xlsx">
				</div>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3><?php echo $newOrderQuantity['quantity']." orders" ?></h3>
						<p>New Order</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3><?php echo $orderQuantity['quantity']." orders" ?></h3>
						<p>Orders</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3 id="total-sales"><?php echo $totalSales['revenue']." VNĐ" ?></h3>
						<p>Total Sales</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order col-12 col-lg-7">
					<div class="head">
						<h3>Recent Orders</h3>
						<i class='bx bx-filter' ></i>
					</div>
					<table id="orders-table">
						<thead>
							<tr>
								<th>ID</th>
								<th>Order people</th>
								<th>Date Order</th>
								<th>Prices</th>
								<th>Status</th>
								<th>Control</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
				<div class="revenue-statistics col-12 col-lg-5 chart-frame" id="revenue-statistics">
					<div class="head">
						<h3>Revenue Statistics</h3>
					</div>
					<div class="w-100 chart-frame">
						<canvas id="revenue-chart" height="500" width="800"></canvas>
					</div>
				</div>
			</div>

			<div class="table-data">				
				<div class="revenue-statistics col-12 col-lg-5 chart-frame">
					<div class="head">
						<h3>Profit Statistics</h3>
					</div>
					<div class="w-100 d-flex justify-content-center align-items-center chart-frame">
						<canvas id="profit-chart" height="500" width="1200"></canvas>
					</div>
				</div>
				<div class="todo col-12 col-lg-7">
					<div class="head">
						<h3>User comments</h3>
						<i class='bx bx-plus' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<ul id="comment-list">
                        <?php
                            $comments = $sever->getAllComments(true);
                            foreach($comments as $comment) {
                                $user = $sever->getUserInfo($comment['user_name']);
                        ?>
                        <li class="comment">
                            <div class="comment-avatar">
                            <?php echo isset($comment) ? substr(implode(" ", array_reverse(explode(" ", $user['full_name']))), 0, 1) : 'G' ?>
                            </div>
                            <div class="comment-content">
                                <div class="comment-content-top">
                                    <span class="comment-user">
									<?php 
										echo $user['full_name'] . " > " . $comment['product_name'];
									?>
									</span>
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
                        ?>
                    </ul>
				</div>
			</div>
		</main>
    </section>
</body>
</html>