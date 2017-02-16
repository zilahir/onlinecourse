<?php

include_once("../functions.php");

$numberOfHtmlQuestions = countQuestionsByTags("html");
$numberOfCssQuestions = countQuestionsByTags("css");

$result["css"] = $numberOfCssQuestions;
$result["html"] = $numberOfHtmlQuestions;

echo json_encode($result);

?>
