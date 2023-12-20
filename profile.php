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
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <link rel="stylesheet" href="styles/common.css">
    <link rel="stylesheet" href="styles/header-info.css">
    <link rel="stylesheet" href="styles/home.css">
    <script src="javascript/home.js"></script>
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
    <div class="user-info">
        <div class="icon"><i class="fas fa-user"></i></div>
        <div class="name"><?php echo $_SESSION['username']; ?></div>
    </div>
    <div class="user-finance-details">
        <p><a href="#" onclick="openFavoritesModal()">Favorites</a></p>
        <p><a href="#">Change password</a></p>
        <p><a href="#">Call support</a></p>
        <p><a href="#" onclick="openQuestionsModal()">FAQs</a></p>
        <p><a href="#" onclick="openTermsandconditionsModal()">Terms and Conditions</a></p>
    </div>

    <div id="favoritesModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeFavoritesModal()">&times;</span>
            <h2 style="text-align:center;">Favorites</h2>
            <ul>
                <li>Favorite transactions go here...</li>
            </ul>
        </div>
    </div>

    <div id="questionsModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeQuestionsModal()">&times;</span>
            <h2 style="text-align:center;">FAQs</h2>
            <ul>
                <li>Frequently asked questions go here...</li>
            </ul>
        </div>
    </div>

    <div id="termsandconditionsModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeTermsandconditionsModal()">&times;</span>
            <h2 style="text-align:center;">Terms and Conditions</h2>
            <ul>
                <li>Terms and Conditions go here...</li>
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