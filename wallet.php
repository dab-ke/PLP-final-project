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
    <div class="user-info">
        <div class="icon"><i class="fas fa-wallet"></i></div>
        <p>Create a new wallet...</p>
        <button id="add-wallet-button" class="plus"><i class="fas fa-plus"></i></button>
    </div>
    <div id="wallets-container">
        <div class="wallet">
            <i class="fas fa-wallet"></i>
            <div oncontextmenu="deleteWallet('123'); return false;">My Wallet</div>
            <span>My Wallet</span>
        </div>
    </div>
    
</body>

<script>
    var walletsContainer = document.getElementById("wallets-container");
    var addWalletButton = document.getElementById("add-wallet-button");
    // var currentUserId = getUserId();

    for(var i=0; i <localStorage.length; i++){
        var walletName = localStorage.key(i);
        if(walletName.startsWith("wallet-")){
            var walletData =JSON.parse(localStorage.getItem(walletName));
            // if(walletData && walletData.userId ===currentUserId){
            //     var newWallet = document.createElement("div");
            //     newWallet.className = "wallet";
            //     newWallet.innerHTML = '<i class="fas fa-wallet"></i><span>' + walletName.slice(7) + '</span>';
            //     walletsContainer.appendChild(newWallet);
            // }
            var newWallet = document.createElement("div");
            newWallet.className = "wallet";
            newWallet.innerHTML = '<i class="fas fa-wallet"></i><span>' + walletName.slice(7) + '</span>';
            walletsContainer.appendChild(newWallet);
        }
    }

    addWalletButton.onclick = function(){
        var walletName = window.prompt("Enter the name of the new wallet:");
        if(walletName != null && walletName !=""){
            var newWallet = document.createElement("div");
            newWallet.className = "wallet";
            newWallet.innerHTML = '<i class="fas fa-wallet"></i><span>' + walletName + '</span>';

            // var walletData = {name:walletName, balance:0,userId:currentUserId};
            localStorage.setItem("wallet-" + walletName, JSON.stringify(walletData));

            var walletsCreatedCount =parseInt(localStorage.getItem("walletsCreatedCount")) ||0;
            walletsCreatedCount++;

            localStorage.setItem("walletsCreatedCount",walletsCreatedCount.toString());
            walletsContainer.appendChild(newWallet);

            var walletData = {
                name:walletName,
                balance:0
            };
        }
    };

    function deleteWallet(walletId){
        var walletData =JSON.parse(localStorage.getItem("wallet-" + walletId));

        localStorage.removeItem("wallet-" + walletId);
        var walletsCreatedCount = parseInt(localStorage.getItem("walletsCreatedCount")||"0");
        if(walletsCreatedCount>0){
            walletsCreatedCount--;
            
            localStorage.setItem("walletsCreatedCount",walletsCreatedCount.toString());
        }

        location.reload();
    }
</script>

<?php 
    }else{
        echo "<script>alert('You must log in or sign up to proceed!')</script>";
        echo "<script type='text/javascript'> document.location ='login.php'; </script>";
    }
?>
</html>