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
						<h3>Todos</h3>
						<i class='bx bx-plus' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<ul class="todo-list">
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
					</ul>
				</div>
			</div>
		</main>
    </section>
</body>
</html>