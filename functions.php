<?php
session_start();
include_once("MySQL.php");
MySQL::connect();

function getAllQuestions () {
    $getAllProjectsSql = "SELECT * FROM `questions` ORDER BY `id` DESC  ";
    $rows = MySQL::getRows($getAllProjectsSql);
    $count = 0;
    foreach ($rows as $row ) {
      $count++;
      $id = $row->id;
      $question = $row->question;
      $isActive = $row->is_active;

      if ($isActive) {
        $icon = '<i class="fa fa-check"></i>';
      } else {
        $icon = '<i class="fa fa-times"></i>';
      }

      $hasAnswer = checkIfQuestionHasAnswer($id);

      if ($hasAnswer == 0) {
        $answerBadge = '<span class="label label-danger">Missing answer</span>';
      } else {
        $answerBadge = '<span class="label label-success">OK</span>';
      }

      echo '<tr class="clickable-row" data-id="'.$id.'">
      <td>'.$count.'</td>
      <td class="linkme">'.$question.'</td>
      <td>'.$icon.'</td>
      <td>
        <i class="fa fa-pencil action-icon"></i>
        <i class="fa fa-times action-icon"></i>
      </td>
      <td>
      '.$answerBadge.'
      </td>
      </tr>
      ';
    }

}

function checkIfQuestionHasAnswer ($question) {

    $result = MySQL::countEntry('answers', 'question_id', $question);
    return $result;
}

function getASpecificQuestion ($questionId) {
  $getAQuestionSql = "SELECT * FROM `questions` WHERE `id` = $questionId ";
  $rows = MySQL::getRows($getAQuestionSql);

  foreach ($rows as $row ) {

    $id = $row->id;
    $question = $row->question;
    $isActive = $row->is_active;
    $description = $row->description;
    $tags = $row->tags;
    $owner = $row->owner;

    $quizOwner = getUserDetails($owner);

    $tagsArray = explode(",", $tags);

    for ($i=0; $i<count($tagsArray)-1; $i++) {
      $tagsResult .= '<span class="label label-info tags">'.$tagsArray[$i].'</span>';
    }

    $question = array('tags' => $tagsResult, 'question' => $question, 'id' => $id, 'is_active' => $isActive, 'desc' => $description, 'owner' => $quizOwner['fullname']);
  }

  return $question;
}

function getAllAnswerForQuestion ($id) {
  $getAllAnswerForQuestionSql = "SELECT * FROM `answers` WHERE `question_id` = $id  ";
  $rows = MySQL::getRows($getAllAnswerForQuestionSql);

    $count = 0;
  foreach ($rows as $row ) {
    $count++;
    $id = $row->id;
    $choice = $row->choice;
    $isRightChoice = $row->is_right_choice;

    $rightChoiceIcon = getRightChoiceIcon($isRightChoice);

    echo '<tr class="clickable-row '.$rightChoiceIcon['class'].'" data-id="'.$id.'">
    <td>'.$count.'</td>
    <td>'.$choice.'</td>
    <td>'.$rightChoiceIcon['icon'].'</td>
    <td>
    <i class="fa fa-trash action-icon deletechoice"></i>
    </td>
    </tr>
    ';
  }
}

function getRightChoiceIcon ($isRightChoice) {
  if ($isRightChoice) {
    $icon = '<i class="fa fa-check"></i>';
    $class = 'right-choice';
  } else {
    $icon = '<i class="fa fa-times"></i>';
    $class = '';
  }

  $result = array('icon' => $icon, 'class' => $class);

  return $result;
}

function  countAllQuizInDb() {
  $result = MySQL::countEverything('quizs', 'id', "%");
  return $result;
}

function countExercises ($which) {
  if ($which == "upcoming") {
    $currentDate = date("Y-m-d");
    $result = MySQL::countUpcoming('exercises', 'deadline', "$currentDate");
  }
  return $result;
}

