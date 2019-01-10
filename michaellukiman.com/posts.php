<?php
//create_cat.php
include 'connect.php';
include 'header.php';

$sql = 'SELECT
			*
		FROM
			logs
		WHERE
			link="' . mysql_real_escape_string($i) . '" ' .
		'ORDER BY id DESC
		LIMIT 1';

$result = mysql_query($sql);

if(!$result){
	echo 'The posts could not be displayed, please try again later.';}
else{
	if(mysql_num_rows($result) == 0){
		echo 'This post does not exist.';}
	else{
		while($row = mysql_fetch_array($result)){
        	echo '<h1>' . $row['body1'] . '</h1>';}
}
}

include 'footer.php';
?>
