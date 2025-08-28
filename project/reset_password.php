<?php
session_start();
if (!isset($_SESSION['code_verified']) || $_SESSION['code_verified'] !== true) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reset Password | HabitaFlow</title>
    <link rel="icon" href="/images/logo/home-button.png" type="image/icon type" />
    <link rel="stylesheet" href="css/reset_password.css">
</head>

<body>
    <!-- Navigation Bar -->
    <nav>
        <div class="logo"> <a href="index.php" class="main-logo">HabitaFlow</a></div>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="listing.php">Listings</a></li>
            <li><a href="privacy.php">Privacy Policy</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="about.php">About Us</a></li>
            <?php if (isset($_SESSION['user_id'])) { ?>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="php/logout.php">Logout</a></li>
            <?php } else { ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="signup.php">Sign Up</a></li>
            <?php } ?>
        </ul>
    </nav>

    <!-- Reset Password Section -->
    <div id="reset-password">
        <div class="container">
            <h1>Reset Your Password</h1>
            <?php if (isset($_SESSION['message'])) {
                echo "<p class='form-message form-error'>{$_SESSION['message']}</p>";
                unset($_SESSION['message']);
            } ?>
            <form action="reset_password_process.php" method="POST">
                <label for="password">New Password:</label>
                <input type="password" id="password" name="password" required>

                <label for="password_confirm">Confirm New Password:</label>
                <input type="password" id="password_confirm" name="password_confirm" required>

                <button type="submit">Reset Password</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <p>&copy; 2024 HabitaFlow. All rights reserved.</p>
            <ul class="footer-links">
                <li><a href="/admin/admin-index.php">Admin Login</a></li>
            </ul>
        </div>
    </footer>
</body>

</html>