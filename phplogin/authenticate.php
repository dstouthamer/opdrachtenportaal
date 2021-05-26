<?php
session_start();
// Database credentials.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
// Connection Query.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// Error message.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// Check if form is submitted.
if ( !isset($_POST['username'], $_POST['password']) ) {
	// Error message.
	exit('Please fill both the username and password fields!');
}
// Check credentials from form.
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Save result for check with credentials in database.
	$stmt->store_result();
	
	if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $password);
	$stmt->fetch();
	// Check password.
	if (password_verify($_POST['password'], $password)) {
		// Succesfull login.
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['username'];
		$_SESSION['id'] = $id;
		header('Location: home.php');
	} else {
		// Wrong password
		echo 'Incorrect password!';
	}
} else {
	// Wrong username
	echo 'Incorrect username';
}

	$stmt->close();
}
?>