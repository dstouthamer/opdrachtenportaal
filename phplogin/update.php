
<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$vakgebied = $vragen = $bestanden = "";
$vakgebied_err = $vragen_err = $bestanden_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_vakgebied = trim($_POST["vakgebied"]);
    if(empty($input_vakgebied)){
        $vakgebied_err = "Please enter a name.";
    } elseif(!filter_var($input_vakgebied, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $vakgebied_err = "Please enter a valid name.";
    } else{
        $vakgebied = $input_vakgebied;
    }
    
    // Validate address address
    $input_vragen = trim($_POST["vragen"]);
    if(empty($input_vragen)){
        $vragen_err = "Please enter an address.";     
    } else{
        $vragen = $input_vragen;
    }
    
    // Validate salary
    $input_bestanden = trim($_POST["bestanden"]);
    if(empty($input_bestanden)){
        $bestanden_err = "Please enter the salary amount.";     
    } elseif(!ctype_digit($input_bestanden)){
        $bestanden_err = "Please enter a positive integer value.";
    } else{
        $bestanden = $input_bestanden;
    }
    
    // Check input errors before inserting in database
    if(empty($vakgebied_err) && empty($vragen_err) && empty($bestanden_err)){
        // Prepare an update statement
        $sql = "UPDATE opdrachten SET vakgebied=?, vragen=?, bestanden=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_vakgebied, $param_vragen, $param_bestanden, $param_id);
            
            // Set parameters
            $param_vakgebied = $vakgebied;
            $param_vragen = $vragen;
            $param_bestanden = $bestanden;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM opdrachten WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $vakgebied = $row["vakgebied"];
                    $vragen = $row["vragen"];
                    $bestanden = $row["bestanden"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
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
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="opdrachten.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>