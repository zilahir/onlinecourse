<?php
include_once("MySQL.php");

session_start();

MySQL::connect();

$loggedInUserName = $_SESSION['username'];

$selectedQuestions = $_POST['selectedquestions'];
//$deadline = "2017-12-21";
$deadline = $_POST['deadline'];
$startsFrom = $_POST['startsFrom'];
$length = count($selectedQuestions);
$quizName = $_POST['quizname'];
$submissionLimit = $_POST['limit'];

$question = '';

for ($i=0; $i<count($selectedQuestions); $i++) {
  $question .= $selectedQuestions[$i].",";
}

$insertArray = array('name' => $quizName, 'deadline' => $deadline, 'starts_from' => $startsFrom, 'max_sub' => $submissionLimit, 'questions' => $question, 'owner' => $loggedInUserName, );

MySQL::insertIntoGroup('`quizs`', $insertArray);

echo json_encode($selectedQuestions);

?>
