// Set username in the welcome message and load saved theme preference on page load
document.addEventListener("DOMContentLoaded", function () {
    // Set username in the welcome message
    const username = sessionStorage.getItem("username") || "User"; // Retrieve username from session storage
    document.getElementById("welcomeName").textContent = `Welcome, ${username}`;

    // Load saved theme preference
    const savedTheme = localStorage.getItem("theme") || "light";
    document.body.classList.remove("light-mode", "dark-mode");
    document.body.classList.add(`${savedTheme}-mode`);
    document.getElementById("theme").value = savedTheme;
});

// Example: Handling clicks on system cards
const systemCards = document.querySelectorAll(".system-card:not(.disabled)");
systemCards.forEach((card) => {
    card.addEventListener("click", () => {
        alert(`You clicked on ${card.textContent}`);
    });
});

// Handle form submission for theme settings
document.getElementById("settings-form").addEventListener("submit", function (e) {
    e.preventDefault();
    const selectedTheme = document.getElementById("theme").value;

    // Apply the selected theme
    document.body.classList.remove("light-mode", "dark-mode");
    document.body.classList.add(`${selectedTheme}-mode`);

    // Save the theme preference to localStorage (or send to the server)
    localStorage.setItem("theme", selectedTheme);

    // Optionally, send the theme preference to the server
    fetch("/api/save-settings", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ theme: selectedTheme }),
    })
        .then((response) => response.json())
        .then((data) => {
            console.log("Settings saved:", data);
        })
        .catch((error) => {
            console.error("Error saving settings:", error);
        });
});
