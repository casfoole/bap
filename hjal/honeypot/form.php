<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
</head>
<body>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'post')
    {
        if (!isset($_SESSION['csrf']) || $_SESSION['csrf'] !== $_POST['csrf'])
            throw new RuntimeException('csrf attack');
    }

    $key = sha1(microtime());
    $_SESSION['csrf'] = $key;

include "zoek.php";
?>
<br>
<form action="opvang.php" method="post">
    <input type="hidden" name="csrf" value="<?php echo $key; ?>">
    <label>Username<input name="username" type="text"></label>
    <label>Password<input name="password" type="password"></label>
    <input type="submit">
</form>

</body>
</html>