function countAllQuestionsInDb () {

    $result = MySQL::countEverything('questions', 'id', "%");
    return $result;
}

function getAllQuestionsForQuiz () {
  $getAllQuestionsSql = "SELECT * FROM `questions` ORDER BY `id` ASC  ";
  $rows = MySQL::getRows($getAllQuestionsSql);
  $count = 0;
  foreach ($rows as $row ) {
    $count++;
    $id = $row->id;
    $question = $row->question;
    $isActive = $row->is_active;

    if ($isActive) {
      $icon = '<i class="fa fa-check"></i>';
    } else {
      $icon = '<i class="fa fa-times"></i>';
    }

    $hasAnswer = checkIfQuestionHasAnswer($id);

    if ($hasAnswer == 0) {
      $answerBadge = '<span class="label label-danger">Missing answer</span>';
    } else {
      $answerBadge = '<span class="label label-success">OK</span>';
    }

    echo '<tr class="clickable-row" data-id="'.$id.'">
    <td>'.$count.'</td>
    <td>'.$question.'</td>
    <td>'.$icon.'</td>
    <td>
      <input data-questionid="'.$id.'" type="checkbox" aria-label="">
    </td>
    </tr>
    ';
  }

}

function getUserCredentials ($username, $password) {
    $getUserCredentialsSql = "SELECT * FROM `users` where `username` = '$username' LIMIT 1" ;
    $rows = MySQL::getRows($getUserCredentialsSql);
    $firstRow = $rows[0];

    $loginUsername = $firstRow->username;
    $loginPassword = $firstRow->password;
    $loginFullName = $firstRow->fullname;
    $loginNeptun = $firstRow->neptun;
    $loginUserLevel = $firstRow->user_level;
    $loginUserId = $firstRow->id;
    $loginUserEmail = $firstRow->email;

    //$isadmin = $firstRow->isadmin;

    //$result = array('username' => $loginUsername, 'password' => $loginPassword, 'fullname' => $loginFullName, 'user_level' => $loginUserLevel);
    //$result = array('user_level' => $loginUserLevel, 'neptun' => $loginNeptun, 'username' => $loginUsername, 'password' => $loginPassword, 'fullname' => $loginFullName, 'user_id' => $loginUserId );
    $result = array("email" => $loginUserEmail, 'user_level' => $loginUserLevel, 'neptun' => $loginNeptun, 'username' => $loginUsername, 'password' => $loginPassword, 'fullname' => $loginFullName, 'user_id' => $loginUserId );
    return $result;

}

function getNumberOfQuestionsForAQuiz ($quiz) {
  $count = explode(",", $quiz);
  $number = count($count)-1;
  return $number;
}

function getAllQuizzes () {
  $getAllQuizzesSql = "SELECT * FROM `quizs` ORDER BY `id` ASC  ";
  $rows = MySQL::getRows($getAllQuizzesSql);
  $count = 0;
  foreach ($rows as $row ) {
    $count++;
    $id = $row->id;
    $name = $row->name;
    $deadline = $row->deadline;
    $questions = $row->questions;
    $owner = $row->owner;

    $numberOfQuestions = getNumberOfQuestionsForAQuiz($questions);
    $quizOwner = getUserDetails($owner);

    echo '<tr class="clickable-row" data-id="'.$id.'">
    <td>'.$count.'</td>
    <td>'.$name.'</td>
    <td>'.$numberOfQuestions.'</td>
    <td>'.$deadline.'</td>
    <td>'.$quizOwner['fullname'].'</td>
    </tr>
    ';
  }

}

function getUserById ($userId) {
  $getUserDetailsSql = "SELECT * FROM `users` where `id` = '$userId' LIMIT 1" ;
  $rows = MySQL::getRows($getUserDetailsSql);
  $firstRow = $rows[0];

  $usersFullname = $firstRow->fullname;

  $result = array('fullname' => $usersFullname, );

  return $result;
}

