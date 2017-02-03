<?php

include_once("MySQL.php");
MySQL::connect();

function getAllQuestions () {
    $getAllProjectsSql = "SELECT * FROM `questions` ORDER BY `id` ASC  ";
    $rows = MySQL::getRows($getAllProjectsSql);

    foreach ($rows as $row ) {

      $id = $row->id;
      $question = $row->question;
      $isActive = $row->is_active;

      if ($isActive) {
        $icon = '<i class="fa fa-check"></i>';
      } else {
        $icon = '<i class="fa fa-times"></i>';
      }

      echo '<tr data-id="'.$id.'">
      <td>'.$id.'</td>
      <td>'.$question.'</td>
      <td>'.$icon.'</td>
      <td>
        <i class="fa fa-pencil action-icon"></i>
        <i class="fa fa-times action-icon"></i>
      </td>
      </tr>
      ';
    }

}


?>
