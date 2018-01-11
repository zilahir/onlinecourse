<?php
/*
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
*/
?>
<div class="row addnewquestionbox">
  <div class="col-lg-12">
    <h4>Create new course</h4>
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">
        <i class="fa fa-code-fork"></i>
      </span>
      <input id="newcoursename" name="newcoursename" type="text" class="form-control" placeholder="Course name" aria-describedby="basic-addon1">
    </div>
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">
        <i class="fa fa-search"></i>
      </span>
      <input id="newcoursecode" name="newcoursecode" type="text" class="form-control" placeholder="Course code" aria-describedby="basic-addon1">
    </div>
    <div class="input-group pull-right">
      <button id="createnewcourse" class="btn btn-success">Create new course</button>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        Avaliable courses <span class="badge"><?php countAllOpenCourse(); ?></span>
      </div>
      <ul id="course-list" class="list-group">
        <?php
          getAllOpenCourses("admin");
        ?>
      </ul>
    </div>
  </div>
</div>
