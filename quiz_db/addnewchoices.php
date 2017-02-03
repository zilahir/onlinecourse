<?php

include_once("MySQL.php");
MySQL::connect();

$choice1 = $_POST['choice1'];
$choice2 = $_POST['choice2'];
$id = $_POST['questionId'];
$isRightChoice = false;

$insertResult = array($choice1, $choice2);

$result = array('choice1' => $choice1, 'choice2' => $choice2, 'id' => $id );

for ($i=0; $i<count($insertResult); $i++) {
  $insertArray = array('question_id' => $id, "is_right_choice" => $isRightChoice, "choice" => $insertResult[$i] );
  MySQL::insertIntoGroup('`answers`', $insertArray);
}

echo json_encode($result);

?>
