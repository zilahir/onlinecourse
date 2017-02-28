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
    <script src="bower_components/noty/js/noty/packaged/jquery.noty.packaged.min.js"></script>
    <script src="js/addnewuser.js"></script>

</head>
  <body>
    <?php include_once("menu.php"); ?>
      <div id="main" class="container">

        <div id="addnewuser" class="row addnewuser">
          <div class="col-lg-12">

            <p id="addnewuser" class="btn btn-success">
              Add new user
            </p>
          </div>
        </div>
      </div>
  </body>
</html>
