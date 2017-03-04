<?php

include_once("MySQL.php");
MySQL::connect();

session_start();

$exerciseName = $_POST['exercisename'];
$deadline = $_POST['deadline'];
$maxPoints = $_POST['maxpoints'];
$minPoints = $_POST['minpoints'];
$loggedInUserName = $_SESSION['username'];

$array = array(
  "name" => $exerciseName,
  "max_points" => $maxPoints,
  "deadline" => $deadline,
  "exercise_id" => "3",
  "owner" => $loggedInUserName,
  "min_points" => $minPoints
);

MySQL::insertIntoGroup('`exercises`', $array);

echo json_encode($array);


 ?>
