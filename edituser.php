<?php
session_start();
include_once("MySQL.php");

$id = $_SESSION['user_id'];

MySQL::connect();

if ($_POST['newpassword']) {
  //update password entry
  $newPassword = crypt($_POST['newpassword']);

  $result = array('password' => $newPassword, );

  MySQL::update('users', $id, $result);

}

echo json_encode("success");

?>
