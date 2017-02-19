<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once("functions.php");

var_dump($_POST);

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
//echo "good: ".$goodAnswers."bad: ".$badAnswers;


$result["numberofquestions"] = $numberOfQuestions;
$result["result"] = $percent;


$quizId = $_SESSION['quizid']; // DONE
$userId = $_SESSION['user_id']; // DONE
$resultPoints = $percent;
//$submission_count = "1";
$currentSubbmissionCount = getCurrentSubmissionForQuiz($quizId, $userId);
$currentPoint = $currentSubbmissionCount['result'];


$submission_count = $currentSubbmissionCount['numberof_submission']+1;

//TODO if ($reultPoints >  $currentPoint) --> array -> resultPoints // else array --> currentPoints


if ($currentSubbmissionCount['numberof_submission'] == 0) {
  //insert for first time
  $array = array('quiz_id' => $quizId, 'user_id' => $userId, 'result' => $resultPoints, 'submission_count' => $submission_count );
  //MySQL::insertIntoGroup('`submissions`', $array);  //uncomment this
} else { //get id for this user's first submission

  $lastSubmission = getCurrentSubmissionForQuiz ($quizId, $_SESSION['user_id']);
  $lastSubmissionId = $lastSubmission['id'];

  // check if the current submitted points is bigger than the last one in the DB
  if ($resultPoints > $currentPoint) { //add the new result to DB
    $array = array('quiz_id' => $quizId, 'user_id' => $userId, 'result' => $resultPoints, 'submission_count' => $submission_count );
  } else {
    $array = array('quiz_id' => $quizId, 'user_id' => $userId, 'result' => $currentPoint, 'submission_count' => $submission_count );
  }
  //MySQL::update('`submissions`', $lastSubmissionId, $array); //uncomment this

}

if (!isset($result)) {
  echo json_encode("error");
} else {
  echo json_encode($result);
}

?>
