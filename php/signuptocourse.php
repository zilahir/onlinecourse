<?php

include_once('../MySQL.php');
MySQL::connect();
session_start();
$whichCourse = $_POST['courseCode'];
$thisUserId = $_SESSION['user_id'];

$objectToInsert = array('course_code' => $whichCourse, 'user_id' => $thisUserId );

MySQL::insertIntoGroup('`course_signups`', $objectToInsert);

echo json_encode($objectToInsert);


?>
