<?php
//create_cat.php
include '../connect.php';
include 'header.php';
?>
<a href="http://michaellukiman.com/literature">BACK</a><br>
<?
$sql = 'SELECT
		*
		FROM
		logs
		WHERE
		link="' . mysql_real_escape_string($i) . '" AND category=2
    ORDER BY id DESC LIMIT 1';
$result = mysql_query($sql);
if(!$result){
	echo 'The posts could not be displayed, please try again later.';}
else{
	if(mysql_num_rows($result) == 0){
		echo 'This post does not exist.';}
	else{
		while($row = mysql_fetch_array($result)){
	  	echo '<h1>' . $row['title'] . '</h1>
    		<p>' . $row['body1']  . '</p></div>';
			echo '<a href="https://michaellukiman.com/edit_post.php?i=' . $i . '" style="opacity: 0.05">EDIT POST</a>' ;
			echo $_SESSION['user_id'];
}
}
}
include '../footer.php';
?>
