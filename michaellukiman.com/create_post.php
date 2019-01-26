<?php //create_post.php
include 'connect.php';
include 'header.php';

echo '<h2>Looks like you found the postmaker. Go ahead, make some posts.</h2>';

if($_SESSION['signed_in'] == false){//the user is not signed in
	echo 'Please <a href="signin.php">sign in</a> to post.' ;
	echo $_SESSION['user_id'];}

else if ($_SESSION['signed_in'] == true){//the user is signed in
	if($_SERVER['REQUEST_METHOD'] != 'POST'){
		//the form hasn't been posted yet, display it
		//retrieve the categories from the database for use in the dropdown

		echo 
		'
                <p>&lt;p&gt;&lt;b&gt;&lt;/b&gt; &lt;/p&gt;<p><br>
		<form method="post" action="" style="text-align:center;">
		Title: <textarea name="post_title" /></textarea><br>
		Subline: <textarea name="post_sub" /></textarea><br>
		Intro: <textarea name="post_intro" /></textarea><br>
		Link: <textarea name="post_link" /></textarea><br>
		Body: <textarea name="post_body" />
&lt;p&gt;&lt;b&gt;Information Motivation:&lt;/b&gt; &lt;/p&gt;
&lt;p&gt;&lt;b&gt;What they did:&lt;/b&gt; &lt;/p&gt;
&lt;p&gt;&lt;b&gt;Results&lt;/b&gt; &lt;/p&gt;
&lt;p&gt;&lt;b&gt;However, or interestingly:&lt;/b&gt; &lt;/p&gt;
&lt;p&gt;&lt;b&gt;In your life:&lt;/b&gt; &lt;/p&gt;

</textarea><br>
		Category: <textarea rows="1" cols="3" name="post_category" /></textarea><br>
		Tags: <textarea name="post_tags" /></textarea><br>
		Published - <textarea rows="1" cols="3" name="post_category" /></textarea><br>
		<input type="submit" value="Create Post" /><br>
		 </form>';}

	else{
		//start the transaction
		$query  = "BEGIN WORK;";
		$result = mysql_query($query);

		if(!$result){
			//Damn! the query failed, quit
			echo 'An error occured while creating your post. Please try again later.';}
		else{
			//the form has been posted, so save it
			$sql = "INSERT INTO
					logs(title,
						date_created,
						sub1,
						sub2,
						body1,
						category,
						tags,
						link,
						published)
					VALUES
					('" . mysql_real_escape_string($_POST['post_title']) . "',
					NOW(),
					'" . mysql_real_escape_string($_POST['post_sub']) . "',
					'" . mysql_real_escape_string($_POST['post_intro']) . "',
					'" . mysql_real_escape_string($_POST['post_body']) . "',
					'" . mysql_real_escape_string($_POST['post_category']) . "',
					'" . mysql_real_escape_string($_POST['post_tags']) . "',
					'" . mysql_real_escape_string($_POST['post_link']) . "',
					'" . mysql_real_escape_string($_POST['post_published']) . "'
					)";
				$result = mysql_query($sql);
				$sub2 = mysql_real_escape_string($_POST['post_link']);

				if(!$result){
					//something went wrong, display the error
					echo 'An error occured while inserting your post. Please try again later.' . mysql_error();
					$sql = "ROLLBACK;";
					$result = mysql_query($sql);}
				else{
					$sql = "COMMIT;";
					$result = mysql_query($sql);
					//after a lot of work, the query succeeded!
					echo 'Posted. <a href="posts.php?i='. $sub2 . '">GO TO POST</a>.';}
}
}
}

include 'footer.php';
?>
