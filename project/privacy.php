<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Privacy Policy | HabitaFlow</title>
    <meta name="description" content="Read the HabitaFlow Privacy Policy to understand how we collect, use, and protect your personal information when you use our services.">
    <meta name="keywords" content="HabitaFlow, Privacy Policy, personal information, data protection, user privacy">
    <meta name="author" content="HabitaFlow Team">
    <meta property="og:title" content="Privacy Policy | HabitaFlow" />
    <meta property="og:description" content="Learn how HabitaFlow collects, uses, and safeguards your personal information. Our Privacy Policy ensures your data is protected when using our services." />
    <meta property="og:image" content="../images/logo/privacy.png" />
    <meta property="og:url" content="https://earlyaccess.duckghor.com/" />
    <meta property="og:type" content="website" />
    <link rel="icon" href="images/logo/home-button.png" type="image/icon type" />
    <link rel="stylesheet" href="css/privacy.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <!-- Navigation Bar -->
    <nav>
        <div class="logo">
            <a href="index.php" class="main-logo">HabitaFlow</a>
        </div>
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

    <!-- Privacy Policy Section -->
    <section id="privacy">
        <div class="container">
            <h1>Privacy Policy</h1>
            <p>Last updated: October 6, 2024</p>

            <h2>Introduction</h2>
            <p>
                Welcome to HabitaFlow. We are committed to protecting your personal information and your right to privacy. If you have any questions or concerns about our policy or our practices, please contact us at privacy@HabitaFlow.com.
            </p>

            <h2>Information We Collect</h2>
            <p>
                We collect personal information that you voluntarily provide to us when registering on the website, expressing an interest in obtaining information about us or our products and services, when participating in activities on the website, or otherwise contacting us.
            </p>


            <h2>Contact Us</h2>
            <p>
                If you have questions or comments about this policy, you may contact us at:
            </p>
            <p>
                HabitaFlow<br>
                Email: privacy@HabitaFlow.com
            </p>
        </div>
    </section>

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