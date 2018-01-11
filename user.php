<div class="row">
  <div class="col-lg-10">
    <div id="result-container" class="collapse">
    <?php drawQuizResultBar($_SESSION['user_id']); ?>
    </div>
    <?php
    //var_dump($userResults);
    checkIfTheresOpenQuizzes();
     ?>
     <div id="exercise-list">
       <?php checkIfTheresOpenExercises() ?>

     </div>
  </div>
  <div class="col-lg-2">
    <?php //var_dump ($_SESSION); ?>
  </div>
</div>
