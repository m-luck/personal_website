<?php
//connect.php
$server	= 'localhost';
$username	= 'gamepeni_public';
$password	= 'iseeyou';
$database	= 'gamepeni_posts';

if(!mysql_connect($server, $username,  $password))
{
 	exit('Error: could not establish database connection');
}
if(!mysql_select_db($database))

{
 	exit('Error: could not select the database');
}

	session_start();
?>
