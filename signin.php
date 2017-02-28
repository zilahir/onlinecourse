<?php

include_once ("functions.php");
include_once ("MySQL.php");

session_start();

$postedUsername = $_POST['username'];
$postedPassword = $_POST['password'];

$loginCredentials = getUserCredentials($postedUsername, $postedPassword);

// get user avatar
$EmailHash = md5( strtolower( trim($loginCredentials['email']) ) );
$str = file_get_contents( 'https://www.gravatar.com/'.$EmailHash.'.php' );
$profile = unserialize( $str );
if ( is_array( $profile ) && isset( $profile['entry'] ) )
    $profilePic = $profile['entry'][0]['photos'];
    $userProfile = $profilePic[0]['value'];
//end of getting user avatar


if (isset($loginCredentials['username'])) {
  if (crypt($postedPassword, $loginCredentials['password']) == $loginCredentials['password']) {
    //echo 'success';

    //set session for user
    $_SESSION['login'] = true;
    $_SESSION['username'] = $loginCredentials['username'];
    $_SESSION['fullname'] = $loginCredentials['fullname'];
    $_SESSION['neptun'] = $loginCredentials['neptun'];
    $_SESSION['user_level'] = $loginCredentials['user_level'];
    $_SESSION['user_id'] = $loginCredentials['user_id'];
    $_SESSION['email'] = $loginCredentials['email'];
    $_SESSION['avatar'] = $userProfile;

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
