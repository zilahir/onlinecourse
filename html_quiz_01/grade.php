<?php

$answer1 = $_POST['answer1'];
$answer2 = $_POST['answer2'];
$answer3 = $_POST['answer3'];

$result = array (
  "answer-1" => $answer1,
  "answer-2" => $answer2,
  "answer-3" => $answer3,
);

$result["result"] = "100";

echo json_encode($result);

?>
