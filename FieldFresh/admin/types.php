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
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="#">Types</a>
						</li>
					</ul>
				</div>
			</div>
            <div class="table-data">
				<div class="order data-table">
					<div class="head">
						<h3>Types</h3>
						<button id="add-type-btn" class="btn btn-primary btn-sm"><i class='bx bx-plus' ></i></button>
					</div>

					<div id="add-type-form" class="insert-data-form">
						<input type="text" placeholder="Agricultural type">
						<button id="save-type-btn" class="btn btn-primary">Save</button>
					</div>

					<table id="types-table">
						<thead>
							<tr>
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