<div class="row">
  <div class="col-lg-12">
    <div class="col-lg-6">
      <div class="panel panel-default">
  <div class="panel-heading">Questions <i class="fa fa-tag"></i></div>
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
  <div class="panel-heading">Quizzes submissions <i class="fa fa-check-square-o"></i></div>
  <div class="panel-body">
    <ul class="list-group">
    <?php countQuizSubmissions("10") ?>
  </ul>
  </div>
</div>
    </div>
  </div>
</div>


<script src="drawadminchart.js"></script>
