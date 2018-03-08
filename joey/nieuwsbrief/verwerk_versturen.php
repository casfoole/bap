<?php
$berichtTitel = $_POST['berichtTitel'];
$berichtText = $_POST['berichtText'];
$from = "KoopEenFiets@eenfiets.nl";

        $dbc = mysqli_connect('localhost','22937_cas','22937','22937_carl');
        $query = "SELECT * FROM nieuwsbrief";
        $result = mysqli_query($dbc,$query) or die ('Error querying');

        while($row = mysqli_fetch_array($result)){
            $onvangers = $row['mailadres'];
            mail($onvangers, $berichtTitel, $berichtText,'from ' . $from);
            echo "emails verzonden naar " . $onvangers . ".<br>";
}
?>

<a href="index.php">Klik hier om terug te keren naar de homepage</a><br><br>
