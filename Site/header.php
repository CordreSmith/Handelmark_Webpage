
  <link href="css/navbar_styling.css" rel="stylesheet" media="screen">
  
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="container-fluid">
        <div class="navbar-header">
          <p class="navbar-brand" id="WebsiteName">Handelweb</p>
        </div>

        <!-- Home Button -->
        <ul class="nav navbar-nav">
          <li id="home"><a href="Main_Page.php"><span class="glyphicon glyphicon-home"></span></a></li>
        </ul>


        <ul class="nav navbar-nav navbar-right">
          <!-- Drop Down list -->
          <!-- Sign Up -->
          <li id="registerbutton" class="dropdown">

            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <span class="glyphicon glyphicon-user"></span> 
              Registreer
              <span class="caret"></span>
              <ul class="dropdown-menu">
                <li><a class="card-link " data-toggle="modal" data-target="#RegisterModal-User">Kliënt</a></li>
                <li><a href="#" class="card-link " data-toggle="modal" data-target="#RegisterModal-ShopKeeper">Winkeleienaar</a></li>
              </ul>
            </a>
          </li>

          <!-- Drop Down list -->
          <!-- Profile -->
          <li id="profilebutton" class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <span class="glyphicon glyphicon-user"></span> 
              Profiel
              <span class="caret"></span>
              <ul class="dropdown-menu">
                <li id="shoppingbasketbutton"><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Kooptrollie <span class="badge" id="itemAmount">0</span></a></li>
                <li id="checkoutbutton"><a href="#" class="card-link " data-toggle="modal" data-target="#CheckoutModal"><span class="glyphicon glyphicon-usd"></span> Kas uit </a></li>
                <li id="statisticsbutton"><a href="#"><span class="glyphicon glyphicon-stats"></span> Statistieke</a></li>
                <li id="myprofilebutton"><a href="#"><span class="glyphicon glyphicon-remove"></span> Sluit profiel </a></li>
              </ul>
            </a>
          </li> 

          <!-- Drop Down list -->
          <!-- Shop Settings -->
          <li id="settingbutton" class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <span class="glyphicon glyphicon-cog"></span> 
              Instellings 
              <span class="caret"></span>
              <ul class="dropdown-menu">
                <li id="additembutton"><a href="#" class="card-link " data-toggle="modal" data-target="#ItemAddModal"><span class="glyphicon glyphicon-plus"></span>Voeg item by</a></li>
                <li id="deleteitembutton"><a href="#" class="card-link " data-toggle="modal" data-target="#ItemRemoveModal"><span class="glyphicon glyphicon-minus"></span>Verwyder item</a></li>
                <li id="addimgbutton"><a href="#" class="card-link " data-toggle="modal" data-target="#ItemImgAddModal"><span class="glyphicon glyphicon-file"></span>Voeg prent by</a></li>
              </ul>
            </a>
          </li> 

          <!-- Login Button -->
          <li id="loginbutton"><a href="#" class="card-link " data-toggle="modal" data-target="#LoginModal"><span class="glyphicon glyphicon-log-in"></span> Tokkel in </a></li>

          <!-- Logout Button -->     
          <li id="logoutbutton"><a onClick="Logout(); return false;" href="#"> <span class="glyphicon glyphicon-log-out"></span> Tokkel uit</a></li>

        </ul>
      </div>
    </div>  
  </nav> 


<?php
  if (isset($_SESSION["Username"])) { /* Test to see if user is logged on!*/
    ?>
      <script type="text/javascript">
        document.getElementById('loginbutton').style.display = 'none';
        document.getElementById('registerbutton').style.display = 'none';

        if (sessionStorage.userType == "User"){

            document.getElementById('statisticsbutton').style.display = 'none';
            document.getElementById('settingbutton').style.display = 'none';



        }
        else if (sessionStorage.userType == "Shopkeeper"){

            document.getElementById('shoppingbasketbutton').style.display = 'none';
            document.getElementById('checkoutbutton').style.display = 'none';    
            document.getElementById('home').style.display = 'none';
        }
      </script>
    <?php
  }
  else {
    ?>
      <script type="text/javascript">
        document.getElementById('logoutbutton').style.display = 'none';
        document.getElementById('profilebutton').style.display = 'none';
        document.getElementById('settingbutton').style.display = 'none';
        document.getElementById('home').style.display = 'none';
      </script>
    <?php
  }

?>