<?php
    session_start();

    include ("functions.php");
    include ("connection.php");

    if(isset($_SESSION["username"])){

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Wallet-FlexWay</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <link rel="stylesheet" href="styles/common.css">
    <link rel="stylesheet" href="styles/header-info.css">
    <link rel="stylesheet" href="styles/wallet.css">
    <link rel="stylesheet" href="styles/home.css">
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
                <li><a href="info.php">Home</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="wallet.php" class="active">Wallets</a></li>
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
        <div class="icon"><i class="fas fa-wallet"></i></div>
        <p>Add a new wallet...</p>
        <button id="add-wallet-button" class="plus"><i class="fas fa-plus"></i></button>
    </div>
    <div id="wallets-container">
    <div class="wallet" onclick="openWalletModal('My Wallet')" oncontextmenu="deleteWallet('123'); return false;">
        <i class="fas fa-wallet"></i>
        <div>My Wallet</div>
    </div>
    </div>
    <div id="walletModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeWalletModal()">&times;</span>
            <i class="fas fa-wallet" style="font-size: 100px; margin-left: 220px;"></i>
            <h2 id="modalWalletName" style="text-align:center;">My Wallet</h2>
            <p style="text-align:center;">Wallet balance: 2,000.00</p>
            <div class="buttons" style="display: flex; justify-content: space-around;">
                <button>Add money</button>
                <button>Send/Pay</button>
            </div>
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