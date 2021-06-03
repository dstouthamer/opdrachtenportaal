
<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$vakgebied = $vragen = $bestanden = "";
$vakgebied_err = $vragen_err = $bestanden_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_vakgebied = trim($_POST["vakgebied"]);
    if(empty($input_vakgebied)){
        $vakgebied_err = "Please enter a name.";
    } elseif(!filter_var($input_vakgebied, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $vakgebied_err = "Please enter a valid name.";
    } else{
        $vakgebied = $input_vakgebied;
    }
    
    // Validate address
    $input_vragen = trim($_POST["vragen"]);
    if(empty($input_vragen)){
        $vragen_err = "Vul vragen in.";     
    } else{
        $vragen = $input_vragen;
    }
    
    // Validate salary
    $input_bestanden = trim($_POST["bestanden"]);
    if(empty($input_bestanden)){
        $bestanden_err = "Please enter the salary amount.";     
    }else{
        $bestanden = $input_bestanden;
    }
    
    // Check input errors before inserting in database
    if(empty($vakgebied_err) && empty($vragen_err) && empty($bestanden_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO opdrachten (vakgebied, vragen, bestanden) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_vakgebied, $param_vragen, $param_bestanden);
            
            // Set parameters
            $param_vakgebied = $vakgebied;
            $param_vragen = $vragen;
            $param_bestanden = $bestanden;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: opdrachten.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
    <link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
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
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Maak opdracht aan</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Vakgebied</label>
                            <input type="text" name="vakgebied" class="form-control <?php echo (!empty($vakgebied_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $vakgebied; ?>">
                            <span class="invalid-feedback"><?php echo $vakgebied_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Vragen</label>
                            <textarea name="vragen" class="form-control <?php echo (!empty($vragen_err)) ? 'is-invalid' : ''; ?>"><?php echo $vragen; ?></textarea>
                            <span class="invalid-feedback"><?php echo $vragen_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Bestanden</label>
                            <input type="file" name="bestanden" class="form-control <?php echo (!empty($bestanden_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $bestanden; ?>">
                            <span class="invalid-feedback"><?php echo $bestanden_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="entry.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>