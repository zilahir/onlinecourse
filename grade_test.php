<?php

//echo json_encode("hello")

include_once("functions.php");

$givenanswers = $_POST['answerData'];

//var_dump ($_POST['answerData']);

$countResults = count($givenanswers);

for ($i=0; $i<$countResults; $i++) {
    $questionid = $givenanswers[$i]["questionid"];
    $givenanswerid = $givenanswers[$i]["givenanswer"];
    $result = CheckIfAnswerWasCorrect ($questionid, $givenanswerid);
    echo $result;
}

//echo json_encode($countResults);

//echo json_encode($givenanswers);

?>
