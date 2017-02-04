<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once("MySQL.php");
MySQL::connect();

$choice1 = $_POST['choice1'];
$choice2 = $_POST['choice2'];
$id = $_POST['questionId'];
$isRightChoice = false;

$length = $_POST['length'];

//echo $length;

$insertResult = array();

for ($i=1; $i<=$length; $i++) {
  array_push ($insertResult, $_POST['choice'.$i]);
}

//var_dump($result); // testing


for ($i=0; $i<count($insertResult); $i++) {
  $insertArray = array('question_id' => $id, "is_right_choice" => $isRightChoice, "choice" => $insertResult[$i] );
  MySQL::insertIntoGroup('`answers`', $insertArray);
}

echo json_encode($insertResult);

?>
