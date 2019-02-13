<?php
require 'scripts/test_status.php';
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <title>Handel Web</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap-theme.css" rel="stylesheet" media="screen">
    <link href="css/main_styling.css" rel="stylesheet" media="screen" > 
    <!--<link href="css/navbar_styling.css" rel="stylesheet" media="screen" > -->

    <script src="scripts/JavaScripts.js"> </script>

    
  </head>

  <body>
    <header>
      <?php
        include_once('header.php');
      ?>
    </header>

    <div class="container">
      <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-10" id="shops">

        </div>
      </div>
    </div>

    <?php
      include_once('footer.php');
    ?>

<!-- Scripts -->


    <script src="scripts/jquery.js"></script> 
    <script src="scripts/bootstrap.js"></script>
    <script src="scripts/jquery-ui.js"></script>

    <script type="text/javascript">
      CreateShopTab();
    </script>
  </body>

</html>