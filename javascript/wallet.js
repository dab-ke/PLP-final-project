// Retrieve wallets from local storage (if any)
let wallets = JSON.parse(localStorage.getItem('wallets')) || [];

// Function to add a new wallet
function addWallet() {
  const walletName = prompt("Enter the name of the wallet:");
  if (walletName) {
    const wallet = { name: walletName };
    wallets.push(wallet);
    updateWallets();
  }
}

// Function to update the wallets on the page
function updateWallets() {
  const walletContainer = document.getElementById('walletContainer');
  walletContainer.innerHTML = '';

  wallets.forEach((wallet, index) => {
    const walletDiv = document.createElement('div');
    walletDiv.classList.add('wallet');
    walletDiv.textContent = wallet.name;
    walletContainer.appendChild(walletDiv);
  });

  // Add the "+" button
  const addWalletButton = document.createElement('button');
  addWalletButton.textContent = '+';
  addWalletButton.onclick = addWallet;
  walletContainer.appendChild(addWalletButton);

  // Save wallets to local storage
  localStorage.setItem('wallets', JSON.stringify(wallets));
}

// Initialize wallets on page load
updateWallets();
