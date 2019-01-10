<?php
//signin.php
include 'connect.php';
include 'header.php';

echo '<h3>sign in</h3>';

//first, check if the user is already signed in. If that is the case, there is no need to display this page
if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
{
	echo 'Already signed in.';
}
else
{
	if($_SERVER['REQUEST_METHOD'] != 'POST')
	{
		/*the form hasn't been posted yet, display it
		  note that the action="" will cause the form to post to the same page it is on */
		echo '<form method="post" action=""><br>
			Username: <input type="text" name="user_name" /><br>
			Password: <input type="password" name="user_pass"><br>
			<input type="submit" value="Sign in" />
		 </form>';
	}
	else
	{
		/* so, the form has been posted, we'll process the data in three steps:
			1.	Check the data
			2.	Let the user refill the wrong fields (if necessary)
			3.	Varify if the data is correct and return the correct response
		*/
		$errors = array(); /* declare the array for later use */

		if(!isset($_POST['user_name']))
		{
			$errors[] = 'input a goddamn name';
		}

		if(!isset($_POST['user_pass']))
		{
			$errors[] = 'input a goddamn password';
		}

		if(!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/
		{
			echo 'Uh-oh.. a couple of fields are not filled in correctly..';
			echo '<ul>';
			foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
			{
				echo '<li>' . $value . '</li>'; /* this generates a nice error list */
			}
			echo '</ul>';
		}
		else
		{
			//the form has been posted without errors, so save it
			//notice the use of mysql_real_escape_string, keep everything safe!
			//also notice the sha1 function which hashes the password
			$sql1 = "SELECT
						username
					FROM
						users
					WHERE
						username = '" . mysql_real_escape_string($_POST['user_name']) . "'
					AND
						hashpass = '" . sha1($_POST['user_pass']) . "'";


			$sql2 = "SELECT
						username

					FROM
						users
					WHERE
						username = '" . mysql_real_escape_string($_POST['user_name'])."'";

				$sql3 = "SELECT
						username
					FROM
						users
					WHERE
						hashpass = '" . sha1($_POST['user_pass']) ."'";


			$result1 = mysql_query($sql1);
			$result2 = mysql_query($sql2);
			$result3 = mysql_query($sql3) or die(mysql_error());

			if(!$result1)
			{
				//something went wrong, display the error
				echo 'Something went wrong while signing in. Please try again later.';
				//echo mysql_error(); //debugging purposes, uncomment when needed
			}
			else
			{
				//the query was successfully executed, there are 2 possibilities
				//1. the query returned data, the user can be signed in
				//2. the query returned an empty result set, the credentials were wrong

				if(mysql_num_rows($result3) == 0)
				{
					echo 'something went shitty. '. sha1($_POST['user_pass']);

					if(mysql_num_rows($result2) != 0)
					{
						echo 'We recognize that username, but you ballsed up your password. ';
					}

				 	else {
						echo ' username is shit and unknown';
				 	}
				}



				else
				{


					//set the $_SESSION['signed_in'] variable to TRUE
					$_SESSION['signed_in'] = true;

					//we also put the user_id and user_name values in the $_SESSION, so we can use it at various pages
					while($row = mysql_fetch_assoc($result1)) {
						$_SESSION['user_id'] 	= $row['id'];
						$_SESSION['user_name'] 	= $row['username'];
					}

					echo 'welcome to the world ' . $_SESSION['user_name'] . '. <a href="index.php">head to the main shaft</a>.';
				}
			}
		}
	}
}

include 'footer.php';
?>
