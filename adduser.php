<?php
session_start();
$filename = 'config.json';
$configs = json_decode(file_get_contents($filename), true);
extract($configs);
try {
	    $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $stmt = $conn->prepare("SELECT count(*) as count FROM users where username='".$_POST['username'] ."'"); 
    	$stmt->execute();
    	$result = $stmt->fetchAll();
    	if ($result[0]['count'] <= 0) {

		    $sql = "INSERT INTO users (username, password, mobile, address, created_by, status)
		    VALUES ('".$_POST['username'] ."',
		    		'". md5($_POST['password']) ."',
		    		'". $_POST['mobile'] ."',
		    		'". $_POST['address'] ."',
		    		'". $_SESSION['user'] ."',
		    		". $_POST['status'] .")";
		    $conn->exec($sql);
		    echo "New record created successfully";

    	} else {
    		echo " User already existes";
    	}

    }
catch(PDOException $e)
    {
   		echo $sql . "<br>" . $e->getMessage();
    }
$conn = null;
?>