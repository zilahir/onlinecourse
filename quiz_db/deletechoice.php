<?php

include_once("MySQL.php");
MySQL::connect();
$idToDelete = $_POST['idToDelete'];

MySQL::delete('answers', $idToDelete);

echo json_encode($idToDelete);

 ?>
