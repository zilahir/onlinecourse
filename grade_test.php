<?php

//echo json_encode("hello")

include_once("functions.php");

$givenanswers = $_POST['answerData'];

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

foreach ($result['answers'] as $key => $value) {
if (true === $value) {
  $goodAnswers++;
} else {
  $badAnswers++;
}
}

echo "goodAnswers: ".$goodAnswers.", badAnswers: ".$badAnswers;


//echo json_encode($result);

?>
