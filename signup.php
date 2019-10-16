


<!DOCTYPE html>

<?php
session_start();

// initializing variables
$name = "";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'users');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }


  // first check the database to make sure
  // a user does not already exist with the same name and/or email
  $user_check_query = "SELECT * FROM users WHERE name='$name' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['name'] === $name) {
      array_push($errors, "name already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (name, email, password)
  			  VALUES('$name', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['name'] = $name;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}


<<html>
<head>
<link rel="stylesheet" type="text/css" href="assets/css/main.css">
<script src="signup.js"></script>
</head>
<body class="landing">


    <!-- Header -->
      <header id="header">
        <h1><strong><a href="index.html">Dibuat</a></strong> oleh tim Masriri</h1>
        <nav id="nav">
          <ul>
            <li><a href="index.html">Beranda</a></li>
            <li><a href="generic.html">Peta</a></li>
            <li><a href="login.html">Masuk</a></li>
          </ul>
        </nav>
      </header>

<div class="login-page">
  <div class="form">
    <form class="register-form">
      <input type="text" placeholder="name"/>
      <input type="password" placeholder="password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="login.html">Log In</a></p>
    </form>

  </div>
</div>
</body>
</html>
