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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>
  <body>
    <div id="login-main" class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="col-lg-6">
            <div class="jumbotron">
              <?php if ($error != "") {
                echo $error;
              } ?>
              <div class="container-login">
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

          </div>
          <div class="col-lg-6">
            <div class="panel panel-default">
  <div class="panel-body">
    <div class="panel panel-default">
  <div class="panel-heading">Mi ez?</div>
  <div class="panel-body">
    <p>
      Ez a portál a <code>webfejlesztés 1.</code> tárgy <span class="haha">demo</span> gyakorlóportálja.
    </p>
    <p>
      A belépéshez szükséges adatokról a gyakorlatvezetőd fog tájékoztatni.
    </p>
  </div>
</div>
<div class="panel panel-default">
<div class="panel-heading">Support</div>
<div class="panel-body">
  <p>
    Hiba, bug esetén, a hiba leírásával, és reprodukálásához szükséges információkkal kérlek nyiss egy hibajegyet <a href="https://github.com/zilahir/htmlcss/issues">itt</a>.
  </p>
<p>
  A portál használatához szükséges leírást megtalálod <a href="help/help.pdf">itt</a>. A leírással, és a portállal kapcsolatban közvetlenül nekem <a href="message.html">itt</a> tudsz üzenni, kérdezni.
</p>
<p>
  Készült egy <a href="elte-ik-webfejlesztes1-framework">google-group</a> is, itt is kérhetsz segítséget!
</p>

</div>
</div>

  </div>
</div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
