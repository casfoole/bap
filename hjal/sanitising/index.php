<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>sanitising</title>
</head>
<body>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <label>postcode:<input type="text" name="postcode"></label>
    <input type="submit" name="submit">
</form>
<center>
<?php
if(isset($_POST['submit'])){
$_postcode = $_POST['postcode'];
  if  (preg_match('/[0-9]{4}[A-Z]{2}/i',$_postcode)){
        echo "goeie jongen je hebt het gedaan.";
    }else {
      echo "stoute jongen doe het opnieuw";
  }
}
?>
</center>
</body>
</html>

