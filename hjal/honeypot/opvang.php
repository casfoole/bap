<?php

require_once "logging.php";

logEvent("pageload","opvang.php");

$username ="";
$password ="";
if (!empty($_REQUEST['username'])){

    $username = $_REQUEST['username'];
}else{
    echo "notgood";
}
if (!empty($_REQUEST['password'])){

    $password = $_REQUEST['password'];
}else{
    echo "notgood";
}

logEvent("inlog",$username,"&",$password);

echo "good job";

