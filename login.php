<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index.php");
    exit;
}

// Include config file
require_once "conn.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT no, username, password FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect user to welcome page
                            header("location: index.php");
                        } else {
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else {
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else {
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
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper {
            margin-top: 115px;
            width: 380px;
            height: 520px;
            position: relative;
            border: 1px;
            border-radius: 10px;
        }

        .wrapper_custom {
            width: 420px;
            height: 520px;
            background-color: rgba(0, 0, 0, 0.6);
            position: relative;
            border: 1px;
            top: 60%;
            left: 0%;
            border-radius: 10px;
            margin-top: 10px;
            margin-bottom: 30px;
        }
        
            .black {
                margin-bottom: 50px;
            }
       
        header {
            margin-bottom: 25px;
            padding: 50px;
        }

        .color-white {
            color: #fff;
        }
        
        .landing {
            background-image: url('images/user.jpg');
            background-size: full;
            background-repeat: no-repeat;
        }

        .navbar {
            margin-bottom: 50px;

        }

    
    </style>

		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />

</head>

<body class="landing"> 
    
    
    <!-- Header -->
    <div class="black">
			<header id="header" class="alt">
            
				<h1><strong><a href="index.html">Dibuat</a></strong> oleh tim Masriri</h1>
				<nav class="navbar navbar-dark bg-dark">
					<ul>
						<li><a href="index.html">Beranda</a></li>
						<li><a href="generic.html">Peta</a></li>
						<li><a href="login.php">Masuk</a></li>
					</ul>
                </nav>
            </header>
            </div>


            

            <a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>
    
<header class="page-header header container-fluid>
<div class="container_body">
    <center>
    <div class="wrapper_custom">
    <div class="wrapper">
        <h2 class="color-white">Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label class="color-white" style="float: left;">Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label class="color-white"  style="float: left;">Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            
            <p style="float: center;">Don't have an account? <a class="color-white" href="register.php">Sign up now</a>.</p>
    
        </form>
    </div>
    </div>

    </center>
</div>

    <!-- Footer -->
    <footer id="footer">
				<div class="container">
					<ul class="icons">
						<li><a href="https://web.facebook.com/?_rdc=1&_rdr" class="icon fa-facebook"></a></li>
						<li><a href="https://twitter.com" class="icon fa-twitter"></a></li>
						<li><a href="https://www.instagram.com/accounts/login/?source=auth_switcher" class="icon fa-instagram"></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Untitled</li>
						<li>Design: <a>Tim</a></li>
						<li>Images: <a>Unsplash</a></li>
					</ul>
				</div>
            </footer>
</header>

            
   
</body>

</html>
