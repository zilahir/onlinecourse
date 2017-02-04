<?php
$questionId = $_GET['id'];

//echo $questionId;

include_once("functions.php");

$currentQuestion = getASpecificQuestion($questionId);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Question</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/questions.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script type="text/javascript" src="addchoices.js"></script>

    <script>

    </script>
</head>

  <body>
    <div class="container">
      <div class="row addnewquestionbox">
        <div id="optioncontainer" class="col-lg-12">
          <h2 data-id="<?php echo $currentQuestion['id']; ?>" id="questionid">Q: <?php echo $currentQuestion['question']; ?></h2>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">
              <i class="fa fa-question"></i>
            </span>
            <input id="question" name="question" type="text" class="form-control" value="<?php echo $currentQuestion['question']; ?>" aria-describedby="basic-addon1">
          </div>
          <h4>Add Choices</h4>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">
              1. <!-- TODO: implement checkbox here for setting the answer as correct one -->
            </span>
            <input id="choice-1" data-number="1" name="choice-1" type="text" class="form-control" placeholder="Provide a choice" aria-describedby="basic-addon1">
          </div>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">
              2.
            </span>
            <input id="choice-2" data-number="2" name="choice-2" type="text" class="form-control" placeholder="Provide a choice" aria-describedby="basic-addon1">
          </div>
        </div>
        <div class="input-group pull-left">
          <button id="addnewoption" class="btn btn-primary">Add new option</button>
        </div>
        <div id="submitbutton" class="input-group pull-right">
          <button id="sbmitchoices" class="btn btn-success">Add new choices</button>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row addnewquestionbox">
        <div id="answerscontainer" class="col-lg-12">
          <table id="questions" class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Answer</th>
                <th>Is Right Choice</th>
              </tr>
            </thead>
            <tbody>
              <?php getAllAnswerForQuestion($questionId);?>
            </tbody>
          </table>
      </div>
    </div>
  </div>
  </body>
</html>
