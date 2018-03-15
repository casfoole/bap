<?php
$dbc = mysqli_connect('localhost','22937_cas','22937','22937_carl');

$voornaam = 'Fill';
$tussenvoegsel = 'de';
$achternaam = 'Database';
$mailadres = 'vulling@taart.com';
$query = "INSERT INTO nieuwsbrief VALUES (0,'$voornaam','$tussenvoegsel','$achternaam','$mailadres')";

for ($i = 0; $i <10; $i++){
    $result = mysqli_query($dbc,$query) or die ('Error querying.');
}