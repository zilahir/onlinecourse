<?php

include_once("../MySQL.php");

session_start();

MySQL::connect();

$newCourseName = $_POST['newCourseName'];
$newCourseCode = $_POST['newCourseCode'];
$newCourseDesc = $_POST['newCourseDesc'];
$newCourseIsOpen = $_POST['newCourseIsOpen'];

if ($newCourseIsOpen == "true") {
  $newCourseIsOpen = true;
}

$newCourseObject = array('course_code' => $newCourseCode, 'course_name' => $newCourseName, 'course_desc' => $newCourseDesc, 'responsible_teacher' => $_SESSION['user_id'], 'is_open' => $newCourseIsOpen);

MySQL::insertIntoGroup('`courses`', $newCourseObject);

echo json_encode($newCourseObject);

?>
