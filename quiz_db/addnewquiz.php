<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once("MySQL.php");
MySQL::connect();
session_start();
$loggedInUserName = $_SESSION['username'];

$selectedQuestions = $_POST['selectedquestions'];
$deadline = "2017-12-21";
$length = count($selectedQuestions);
$quizName = "lofasz";

$question = '';

for ($i=0; $i<count($selectedQuestions); $i++) {
  $question .= $selectedQuestions[$i].",";
}

$insertArray = array('name' => $quizName, 'deadline' => $deadline, 'questions' => $question, 'owner' => $loggedInUserName  );

MySQL::insertIntoGroup('`quizs`', $insertArray);

echo json_encode($selectedQuestions);

?>
