<?php

include_once("MySQL.php");
MySQL::connect();

$newQuestion = $_POST['question'];

$array = array(
  "question" => $newQuestion,
  "is_active" => true;
);

MySQL::insertIntoGroup('`questions`', $array);

echo json_encode($array);


 ?>