function getUserDetails ($username) {
    $getUserDetailsSql = "SELECT * FROM `users` where `username` = '$username' LIMIT 1" ;
    $rows = MySQL::getRows($getUserDetailsSql);
    $firstRow = $rows[0];

    $usersFullname = $firstRow->fullname;

    $result = array('fullname' => $usersFullname, );

    return $result;
}

function getChoiceOptionForQuestion($questionId) {
  $getAllChoiceForQuestionSql = "SELECT * FROM `answers` where `question_id` = '$questionId'" ;
  $rows = MySQL::getRows($getAllChoiceForQuestionSql);
  foreach ($rows as $row ) {
    $id = $row->id;
    $choice = $row->choice;
    $isRightChoice = $row->is_right_choice;
    $questionId = $row->question_id;
    $resultArray[$questionId][] = array('choice' => $choice, 'id' => $id, 'is_rightchoice' => $isRightChoice, 'question_id' => $questionId );
  }

  return $resultArray;
}

function showQuestionsForQuizPage ($quizId) {
  $getQuizDetailsSql = "SELECT * FROM `quizs` WHERE `id` = $quizId  ";
  $rows = MySQL::getRows($getQuizDetailsSql);
  $firstRow = $rows[0];
  $name = $firstRow->name;
  $quizQuestions = $firstRow->questions;
  $array = json_encode($quizQuestions);
  $numberOfQuestions = explode(",", $quizQuestions);

  $questionNumber = 0;
  $count = count($numberOfQuestions)-1;
  for ($i=0; $i<$count; $i++) {
    $currentQuestionId = $numberOfQuestions[$i];
    $choices = getChoiceOptionForQuestion($currentQuestionId);
    $liId = $i+1;
    $questionNumber++;
    $getAQuestionDetailSql = "SELECT * FROM `questions` where `id` = '$currentQuestionId' " ;
    $rows = MySQL::getRows($getAQuestionDetailSql);
    $firstRow = $rows[0];
    //var_dump($firstRow);
    //var_dump($choices[24]);  //24 = questionId
    $numberOfOptions = count($choices[$currentQuestionId]); //WORKS!
    $question = $firstRow->question;
    $desc = $firstRow->description;
    //echo $question;
    $currentOptionsArray = ($choices[$currentQuestionId]);  // <-- QUESTIONID KELL IDE
    $currentOptionsArrayCount = count($currentOptionsArray);
    //var_dump($currentOptionsArray);
    $currentOption = '';
    $answerCount = 0;
    for ($j=0; $j<$currentOptionsArrayCount; $j++) {
      $asd = ($currentOptionsArray[$j]['choice']);
      $das = ($currentOptionsArray[$j]['id']);
      //$count=$count+1;
      $currentOption .= '<div>
      <input type="radio" data-questionid="'.$currentQuestionId.'" data-answerid="'.$das.'" name="question-'.$questionNumber.'-answers" id="question-'.$count.'-answers-A" value="A" />
      <label for="question-'.$count.'-answers-A">'.$asd.'</label></div>
      ';
    }

    if (!empty($currentOption)) {
      echo '
      <li id="question-'.$liId.'">
      <h3>'.$question.' '.$currentQuestionId.'</h3>
      '.$desc.'
      '.$currentOption.'
      </li>
      '
      ;
    }
  }

  //echo $result;

}

function generateQuizPage ($quizId) {
  $getQuizDetailsSql = "SELECT * FROM `quizs` WHERE `id` = $quizId  ";
  $rows = MySQL::getRows($getQuizDetailsSql);
  $firstRow = $rows[0];
  //$count = 0;

  $quizName = $firstRow->name;
  $deadline = $firstRow->deadline;
  $max_sub = $firstRow->max_sub;
  $quizQuestions = $firstRow->questions;

  //$result = array('max_sub' => $max_sub, 'quizname' => $quizName );
  $asd = array('max_sub' => $max_sub, 'quizname' => $quizName,);
  return $asd;

}

