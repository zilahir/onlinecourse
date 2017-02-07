<?php

if (isset($_SESSION['logged_in'])) {
  echo "this is the main page";
} else {
  header("Location: login.php"); /* Redirect browser */
}




?>
