<?php

include_once("MySQL.php");
MySQL::connect();

session_start();

$newQuestion = $_POST['question'];
$description = $_POST['context'];
$loggedInUserName = $_SESSION['username'];

$array = array(
  "question" => $newQuestion,
  "is_active" => true,
  "description" => $description,
  "owner" => $loggedInUserName
);

MySQL::insertIntoGroup('`questions`', $array);

echo json_encode($array);


 ?>
