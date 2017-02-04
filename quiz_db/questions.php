<?php
include_once("functions.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Question Manager</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/questions.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script type="text/javascript" src="addnewquestion.js"></script>
    <script type="text/javascript" src="deletequestion.js"></script>
    <script>
    jQuery(document).ready(function($) {
      $(".clickable-row").click(function() {
          var url = "editquestion.php?id="+$(this).data("id");
          window.document.location = url;
      });
    });

    </script>
</head>
  <body>
    <nav id="nav-header" class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <button id="showaddnewquestionform" type="button" class="btn btn-success navbar-btn pull-right">
          <i class="fa fa-plus"></i>
        </button>
      </div>
    </nav>
      <div id="main" class="container">
        <div id="addnewquestion" class="row addnewquestionbox hidden">
          <div class="col-lg-12">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">
                <i class="fa fa-question"></i>
              </span>
              <input id="newquestion" name="newquestion" type="text" class="form-control" placeholder="Question" aria-describedby="basic-addon1">
            </div>
            <div id="submitbutton" class="input-group pull-right">
              <button id="" class="btn btn-success">Add new question</button>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <table id="questions" class="table table-hover">
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
