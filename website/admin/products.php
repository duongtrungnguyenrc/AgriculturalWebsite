<?php
    include '../part/admin.php';
	include '../model/handler.php';
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
				<div href="#" class="btn-upload">
					<i class='bx bxs-cloud-upload' ></i>
					<input id="file-input" type="file" class="text" accept=".xlsx">
					<button id="load-file-data" class="btn btn-sm">Upload file</button>
				</div>
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
								<option value="" disabled selected>
									Type
								</option>
								<?php
								$handler = new handler();
									foreach($handler->getAllTypes() as $type){
								?>
								<option value="<?php echo $type['id'] ?>">
								<?php echo $type['type'] ?>
								</option>
								<?php
									}
								?>
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