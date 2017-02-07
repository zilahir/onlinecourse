<?php
echo "you are not logged in";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  </head>
  <body>
<div class="jumbotron">
  <div class="container">
    <i class="fa fa-terminal login-icon"></i>

    <div class="box">
        <input type="text" placeholder="username" name="username" id="username">
	    <input type="password" name="password" id="password" placeholder="password">
	    <button class="btn btn-default full-width"><span class="glyphicon glyphicon-ok"></span></button>
    </div>
  </div>
</div>
  </body>
</html>
