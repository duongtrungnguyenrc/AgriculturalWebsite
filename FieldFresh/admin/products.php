<?php
    include '../part/admin.php';
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
				<div class="btn-upload">
					<i class='bx bxs-cloud-upload' ></i>
					<label for="file-input" class="chose-file">
						Chose file
					</label>
					<input id="file-input" type="file" class="text" accept=".xlsx">
				</div>
			</div>
            <div class="table-data">
				<div class="order data-table">
					<div class="head">
						<h3>Products</h3>
						<button id="add-product-btn" class="btn btn-primary btn-sm"><i class='bx bx-plus' ></i></button>
					</div>

					<div id="add-product-form" class="insert-data-form">
							<select name="" id="">
								<option value="" disabled selected>
									Type
								</option>
								<?php
								$Sever = new Sever();
									foreach($Sever->getAllTypes(true) as $type){
								?>
								<option value="<?php echo $type['type'] ?>">
								<?php echo $type['type'] ?>
								</option>
								<?php
									}
								?>
							</select>
	
							<input type="text" placeholder="Name">
							<input type="text" placeholder="base Price">
							<input type="text" placeholder="sale Price">
							<input type="text" placeholder="Description">
							<input type="text" placeholder="Unit">
							<input type="text" placeholder="Image source">
							<button id="save-product-btn" class="btn btn-primary">Save</button>
					</div>
					
					<table id="products-table">
						<thead>
							<tr>
								<th>Type</th>
								<th>Name</th>
								<th>Base price</th>
								<th>Sale pice</th>
								<th>Unit</th>
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