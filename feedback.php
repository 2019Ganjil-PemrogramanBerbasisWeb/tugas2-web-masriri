<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Feedback</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body {
            font: 14px sans-serif;
        }

        .wrapper {
            width: 350px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <center>
    <div class="wrapper">
        <h2>Feedback</h2>
        <form method="post" action="success.php">
            <div class="form-group">
                <label style="float: left;">First Name</label>
                <input type="text" name="firstname" class="form-control" placeholder="First Name" required>
            </div>
            <div class="form-group">
                <label style="float: left;">Last Name</label>
                <input type="text" name="lastname" class="form-control" placeholder="Last Name" required>
            </div>
            <div class="form-group">
                <label style="float: left;">Subject</label>
                <textarea type="text" name="subject" placeholder="Write your feedback" style="height:100px;width: 300px;" required></textarea>
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>
    </center>
</body>

</html>
