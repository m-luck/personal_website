<!doctype html>
<html>
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-141333415-1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-141333415-1');
	</script>
	<meta name="description" content="welcome to the world" />
	<title>Thanks for visiting my website. Sincerely, Michael Lukiman</title>
	<link rel="shortcut icon" type="image/ico" href="http://michaellukiman.com/favicon.ico"/>
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
