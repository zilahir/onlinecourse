<?php
$totalNumberOfQuestions = countAllQuestionsInDb();
?>
<div class="row">

    <div class="col-lg-6">
      <div class="panel panel-default">
  <div class="panel-heading">
    <span class="badge"><?php echo $totalNumberOfQuestions; ?></span> Questions <i class="fa fa-tag"></i></div>
  <div class="panel-body">
    <div class="col-lg-6">
      <div id="questionsbytags"></div>
    </div>
    <div class="col-lg-6">
      <?php creteListForQuestionTags() ?>
    </div>
  </div>
</div>
    </div>
    <div class="col-lg-6">
      <div class="panel panel-default">
  <div class="panel-heading">Quiz submissions <i class="fa fa-check-square-o"></i></div>
  <div class="panel-body">
    <ul class="list-group">
    <?php countQuizSubmissions("10") ?>
  </ul>
  </div>
  <div class="panel-body hidden">
    <ul class="list-group">
    <?php //countExerciseSubmissions("10") ?>
  </ul>
  </div>
</div>
    </div>

</div>

<div class="row">

    <div class="col-lg-6">
      <div class="panel panel-default">
  <div class="panel-heading">Quiz results <i class="fa fa-area-chart"></i> <i class="fa fa-long-arrow-up"></i></div>
  <ul class="list-group">
    <?php getQuizResults("max") ?>
  </ul>
  </div>
    </div>
    <div class="col-lg-6">
      <div class="panel panel-default">
  <div class="panel-heading">Quiz results <i class="fa fa-area-chart"></i> <i class="fa fa-long-arrow-down"></i></div>
  <ul class="list-group">
    <?php getQuizResults("min") ?>
  </ul>
  </div>
  </div>

</div>

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
<div class="panel-heading">
  <span class="badge">n</span> Upcoming exercises <i class="fa fa-code"></i></div>
<div class="panel-body">
  <?php checkIfTheresOpenExercises ("admin") ?>

</div>
</div>

  </div>
</div>



<script src="drawadminchart.js"></script>