function getCurrentSubmissionForQuiz ($quizid, $userid) {
  $getCurrentNumberOfSubmissiosnSql = "SELECT * FROM `submissions` where `quiz_id` = '$quizid' AND `user_id` = '$userid' LIMIT 1 " ;
  $rows = MySQL::getRows($getCurrentNumberOfSubmissiosnSql);
  if (!empty($rows)) {
    $firstRow = $rows[0];
    $currentNumberOfSubmissions = $firstRow->submission_count;
    $bestPoints = $firstRow->result;
    $submissionId = $firstRow->id;

    $result = array('numberof_submission' => $currentNumberOfSubmissions, 'result' => $bestPoints, 'id' => $submissionId );
  } else {
    $result = array('numberof_submission' => 0, 'result' => 0 );
  }

  return $result;
}

function createTemplateForUnsubmittedQuiz ($count, $name, $deadline, $numberOfSubmission, $id) {
  $htmlElement = '
  <tr class="throwmeaway" data-id="'.$id.'">
    <td>'.$count.'</td>
    <td>'.$name.'</td>
    <td>'.$deadline.'</td>
    <td>'.$numberOfSubmission.'</td>
  </tr>
  ';

  return $htmlElement;
}

function countSubbmissionForQuiz ($quizId) {
  $result = MySQL::countEntry("submissions", "quiz_id", $quizId);

  return $result;
}

function checkIfTheresOpenQuizzes() {
  $currentDate = date("Y-m-d");


  $getAllOpenQuizzesSql = "SELECT * FROM `quizs` where `deadline` > '$currentDate' " ;

  $rows = MySQL::getRows($getAllOpenQuizzesSql);
  foreach ($rows as $row ) {
    $count++;
    $id = $row->id;
    //echo 'quiz_id: '.$id.' ';
    $name = $row->name;
    $deadline = $row->deadline;
    $numberOfSubmission = countSubbmissionForQuiz($id);
    $isThereAnySubmission = MySQL::checkUserSubmisson('`submissions`', '`quiz_id`', $id, '`user_id`', $_SESSION['user_id']);
    if ($isThereAnySubmission == 0 ) {
      //$result .= $name.", ";
      $tableHead = '<table id="" class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Quiz name</th>
            <th>Deadline</th>
            <th>Total number of submissions</th>
          </tr>
        </thead>
        <tbody>
    ';

    $tableFooter = '</tbody>
    </table>';
      $warningBox = '<div class="alert alert-warning alert-dismissible" role="alert">
      <strong>Kitöltetlen kvíz!</strong> Kedves '.$_SESSION['fullname'].'! Kitöltetlen kvízed van!

    </div>';
      $result .= createTemplateForUnsubmittedQuiz($count, $name, $deadline, $numberOfSubmission, $id);
    } else {
      $warningBox = '<div class="alert alert-success alert-dismissible" role="alert">
      Nincs kitöltetlen kvízed!
      <button type="button" class="btn btn-success pull-right showmyresultsbutton" data-toggle="collapse" data-target="#result-container">Show my results</button>
    </div>';
    }
    //$result .= '<a href="submitquiz.php?id="'.$id.'">'.$name.'</a> ';
  }

  //if (!empty($result)) {
    echo $warningBox.$tableHead.$result.$tableFooter;
  //}

  //return $result;

}

function getRandomQuestions ($limit) {
  $getRandomQuestionsSql = "SELECT * FROM `questions` where `is_active` = 1 ORDER BY rand() LIMIT $limit " ;
  $rows = MySQL::getRows($getRandomQuestionsSql);
  foreach ($rows as $row ) {
    $id = $row->id;
    $question = $row->question;

    $result .= $id.","; //id-s of questions
  }

  return $result;
}

function countQuestionsByTags($tag) {
  $result = MySQL::countEverything("questions", "tags", "%$tag%");

  return $result;
}

