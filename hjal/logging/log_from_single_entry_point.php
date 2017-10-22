<?php
require_once("logfunction.php"); // geef deze een logischer naam,  maar voor deze demo is 1,2,3 wel handig

$path=$_SERVER['QUERY_STRING'];
$path=strtolower($path);// alles naar kleine letters.
echo "URL: ".$path;
//According to RFC 3986 the valid characters for the path component are:
//a-z A-Z 0-9 . - _ ~ ! $ & ' ( ) * + , ; = : @
// wij maken het echter iets strikter.. whitelisting


$clean_path=preg_replace("/[^a-z0-9_\.\-\/]/", '', $path);

echo("<hr>request_logged :$clean_path"); // test it


logEvent("requestPage",$clean_path);
// in je router werk je verder met clean_path.. :)
// WAT TE DOEN..


switch($clean_path)
{
    case "users/":
    case "users/index.html":
    case "users/index.php":
        // include de users page.
        break;
    case "data/":
        // include iets met data?
        break;
    default:
        logEvent("requested Unknown Page",$clean_path);
}
// test dit script door verschillende niet bestaande urls aan te roepen binnen deze directory.
?>