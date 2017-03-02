<?php
session_start();
if ($_SESSION['login'] == true ) {
} else {
  header("Location: login.php");
}

include_once("functions.php");
//$nextQuizDetails($userId);

$exerciseId = $_GET['id'];

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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.10/c3.min.css">
    <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.10/c3.min.js"></script>
    <script src="js/triggertc.js"></script>
    <link rel="stylesheet" type="text/css" href="css/exercise.css">
  </head>
  <body>
    <?php include_once("menu.php");?>

    <div id="main-exercise" data-exerciseid="<?php echo $exerciseId;?>" class="container">
      <div class="row gimmeplace">
      <div class="col-lg-12">
        <ul class="list-group">
        <?php
          getSubmissionsForExercise($exerciseId);
        ?>
        </ul>
      </div>
      </div>
    </div>


    <?php include_once("footer.php");?>
  </body>
</html>
