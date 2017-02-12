<?php

include_once("MySQL.php");
MySQL::connect();
$idToDelete = $_POST['idToDelete'];

MySQL::delete('questions', $idToDelete);

echo json_encode($idToDelete);

 ?>
