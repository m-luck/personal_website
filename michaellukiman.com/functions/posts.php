<?php
//create_cat.php
include 'connect.php';
include 'header.php';
?>
<a href="michaellukiman.com">BACK</a><br>
<div style="width:60vw;">
<?
$sql = 'SELECT
			*
		FROM
			logs
		WHERE
			link="' . mysql_real_escape_string($i) . '" AND category=3
		ORDER BY id DESC LIMIT 1';

$result = mysql_query($sql);
if(!$result){
	echo 'The posts could not be displayed, please try again later.';}
else{
	if(mysql_num_rows($result) == 0){
		echo 'This post does not exist.';}
	else{
		while($row = mysql_fetch_array($result)){
        	echo 
        	'<h1>' . $row['title'] . '</h1>
        	<h3>' . $row['sub1'] . '</h3>
        	<p>' . $row['body1']  . '</p>
        	</div>';}
}
}
include 'footer.php';
?>
