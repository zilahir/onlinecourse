<?php

include_once("../functions.php");
session_start();
$resultPoints = $_POST['pointsgained'];
$username = $_SESSION['username'];
$user_id = $_SESSION['user_id'];
$submission_count = "1";
$exercise_id = $_POST['exercise'];

$currentSubbmissionCount = getCurrentSubmissionForAssignments($exercise_id, $user_id);
$currentPoint = $currentSubbmissionCount['result'];
$submission_count = $currentSubbmissionCount['numberof_submission']+1;


if ($currentSubbmissionCount['numberof_submission'] == 0) {
  $array = array('exercise_id' => $exercise_id, 'user_id' => $user_id, 'result' => $resultPoints, 'submission_count' => $submission_count );
  MySQL::insertIntoGroup('`exercise_results`', $array);  //uncomment this
} else {
  $lastSubmission = getCurrentSubmissionForAssignments ($exercise_id, $user_id);
  $lastSubmissionId = $lastSubmission['id'];

  if ($resultPoints > $currentPoint) { //add the new result to DB
    $array = array('exercise_id' => $exercise_id, 'user_id' => $user_id, 'result' => $resultPoints, 'submission_count' => $submission_count );
  } else {
    $array = array('exercise_id' => $exercise_id, 'user_id' => $user_id, 'result' => $currentPoint, 'submission_count' => $submission_count );
  }
  MySQL::update('`exercise_results`', $lastSubmissionId, $array); //uncomment this

}

echo json_encode($array);

?>
