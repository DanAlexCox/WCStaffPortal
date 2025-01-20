<?php
// Start a session
session_start();

// Regenerate session ID for security
session_regenerate_id(true);

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if not authenticated
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div id="dashboardPage">
        <header>
            <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
            <div class="navigation-buttons">
                <a href="logout.php"><button>Logout</button></a>
            </div>
        </header>
        <main>
            <section class="system-buttons">
                <div class="system-card">Contact System (Hosted)</div>
                <div class="system-card">Clinic System</div>
                <div class="system-card">Legal System</div>
                <div class="system-card disabled">Future Systems</div>
            </section>
        </main>
    </div>
</body>
</html>
