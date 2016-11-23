<?php
function connecttoDB(){

$servername = "localhost";
$username = "root";
$password = "123456";
$name = "e-news";
// Create connection
$conn =  mysql_connect("$servername", "$username", "$password");
	mysql_query("SET NAMES 'utf8'",$conn);
    mysql_query("default-character-set=greek",$conn);




	if (!$conn) {
   die("<p>Could not connect to server: "  . mysql_error() . "</p>");
} 
$dbSelection = mysql_select_db("$name", $conn);
		if(!$dbSelection) {
			die("<p>Could not select database: " . mysql_error() . "</p>");
		}
return $conn;
}
?>