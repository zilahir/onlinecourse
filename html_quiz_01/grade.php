<?php

$answer1 = $_POST['answer1'];
$answer2 = $_POST['answer2'];
$answer3 = $_POST['answer3'];
$numberOfQuestions = $_POST['numberOfQuestions'];

if ($answer1 == "C") {
  $answer1Result = true;
} else {
  $answer1Result = false;
}

if ($answer2 == "A") {
  $answer2Result = true;
} else {
  $answer2Result = false;
}

if ($answer3 == "A") {
  $answer3Result = true;
} else {
  $answer3Result = false;
}

$result["answers"] = array (
  "question-1" => $answer1Result,
  "question-2" => $answer2Result,
  "question-3" => $answer3Result,
);

if (!in_array(false, $result["answers"])) {
  $result["result"] = "hundredpercent";
} else {
  $count = 0;
  for ($i=0; $i<count($result["answers"]); $i++) {
    if ($result["answers"][$i] == false ) {
      $count++;
    }
  }
  $result["result"] = $count;
}

$result["numberofquestions"] = $numberOfQuestions;
//$result["result"] = "100";

echo json_encode($result);

?>
