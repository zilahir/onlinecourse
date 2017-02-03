<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$result["answers"] = array (
  "question-1" => true,
  "question-2" => true,
  "question-3" => false
);

//echo "count: ".count($result["answers"]);

$goodAnswers = 0;
$badAnswers = 0;

for ($i=0; $i<count($result["answers"]); $i++) {
  if ($result["answers"][$i] == true ) {
    $goodAnswers++;
  } else {
    $badAnswers++;
  }
}

echo "good: ".$goodAnswers;
echo "bad: ".$badAnswers;

?>