function creteListForQuestionTags () {
  $numberOfHtmlQuestions = countQuestionsByTags("html");
  $numberOfCssQuestions = countQuestionsByTags("css");

  echo '
  <ul class="list-group">
  <li class="list-group-item">
    <span class="badge">'.$numberOfHtmlQuestions.'</span>
    <code>html</code> questions
  </li>
  <li class="list-group-item">
    <span class="badge">'.$numberOfCssQuestions.'</span>
    <code>css</code> questions
  </li>
</ul>
  ';
}

function getAllQuizIds() {
  $currentDate = date("Y-m-d");
  $getAllOpenQuizzesSql = "SELECT * FROM `quizs` " ;
  $rows = MySQL::getRows($getAllOpenQuizzesSql);
  foreach ($rows as $row ) {
    $id = $row->id;
    $result[] = $id;
  }
  return $result;
}

function getQuizResults ($method) {
  $allQuizIds = getAllQuizIds();
  $numberOfQuizzes = count($allQuizIds);
  for ($i=0; $i<$numberOfQuizzes; $i++) {
    //get this quiz name
    $currentQuizid = $allQuizIds[$i];
    //echo $currentQuizid;
    $getAllOpenQuizzesSql = "SELECT * FROM `submissions` where `quiz_id` = '$currentQuizid' " ;
    $rows = MySQL::getRows($getAllOpenQuizzesSql);
    foreach ($rows as $row) {
      $id = $row->id;
      $userId = $row->user_id;
      $result = $row->result;
      $quiz_id = $row->quiz_id;
      //echo "userid: ".$userId.", result: ".$result.", quiz: ".$quiz_id;
      $finals[$quiz_id][$id] = array($result, $userId, $quiz_id);
    }
  }
  //var_dump($finals);
  for ($i=0; $i<$numberOfQuizzes; $i++) {
    $currentQuizid = $allQuizIds[$i];

    if ($method == "max") {
      $max = max($finals[$currentQuizid]);
      if (!is_null($max)) {
        //var_dump($max);  //dumping out the max array
        $userFullName = getUserById($max[1]);
        $quizName = generateQuizPage($max[2]);
        //echo $userFullName['fullname'];  //geetting back submission's owner
        echo '<li class="list-group-item"><i class="fa fa-user"></i>
        '.$userFullName['fullname'].' – <i class="fa fa-check-square-o"></i> '.$quizName['quizname'].'
        <span class="badge">'.$max[0].'</span>
        </li>';
      }
    } elseif ($method == "min") {
      $max = min($finals[$currentQuizid]);
      if (!is_null($max)) {
        //var_dump($max);  //dumping out the max array
        $userFullName = getUserById($max[1]);
        $quizName = generateQuizPage($max[2]);
        //echo $userFullName['fullname'];  //geetting back submission's owner
        echo '<li class="list-group-item"><i class="fa fa-user"></i>
        '.$userFullName['fullname'].' – <i class="fa fa-check-square-o"></i> '.$quizName['quizname'].'
        <span class="badge">'.$max[0].'</span>
        </li>';
      }
    }
  }
  //$differentQuizzes = count($finals);  // different quizzes in the array

}

function drawQuizResultBar ($userId) {
  $getAllResultForStudentSql = "SELECT * FROM `submissions` where `user_id` = '$userId' " ;
  $rows = MySQL::getRows($getAllResultForStudentSql);

  foreach ($rows as $row ) {
    $quiz_id = $row->quiz_id;
    $result = $row->result;
    $quizName = generateQuizPage ($quiz_id);
    if ($result == 100) {
      $class = "success";
    } else {
      $class = "warning";
    }
    echo '<div class="progress grade-progress">
  <div class="progress-bar grade-progressbar progress-bar-'.$class.'" role="progressbar" aria-valuenow="'.$result.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$result.'%;">
    '.$quizName['quizname'].'
    <span class="badge pull-right bradge-progress">'.$result.'/100</span>
  </div>
</div>';
  }
  $userResults[] = array('quiz_id' => $quiz_id, 'result' => $result );
  return $userResults;
}


