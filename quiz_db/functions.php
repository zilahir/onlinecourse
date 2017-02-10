<?php
session_start();
include_once("MySQL.php");
MySQL::connect();

function getAllQuestions () {
    $getAllProjectsSql = "SELECT * FROM `questions` ORDER BY `id` ASC  ";
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
    <i class="fa fa-times action-icon"></i>
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

function checkForPendingQuizes ($userId) {

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

    //$isadmin = $firstRow->isadmin;

    //$result = array('username' => $loginUsername, 'password' => $loginPassword, 'fullname' => $loginFullName, 'user_level' => $loginUserLevel);
    $result = array('user_level' => $loginUserLevel, 'neptun' => $loginNeptun, 'username' => $loginUsername, 'password' => $loginPassword, 'fullname' => $loginFullName, 'user_id' => $loginUserId );

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

function getUserDetails ($username) {
    $getUserDetailsSql = "SELECT * FROM `users` where `username` = '$username' LIMIT 1" ;
    $rows = MySQL::getRows($getUserDetailsSql);
    $firstRow = $rows[0];

    $usersFullname = $firstRow->fullname;

    $result = array('fullname' => $usersFullname, );

    return $result;
}

function generateQuizPage ($quizId) {
  $getQuizDetailsSql = "SELECT * FROM `quizs` WHERE `id` = $quizId  ";
  $rows = MySQL::getRows($getQuizDetailsSql);
  $firstRow = $rows[0];
  $count = 0;

  $quizName = $firstRow->name;
  $deadline = $firstRow->deadline;

  return $quizName;

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

function createTemplateForUnsubmittedQuiz ($count, $name, $deadline, $numberOfSubmission) {
  $htmlElement = '
  <tr>
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
      $result .= createTemplateForUnsubmittedQuiz($count, $name, $deadline, $numberOfSubmission);
    }
    //$result .= '<a href="submitquiz.php?id="'.$id.'">'.$name.'</a> ';
  }

  echo $tableHead.$result.$tableFooter;

  //return $result;

}

?>
