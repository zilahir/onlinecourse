<?php

include_once("MySQL.php");
MySQL::connect();

session_start();

$newQuestion = $_POST['question'];
$description = $_POST['context'];
$tags = $_POST['tags'];
$loggedInUserName = $_SESSION['username'];

for ($i=0; $i<count($tags); $i++) {
  $tagsToInsert .= $tags[$i].", ";
}

$array = array(
  "question" => $newQuestion,
  "is_active" => true,
  "description" => $description,
  "owner" => $loggedInUserName,
  "tags" => $tagsToInsert
);

MySQL::insertIntoGroup('`questions`', $array);

echo json_encode($array);


 ?>
