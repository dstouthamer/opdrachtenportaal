<?php  
 $connect = mysqli_connect("localhost", "root", "", "test");  
 session_start();  
 if(isset($_SESSION["username"]))  
 {  
      header("location:entry.php");  
 }  
  
 if(isset($_POST["login"]))  
 {  
      if(empty($_POST["username"]) || empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {  
           $username = mysqli_real_escape_string($connect, $_POST["username"]);  
           $password = mysqli_real_escape_string($connect, $_POST["password"]);  
           $query = "SELECT * FROM users WHERE username = '$username'";  
           $result = mysqli_query($connect, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                while($row = mysqli_fetch_array($result))  
                {  
                     if(password_verify($password, $row["password"]))  
                     {  
                          //return true;  
                          $_SESSION["username"] = $username;  
                          header("location:entry.php");  
                     }  
                     else  
                     {  
                          //return false;  
                          echo '<script>alert("Wrong User Details")</script>';  
                     }  
                }  
           }  
           else  
           {  
                echo '<script>alert("Wrong User Details")</script>';  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Defensie opdrachtenportaal</h1>
                <a href="entry.php">Home</a>
				<a href="opdrachten.php"><i class="fas fa-user-circle"></i>Opdrachten</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="login">
			<h1>Login</h1>
			<form method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
                    <input type="submit" name="login" value="Login" class="btn btn-info" />  	
                    <a href="register.php">Register</a>
		
               </form>
		</div>
	</body>
</html>
                     
     