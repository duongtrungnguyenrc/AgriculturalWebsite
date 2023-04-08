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
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="#">Types</a>
						</li>
					</ul>
				</div>
				<div href="#" class="btn-upload">
					<i class='bx bxs-cloud-upload' ></i>
					<input id="file-input" type="file" class="text" accept=".xlsx">
					<button class="btn btn-sm">Upload file</button>
				</div>
			</div>
            <div class="table-data">
				<div class="order col-12">
					<div class="head">
						<h3>Types</h3>
						<form action="">
							<input type="text">
							<button class="btn"><i class='bx bx-search' ></i></button>
						</form>
						<button id="add-type-btn" class="btn btn-primary btn-sm"><i class='bx bx-plus' ></i></button>
					</div>

					<div id="add-type-form" class="insert-data-form">
						<input type="text" placeholder="Agricultural type">
						<button id="save-type-btn" class="btn btn-primary">Save</button>
					</div>

					<table id="types-table">
						<thead>
							<tr>
								<th>ID</th>
								<th>Type</th>
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