function getQuizResultForUser ($userId) {
  $getAllResultForStudentSql = "SELECT * FROM `submissions` where `user_id` = '$userId' " ;
  $rows = MySQL::getRows($getAllResultForStudentSql);

  foreach ($rows as $row ) {
    $quiz_id = $row->quiz_id;
    $result = $row->result;
  }
  $userResults[] = array('quiz_id' => $quiz_id, 'result' => $result );
  return $userResults;
}

function getAllOpenExercises() {
  $currentDate = date("Y-m-d");
  $getAllOpenQuizzesSql = "SELECT * FROM `exercises` where `deadline` > '$currentDate' " ;
  $rows = MySQL::getRows($getAllOpenQuizzesSql);
  foreach ($rows as $row ) {
    $id = $row->exercise_id;
    $result[] = $id;
  }
  return $result;
}

function getAllOpenQuizzes() {
  $currentDate = date("Y-m-d");
  $getAllOpenQuizzesSql = "SELECT * FROM `quizs` where `deadline` > '$currentDate' " ;
  $rows = MySQL::getRows($getAllOpenQuizzesSql);
  foreach ($rows as $row ) {
    $id = $row->id;
    $result[] = $id;
  }
  return $result;
}

function countExerciseSubmissions ($limit) {
  $rows = MySQL::getRows($countSubmissionForQuizzes);
  $openExerciseIds = getAllOpenExercises();
  $numberOfOpenExercises = count($openExerciseIds);

  for ($i=0; $i<$numberOfOpenExercises; $i++) {
    $result = MySQL::countEntry('exercise_results', 'exercise_id', $openExerciseIds[$i]);
    //echo $result.", ";
    //$thisQuizDetails = generateQuizPage($openQuizIds[$i]);
    $currentId = $openExerciseIds[$i];
    $exerciseDetails = getExerCiseDetails($currentId);
    echo '<li class="list-group-item">
      <span class="badge">'.$result.'</span>
      '.$exerciseDetails['name'].'
    </li>';
  }

}

function countQuizSubmissions ($limit) {
  $rows = MySQL::getRows($countSubmissionForQuizzes);
  $openQuizIds = getAllOpenQuizzes();
  $numberOfOpenQuizzes = count($openQuizIds);

  for ($i=0; $i<$numberOfOpenQuizzes; $i++) {
    $result = MySQL::countEntry('submissions', 'quiz_id', $openQuizIds[$i]);
    //echo $result.", ";
    $thisQuizDetails = generateQuizPage($openQuizIds[$i]);
    echo '<li class="list-group-item">
      <span class="badge">'.$result.'</span>
      '.$thisQuizDetails['quizname'].'
    </li>';
  }

}

function getVersionNumber () {
  $file = "etc/ver.info";
  $line = fgets(fopen($file, 'r'));

  echo $line;
}

function CheckIfAnswerWasCorrect ($questionId, $givenAnswer) {
  //getcorrect answer for question
  $getCorrectAnswerForQuestionSql = "SELECT * FROM `answers` where `question_id` = '$questionId' AND `id` = '$givenAnswer' " ;
  $rows = MySQL::getRows($getCorrectAnswerForQuestionSql);
  $firstRow = $rows[0];

  $isRightChoise = $firstRow->is_right_choice;

  if ($isRightChoise) {
    $result = true;
  } else {
    $result = false;
  }

  return $result;

}

