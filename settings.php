<?php include_once("functions.php");
$userDetails = getUserDetails_($_SESSION['user_id']);
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
    <script src="js/user.js"></script>

  </head>
  <body>
    <?php include_once("menu.php");?>

    <div class="container gimmeplace">
      <div class="row">
        <div class="col-lg-12">
          <div id="result-container" class="collapse">
          </div>
           <div id="exercise-list">
             <div class="alert alert-danger alert-dismissible" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>Figyelem!</strong> Még nem változtattad meg a jelszavad!
            </div>
           </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">
              <i class="fa fa-user"></i>
            </span>
            <input value="<?php echo $userDetails['fullname'] ?>" type="text" class="form-control" placeholder="Teljes neved" aria-describedby="basic-addon1" disabled>
          </div>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">
              @
            </span>
            <input value="<?php echo $userDetails['email']; ?>" type="text" class="form-control" placeholder="Email címed" aria-describedby="basic-addon1">
          </div>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">
              <i class="fa fa-key"></i>
            </span>
            <input id="newpassword" type="password" class="form-control" placeholder="New password" aria-describedby="basic-addon1">
          </div>
          <div class="input-group">
            <p id="edituser" class="btn btn-success fullwidth">
              Mentés
            </p>
          </div>
        </div>
      </div>

    </div>
    <?php include_once("footer.php");?>
  </body>
</html>
