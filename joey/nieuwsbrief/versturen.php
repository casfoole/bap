<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bericht versturen</title>
</head>
<body>
    <form method="post" action="verwerk_versturen.php" id="berichtform">
        <label for="berichtTitel">Titel: </label><input type="text" id="berichtTitel" name="berichtTitel">
        <input type="submit">
    </form><br>

       <textarea placeholder="Plaats text hier." rows="10" cols="45" form="berichtform" name="berichtText"></textarea>
</body>
</html>