function getCurrentSubmissionForAssignments ($assignment_id, $userid) {
  $getCurrentNumberOfSubmissiosnSql = "SELECT * FROM `exercise_results` where `exercise_id` = '$assignment_id' AND `user_id` = '$userid' LIMIT 1 " ;
  $rows = MySQL::getRows($getCurrentNumberOfSubmissiosnSql);
  if (!empty($rows)) {
    $firstRow = $rows[0];
    $currentNumberOfSubmissions = $firstRow->submission_count;
    $bestPoints = $firstRow->result;
    $submissionId = $firstRow->id;

    $result = array('numberof_submission' => $currentNumberOfSubmissions, 'result' => $bestPoints, 'id' => $submissionId );
  } else {
    $result = array('numberof_submission' => 0, 'result' => 0 );
  }

  return $result;
}

function getAllExercises () {
  $getAllExercisesSql = "SELECT * FROM `exercises` ORDER BY `id` ASC  ";
  $rows = MySQL::getRows($getAllExercisesSql);
  $count = 0;
  foreach ($rows as $row ) {
    $count++;
    $id = $row->id;
    $name = $row->name;
    $deadline = $row->deadline;
    $owner = $row->owner;
    $maxpoints = $row->max_points;
    $minPoints = $row->min_points;
    $quizOwner = getUserDetails($owner);

    echo '<tr class="clickable-row" data-id="'.$id.'">
    <td>'.$count.'</td>
    <td>'.$name.'</td>
    <td>'.$minPoints.'</td>
    <td>'.$maxpoints.'</td>
    <td>'.$deadline.'</td>
    <td>'.$quizOwner['fullname'].'</td>
    <td>
      <i class="fa fa-pencil delthis action-icon"></i>
      <i class="fa fa-times edithis action-icon"></i>
    </td>
    </tr>
    ';
  }
}

function getExerCiseDetails($id) {
  $getExerciseDetailsSql = "SELECT * FROM `exercises` where `exercise_id` = '$id' " ;
  $rows = MySQL::getRows($getExerciseDetailsSql);
  $firstRow = $rows[0];

  $maxPoint = $firstRow->max_points;
  $name = $firstRow->name;
  $isOpen = $firstRow->is_open;

  $result = array('max_points' => $maxPoint, 'name' => $name, 'exercise_id' => $id, 'is_open' => $isOpen);

  return $result;

}

function checkIfExerciseIsSubmittedByUser ($exericseId, $userId) {
 $checkUserSubmissionForExercise = "SELECT * FROM `exercise_results` where `exercise_id` = '$exericseId' " ;
 $rows = MySQL::getRows($checkUserSubmissionForExercise);
 $firstRow = $rows[0];

 $submissionCount = $firstRow->submission_count;
 $resultPoints = $firstRow->result;


 $result = array("result" => $resultPoints, 'submission_count' => $submissionCount);
 return $result;
}

