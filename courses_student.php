<?php
/*
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
*/
?>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        Avaliable courses
      </div>
      <ul class="list-group">
        <?php
          getAllOpenCourses();
        ?>
      </ul>
    </div>
  </div>
</div>
