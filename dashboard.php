<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
    <title>Dashboard</title>
</head>
<body>
	<?php include_once('inc/header.php'); ?>
    <!-- As a heading -->
    <nav class="navbar navbar-dark bg-dark shadow-sm sticky-top">
        <div class="container">
            <a href="#"><span class="navbar-brand mb-0 h1 text-capitalize"><?php echo $_SESSION['username']; ?> welcome to dashboard</span></a>
            <div>
            	<a class="btn btn-outline-light" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>

      <div class="card col-8 m-5 mx-auto shadow-sm">
      	<div class="card-body">
      		<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#AddUserModal">
			  Add User
			</button>
    	</div>
      </div>



<table class="table col-8 mx-auto">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username</th>
      <th scope="col">Mobile</th>
      <th class="text-center" scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="users">
     
  </tbody>
</table>



		<!-- Modal -->
		<div class="modal fade " id="AddUserModal" tabindex="-1" role="dialog" aria-labelledby="AddUserModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-xl" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="AddUserModalLabel">Add New User</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<div class="col-8 mx-auto">
			     	<div class="form-group">
		            	<label for="username"> Username </label>
		            	<input type="text" class="form-control" id="username" placeholder="test">
		          	</div>
		          	<div class="form-group">
		            	<label for="password"> Password </label>
		            	<input type="password" class="form-control" id="password" placeholder="*****">
		          	</div>
		          	<div class="form-group">
		            	<label for="mobile"> Mobile </label>
		            	<input type="mobile" class="form-control" id="mobile" placeholder="1234679">
		          	</div>
		          	<div class="form-group">
		            	<label for="address"> address </label>
		 				<textarea class="form-control" id="address"></textarea>
		          	</div>
		          	<div class="custom-control custom-checkbox">
					  <input type="checkbox" class="custom-control-input" id="status">
					  <label class="custom-control-label" for="status">Enable user</label>
					</div>
				</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button id="addUser" type="button" class="btn btn-primary">Save changes</button>
		      </div>
		    </div>
		  </div>
		</div>


	<script type="text/javascript" src="assets/jquery.js"></script>
	<script type="text/javascript" src="assets/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/custom.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		showusers();
	});
	</script>
</body>
</html>