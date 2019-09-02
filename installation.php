<?php
$filename = 'config.json';
$GLOBALS['message'] = array();

$table = "CREATE TABLE IF NOT EXISTS users (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(55) NOT NULL,
            password VARCHAR(32) NOT NULL,
            status TINYINT(1),
            mobile INT(10) NOT NULL,
            address VARCHAR(255) NOT NULL,
            created_by VARCHAR(30) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            ) CHARACTER SET utf8 COLLATE utf8_general_ci";
$ADMINUSER = "INSERT INTO users (username,password,status,mobile,address) 
            VALUES('admin','21232F297A57A5A743894A0E4A801FC3',1,9999999,'lorem ipsum')";

if (isset($_POST['action']) && $_POST['action']='save-configs' ) {
	
	extract($_POST);
    try {
        $conn = new PDO("mysql:host=$hostname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE $database CHARACTER SET utf8 COLLATE utf8_general_ci";
        $conn->exec($sql);
               
        $json = $_POST;
        unset($json['action']);
        $dbname = $database;
        $database = array('database' => $json); 
        if(file_put_contents($filename, json_encode($json))){

        $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec($table);
        $conn->exec($ADMINUSER);
        array_push($GLOBALS['message'] , array('message' => 'Table created Successfully and admin@admin user created') ) ;          

        array_push($GLOBALS['message'] , array('message' => 'Changes have been saved :) ') ) ;
        } else {
            array_push($GLOBALS['message'] , array('message' => 'Unable to save the changes!!') ) ;
        }

        header('Content-Type: application/json');
        echo json_encode($GLOBALS['message']);  
        }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }

} else {

if (file_exists($filename)) {
    $configs = json_decode(file_get_contents($filename), true);
    extract($configs);
    if (empty($database)) {
        header('Location: install.php');
    }
} else {
    echo "The file $filename does not exist";
}


}


?>

