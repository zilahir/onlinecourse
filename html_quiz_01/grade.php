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

$goodAnswers = 0;
$goodAnswers = 0;

if (!in_array(false, $result["answers"])) {
  $result["result"] = "100";
} else {
  for ($i=0; $i<count($result); $i++) {
    if (!$result[$i]) {
      $badAnswers++;
    } elseif ($result[$i] == true) {
      $goodAnswers++;
    }
    $goodAnswers = $numberOfQuestions - $badAnswers;
    $count = $goodAnswers / $numberOfQuestions;
    $percent = intval($count*100);
    $result["result"] = $percent;
  }
}

//echo "good: ".$goodAnswers."bad: ".$badAnswers; //change values
//echo $percent;

$result["numberofquestions"] = $numberOfQuestions;
//$result["result"] = "100";

if (!isset($result)) {
  echo json_encode("error");
} else {
  echo json_encode($result);
}

?>
