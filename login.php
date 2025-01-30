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

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get and sanitize input from the form
    $inputEmail = sanitizeInput($_POST['email']);
    $inputPassword = sanitizeInput($_POST['password']);

    // Prepare and bind (SQL injection prevention)
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
    <title>Women's Consortium Portal Login</title>
    <link rel="stylesheet" href="general.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <header>
        <h1>Women's Consortium Portal Login</h1>
    </header>
    <main>
        <div id="loginPage">
            <form method="POST" action="login.php" id="loginForm" class="form">
                <h2>Login</h2>
                <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
                <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Login</button>
                <p>Don't have an account? <a href="#" id="switchToSignup">Sign up</a></p>
            </form>
        </div>
        <div id="signupPage" style="display: none;">
            <form id="signupForm" class="form">
                <h2>Sign Up</h2>
                <div class="form-group">
                    <label for="signupEmail">Email:</label>
                    <input type="email" id="signupEmail" required>
                </div>
                <div class="form-group">
                    <label for="signupPassword">Password:</label>
                    <input type="password" id="signupPassword" required>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password:</label>
                    <input type="password" id="confirmPassword" required>
                </div>
                <button type="submit">Sign Up</button>
                <p>Already have an account? <a href="#" id="switchToLogin">Login</a></p>
            </form>
        </div>
        <div id="welcomePage" style="display: none;">
            <h2>Welcome</h2>
            <p>You have successfully logged in.</p>
        </div>
    </main>
    <script src="script.js"></script>
</body>
</html>
