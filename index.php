<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
    <title>User Management</title>
</head>
<body>
    <!-- As a heading -->
    <nav class="navbar navbar-dark bg-dark shadow-sm sticky-top">
        <div class="container">
            <a href="#"><span class="navbar-brand mb-0 h1">User Management</span></a>
        </div>
    </nav>
	<?php include_once('installation.php') ?>

	<div class="card col-8 m-5 mx-auto shadow-sm">
      <div class="card-body">

		<div class="form-group">
            <label for="username">Enter Username</label>
            <input type="text" class="form-control" id="username" placeholder="admin">
        </div>
        <div class="form-group">
            <label for="password">Enter Password</label>
            <input type="password" class="form-control" id="password" placeholder="*****">
        </div>
      	
		<button class="btn btn-primary mt-2 px-5" id="login"> Login </button>
		<div class="msg-box mt-3 d-none alert alert-warning alert-dismissible fade show" role="alert">
            <div id="msg"></div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

	<script type="text/javascript" src="assets/jquery.js"></script>
	<script type="text/javascript" src="assets/custom.js"></script>

</body>
</html>


