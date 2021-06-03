<?php
session_start();
// If user is not logged in send to login page...
if (!isset($_SESSION['username'])) {
	header('Location: index.php');
	exit;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Defensie opdrachtenportaal</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Defensie opdrachtenportaal</h1>
				<a href="opdrachten.php"><i class="fas fa-user-circle"></i>Opdrachten</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Welkom</h2>
			<p>Welcome back, <?php echo $_SESSION["username"] ?>!</p> 
		</div>
	</body>
</html>