<?php

include_once("../functions.php");
session_start();
$resultPoints = $_POST['pointsgained'];
$username = $_SESSION['username'];
$user_id = $_SESSION['user_id'];
$submission_count = "1";

$array = array('exercise_id' => $exercise_id, 'user_id' => $user_id, 'result' => $resultPoints, 'submission_count' => $submission_count );
MySQL::insertIntoGroup('`exercise_results`', $array);  //uncomment this

echo json_encode($resultPoints);

?>
