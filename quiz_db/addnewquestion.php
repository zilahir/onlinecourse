<?php

include_once("MySQL.php");
MySQL::connect();

$newQuestion = $_POST['question'];
$description = $_POST['context'];

$array = array(
  "question" => $newQuestion,
  "is_active" => true,
  "description" => $description
);

MySQL::insertIntoGroup('`questions`', $array);

echo json_encode($array);


 ?>
