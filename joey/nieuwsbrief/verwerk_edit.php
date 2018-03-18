<?php
$id = $_GET['id'];
$voornaam = $_GET['voornaam'];
$tussenvoegsel = $_GET['tussenvoegsel'];
$achternaam = $_GET['achternaam'];
$mailadres = $_GET['mailadres'];

$id = $_GET['id'];
$dbc = mysqli_connect('localhost','22937_cas','22937','22937_carl');
$query = "UPDATE nieuwsbrief ";
$query .="SET voornaam = '$voornaam', tussenvoegsel = '$tussenvoegsel', achternaam = '$achternaam', mailadres = '$mailadres'";
$query .="WHERE id = '$id'";

$result = mysqli_query($dbc,$query) or die ('Error querying');
header("location: beheren.php");