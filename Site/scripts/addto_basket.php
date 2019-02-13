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

// Retrieve data from Query String
$pcode  = $_GET['prodcode'];
$cname  = $_SESSION["Username"];

// Escape User Input to help prevent SQL Injection
$pcode  = mysqli_real_escape_string ($db,$pcode);

//build query
$query = "SELECT * FROM `users` WHERE `Cus_Name` = '".$cname."';";

//Execute query
$result = mysqli_query($db,$query);
$row 	= mysqli_fetch_assoc($result);

$ccode  = $row["Cus_Code"]; 
mysqli_free_result($result);

//build query
$query = "SELECT * FROM `items` WHERE `Prod_Code` = '".$pcode."';";

//Execute query
$result = mysqli_query($db,$query);
$row 	= mysqli_fetch_assoc($result);

$pprice = $row["Prod_Price"]; 
$pquant = $row["Prod_Quantity"]; 
mysqli_free_result($result);

if ($pquant <= 0)
{
	echo "noitemsleft";
	exit();
}

$query = "UPDATE `items` SET `Prod_Quantity` = `Prod_Quantity` - 1 WHERE `Prod_Code` = '".$pcode."';";
$result = mysqli_query($db,$query);

if (!$result)
{
	echo "fail";
	exit();
}

$query = "SELECT * FROM `basket` WHERE `Cus_Code` = '".$ccode."' AND `Basket_Paid` = 0;";
$result = mysqli_query($db,$query);

/* If a basket is present for that user that is unpaid use that basket*/
if(mysqli_num_rows ($result)>=1) 
{
	$row  	  = mysqli_fetch_assoc($result);
	$baskcode = $row["Basket_Code"];
	$totitems = $row["Tot_Items"];
	mysqli_free_result($result);

	$query = "SELECT * FROM `basket_line` WHERE `Basket_Code` = '".$baskcode."' AND `Prod_Code` = '".$pcode."';";	
	$result = mysqli_query($db,$query);

	/* If the basket is already pressent and a line for the Product add to that line */
	if(mysqli_num_rows ($result)>=1) 
	{
		$query = "UPDATE `basket_line` SET `Units` = `Units` + 1 WHERE `Basket_Code` = '".$baskcode."' AND `Prod_Code` = '".$pcode."';";
		$result = mysqli_query($db,$query);
		if ($result)
		{
			$query = "UPDATE `basket_line` SET `Line_Price` = `Line_Price` + '".$pprice."' WHERE `Basket_Code` = '".$baskcode."' AND `Prod_Code` = '".$pcode."';";
			$result = mysqli_query($db,$query);
			if ($result)
			{
				echo "success";
				exit();
			}
			else
			{
				echo "fail1";
				exit();
			}
		}
		else
		{
			echo "fail2";
			exit();
		}
	}

	/* If the basket is already pressent but no line for the product exist add a new basket_line */
	else 
	{
		$linenum = $totitems +1;
		$query = "INSERT INTO `basket_line` VALUES ('".$baskcode."','".$linenum."','".$pcode."',1,'".$pprice."');";
		$result = mysqli_query($db,$query);

		if ($result)
		{
			$query = "UPDATE `basket` SET `Tot_Items` = `Tot_Items` + 1 WHERE `Basket_Code` = '".$baskcode."';";
			$result = mysqli_query($db,$query);

			if ($result)
			{
				echo "success";
				exit();
			}
			else
			{
				echo "fail3";
				exit();
			}
		}
		else
		{
			echo "fail4";
			exit();
		}
	}
}
/* If no unpaid basket is present for that user create a new basket adn basket_line*/
else
{
	$query = "INSERT INTO `basket` (`Cus_Code`,`Tot_Items`) VALUES ('".$ccode."',1);";
	$result = mysqli_query($db,$query);

	if ($result)
	{
		$query 	= "SELECT * FROM `basket` WHERE `Cus_Code` = '".$ccode."';";
		$result = mysqli_query($db,$query);
		$row 	= mysqli_fetch_assoc($result);
		$baskcode = $row["Basket_Code"];
		mysqli_free_result($result);

		$query = "INSERT INTO `basket_line` VALUES ('".$baskcode."',1,'".$pcode."',1,'".$pprice."');";	
		$result = mysqli_query($db,$query);

		if ($result)
		{
			echo "success";
			exit();
		}
		else
		{
			echo "fail5";
			exit();
		}
	}
	else
	{
		echo "fail6";
		exit();
	}

	mysqli_close($db);


}
