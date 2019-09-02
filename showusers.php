<?php 
	session_start();

	$filename = 'config.json';
	$configs = json_decode(file_get_contents($filename), true);
	extract($configs);

 	$conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT username,mobile FROM users where id != ". $_SESSION['user'] ." AND status=1";
    $stmt = $conn->prepare($query);
    $stmt->execute();
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	$res = $stmt->fetchAll();

	header('Content-Type: application/json');
	echo json_encode($res);	

?>