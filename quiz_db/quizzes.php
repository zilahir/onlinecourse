<?php
include_once("functions.php");

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add new quiz</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/questions.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script type="text/javascript" src="addnewquestion.js"></script>
    <script type="text/javascript" src="deletequestion.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <script>
    $(document).ready(function() {
      var selectedquestions = 0;
      $("input[type='checkbox']").change(function() {
          if(this.checked) {
            var questionId = $(this).data("questionid");
            console.log(questionId);
            selectedquestions = selectedquestions+1;
            $("#selectedquestions").html(selectedquestions);
          } else {
            selectedquestions = selectedquestions-1;
            $("#selectedquestions").html(selectedquestions);
          }
          });
      });

    </script>

</head>
  <body>
    <nav id="nav-header" class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <button id="" type="button" class="btn btn-success navbar-btn pull-right">
          <i class="fa fa-check-square-o"></i>
        </button>
        <button id="showaddnewquestionform" type="button" class="btn btn-success navbar-btn pull-right">
          <i class="fa fa-plus"></i>
        </button>
      </div>
    </nav>
      <div id="main" class="container">
        <div id="addnewquestion" class="row addnewquestionbox">
          <div class="col-lg-12">
            <h4>Name your quiz:</h4>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">
                <i class="fa fa-question"></i>
              </span>
              <input id="quiezname" name="quiezname" type="text" class="form-control" placeholder="Question" aria-describedby="basic-addon1">
            </div>
            <h4>Set deadline to your quiz:</h4>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">
                <i class="fa fa-calendar-o"></i>
              </span>
              <input id="deadline" name="deadline" type="text" class="form-control" placeholder="Deadline" aria-describedby="basic-addon1">
            </div>
          </div>
        </div>
        <div id="questions" class="row">
          <div class="col-lg-12">

            <table id="" class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Question</th>
                  <th>Is Active</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php getAllQuestionsForQuiz();?>
              </tbody>
            </table>
            <div class="addnewquestionbox">
              <a href="#">Number of selected questions <span id="selectedquestions" class="badge"></span></a>
            </div>
          </div>
        </div>
      </div>
  </body>
</html>
