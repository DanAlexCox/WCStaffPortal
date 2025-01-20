<?php
// Start a session
session_start();

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mock user credentials (replace with database verification)
    $username = "admin";
    $password = "password123";

    // Get input from the form
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    // Validate credentials
    if ($inputUsername === $username && $inputPassword === $password) {
        // Set session variable
        $_SESSION['username'] = $username;

        // Redirect to dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div id="loginPage">
        <form method="POST" action="login.php">
            <h1>Login</h1>
            <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
