<nav id="nav-header" class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <ul class="nav navbar-nav">
      <li class="active">
        <a href="#">Home</a>
      </li>
      <li>
        <a href="#">Questions</a>
      </li>
      <li>
        <a href="#">Quizzes</a>
      </li>
      <li>
        <a href="#">
          <?php echo $_SESSION['username']; ?>
        </a>
      </li>
    </ul>
    <button id="" type="button" class="btn btn-success navbar-btn pull-right">
      <a href="createnewquiz.php">
        <i class="fa fa-check-square-o"></i>
      </a>
    </button>
    <button id="showaddnewquestionform" type="button" class="btn btn-success navbar-btn pull-right">
        <i class="fa fa-plus"></i>
    </button>
  </div>
</nav>
