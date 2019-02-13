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
$dob 	  = $_GET['dob'];
$number   = $_GET['number'];
$sname    = $_GET['shopname'];
$password = $_GET['password'];

// Escape User Input to help prevent SQL Injection
$fname    = mysqli_real_escape_string ($db,$fname);
$lname    = mysqli_real_escape_string ($db,$lname);
$dob      = mysqli_real_escape_string ($db,$dob);
$number   = mysqli_real_escape_string ($db,$number);
$sname    = mysqli_real_escape_string ($db,$sname);
$password = mysqli_real_escape_string ($db,$password);

//build query
$query = "INSERT INTO `shopkeeper` (`Owner_Name`, `Owner_Surname`, `Owner_DOB`, `Owner_Number`, `Owner_Password`) VALUES ('".$fname."','".$lname."','".$dob."','".$number."','".$password."');";

//Execute query
$result = mysqli_query($db,$query);

//Build Result String
if($result){

	$query = "SELECT `Owner_Code` FROM `shopkeeper` WHERE `Owner_Name` = '".$fname."';";
	$result = mysqli_query($db,$query);
	$row = mysqli_fetch_assoc($result);
	$OwnerCode = $row["Owner_Code"];
	mysqli_free_result($result);

	$query = "INSERT INTO `shop` (`Owner_Code`, `Shop_Name`) VALUES ('".$OwnerCode."','".$sname."');";
	$result = mysqli_query($db,$query);

	if($result){
		echo "success";
		exit();
	}
	else{
		echo "fail";
		exit();
	}
}
else{
	echo "fail";
	exit();
}

?>