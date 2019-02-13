<?php

session_set_cookie_params(0);
session_start();

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

$bcode  = $_GET['baskcode'];
$bcode  = mysqli_real_escape_string ($db,$bcode);

$query = "UPDATE `basket` SET `Basket_Paid` = 1 WHERE `Basket_Code` = '".$bcode."';";

//Execute query
$result = mysqli_query($db,$query);

if($result) 
{
	echo "success";
	exit();
}
else
{
	echo "false";
	exit();
}

mysqli_close($db);
?>