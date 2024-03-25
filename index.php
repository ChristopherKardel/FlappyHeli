<?php

error_reporting(E_ERROR | E_PARSE); //Keine Warnings anzeigen

$servername = "http://192.168.178.50/FlappyHeli";
$username = "admin";
$password = "bti";
$db = "FlappyHeli"; //Datenbank Name

// Verbindung herstellen
$mysqli = new mysqli($servername, $username, $password, $db);

// Überprüfen, ob die Verbindung erfolgreich war
if ($mysqli->connect_error) {
    die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
}

$register = $_POST['register'];
$update_score = $_POST['update_score'];
$username = $_POST['username'];
$highscore = $_POST['highscore'];
$new_highscore = $_POST['new_highscore'];
$id = $_POST['id'];
 


if($register == "1"){
    $querry = "INSERT INTO userdata (Username, Highscore) VALUES ('" . $username . "','" . $highscore . "');";
    //Send zur Datenbank und lasse eintragen
    $result = $mysqli->query($querry);
    if(!$result) {
        printf("%s\n", $mysqli -> error);
        echo("L");
        exit();
    }else{
        
        
        //Gib ID Raus
        echo $mysqli -> insert_id . "\t";
    }


}else if($update_score == "1") {
    //$querry = "UPDATE userdata SET Highscore = '" . $new_highscore . "' WHERE id = '" . $id . "';";
    $querry = "UPDATE `userdata` SET `Highscore` = '" . $new_highscore . "' WHERE `userdata`.`id` = '" . $id . "';";
    //$querry = "UPDATE `userdata` SET `Highscore` = '" . $_POST['new_highscore'] . "' WHERE `userdata`.`id` = '" . $_POST['id'] . "';";
    //$querry = "UPDATE `userdata` SET `Highscore` = '1000' WHERE `userdata`.`id` = 64;";
    //Sende zur Datenbank und lasse eintragen
    $result = $mysqli->query($querry);
    if (!$result) {
        printf("%s\n", $mysqli -> error);
        echo("L");
        exit();
    }else{
        echo("S");
    }
}
?>
