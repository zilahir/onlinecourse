<?php

include_once ("functions.php");
include_once ("MySQL.php");

session_start();

$postedUsername = $_POST['username'];
$postedPassword = $_POST['password'];

$loginCredentials = getUserCredentials($postedUsername, $postedPassword);

if (isset($loginCredentials['username'])) {
  if (crypt($postedPassword, $loginCredentials['password']) == $loginCredentials['password']) {
    //echo 'success';

    //set session for user
    $_SESSION['login'] = true;
    $_SESSION['username'] = $loginCredentials['username'];
    $_SESSION['fullname'] = $loginCredentials['fullname'];
    $_SESSION['neptun'] = $loginCredentials['neptun'];
    $_SESSION['user_level'] = $loginCredentials['user_level'];

    //var_dump($_SESSION);

    header("Location: index.php");

  } else {
    //echo 'pasword fail:';
    header("Location: login.php?error=password");
  }
} else {
  header("Location: login.php?error=user&username=".$postedUsername);
}



?>
