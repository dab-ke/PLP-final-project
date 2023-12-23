document.addEventListener("DOMContentLoaded", function () {
    var walletsContainer = document.getElementById("wallets-container");
    var addWalletButton = document.getElementById("add-wallet-button");

    for (var i = 0; i < localStorage.length; i++) {
        var walletName = localStorage.key(i);
        if (walletName.startsWith("wallet-")) {
            var walletDataString = localStorage.getItem(walletName);

            try {
                var walletData = JSON.parse(walletDataString);
                var newWallet = createWalletElement(walletData.name);
                walletsContainer.appendChild(newWallet);
            } catch (error) {
                console.error("Error parsing JSON for wallet:", walletName, error);
            }
        }
    }

    if (addWalletButton) {
        addWalletButton.onclick = function () {
            var walletName = window.prompt("Enter the name of the new wallet:");
            if (walletName !== null && walletName !== "") {
                var newWallet = createWalletElement(walletName);

                var walletData = { name: walletName, balance: 0 };
                localStorage.setItem("wallet-" + walletName, JSON.stringify(walletData));

                walletsContainer.appendChild(newWallet);
            }
        };
    } else {
        console.error("Element with ID 'add-wallet-button' not found.");
    }
});

function createWalletElement(walletName) {
    // var username = getusername();
    var newWallet = document.createElement("div");
    newWallet.className = "wallet";
    newWallet.innerHTML = '<i class="fas fa-wallet"></i><div>' + walletName + "</div>";

    newWallet.onclick = function () {
        openWalletModal(walletName);
    };

    return newWallet;
}

function deleteWallet(walletId) {
    var confirmDelete = confirm("Are you sure you want to delete this wallet?");
    if (confirmDelete) {
        localStorage.removeItem("wallet-" + walletId);
        location.reload();
    }
}

//Wallet modal
function openWalletModal(walletName) {
    var modal = document.getElementById("walletModal");
    modal.style.display = "block";
    document.getElementById("modalWalletName").innerText = walletName;
}

function closeWalletModal() {
    var modal = document.getElementById("walletModal");
    modal.style.display = "none";
}

//Total number of wallets
function getTotalWallets() {
    var totalWallets = 0;

    for (var i = 0; i < localStorage.length; i++) {
        var walletName = localStorage.key(i);

        if (walletName && walletName.startsWith("wallet-")) {
            totalWallets++;
        }
    }

    return totalWallets;
}

// Update wallet count
function updateTotalWalletsCount() {
    var totalWallets = getTotalWallets();
    document.getElementById("totalWalletsCount").innerText = totalWallets;
}