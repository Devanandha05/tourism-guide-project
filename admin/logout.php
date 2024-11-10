<?php
session_start();

// Check if the logout button is pressed
if (isset($_POST['logout'])) {
    // Destroy the session to log out the admin
    session_destroy();
    // Redirect to the login page (or home page)
    header("Location: /TOURIST GUIDE PROJECT/welcome/landing.html");
    exit();
}
?>
