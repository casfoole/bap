<?php
$id = $_GET['id'];
$dbc = mysqli_connect('localhost','22937_cas','22937','22937_carl');

$query = "DELETE FROM nieuwsbrief WHERE id = '$id'";
$result = mysqli_query($dbc,$query) or die ('Error querying');
header("location: beheren.php");