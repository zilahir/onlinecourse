<div class="row">
  <div class="alert alert-info hidden" role="alert">
    Kitöltendő kvízed van!
  </div>
  <div class="col-lg-10">

    <?php
    drawQuizResultBar($_SESSION['user_id']);
    //var_dump($userResults);
    checkIfTheresOpenQuizzes();
     ?>
  </div>
  <div class="col-lg-2">
    <?php var_dump ($_SESSION); ?>
  </div>
</div>
