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

if (!mysqli_real_connect($db, $dbhost, $dbuser, $dbpass, $dbname))
{
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
}
    
// Retrieve data from Query String
$prodname = $_POST["productname2"];
    
// Escape User Input to help prevent SQL Injection
$prodname = mysqli_real_escape_string ($db,$prodname);

//Execute query


define("UPLOAD_DIR", "img/uploads/");

if (!empty($_FILES["uploadedimg"])) 
{
    $myFile = $_FILES["uploadedimg"];

    if ($myFile["error"] !== UPLOAD_ERR_OK) 
    {
        echo "<p>An error occurred.</p>";
        exit;
    }

    // ensure a safe filename
    $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);

    // don't overwrite an existing file
    $i = 0;
    $parts = pathinfo($name);

    while (file_exists(UPLOAD_DIR . $name)) {
        $i++;
        $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
    }

    // preserve file from temporary directory
    $success = move_uploaded_file($myFile["tmp_name"],
        UPLOAD_DIR . $name);
    if (!$success) { 
        echo "<p>Unable to save file.</p>";
        exit;
    }

    // set proper permissions on the new file
    chmod(UPLOAD_DIR . $name, 0644);

    $URL = UPLOAD_DIR . $name;

    $query = "UPDATE `items` SET `Img_Url` = '".$URL."' WHERE `Prod_Name` = '".$prodname."';";
    $result = mysqli_query($db,$query);
    if ($result)
    {
        header("Location: shop_page.php");
    }
    else
    {
        echo "OOO poes!";
    }
}

mysqli_close($db);
?>