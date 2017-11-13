<!doctype html>
<html lang=nl>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Gastenlijst</title>
</head>
<body>
<center>
    <div class="red">
    <h1>Gastenlijst</h1>
    <p>Hier vind je alle reactie van vorige gasten.</p><p>klik <a href="comment.php" style="color: #b1dfbb">hier</a> als je een reactie wilt geven.</p>
    </div>
    <br><br>

        <?php
    $dbc = mysqli_connect('localhost','22937_cas','22937','22937_carl') or die ('Error_indexconDB');
    $sql = "SELECT * FROM gasten ORDER BY id DESC";
    $result = mysqli_query($dbc,$sql);
        $patterns = array();
        $patterns[0] = '/cunt/i';
        $patterns[1] = '/shit/i';
        $patterns[2] = '/fuck/i';
        $patterns[3] = '/kanker/i';
        $patterns[4] = '/faggot/i';
        $replacements = array();
        $replacements[0] = '****';
        $replacements[1] = '****';
        $replacements[2] = '****';
        $replacements[3] = '******';
        $replacements[4] = '******';
        if ($result->num_rows > 0) {
        echo "<table border='1'><tr><th>naam</th><th>comment</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["naam"]. "</td><td>" . preg_replace($patterns, $replacements, $row["comment"]) . "</td></tr>";
        }
        echo "</table>";
        } else {
            echo "geen resultaten";
        }
    ?>
</center>
</body>
</html>