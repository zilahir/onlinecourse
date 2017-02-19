<?php

include_once("functions.php");

session_start();
if ($_SESSION['login'] == true ) {
} else {
  header("Location: login.php");
}

$quizId = $_GET['id'];
$_SESSION['quizid'] = $quizId;
$quizDetails = generateQuizPage($quizId);
$lastSubmission = getCurrentSubmissionForQuiz ($quizId, $_SESSION['user_id']);

$submissionsSum = countSubbmissionForQuiz ($quizId);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/questions.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <script src="bower_components/noty/js/noty/packaged/jquery.noty.packaged.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="grademe.js"></script>
  </head>
  <body>
    <?php include_once("menu.php");?>
    <div class="container gimmeplace">
      <div class="row">
        <div id="errorcontainer" class="alert alert-danger hidden" role="alert">
          Hiba! Nem sikerült minden kérdésre helyesen válaszolni!
        </div>
        <div class="col-lg-9 exercise-container">
          <div class="exercise-details">
            <ol>
                <?php showQuestionsForQuizPage($quizId) ?>
            </ol>
          </div>
          <button id="submitforgrade" class="btn btn-success">Grade me!</button>
        </div>
        <div class="col-lg-3">
          <?php //var_dump($lastSubmission); //testing purposes ?>
          <div class="exercise-details">
            <p class="result-text">
              Your result: <?php echo $lastSubmission['result'];?> /100
            </p>
            <p class="result-text">
              Your number of submission: <?php echo $lastSubmission['numberof_submission'].' / '.$quizDetails['max_sub']; ?>
            </p>
            <p class="result-text total">
              Total number of submissions: <?php echo $submissionsSum; ?>
            </p>
            <div class="progress">
<div id="graderesult" style="width:<?php echo $lastSubmission['result'].'%';?>" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">
</div>
</div>
          </div>
        </div>

      </div>
    </div>

<div id="graderesult" style="width:<?php echo $lastSubmission['result'].'%';?>" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">
</div>
</div>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
