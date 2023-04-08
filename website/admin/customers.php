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
							<a class="active" href="#">Customers</a>
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
						<h3>Customers</h3>
						<form action="">
							<input type="text">
							<button class="btn btn-light btn-sm"><i class='bx bx-search' ></i></button>
						</form>
						<button id="add-user-btn" class="btn btn-sm btn-primary"><i class='bx bx-plus'></i></button>
					</div>

					<div id="add-user-form" class="insert-data-form">
						<input type="text" placeholder="User name">
						<input type="text" placeholder="Password">
						<input type="text" placeholder="Full name">
						<input type="date" placeholder="Birth">
						<select name="" id="">
							<option value="Male">
								Male
							</option>
							<option value="Female">
								Female
							</option>
						</select>
						<input type="text" placeholder="Phone">
						<input type="text" placeholder="Address">
						<button id="save-user-btn" class="btn btn-primary">Save</button>
					</div>

					<table id="users-table">
						<thead>
							<tr>
								<th>ID</th>
								<th>User</th>
                                <th>Password</th>
								<th>Name</th>
								<th>Birth</th>
								<th>Gender</th>
                                <th>Phone</th>
                                <th>Address</th>
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