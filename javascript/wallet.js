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

addWalletButton.onclick = function () {
    var walletName = window.prompt("Enter the name of the new wallet:");
    if (walletName !== null && walletName !== "") {
        var newWallet = createWalletElement(walletName);

        var walletData = { name: walletName, balance: 0 };
        localStorage.setItem("wallet-" + walletName, JSON.stringify(walletData));

        walletsContainer.appendChild(newWallet);
    }
};

function createWalletElement(walletName) {
    var newWallet = document.createElement("div");
    newWallet.className = "wallet";
    newWallet.innerHTML =
        '<i class="fas fa-wallet"></i><div>' + walletName + "</div>";

    return newWallet;
}

function deleteWallet(walletId) {
  var confirmDelete = confirm("Are you sure you want to delete this wallet?");
  if (confirmDelete) {
      localStorage.removeItem("wallet-" + walletId);
      location.reload();
  }
}

// function editWalletName(walletId) {
//   var newName = prompt("Enter the new name for the wallet:");
//   if (newName !== null && newName !== "") {
//       var walletDataString = localStorage.getItem("wallet-" + walletId);
//       var walletData = JSON.parse(walletDataString);
      
//       // Update the name property of the wallet data
//       walletData.name = newName;

//       // Save the updated wallet data back to local storage
//       localStorage.setItem("wallet-" + walletId, JSON.stringify(walletData));

//       location.reload();
//   }
// }


//Wallet modal
function openWalletModal() {
    var modal = document.getElementById("walletModal");
    modal.style.display = "block";
}

function closeWalletModal() {
    var modal = document.getElementById("walletModal");
    modal.style.display = "none";
}