// Switch between Login and Sign-Up Pages
document.getElementById("switchToSignup").addEventListener("click", function (event) {
    event.preventDefault();
    document.getElementById("loginPage").style.display = "none";
    document.getElementById("signupPage").style.display = "block";
});

document.getElementById("switchToLogin").addEventListener("click", function (event) {
    event.preventDefault();
    document.getElementById("signupPage").style.display = "none";
    document.getElementById("loginPage").style.display = "block";
});

// Handle Login Form Submission
document.getElementById("loginForm").addEventListener("submit", function (event) {
    event.preventDefault();

    const email = document.getElementById("email").value;

    // For simplicity, assume the email is the username
    const username = email.split("@")[0];
    sessionStorage.setItem("username", username); // Store username in session storage

    // Redirect to dashboard page
    window.location.href = "dashboard.html";
});

// Handle Sign-Up Form Submission
document.getElementById("signupForm").addEventListener("submit", function (event) {
    event.preventDefault();
    const password = document.getElementById("signupPassword").value;
    const confirmPassword = document.getElementById("confirmPassword").value;

    if (password !== confirmPassword) {
        alert("Passwords do not match. Please try again.");
    } else {
        alert("Sign-Up Successful! Please log in.");
        document.getElementById("signupPage").style.display = "none";
        document.getElementById("loginPage").style.display = "block";
    }
});
