<?php 
session_start();

include("connection.php");
include("functions.php");


if($_SERVER['REQUEST_METHOD'] == "POST")
{

$email = $_POST['email'];
$password1 = $_POST['password1'];

if(!empty($email) && !empty($password1))
{

    $query = "select * from users where email = '$email' limit 1";
    $result = mysqli_query($conn, $query);

    if($result)
    {
        if($result && mysqli_num_rows($result) > 0)
        {

            $user_data = mysqli_fetch_assoc($result);
            
            if($user_data['password1'] === $password1)
            {

                $_SESSION['username'] = $user_data['username'];
                header("Location: info.php");
                die;
            }
        }
    }
    
    echo "<script>alert('Invalid username or password')</script>";
    echo "<script type='text/javascript'> document.location ='login.php'; </script>";

}else{

echo "<script>alert('Invalid username or password')</script>";
echo "<script type='text/javascript'> document.location ='login.php'; </script>";
}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In-FlexWay</title>

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
            <h1>Log In</h1>
            <p>Welcome Back to Flex Way</p>
        </div>
        <div class="form">
            <form method="POST" action="" autocomplete="on">
            <label>Email:</label>
            <input type="email" name="email" placeholder= "Email" required maxlength="50"><br>
            <label>Password:</label>
            <input type="password" name="password1" placeholder= "Password" required maxlength="10">
            <p><a href="#">Forgot Password?</a></p>
            <button name="login" class="btn">Log In</button>
            <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        </div>
    </div>
</body>
</html>