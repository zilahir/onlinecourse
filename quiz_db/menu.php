<nav id="nav-header" class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <ul class="nav navbar-nav">
      <li class="active">
        <a href="#">Home</a>
      </li>
      <li>
        <a href="questions.php">Questions</a>
      </li>
      <li>
        <a href="quizzes.php">Quizzes</a>
      </li>
    </ul>
    <ul class="nav navbar-nav pull-right">
      <li>
        <a href="#">Howdy, <?php echo $_SESSION['username'] ?>!</a>
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
