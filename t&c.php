<?php
    session_start();

    include ("functions.php");
    include ("connection.php");

    if(isset($_SESSION["username"])){

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile-FlexWay</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="tandc">
        <div class="nav-bar">
            <div class="name">
                <h1><a href="index.html">Flex Way</a></h1>
            </div>
            <div class="details">
                <ul>
                    <li><h2>Hi, <?php echo $_SESSION['username']; ?>...</h2></li>
                </ul>
            </div>
        </div>
        <div class="links-bar">
            <div class="hlinks">
                <ul>
                    <li><a href="info.php">Home</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="wallet.php">Wallets</a></li>
                    <li><a href="transact.php">Transact</a></li>
                </ul>
            </div>
            <div class="logout">
                <ul>
                    <li><a href="logout.php" onclick="return confirm('Are you sure you want to Log Out?');">Log Out</a></li>
                </ul>
            </div>
        </div>
        <div class="user-info">
            <div class="icon"><i class="fas fa-user"></i></div>
            <div class="name"><?php echo $_SESSION['username']; ?></div>
        </div>
        <div class="user-finance-details">
            <p><a href="#">Favorites: 0</a></p>
            <P><a href="#">Recently deleted: 0</a></P>
            <p><a href="#">Change password</a></p>
            <p><a href="#">Call support</a></p>
            <p><a href="#">FAQs</a></p>
            <p><a href="#">Terms and Conditions</a></p>
        </div>
    </div>
    
</body>
<?php 
    }else{
        echo "<script>alert('Login first!')</script>";
        echo "<script type='text/javascript'> document.location ='login.php'; </script>";
    }
?>
</html>