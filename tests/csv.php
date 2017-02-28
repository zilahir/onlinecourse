<?php

$handle = fopen("csv.csv", "r");
for ($i = 0; $row = fgetcsv($handle ); ++$i) {
    $generatedUserName = createUserName($row[0]);
    //echo $row[0].' '.$firstLetter.'<br/>';
    $userEmail = $row[1];
    //$userNeptun = $row[2];
    $userPassword = generatePassword();

    echo $row[0].', //neptun//'.$generatedUserName.', '.$userEmail.', '.$userPassword.'<br/>';
}
fclose($handle);


function generatePassword($length = 5) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    $password = crypt($randomString);
    return $password;
}

function createUserName ($fullName) {
  $fullName = strtolower($fullName);
  $nameArray = explode(" ", $fullName);
  $firstName = $nameArray[0];
  $lastName = $nameArray[1];
  $firstLetter = $firstName[0];
  $result = $firstLetter.$lastName;
  return $result;

}

?>
