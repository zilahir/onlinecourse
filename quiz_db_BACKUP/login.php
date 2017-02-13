<?php
//echo "you are not logged in";

$error = '';

if (isset($_GET['error'])) {
    if ($_GET['error'] == 'user') {
        if (isset($_GET['username'])) {
            $username = ' '.$_GET['username'];
        }


        $error = "<div class='error'><p>A felhsználó: <span class='who'>".$username."</span> nem létezik az adatbázisban!</p></div>";
    }
    else if ($_GET['error'] == 'password') {
        $error = "<div class='error'><p>Hibás jelszó!</p></div>";
    }
    else {

    }
}

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
  <?php if ($error != "") {
    echo $error;
  } ?>
  <div class="container">
    <i class="fa fa-terminal login-icon"></i>

    <div class="box">
      <form method="POST" action="signin.php">
        <input type="text" placeholder="username" name="username" id="username">
  	    <input type="password" name="password" id="password" placeholder="password">
  	    <button id="login" class="btn btn-default full-width">
          LOGIN
        </button>
      </form>
    </div>
  </div>
</div>
  </body>
</html>
