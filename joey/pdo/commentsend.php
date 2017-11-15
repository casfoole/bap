<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>doorschakel</title>
</head>
<body>
<center>
    <?php
    if (isset($_POST['submit'])){
        //Connectie maken met database
        $dbc = new PDO('mysql:host=localhost;dbname=22937_carl','22937_cas','22937');
        //Filtering the strings with sanitize
        $username = filter_var($_POST['naam'], FILTER_SANITIZE_STRING);
        $comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);

        //Prepared statement ontwerpen
        $stmt = $dbc->prepare("INSERT INTO gasten (naam, comment)
               VALUES (:naam,:comment)");

        //Parameters binden
        $stmt->bindParam(':naam',$username);
        $stmt->bindParam(':comment',$comment);

        echo "Bedankt voor uw recentie.";
        //Statement afschieten
        $stmt->execute() or die('error quering after pdo');

        //Sending email verificatie
        $to = "22937@ma-web.nl";
        $subject = "verificatie";
        $txt = "Er is een nieuwe reactie geplaats in het gastenboek!";
        $headers = "From: 22937@ma-web.nl";
        mail($to,$subject,$txt,$headers);
        echo "<br><a href='index.php'>Ga naar gastenlijst.</a>";
        echo "<br><a href='comment.php'>return</a>";

            $stmt = null;
            $dbc = null;
        header('Location: index.php');

    }
    ?>

</center>
</body>
</html>