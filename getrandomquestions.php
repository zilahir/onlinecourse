<?php

include_once("functions.php");

session_start();
$loggedInUserName = $_SESSION['username'];

$startsFrom = $_POST["startsFrom"];
$deadline = $_POST["deadline"];
$quizname = $_POST["quizname"];
$limit = $_POST["limit"];

$randomQuestions = getRandomQuestions("10");


$insertArray = array('name' => $quizname, 'deadline' => $deadline, 'starts_from' => $startsFrom, 'max_sub' => $limit, 'questions' => $randomQuestions, 'owner' => $loggedInUserName, );

MySQL::insertIntoGroup('`quizs`', $insertArray);

echo json_encode($randomQuestions)

?>
