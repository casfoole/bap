<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MD2_Toets1_MD2B_Cas_Foole</title>
</head>
<body>
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
    <br>
    <label>Merknaam:<input type="text" name="merknaam" id="merknaam"></label><br>
    <label>Soort:<input type="text" name="soort" id="soort"></label><br>
    <label>Prijs:<input type="text" name="prijs" id="prijs"></label><br>
    <input type="submit" name="submit" value="voeg product toe">
    <br>
</form>
<?php
$klas = "MD2B";
$voornaam = "Cas";
$tussenvoegsel = "";
$achternaam = "Foole";

echo $klas . " " . $voornaam . " " . $tussenvoegsel . " " . $achternaam . "<br>";

$dbc = mysqli_connect("localhost","MD2_username","MD2_password","md2_toets1") or die ('Error connecting db');

if (isset($_POST['submit'])){
    $merknaam = filter_var($_POST['merknaam'], FILTER_SANITIZE_STRING);
    $soort = filter_var($_POST['soort'], FILTER_SANITIZE_STRING);
    $prijs = filter_var($_POST['prijs'], FILTER_SANITIZE_NUMBER_INT);

    $queryform = "INSERT INTO product (merknaam, soort, prijs) VALUES ('$merknaam', '$soort', '$prijs')";
    $resultform = mysqli_query($dbc,$queryform) or die ('Error querying from');


}

$query = "SELECT * FROM product";
$result = mysqli_query($dbc,$query) or die ('Error querying');
while ($row = mysqli_fetch_array($result)){
echo "<br>" . $row['product_id'];
echo " " . $row['merknaam'];
echo " " . $row['soort'];
echo " " . $row['prijs'];
}
?>

</body>
</html>