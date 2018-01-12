<?php

include_once("../functions.php");

$numberOfHtmlQuestions = countQuestionsByTags("html");
$numberOfCssQuestions = countQuestionsByTags("css");
$numberOfReactQuestions = countQuestionsByTags("react");

$result["css"] = $numberOfCssQuestions;
$result["html"] = $numberOfHtmlQuestions;
$result["react"] = $numberOfReactQuestions;

echo json_encode($result);

?>
