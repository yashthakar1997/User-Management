<?php
	session_start();

	$filename = 'config.json';
	$configs = json_decode(file_get_contents($filename), true);
	extract($configs);

 	$conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT id FROM users where username='". $_POST['username'] ."' AND  password='".md5($_POST['password'])."' AND status=1";
    $stmt = $conn->prepare($query);
    $stmt->execute();
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	$res = $stmt->fetchAll();

	if ($res) {

		if($res[0]['id']) {
			$_SESSION['user'] = $res[0]['id'];
			$_SESSION['username'] = $_POST['username'];
			$message = array('message' => 'success');
		} else {
			$message = array('message' => 'please check for the username and password');	
		}
		
	} else {
		$message = array('message' => 'Unable to login');
	}


	header('Content-Type: application/json');
	echo json_encode($message);	
?>