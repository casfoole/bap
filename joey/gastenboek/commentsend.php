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
$dbc = mysqli_connect('localhost','22937_cas','22937','gastenboek') or die ('Error-connectDB');
$username = filter_var($_POST['naam'], FILTER_SANITIZE_STRING);
$comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);

if (!empty($username && $comment)) {
    echo "Bedankt voor uw recentie.";
    $_query = "INSERT INTO gasten (naam, comment) 
               VALUES ('$username', '$comment')";
    $result = mysqli_query($dbc,$_query);

    $to = "22937@ma-cloud.nl";
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
    echo "<a href='comment.php'>return</a>";

}}
?>
</center>
</body>
</html>