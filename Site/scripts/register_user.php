<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "handelweb";
	
//Connect to MySQL Server
$db = mysqli_init();
if (!$db) {
    die('mysqli_init failed');
}

if (!mysqli_real_connect($db, $dbhost, $dbuser, $dbpass, $dbname)){
	die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
}
	
// Retrieve data from Query String
$fname    = $_GET['firstname'];
$lname    = $_GET['lastname'];
$password = $_GET['password'];
	
// Escape User Input to help prevent SQL Injection
$fname    = mysqli_real_escape_string ($db,$fname);
$lname    = mysqli_real_escape_string ($db,$lname);
$password = mysqli_real_escape_string ($db,$password);

//build query
$sql = "INSERT INTO `users`(`Cus_Name`, `Cus_Surname`, `Cus_Password`) VALUES ('".$fname."','".$lname."','".$password."');";

//Execute query
$result = mysqli_query($db,$sql);

//Build Result String
if($result){
	echo "success";
}
else{
	echo "fail";
}

mysqli_close($db);
?>