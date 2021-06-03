<?php  
 $connect = mysqli_connect("localhost", "root", "", "test");  
 session_start();  
 if(isset($_SESSION["username"]))  
 {  
      header("location:entry.php");  
 }  
 if(isset($_POST["register"]))  
 {  
      if(empty($_POST["username"]) || empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {  
           $username = mysqli_real_escape_string($connect, $_POST["username"]);  
           $password = mysqli_real_escape_string($connect, $_POST["password"]);  
           $password = password_hash($password, PASSWORD_DEFAULT);  
           $query = "INSERT INTO users(username, password) VALUES('$username', '$password')";  
           if(mysqli_query($connect, $query))  
           {  
                echo '<script>alert("Registration Done")</script>';  
                header("location:entry.php");  
           }  
      }  
 }  

 ?>  
 <!DOCTYPE html>  
 <html>
	<head>
		<meta charset="utf-8">
		<title>Register</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="login">
			<h1>Register</h1>
			<form method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
                    <label for="password">
					<i class="fas fa-lock"></i>
				</label> 
                    <input type="text" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control" />  
                    
                     <input type="submit" name="register" value="Register" class="btn btn-info" />  
                     <a href="index.php">Login</a>
                </form>  
               
           </div>  
      </body>  
 </html>  