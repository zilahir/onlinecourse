<div class="row">
  <div class="alert alert-info hidden" role="alert">
    Kitöltendő kvízed van!
  </div>
  <div class="col-lg-10">
    <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#result-container">Show my results</button>
    <div id="result-container" class="collapse">
    <?php drawQuizResultBar($_SESSION['user_id']); ?>
    </div>
    <?php
    //var_dump($userResults);
    checkIfTheresOpenQuizzes();
     ?>
     <div id="exercise-list">
       <div class="list-group">
    <a href="#" class="list-group-item">
      <h4 class="list-group-item-heading">1. Feladat</h4>
      <p class="list-group-item-text">HTML Alapok I.</p>
    </a>
  </div>
  <div class="list-group">
<a href="#" class="list-group-item">
 <h4 class="list-group-item-heading">1. Feladat</h4>
 <p class="list-group-item-text">HTML Alapok II.</p>
</a>
</div>
     </div>
  </div>
  <div class="col-lg-2">
    <?php var_dump ($_SESSION); ?>
  </div>
</div>
