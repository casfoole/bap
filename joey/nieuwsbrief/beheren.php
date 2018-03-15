<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css"
    <title>Beheren</title>
</head>
<body>
<?php
    //Connectie maken met db
    $dbc = mysqli_connect('localhost','22937_cas','22937','22937_carl');

    $query = "SELECT * FROM nieuwsbrief";
    $result = mysqli_query($dbc,$query) or die ('Error querying');

    echo '<table>';

    while($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        $voornaam = $row['voornaam'];
        $tussenvoegsel = $row['tussenvoegsel'];
        $achternaam = $row['achternaam'];
        $mailadres = $row['mailadres'];

        echo '<tr>';
        echo "<td>$id</td><td>$voornaam</td><td>$tussenvoegsel</td><td>$achternaam</td><td>$mailadres</td>";
        echo '<td><a href="delete.php?id=' . $id . '">DELETE</a> </td>';
        echo '<td><a href="edit.php">EDIT</a> </td>';
        echo '</tr>';
    }

    echo '<table>';
?>
</body>
</html>