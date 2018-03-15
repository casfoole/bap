<?php
//AANMAKEN VARIABLEN
$voornaam = $_POST["voornaam"];
$achternaam = $_POST["achternaam"];
$leeftijd = $_POST["leeftijd"];

echo "Je hebt de volgende gegevens ingevuld. <br>" . $voornaam . "<br>" . $achternaam . "<br>" . $leeftijd;

//CONNECTIE MAKEN MET DATABASE
$dbc = mysqli_connect('localhost','root','root','');
$query = "INSERT INTO studenten_12345 VALUES (0,'$voornaam','$achternaam','$leeftijd')";
$result = mysqli_query($dbc,$query) or die ("Error querying!");

//DATABASE SLUITEN
mysqli_close($dbc);

//TESTEN OF ER IETS MISGEGAAN IS
if ($result){
    echo "<br> Uw gegevens zijn succesvol toegevoegd aan de database.";
}else{
    echo "Helaas, er is iets misgegaan. Probeer het later opnieuw.";
}


