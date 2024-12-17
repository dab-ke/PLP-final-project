<?php
    session_start();

    include ("functions.php");
    include ("connection.php");

    if(isset($_SESSION["username"])){

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home-FlexWay</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <link rel="stylesheet" href="styles/common.css">
    <link rel="stylesheet" href="styles/header-info.css">
    <link rel="stylesheet" href="styles/home.css">
    <script src="javascript/home.js"></script>
    <script src="javascript/wallet.js"></script>
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
                <li><a href="info.php" class="active">Home</a></li>
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
        <p><a href="wallet.php">Wallets created: <span id="totalWalletsCount">0</span></a></p>
        <p>Total balance: ksh 0.00</p>
        <p><a href="#" onclick="openNotificationModal()">Notifications</a></p>
    </div>
    
    <div id="notificationModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeNotificationModal()">&times;</span>
            <h2 style="text-align:center;">Notifications</h2>
            <ul>
                <li>Notification content goes here...</li>
            </ul>
        </div>
    </div>

</body>

<?php 
    }else{
        echo "<script>alert('You must log in or sign up to proceed!')</script>";
        echo "<script type='text/javascript'> document.location ='login.php'; </script>";
    }
?>
</html>
