<?php
    require 'scripts/test_status.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Handelweb - Shop</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap-theme.css" rel="stylesheet" media="screen">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">


    <!-- Scripts -->
    <script src="scripts/jquery.js"></script> 
    <script src="scripts/jquery-ui.js"></script>
    <script src="scripts/bootstrap.js"></script>
    <script src="scripts/JavaScripts.js"> </script>

</head>

<body>

    <!-- Page Content -->
    <header>
      <?php
        include_once('header.php');
      ?>
    </header>

    <div class="container">
      <div class="row">
        <div class="col-md-3">
            <p class="lead" id="Shopnamep">Shop Name</p>
        </div>
        <div class="col-md-9" id="items">


        </div>
      </div>
    </div>

    <?php
      include_once('modals.php');
    ?>

    <?php
      include_once('footer.php');
    ?>

    <script type="text/javascript">
        createItemTabs();
        if (sessionStorage.userType == "User"){
            updateBadge();
        }
    </script>

</body>

</html>
