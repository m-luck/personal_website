<!doctype html>
<html>
<head>
	<meta name="description" content="welcome to the world" />
	<title>M.J. Lukiman</title>
	<link rel="stylesheet" href="main.css" type="text/css">
	<meta charset="utf-8">
</head>

<body>
    <div id="wrapper">
	    <div id="header">
    		<h1 style="opacity:0;">michael lukiman</h1>
	        <!-- <a class="item" href="create_post.php">New Post</a> -->
			<div id="userbar">

		    <?php
		 	if($_SESSION['signed_in']){
		 		// echo 'go to hell, ' . $_SESSION['user_name'] . '. not you? <a href="signout.php">Sign out</a>';
		 	}
		 	else{
		 		// echo '<a href="signin.php">sign in</a> or <a href="signup.php">create account</a>.';
		 	}
		 	?>
		 	</div>
		</div>
    </div>
    <div id="content">
