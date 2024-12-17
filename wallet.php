<?php
    session_start();

    include ("functions.php");
    include ("connection.php");

    if(isset($_SESSION["username"])){

    ?>

    <?php
        // Get user_id from the users table
        $username = $_SESSION['username'];
        $query = "SELECT id FROM users WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $user_id = $user['id'];
    
        // Handle wallet creation
        if(isset($_POST['create_wallet'])) {
            $wallet_name = $_POST['wallet_name'];
            $query = "INSERT INTO wallets (user_id, wallet_name) VALUES (?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("is", $user_id, $wallet_name);
            $stmt->execute();
        }
    
        // Handle wallet deletion
        if(isset($_POST['delete_wallet'])) {
            $wallet_id = $_POST['wallet_id'];
            $query = "DELETE FROM wallets WHERE id = ? AND user_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ii", $wallet_id, $user_id);
            $stmt->execute();
        }
    
        // Handle wallet update
        if(isset($_POST['update_wallet'])) {
            $wallet_id = $_POST['wallet_id'];
            $new_name = $_POST['new_name'];
            $query = "UPDATE wallets SET wallet_name = ? WHERE id = ? AND user_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sii", $new_name, $wallet_id, $user_id);
            $stmt->execute();
        }
    
        // Get user's wallets
        $query = "SELECT * FROM wallets WHERE user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $wallets = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
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
        <!-- <button id="add-wallet-button" class="plus"><i class="fas fa-plus"></i></button> -->
    </div>

    <div class="wallets-container">
        <button onclick="createWallet()" class="add-wallet">+</button>
        <div class="wallets-row">
            <?php foreach($wallets as $wallet): ?>
            <div class="wallet" onclick="openWalletModal(<?php echo htmlspecialchars(json_encode($wallet)); ?>)">
                <i class="fas fa-wallet"></i>
                <h3><?php echo htmlspecialchars($wallet['wallet_name']); ?></h3>
                <p>Balance: KSH <?php echo number_format($wallet['balance'], 2); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div id="walletModal" class="modal">
        <div class="modal-content">
            <div class="wallet-header">
                <div class="wallet-menu">
                    <button onclick="showWalletMenu()">☰</button>
                    <div id="walletMenuOptions" class="wallet-menu-options">
                        <a href="#" onclick="showUpdateWalletForm()">Update Wallet</a>
                        <a href="#" onclick="confirmDeleteWallet()">Delete Wallet</a>
                    </div>
                </div>
                <span class="close" onclick="closeWalletModal()">&times;</span>
            </div>
            <div id="walletContent"></div>
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