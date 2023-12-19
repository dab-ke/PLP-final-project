// Notifications
function openNotificationModal() {
    var modal = document.getElementById("notificationModal");
    modal.style.display = "block";
}

function closeNotificationModal() {
    var modal = document.getElementById("notificationModal");
    modal.style.display = "none";
}

// Favorites
function openFavoritesModal() {
    var modal = document.getElementById("favoritesModal");
    modal.style.display = "block";
}

function closeFavoritesModal() {
    var modal = document.getElementById("favoritesModal");
    modal.style.display = "none";
}

// FAQs
function openQuestionsModal() {
    var modal = document.getElementById("questionsModal");
    modal.style.display = "block";
}

function closeQuestionsModal() {
    var modal = document.getElementById("questionsModal");
    modal.style.display = "none";
}

// Terms and conditions
function openTermsandconditionsModal() {
    var modal = document.getElementById("termsandconditionsModal");
    modal.style.display = "block";
}

function closeTermsandconditionsModal() {
    var modal = document.getElementById("termsandconditionsModal");
    modal.style.display = "none";
}

// Recent transactions
function openTransactionModal() {
    var modal = document.getElementById("transactionModal");
    modal.style.display = "block";
}

function closeTransactionModal() {
    var modal = document.getElementById("transactionModal");
    modal.style.display = "none";
}

// Recently deleted
function openDeletedModal() {
    var modal = document.getElementById("deletedModal");
    modal.style.display = "block";
}

function closeDeletedModal() {
    var modal = document.getElementById("deletedModal");
    modal.style.display = "none";
}

var walletsCreated =document.getElementById("wallets-created");
var walletsCreatedCount =parseInt(localStorage.getItem("walletsCreatedCount")) ||0;
walletsCreated.innerHTML = "Wallets created: " +walletsCreatedCount;