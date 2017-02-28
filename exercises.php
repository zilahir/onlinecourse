<?php
include_once("functions.php");

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Quizzes - Maintance</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/questions.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script type="text/javascript" src="addnewexercise.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

</head>
  <body>
    <?php include_once("menu.php"); ?>
      <div id="main" class="container">
        <div id="addnewexercise" class="row addnewquestionbox hidden">
          <div class="col-lg-12">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">
                <i class="fa fa-question"></i>
              </span>
              <input id="newquestion" name="newquestion" type="text" class="form-control" placeholder="Question" aria-describedby="basic-addon1">
            </div>

            <div id="submitbutton" class="input-group pull-right">
              <button id="" class="btn btn-success">Add new exercise</button>
            </div>

          </div>
        </div>
        <div id="questions" class="row">
          <div class="col-lg-12">

            <table id="" class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Maxpoints</th>
                  <th>Deadline</th>
                  <th>Owner</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php getAllExercises();?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </body>
</html>
