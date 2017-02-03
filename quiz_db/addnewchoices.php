<?php

$choice1 = $_POST['choice1'];
$choice2 = $_POST['choice2'];
//$id = $_POST['id'];

$result = array('choice1' => $choice1, 'choice2' => $choice2 );

echo json_encode($result);

?>
