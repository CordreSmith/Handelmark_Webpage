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
$pname    	= $_GET['prodname'];
$pprice   	= $_GET['price'];
$pquantity 	= $_GET['quantity'];
$sname   	= $_GET['shopname'];


// Escape User Input to help prevent SQL Injection
$pname    = mysqli_real_escape_string ($db,$pname);
$pprice   = mysqli_real_escape_string ($db,$pprice);
$pquantity= mysqli_real_escape_string ($db,$pquantity);
$sname    = mysqli_real_escape_string ($db,$sname);

//build query
$query1 = "SELECT * FROM `shop` WHERE `Shop_Name` = '".$sname."';";

//Execute query
$result = mysqli_query($db,$query1);
$row    = mysqli_fetch_assoc($result);
$scode	= $row["Shop_Code"];
mysqli_free_result($result);

$query2 = "INSERT INTO `items` (`Shop_Code`,`Prod_Name`,`Prod_Price`,`Prod_Quantity`) VALUES ('".$scode."','".$pname."','".$pprice."','".$pquantity."');";
$result = mysqli_query($db,$query2);

//Build Result String
if($result)
{

	$query3 = "UPDATE `shop` SET `Tot_Items` = `Tot_Items` + 1 WHERE `Shop_Name` = '".$sname."';";
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