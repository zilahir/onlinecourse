<?php

$choice1 = $_POST['choice1'];
$choice2 = $_POST['choice2'];
$id = $_POST['questionId'];

$result = array('choice1' => $choice1, 'choice2' => $choice2, 'id' => $id );

echo json_encode($result);

?>
