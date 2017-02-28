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
       <div class="list-group">
    <a href="submitassignment.php?id=3" class="list-group-item">
      <h4 class="list-group-item-heading">3. Gyakorlat</h4>
      <p class="list-group-item-text">HTML Gyakorlófeladat I.</p>
    </a>
  </div>
  <div class="list-group">
<a href="#" class="list-group-item closedtask">
 <h4 class="list-group-item-heading">3. Gyakorlat</h4>
 <span class="badge closedbadge">closed</span>
 <p class="list-group-item-text">HTML Alapok II.</p>
</a>
</div>
     </div>
  </div>
  <div class="col-lg-2">
    <?php var_dump ($_SESSION); ?>
  </div>
</div>
