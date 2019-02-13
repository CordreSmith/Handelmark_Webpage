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
$name = $_GET['name'];
$password = $_GET['password'];
	
// Escape User Input to help prevent SQL Injection
$name = mysqli_real_escape_string ($db,$name);
$password = mysqli_real_escape_string ($db,$password);

//Execute query

$sql1 = "SELECT * FROM `users` WHERE `Cus_Name` = '" . $name . "' AND `Cus_Password` = '" . $password . "';";
$sql2 = "SELECT * FROM `shopkeeper` WHERE `Owner_Name` = '" . $name . "' AND  `Owner_Password` = '" . $password . "';";

$result = mysqli_query($db,$sql1);

//Build Result String
if(mysqli_num_rows ($result)>=1){
	while($row = mysqli_fetch_assoc($result)){

		$display_string ="User";
		$display_string .= ":";
		$display_string .= $row["Cus_Name"];
		$display_string .= ",";
		$display_string .= $row["Cus_Surname"];

		$_SESSION["Username"] = $row["Cus_Name"];
		$_SESSION["Surname"] = $row["Cus_Surname"];
	}
	echo $display_string;
	mysqli_free_result($result);
   
}
else{
	$result = mysqli_query($db,$sql2);
	if(mysqli_num_rows ($result)<1){
		echo "error404";
	}
	else{
		while($row = mysqli_fetch_assoc($result)){

			$display_string ="Shopkeeper";
			$display_string .= ":";
			$display_string .= $row["Owner_Name"];
			$display_string .= ",";
			$display_string .= $row["Owner_Surname"];

			$ownercode = $row["Owner_Code"];
			

			$_SESSION["Username"] = $row["Owner_Name"];
			$_SESSION["Surname"] = $row["Owner_Surname"];
		}
		mysqli_free_result($result);

		$sql3 = "SELECT * FROM `shop` WHERE `Owner_Code` = '" . $ownercode . "';";
		$result = mysqli_query($db,$sql3);
		while($row = mysqli_fetch_assoc($result)){

			$display_string .= "-";
			$display_string .= $row["Shop_Name"];
		}
		echo $display_string;
		mysqli_free_result($result);
	}
}		

mysqli_close($db);

?>