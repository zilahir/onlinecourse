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

$quizId = $_SESSION['quizid']; // DONE
$userId = $_SESSION['user_id']; // DONE
$resultPoints = $percent;
//$submission_count = "1";
$currentSubbmissionCount = getCurrentSubmissionForQuiz($quizId, $userId);
$currentPoint = $currentSubbmissionCount['result'];


$submission_count = $currentSubbmissionCount['numberof_submission']+1;

//TODO check if user has reached the limit of submission

if ($currentSubbmissionCount['numberof_submission'] < 4) {
  if ($currentSubbmissionCount['numberof_submission'] == 0) {
    //insert for first time
    $array = array('quiz_id' => $quizId, 'user_id' => $userId, 'result' => $resultPoints, 'submission_count' => $submission_count );
    MySQL::insertIntoGroup('`submissions`', $array);  //uncomment this
  } else { //get id for this user's first submission

    $lastSubmission = getCurrentSubmissionForQuiz ($quizId, $_SESSION['user_id']);
    $lastSubmissionId = $lastSubmission['id'];

    // check if the current submitted points is bigger than the last one in the DB
    if ($resultPoints > $currentPoint) { //add the new result to DB
      $array = array('quiz_id' => $quizId, 'user_id' => $userId, 'result' => $resultPoints, 'submission_count' => $submission_count );
    } else {
      $array = array('quiz_id' => $quizId, 'user_id' => $userId, 'result' => $currentPoint, 'submission_count' => $submission_count );
    }
    MySQL::update('`submissions`', $lastSubmissionId, $array); //uncomment this

  }

} else {
  $result = "limitreached";
}

if (!isset($result)) {
  echo json_encode("error");
} else {
  echo json_encode($result);
}

?>
