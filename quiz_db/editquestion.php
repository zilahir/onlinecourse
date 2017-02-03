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
    <script type="text/javascript" src="deletequestion.js"></script>
    <script>

    </script>
</head>

  <body>
    <div class="container">
      <div class="row addnewquestionbox">
        <div class="col-lg-12">
          <h2><?php echo $currentQuestion['question']; ?></h2>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">
              <i class="fa fa-question"></i>
            </span>
            <input id="question" name="question" type="text" class="form-control" value="<?php echo $currentQuestion['question']; ?>" aria-describedby="basic-addon1">
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
