<?php
  require 'scripts/test_status.php';
?>

<!DOCTYPE html>
<html>
	<head>
        <title>Handel Web/Landing Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="css/bootstrap.css" rel="stylesheet" media="screen">
        <link href="css/bootstrap-theme.css" rel="stylesheet" media="screen">
        <link href="css/landing_styling.css" rel="stylesheet" media="screen">

        <script src="scripts/jquery.js"></script> 
        <script src="scripts/jquery-ui.js"></script>
        <script src="scripts/bootstrap.js"></script>
        <script src="scripts/JavaScripts.js"> </script>
	</head>
	<body>
	  
  		
  <header>
    <?php
      include_once('header.php');
    ?>
  </header>


  <!-- Content -->

  <div class="container">
    <img src="img/splash1.png" alt="">
  </div>

    <?php
      include_once('modals.php');
    ?>


  <?php
    include_once('footer.php');
  ?>

	</body>
</html>