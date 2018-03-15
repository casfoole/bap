<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>baptoets Cas Foole</title>
</head>
<body>
    <?php
        //AANMAKEN VARIABLEN
        $klas = "MD2C";
        $voornaam = "Cas";
        $achternaam = "Foole";
        $leeftijd = 17;

        echo $klas . " " . $voornaam . " " . $achternaam;

        //CONTROLEN OF 18 JAAR OF OUDER
        if ($leeftijd < 18){
            echo "Als je " . $leeftijd . " jaar of ouder bent mag je nog geen eigen bedrijf starten.";
        }
    ?>
    <form action="process.php" method="post">
        <label>voornaam:    <input type="text" name="voornaam"></label><br>
        <label>achternaam:  <input type="text" name="achternaam"><br>
        <label>leetijd:     <input type="text" name="leeftijd"><br>
                            <input type="submit" value="GO!">

    </form>
</body>
</html>