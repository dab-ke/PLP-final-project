<?php
    session_start();

    include ("functions.php");
    include ("connection.php");

    if(isset($_SESSION["username"])){

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Transact-FlexWay</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
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
    <div class="user-finance-details">
        <p><a href="#">Recent Transactions</a></p>
        <p><a href="#">Pay</a></p>
        <p><a href="#">Send</a></p>
    </div>
    
</body>
<?php 
    }else{
        echo "<script>alert('You must log in or sign up to proceed!')</script>";
        echo "<script type='text/javascript'> document.location ='login.php'; </script>";
    }
?>
</html>