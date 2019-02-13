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
$pname  = $_GET['prodname'];
$sname  = $_GET['shopname'];


// Escape User Input to help prevent SQL Injection
$pname  = mysqli_real_escape_string ($db,$pname);
$sname  = mysqli_real_escape_string ($db,$sname);

//build query
$query1 = "DELETE FROM `items` WHERE `Prod_Name` = '".$pname."';";

//Execute query
$result = mysqli_query($db,$query1);

//Build Result String
if($result)
{
	$query3 = "UPDATE `shop` SET `Tot_Items` = `Tot_Items` - 1 WHERE `Shop_Name` = '".$sname."';";
	$result = mysqli_query($db,$query3);

	if ($result)
	{
		echo "success";
		exit();
	}
	else
	{
		echo "fail";
		exit();
	}
	
}
else{
	echo "fail";
	exit();
}

mysqli_close($db);

?>