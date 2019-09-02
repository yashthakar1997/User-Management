<?php include_once('inc/header.php'); ?>

<html>
<head>
	<title></title>
</head>
<body>
	<h1>Welcome to dashboard</h1>
	<a href="logout.php">Logout</a>

	<hr>
	<h2>Add new user</h2>
	username<input type="username" id="username"><br>
	password<input type="password" id="password"><br>
	mobile <input type="tel" id="mobile"><br>
	address <textarea id="address"></textarea><br>
	<input type="checkbox" id="status"><br>
	<button id="addUser">Add user</button>

	<hr>
	<div id="users"></div>
	<script type="text/javascript" src="assets/jquery.js"></script>
	<script type="text/javascript" src="assets/custom.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		showusers();
	});
	</script>
</body>
</html>