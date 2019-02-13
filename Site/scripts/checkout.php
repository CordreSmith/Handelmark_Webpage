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

$cname  = $_SESSION["Username"];

$query = "SELECT * FROM `users` WHERE `Cus_Name` = '".$cname."';";

//Execute query
$result = mysqli_query($db,$query);
$row 	= mysqli_fetch_assoc($result);

$ccode  = $row["Cus_Code"]; 
mysqli_free_result($result);

$query = "SELECT * FROM `basket` WHERE `Cus_Code` = '".$ccode."' AND `Basket_Paid` = 0;";
$result = mysqli_query($db,$query);

if(mysqli_num_rows ($result)>=1) 
{
	$row  	  = mysqli_fetch_assoc($result);
	$baskcode = $row["Basket_Code"];
	mysqli_free_result($result);

	$query  = "SELECT sum(`Line_Price`) as `TotalCost` FROM `basket_line` WHERE `Basket_Code` = '".$baskcode."' GROUP BY `Basket_Code`;";
	$result = mysqli_query($db,$query);
	$row  	= mysqli_fetch_assoc($result);

	$totalcost = $row["TotalCost"];
	mysqli_free_result($result);

	$query  = "SELECT sum(`Units`) as `totalunits` FROM `basket_line` WHERE `Basket_Code` = '".$baskcode."' GROUP BY `Basket_Code`;";
	$result = mysqli_query($db,$query);
	$row  	= mysqli_fetch_assoc($result);

	$totalunits = $row["TotalUnits"];
	mysqli_free_result($result);



	$display_string  = $baskcode;
	$display_string .= ",";
	$display_string .= $totalcost;
	$display_string .= "-";
	$display_string .= $totalunits;

	echo $display_string;
	

}
else
{
	echo "nobasket";
	exit();
}

mysqli_close($db);
?>