<?php

session_start();

if ($_SESSION['login'] == true ) {
  echo "siker!";
} else {
  header("Location: login.php");
}




?>
