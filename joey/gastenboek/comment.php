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
    <form method="post" action="commentsend.php">
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
</body>
</html>
