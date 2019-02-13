<?php
    session_set_cookie_params(0);
    session_start(); 

    if (isset($_SESSION["Username"])) { /* Test to see if user is logged on!*/
      if (basename($_SERVER['PHP_SELF']) == "landing_Page.php") /* Test to see if user is logged on to not go to Login Page */
      {
        header("Location: Main_Page.php"); /* Redirect browser */
      }
    }
    else {
      if (basename($_SERVER['PHP_SELF']) != "landing_Page.php"){
        header("Location: landing_Page.php"); /* Redirect browser */
        exit();
      }
    }
?>