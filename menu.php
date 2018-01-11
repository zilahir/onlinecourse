<nav id="nav-header" class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <ul class="nav navbar-nav">
      <li class="active">
        <a href="index.php">Home</a>
      </li>
      <li>
        <a href="courses.php">Courses</a>
      </li>
      <?php
      if ($_SESSION['user_level'] == 0) {
        echo '<li>
          <a href="questions.php">Questions</a>
        </li>
        <li>
          <a href="quizzes.php">Quizzes</a>
        </li>
        <li>
          <a href="exercises.php">Exercises</a>
        </li>
        '
        ;
      }
      ?>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Howdy <?php echo $_SESSION['username'] ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <?php
              if ($_SESSION['user_level'] == 0) {
                include_once("etc/admindropdown.html");
              }
            ?>
            <li><a href="settings.php">Settings</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
        <img id="avatar" class="img-circle" src="<?php echo $_SESSION['avatar']; ?>" />
      </ul>
      <!-- admin related menu -->
    <?php
      if ($_SESSION['user_level'] == 0) {
        $page = basename($_SERVER['PHP_SELF']);
        if ($page == "quizzes.php") {
          $button = '<button id="" type="button" class="btn btn-success navbar-btn pull-right">
            <a href="createnewquiz.php">
              <i class="fa fa-check-square-o"></i>
            </a>
          </button>';
        }

        if ($page == "courses.php" && $_SESSOIN['user_level'] == 0) {
          $button = '
          <button id="createnewcourse" type="button" class="btn btn-success navbar-btn pull-right">
              <i class="fa fa-check-square-o"></i>
          </button>
          ';
        }
        if ($page == 'questions.php') {
          $button .= '<button id="showaddnewquestionform" type="button" class="btn btn-success navbar-btn pull-right">
              <i class="fa fa-plus"></i>
          </button>';
        }
        if ($page == 'exercises.php') {
          $button = '<button id="showaddnewexerciseform" type="button" class="btn btn-success navbar-btn pull-right">
            <a href="#">
              <i class="fa fa-plus-square-o"></i>
            </a>
          </button>';
        }

        echo $button;
      }

    ?>

    <!-- // admin related menu -->

    </div>
</nav>
