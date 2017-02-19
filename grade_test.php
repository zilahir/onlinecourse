<?php

//echo json_encode("hello")

include_once("functions.php");

$givenanswers = $_POST['answerData'];
$numberOfQuestions = $_POST['numberOfQuestions'];
//var_dump ($_POST['answerData']);
$result["answers"] = array();
$countResults = count($givenanswers);

for ($i=0; $i<$countResults; $i++) {
    $cpunt = $i+1;
    $questionid = $givenanswers[$i]["questionid"];
    $givenanswerid = $givenanswers[$i]["givenanswer"];
    $result[$questionid] = CheckIfAnswerWasCorrect ($questionid, $givenanswerid);
    $currentAnswer = CheckIfAnswerWasCorrect ($questionid, $givenanswerid);
    array_push($result["answers"], $currentAnswer);
}

//var_dump($result["answers"]);
$goodAnswers = 0;
$badAnswers = 0;

foreach ($result['answers'] as $key => $value) {
if (true === $value) {
  $goodAnswers++;
} else {
  $badAnswers++;
}
}

$percent = $goodAnswers/$numberOfQuestions;

if ($percent == 1) {
  $percent = "100";
} else {
  $percent = $percent*100;
}

$result["result"] = $percent;
//echo "goodAnswers: ".$goodAnswers.", badAnswers: ".$badAnswers;


echo json_encode($result);

?>
