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
              <li id="question-1">
                  <h3>Mit csinál a következő CSS osztály?</h3>
                  <code>.important {color: red;}</code>
                  <div>
                      <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A" />
                      <label for="question-1-answers-A">Pirosra szinezi az <code>important</code> html elemet </label>
                  </div>

                  <div>
                      <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B" />
                      <label for="question-1-answers-B">Pirosra szinezi az <code>important</code> html elem szövegét </label>
                  </div>

                  <div>
                      <input type="radio" name="question-1-answers" id="question-1-answers-C" value="C" />
                      <label for="question-1-answers-C">Pirosra szinezni a <code>important</code> css osztállyal ellátott elem szövegét</label>
                  </div>
              </li>
              <li id="question-2">
                  <h3>Mit csinál a következő CSS definíció?</h3>
                  <code>.underline {text-decoration: underline;}</code>
                  <div>
                      <input type="radio" name="question-2-answers" id="question-1-answers-A" value="A" />
                      <label for="question-2-answers-A">Aláhúzza a szöveget az <code>underline</code> osztállyal ellátott elemekben</label>
                  </div>

                  <div>
                      <input type="radio" name="question-2-answers" id="question-1-answers-B" value="B" />
                      <label for="question-2-answers-B">Aláhúzza a szöveget az <code>underline</code> egyéni azonosítóval ellátott elemekben</label>
                  </div>
              </li>
              <li id="question-3">
                  <h3>Hogyan adnál hozzá külső CSS library-t a html fájlodhoz?</h3>

                  <div>
                      <input type="checkbox" name="question-3-answers" id="question-1-answers-A" value="A" />
                      <label for="question-3-answers-A"><code> < link rel="stylesheet" type="text/css" href="stylesheet.css"/></code></label>
                  </div>

                  <div>
                      <input type="checkbox" name="question-3-answers" id="question-1-answers-B" value="B" />
                      <label for="question-3-answers-B"><code>< style type="text/css" href="stylesheet.css" /></code></label>
                  </div>
                  <div>
                      <input type="checkbox" name="question-3-answers" id="question-1-answers-B" value="B" />
                      <label for="question-3-answers-C"><code>< style type="text/css" href="stylesheet.css" /></code></label>
                  </div>
              </li>
            </ol>
          </div>
          <button id="submitforgrade" class="btn btn-success">Grade me!</button>
        </div>
        <div class="col-lg-3">
          <div class="exercise-details">
            <p class="result-text">
              Your result:
            </p>
            <div class="progress">
<div id="graderesult" style="width:<?php echo $lastSubmission['result'].'%';?>" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">
</div>
</div>
<h2>Pontszám: <?php echo $lastSubmission['result']; ?></h2>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
