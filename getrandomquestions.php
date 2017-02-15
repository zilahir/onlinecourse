<?php

include_once("functions.php");

//

$startsFrom = $_POST["startsFrom"];
$deadline = $_POST["deadline"];
$quizname = $_POST["quizname"];
$limit = $_POST["limit"];

$randomQuestions = getRandomQuestions("10");

echo json_encode($randomQuestions)

?>