function checkIfTheresOpenExercises ($method="user") {

  $openExerciseIds = getAllOpenExercises();
  $numberOfOpenExercises = count($openExerciseIds);

  if ($method == "admin") {
    for ($i=0; $i<$numberOfOpenExercises; $i++) {
      $result = MySQL::countEntry('exercises', 'exercise_id', $openExerciseIds[$i]);
      $currentId = $openExerciseIds[$i];
      $exerciseDetails = getExerCiseDetails($currentId);
      if ($exerciseDetails['is_open'] == 0) {
        $isOpenClass = "closedbadge";
        $text = "closed";
      } else {
        $isOpenClass = "openbadge";
        $text = "open";
      }

      echo '<div class="list-group">
   <a href="assignmentresult.php?id='.$exerciseDetails['exercise_id'].'" class="list-group-item">
     <h4 class="list-group-item-heading">'.$exerciseDetails['name'].'</h4>
     <span class="badge '.$isOpenClass.'">'.$text.'</span>
     <p class="list-group-item-text">HTML Gyakorlófeladat I.</p>
   </a>
  </div';
    }
  } elseif ($method=="user") {
    for ($i=0; $i<$numberOfOpenExercises; $i++) {
      $result = MySQL::countEntry('exercises', 'exercise_id', $openExerciseIds[$i]);
      $currentId = $openExerciseIds[$i];
      $exerciseDetails = getExerCiseDetails($currentId);
      $lastSubmission = getCurrentSubmissionForAssignments ($currentId, $_SESSION['user_id']);
      if ($exerciseDetails['is_open'] == 0) {
        $isOpenClass = "closedbadge";
        $text = "closed";
        $progressDiv = "";
      } else {
        if (!empty($lastSubmission)) {
          //get max point for this exercise
          $maxPointForThisExercise = getExerCiseDetails($currentId);
          $text = $lastSubmission['result'].'/'.$maxPointForThisExercise['max_points'];
          if ($lastSubmission['result'] < $maxPointForThisExercise['max_points']) {
            $isOpenClass = "warningbadge";
            //TODO: get result for this submission
            $percent = $lastSubmission['result'] /  $maxPointForThisExercise['max_points'] * 100;
            $progressDiv = '
            <div class="progress">
              <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: '.$percent.'%">
                <span class="sr-only">40% Complete (success)</span>
              </div>
            </div>';
            //$addBorderClass = 'exercise-done';
          }
        } else {
          //show its open
          $isOpenClass = "openbadge";
          $text = "open";
        }
      }

      echo '<div class="list-group">
   <div class="exercise-container">
   <a href="submitassignment.php?id='.$exerciseDetails['exercise_id'].'" class="list-group-item '.$addBorderClass.'">
     <h4 class="list-group-item-heading">'.$exerciseDetails['name'].'</h4>
     <span class="badge '.$isOpenClass.'">'.$text.'</span>
     <p class="list-group-item-text">HTML Gyakorlófeladat I.</p>
   </a>
   <div class="progress-container">
   '.$progressDiv.'
   </div>
   </div>
  </div';
    }
  }

}

function getUserDetails_ ($userId) {
  $getUserCredentialsSql = "SELECT * FROM `users` where `id` = '$userId' LIMIT 1" ;
  $rows = MySQL::getRows($getUserCredentialsSql);
  $firstRow = $rows[0];

  $loginUsername = $firstRow->username;
  $loginPassword = $firstRow->password;
  $loginFullName = $firstRow->fullname;
  $loginNeptun = $firstRow->neptun;
  $loginUserLevel = $firstRow->user_level;
  $loginUserId = $firstRow->id;
  $loginUserEmail = $firstRow->email;

  $result = array("email" => $loginUserEmail, 'user_level' => $loginUserLevel, 'neptun' => $loginNeptun, 'username' => $loginUsername, 'password' => $loginPassword, 'fullname' => $loginFullName, 'user_id' => $loginUserId );
  return $result;

}

function checkIfUserHasChangedTheDefaultPassword ($userId) {

  $userDetails = getUserDetails_ ($userId);
  $userPassword = $userDetails['password'];
  $defaultPassword = "defPassword123";

  if (crypt($defaultPassword, $userPassword) == $userPassword) {
    echo '
    <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Figyelem!</strong> Még nem változtattad meg az alapértelmezett jelszavad!
   </div>
    '
    ;
  } else {
    //
  }

}

function drawRowForSubmissionResult ($userDetails, $result, $exerciseDetails) {
  $div = '
    <li class="list-group-item">
      <span class="badge">'.$result.'</span>
      '.$userDetails['fullname'].'
    </li>
  ';
  //var_dump($userDetails);
  return $div;
}

function getSubmissionsForExercise ($exerciseId) {
  $getAllExerciseSubmissionsSql = "SELECT * FROM `exercise_results` WHERE `exercise_id` = $exerciseId ORDER BY `id` ASC  ";
  $rows = MySQL::getRows($getAllExerciseSubmissionsSql);
  $count = 0;
  foreach ($rows as $row ) {
    $userId = $row->user_id;
    $result = $row->result;
    $exerciseDetails = getExerCiseDetails($exerciseId);
    $userDetails = getUserById($userId);
    $div = drawRowForSubmissionResult($userDetails, $result, $exerciseDetails);

    echo $div;
  }
}

?>
