<?php
require_once ('connectvars.php');

// POST-ARRAY UITLEZEN
$voornaam = $_POST['voornaam'];
$tussenvoegsel = $_POST['tussenvoegsel'];
$achternaam = $_POST['achternaam'];
$mailadres = $_POST['mailadres'];

// 1. CONNECTIE MAKEN MET DE DATABASE
$dbc = mysqli_connect('localhost','22937_cas','22937','22937_carl') or die ('Error connecting.');
// 2. OPDRACHT (QUERY) SCHRIJVEN VOOR DE DATABASE
$query = "INSERT INTO nieuwsbrief VALUES (0,'$voornaam','$tussenvoegsel','$achternaam','$mailadres')";
// 3. QUERY UITVOEREN
$result = mysqli_query($dbc,$query) or die ('Error querying.');
// 4. VERBINDING VERBREKEN
mysqli_close($dbc);

// BEVESTIGEN DAT DATA IN DATABASE STAAT
if ($result) {
    echo 'De volgende gegevens zijn toegevoegd aan de database:<br>';
    echo $voornaam . '<br>';
    echo $tussenvoegsel . '<br>';
    echo $achternaam . '<br>';
    echo $mailadres . '<br>';
} else {
    echo 'Sorry, er is iets misgegaan. Probeer het opnieuw.';
}
?>

<a href="index.php">Klik hier om terug te keren naar de homepage</a><br><br>