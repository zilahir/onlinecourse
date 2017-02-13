<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once("MySQL.php");
MySQL::connect();

$id = $_POST['questionId'];
//$isRightChoice = false;

$length = $_POST['length'];
$correctChoise = $_POST['correct_choice'];

//echo $length;

$insertResult = array();
$rightChoiseArray = array();

for ($i=1; $i<=$length; $i++) {
  //set boolean for right choise id
  if ($i == $correctChoise) {
    $isRightChoice = true;
  } else {
    $isRightChoice = false;
  }
  array_push ($insertResult, $_POST['choice'.$i]);
  array_push ($rightChoiseArray, $isRightChoice);
}

//var_dump($result); // testing


for ($i=0; $i<count($insertResult); $i++) {
    $insertArray = array('question_id' => $id, "is_right_choice" => $rightChoiseArray[$i], "choice" => $insertResult[$i] );

  MySQL::insertIntoGroup('`answers`', $insertArray);
}

echo json_encode($rightChoiseArray);

?>
