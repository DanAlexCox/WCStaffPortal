<?php
// Start a session
session_start();

// Function to generate CSRF token
function generateToken() {
    return bin2hex(random_bytes(32));
}

// Function to sanitize input
function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Generate CSRF token if not already set
if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = generateToken();
}

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verify CSRF token
    if (!hash_equals($_SESSION['token'], $_POST['token'])) {
        die("CSRF token validation failed");
    }

    // Connect to the database (example connection, replace with real one)
    $conn = new mysqli("hostname", "username", "password", "database");

    // Get and sanitize input from the form
    $inputEmail = sanitizeInput($_POST['email']);
    $inputPassword = sanitizeInput($_POST['password']);

    // Prepare and bind
    $stmt = $conn->prepare("SELECT password_hash FROM users WHERE email = ?");
    $stmt->bind_param("s", $inputEmail);

    // Execute and fetch results
    $stmt->execute();
    $stmt->bind_result($hashedPassword);
    $stmt->fetch();

    // Verify password
    if (password_verify($inputPassword, $hashedPassword)) {
        $_SESSION['email'] = $inputEmail;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid login credentials.";
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="loginPage">
        <form method="POST" action="login.php">
            <h1>Login</h1>
            <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
            <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
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
