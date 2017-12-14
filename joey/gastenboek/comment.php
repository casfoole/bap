<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Reactie</title>
</head>
<body>
<center>
<div class="red">
    <h1>Gastenboek</h1>
    <p>Laat een bericht achter in ons gastenboek.</p>
    <p>klik <a href="index.php" style="color: #b1dfbb">hier</a> om naar de beginpagina te gaan.</p>

</div>
    <br>
<div class="formulier">
    <form method="post" action="comment.php">
        <div class="input">
            <input type="text" name="naam" placeholder="Volledige naam" class="Naam" />
                <br><br>
            <textarea placeholder="Reactie" name="comment" class="reactie" style="height: 150px; width: 300px"></textarea>
                <br><br>
            <input type="submit" value="Submit" name="submit">
        </div>
    </form>
</div>
</center>
<?php
if (isset($_POST['submit'])){
    $dbc = mysqli_connect('localhost','22937_cas','22937','22937_carl') or die ('Error-connectDB');
    $username = filter_var($_POST['naam'], FILTER_SANITIZE_STRING);
    $comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);

//    if (!empty($username && $comment)) {
        echo "Bedankt voor uw recentie.";
        $_query = "INSERT INTO gasten (naam, comment)
               VALUES ('$username', '$comment')";
        $result = mysqli_query($dbc,$_query);

        $to = "22937@ma-web.nl";
        $subject = "verificatie";
        $txt = "Er is een nieuwe reactie geplaats in het gastenboek!";
        $headers = "From: 22937@ma-web.nl";
        mail($to,$subject,$txt,$headers);
        mysqli_close($dbc);
        echo "<br><a href='index.php'>Ga naar gastenlijst.</a>";
        echo "<br><a href='comment.php'>return</a>";

    }else{
        echo "Sorry maar uw heeft niet alle vakken ingevuld,<br>
          probeer het alstublieft opnieuw.";


}
?>

</body>
</html>
