<!DOCTYPE html>
<html>
<head>
	<title>Ajax - Crud</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<style type="text/css">
		.form-container, .table-container {
			border: 1px solid #ccc;
			border-radius: 20px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="alert alert-info text-center mt-5"><h1>Crud With Ajax And PHP</h1></div>

		<div class="row container-fluid justify-content-between">
			<div class="form-container col col-lg-4 col-sm-12 col-md-12">
				<div class="alert alert-success mt-3"><h3>Add Or Update</h3></div>
				<form method="POST" action="?" id="crud-form">
					<input hidden type="number" name="id" class="form-control" id="uid">
					<fieldset class="form-group">
						<label>Name</label>
						<input type="text" name="name" id="name" class="form-control">
					</fieldset>
					<fieldset class="form-group">
						<label>Email</label>
						<input type="text" name="email" id="email" class="form-control">
					</fieldset>
					<fieldset class="form-group">
						<label>Password</label>
						<input autocomplete="off" type="password" name="password" id="password" class="form-control">
					</fieldset>
					<fieldset class="form-group">
						<input value="Save" type="button" name="submit" id="saveBtn" class="btn btn-success form-control">
					</fieldset>
				</form>
				<div id="msg"></div>
			</div>
			<div class=" table-container col col-lg-7 col-sm-12 col-md-12">
				<div class="alert alert-success mt-3"><h3>User List</h3></div>
				<table class="table-striped table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="table-body">
						
					</tbody>
				</table>
			</div>
		</div>

	</div>
	<script src="js/ajax.js"></script>
</body>
</html>

