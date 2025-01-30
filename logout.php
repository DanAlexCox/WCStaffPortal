<?php
// Start a session
session_start();

// Destroy all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page with a logout message
header("Location: login.php?logout=1");
exit();
