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
	
//Execute query

$sql1 = "SELECT `Shop_Name` FROM `shop`;";

$result = mysqli_query($db,$sql1);

$display_string = "";

//Build Result String
if(mysqli_num_rows ($result)>=1){
	while($row = mysqli_fetch_assoc($result)){

		$display_string .= $row["Shop_Name"];
		$display_string .= ",";

	}
	echo $display_string;
	mysqli_free_result($result);
   
}
else if(mysqli_num_rows ($result)<1){
	echo "noshops";
}
else
{
	echo "error404";
}		

mysqli_close($db);

?>