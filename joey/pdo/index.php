<!doctype html>
<html lang=nl>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Gastenlijst PDO</title>
</head>
<body>
<center>
    <div class="red">
    <h1>Gastenlijst</h1>
    <p>Hier vind je alle reactie van vorige gasten.</p><p>klik <a href="comment.php" style="color: #b1dfbb">hier</a> als je een reactie wilt geven.</p>
    </div>
    <br><br>

        <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        //Connectie maken met database
        $dbc = new PDO('mysql:host=localhost;dbname=22937_carl','22937_cas','22937');
        //Prepared statement ontwerpen
        $stmt = $dbc->prepare("SELECT * FROM gasten WHERE 1=1 ORDER BY id DESC"); // naam = :naam AND comment = :comment
        //Parameters binden
        $stmt->bindParam(':naam',$naam);
        $stmt->bindParam(':comment',$comment);
        //Statement afschieten
        $stmt->execute() or die ('Error after querying pdo');

        //Making patterns
        $patterns = array();
        $patterns[0] = '/cunt/i';
        $patterns[1] = '/shit/i';
        $patterns[2] = '/fuck/i';
        $patterns[3] = '/kanker/i';
        $patterns[4] = '/faggot/i';
        $patterns[5] = '/pussy/i';
        //Making Replacements for patterns
        $replacements = array();
        $replacements[0] = '****';
        $replacements[1] = '****';
        $replacements[2] = '****';
        $replacements[3] = '******';
        $replacements[4] = '******';
        $replacements[5] = '*****';
        //check of er iets in de database staat
        $rows = $stmt->fetchAll();

        if (count($rows) > 0) {
        echo "<table><tr><th>naam</th><th>comment</th></tr>";
        //While loop
            $result_count=0;
        for($i=0;$i<count($rows);$i++)
        {
              echo "<tr><td>" . ($rows[$i]['naam']. "</td><td>" . preg_replace($patterns, $replacements, ($rows[$i]['comment']))) . "</td></tr>";

        }
        echo "</table>";
        } else {
            echo "geen resultaten";
        }

        $stmt = null;
        $dbc = null;
    ?>
</center>
</body>
</html>
