<?php
//$path = '/includes';
//set_include_path(get_include_path() . PATH_SEPARATOR . $path);
//To connect I had to use newpaltz vpn
//Else kept getting access denied erro
$server = "wyvern.cs.newpaltz.edu";
$username = "se_20s_g05";
$password = "yzib3q";
$db = "se_20s_g05_db";
$debug = "true";

$dbconn = mysqli_connect($server, $username, $password, $db);

if ($dbconn->connect_error) {
   die('Could not connect:');
}

if($debug == "true"){
	echo nl2br("\nDEBUG:\n");
	echo nl2br("3 \n 2 \n 1...");
	echo nl2br("\n Connected successfully\n");
	echo ("<br /><br /><br />");
}

return $dbconn

?>