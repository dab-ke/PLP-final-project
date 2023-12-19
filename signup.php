<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up-FlexWay</title>

    <!-- <link rel="stylesheet" href="styles.css"> -->
    <link rel="stylesheet" href="styles/common.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/form.css"> 
</head>
<body>
    <div class="nav-bar">
        <div class="name">
            <h1><a href="index.html">Flex Way</a></h1>
        </div>
        <div class="details">
            <ul>
                <li><a href="login.php">Log In</a></li>
                <li><a href="signup.php">Sign Up</a></li>
            </ul>
        </div>
    </div>
    <div class="links-bar">
        <div class="hlinks">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
            </ul>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <h1>Sign Up</h1>
            <p>Welcome to Flex Way</p>
        </div>
        <div class="form">
            <form method="POST" action="">
            <label>Name:</label>
            <input type="text" name="username" placeholder= "Name" required maxlength="50"><br>
            <label>Email:</label>
            <input type="email" name="email" placeholder= "Email" required maxlength="50"><br>
            <label>Phone:</label>
            <input type="tel" name="phone" placeholder= "Phone" required maxlength="10"><br>
            <label>Password:</label>
            <input type="password" name="password1" placeholder= "Password" required maxlength="10"><br>
            <label>Confirm Password:</label>
            <input type="password" name="password2" placeholder= "Confirm Password" required maxlength="10"><br>
            <button name="signup" class="btn">Sign Up</button>
            <p>Already have an account? <a href="login.php">Log In</a></p>
        </div>
    </div>
</body>

<?php 
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "flexway_db";

$connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

if (!$connection){
    echo "<script>alert('Database connection invalid');</script>";
}

if (isset($_POST['signup'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    if ($password1 === $password2) {
        $hashedPassword = password_hash($password1, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(username, email, phone, password1, password2) VALUES ('$username', '$email', '$phone', '$hashedPassword', '$password2')";
        $query = mysqli_query($connection, $sql);

        if ($query){
            echo "<script>alert('Account successfully created');</script>";
            
            // Redirect to info.php only if the account creation is successful
            session_start();
            $_SESSION['username'] = $username; 
            header('location: info.php');
            exit(); // Ensure that no further code is executed after the redirection
        } else {
            echo "<script>alert('Error creating account');</script>";
        }
    } else {
        echo "<script>alert('Passwords do not match');</script>";
    }
}
?>

</html>