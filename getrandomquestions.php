<?php

include_once("functions.php");

$randomQuestions = getRandomQuestions("10");

echo json_encode($randomQuestions)

?>
