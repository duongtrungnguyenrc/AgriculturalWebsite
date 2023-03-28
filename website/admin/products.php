<?php
    include 'admin.php';
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
							<a class="active" href="#">Products</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Upload file</span>
				</a>
			</div>
            <div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Products</h3>
						<form action="">
							<input type="text">
							<button class="btn"><i class='bx bx-search' ></i></button>
						</form>
						<button id="add-product-btn" class="btn btn-primary btn-sm"><i class='bx bx-plus' ></i></button>
					</div>

					<div id="add-product-form" class="insert-data-form">
							<select name="" id="">
								<option value="1">
									Trái cây
								</option>
								<option value="2">
									Rau củ
								</option>
							</select>
	
							<input type="text" placeholder="Name">
							<input type="text" placeholder="Price">
							<input type="text" placeholder="Description">
							<input type="text" placeholder="Image source">
							<button id="save-product-btn" class="btn btn-primary">Save</button>
					</div>
					
					<table id="products-table">
						<thead>
							<tr>
								<th>ID</th>
								<th>Type</th>
								<th>Name</th>
								<th>Price</th>
								<th>Description</th>
                                <th>Image</th>
                                <th>Control</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</main>
    </section>
</body>
</html>