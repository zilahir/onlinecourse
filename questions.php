<?php
include_once("functions.php");

$numberOfQuestions = countAllQuestionsInDb();
$numberOfQuiz = countAllQuizInDb();

if (isset($_GET['action'])) {
  $deleedAction = '<div class="alert alert-warning" role="alert">
      The question has been deleted!
  </div>';
}

if ($_SESSION['user_level'] == 0) {

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Question Manager</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/questions.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script type="text/javascript" src="addnewquestion.js"></script>
    <script type="text/javascript" src="deletequestion.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <script src="bower_components/noty/js/noty/packaged/jquery.noty.packaged.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <script>
    jQuery(document).ready(function($) {
      $(".linkme").click(function() {
          var url = "editquestion.php?id="+$(this).parent().data("id");
          window.document.location = url;
      });

      /*$(".clickable-row").on('click', function(event){
      console.log(event);
    });*/

    $("#tags").select2({
      tags: true,
      placeholder: "Add tags for the question",
      tokenSeparators: [',', ' ']
      })
    });

    </script>
</head>
  <body>
      <?php include_once("menu.php"); ?>
      <div id="main" class="container">
        <div id="addnewquestion" class="row addnewquestionbox hidden">
          <div class="col-lg-12">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">
                <i class="fa fa-question"></i>
              </span>
              <input id="newquestion" name="newquestion" type="text" class="form-control" placeholder="Question" aria-describedby="basic-addon1">
            </div>

              <textarea id="markdowneditor"></textarea>
              <div style="width: 100%;" class="input-group">
                <select style="width: 100%;" id="tags" class="js-example-tokenizer form-control" multiple="multiple">
                </select>
              </div>
            <div id="submitbutton" class="input-group pull-right">
              <button id="" class="btn btn-success">Add new question</button>
            </div>

          </div>
        </div>
        <div id="questions" class="row">
          <div class="col-lg-12">
            <?php echo $deleedAction; ?>
            <div class="alert alert-info" role="alert">
                <ul class="stat">
                  <li>
                    <a href="#">Questions in the database <span class="badge"><?php echo $numberOfQuestions; ?></span></a>
                  </li>
                  <li>
                    <a href="quizzes.php">Quizzes in the database <span class="badge"><?php echo $numberOfQuiz; ?></span></a>
                  </li>
                </ul>
            </div>
            <table id="" class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Question</th>
                  <th>Is Active</th>
                  <th>Actions</th>
                  <th>Answer</th>
                </tr>
              </thead>
              <tbody>
                <?php getAllQuestions();?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </body>
</html>
<?php

} else {
  //TODO: add no rights to visit this page 
}

 ?>
