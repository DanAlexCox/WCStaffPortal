// Set username in the welcome message
document.addEventListener("DOMContentLoaded", function () {
    const username = sessionStorage.getItem("username") || "User"; // Retrieve username from session storage
    document.getElementById("welcomeName").textContent = `Welcome, ${username}`;
});

// Example: Handling clicks on system cards
const systemCards = document.querySelectorAll(".system-card:not(.disabled)");
systemCards.forEach((card) => {
    card.addEventListener("click", () => {
        alert(`You clicked on ${card.textContent}`);
    });
});
