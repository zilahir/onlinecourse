<?php

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

    $question = array('question' => $question, 'id' => $id, 'is_active' => $isActive, 'desc' => $description );
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

function getUserCredentials ($username, $password) {
    $getUserCredentialsSql = "SELECT * FROM `users` where `username` = '$username' LIMIT 1" ;
    $rows = MySQL::getRows($getUserCredentialsSql);
    $firstRow = $rows[0];

    $loginUsername = $firstRow->username;
    $loginPassword = $firstRow->password;
    $loginFullName = $firstRow->fullname;
    $loginNeptun = $firstRow->neptun;
    $loginUserLevel = $firstRow->user_level;

    //$isadmin = $firstRow->isadmin;

    //$result = array('username' => $loginUsername, 'password' => $loginPassword, 'fullname' => $loginFullName, 'user_level' => $loginUserLevel);
    $result = array('neptun' => $loginNeptun, 'username' => $loginUsername, 'password' => $loginPassword, 'fullname' => $loginFullName);

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

    $numberOfQuestions = getNumberOfQuestionsForAQuiz($questions);


    echo '<tr class="clickable-row" data-id="'.$id.'">
    <td>'.$count.'</td>
    <td>'.$name.'</td>
    <td>'.$numberOfQuestions.'</td>
    <td>'.$deadline.'</td>
    </tr>
    ';
  }

}

?>
