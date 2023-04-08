<?php
    include '../part/admin.php';
	include '../model/handler.php';

	$handler = new handler();
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
				<div href="#" class="btn-upload">
					<i class='bx bxs-cloud-upload' ></i>
					<input id="file-input" type="file" class="text" accept=".xlsx">
					<button id="load-file-data" class="btn btn-sm">Upload file</button>
				</div>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3><?php echo "1234"; ?></h3>
						<p>New Order</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>2834</h3>
						<p>Visitors</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3>$2543</h3>
						<p>Total Sales</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order col-7">
					<div class="head">
						<h3>Recent Orders</h3>
						<form action="">
							<input type="text">
							<button class="btn"><i class='bx bx-search' ></i></button>
						</form>
						<i class='bx bx-filter' ></i>
					</div>
					<table id="orders-table">
						<thead>
							<tr>
								<th>ID</th>
								<th>User ID</th>
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
				<div class="revenue-statistics col-5">
					<div class="head">
						<h3>Revenue Statistics</h3>
					</div>
					<canvas id="canvas" height="450" width="600"></canvas>
				</div>
			</div>
		</main>
    </section>
</body>
</html>