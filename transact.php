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
        <div class="icon"><i class="fas fa-money-bill-wave"></i></div>
    </div>
    <div class="user-finance-details">
        <p><a href="#" onclick="openTransactionModal()">Recent Transactions</a></p>
        <P><a href="#" onclick="openDeletedModal()">Recently deleted</a></P>
        <p><a href="#" onclick="openPayModal()">Pay</a></p>
        <p><a href="#" onclick="openSendModal()">Send</a></p>
    </div>
    
    <div id="transactionModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeTransactionModal()">&times;</span>
            <h2 style="text-align:center;">Recent Transactions</h2>
            <ul>
                <li>Recent transactions go here...</li>
            </ul>
        </div>
    </div>

    <div id="deletedModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeDeletedModal()">&times;</span>
            <h2 style="text-align:center;">Recently Deleted</h2>
            <ul>
                <li>Recently deleted content goes here...</li>
            </ul>
        </div>
    </div>

    <div id="payModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closePayModal()">&times;</span>
            <h2 style="text-align:center;">Pay</h2>
            <select name="" id="" style="display: flex; margin: auto; width: 70%;">
                <option value="" selected>Pay to...</option>
                <option value="">Paybill number</option>
                <option value="">Till number</option>
                <option value="">Pochi la Biashara</option>
                <option value="">Paypal</option>
                <option value="">Other...</option>
            </select><br><br>
            <input type="number" placeholder="Enter paybill number" required maxlength="10" style="display: flex; margin: auto; width: 70%;"><br><br>
            <input type="number" placeholder="Enter amount" required maxlength="10" style="display: flex; margin: auto; width: 70%;"><br><br>
            <div class="buttons" style="display: flex; justify-content: space-around;">
                <button onclick="closePayModal()">Cancel</button>
                <button>Pay</button>
            </div>
        </div>
    </div>

    <div id="sendModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeSendModal()">&times;</span>
            <h2 style="text-align:center;">Send</h2>
            <select name="" id="" style="display: flex; margin: auto; width: 70%;">
                <option value="" selected>Send to...</option>
                <option value="">Contact</option>
                <option value="">Other...</option>
            </select><br><br>
            <input type="tel" placeholder="Enter mobile number" required maxlength="10" style="display: flex; margin: auto; width: 70%;"><br><br>
            <input type="number" placeholder="Enter amount" required maxlength="10" style="display: flex; margin: auto; width: 70%;"><br><br>
            <div class="buttons" style="display: flex; justify-content: space-around;">
                <button onclick="closeSendModal()">Cancel</button>
                <button>Send</button>
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