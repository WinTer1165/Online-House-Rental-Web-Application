<!DOCTYPE html>
<html>

<head>
    <title>Admin Home</title>
    <!-- Include CSS files -->
    <link rel="stylesheet" type="text/css" href="../admin/styles/index.css">
    <link rel="stylesheet" href="../admin/styles/navbar.css">
    <link rel="icon" href="/images/logo/personalized-support.png" type="image/icon type" />
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <?php include 'navbar2.php'; ?>

    <div class="hero-section">
        <div class="hero-content">
            <h1>Welcome to the Admin Panel</h1>
            <p>Manage your application efficiently and effectively.</p>
            <div class="hero-buttons">
                <a href="admin-login.php" class="button"><i class="fas fa-sign-in-alt"></i> Login</a>
                <a href="admin-register.php" class="button button-outline"><i class="fas fa-user-plus"></i> Register</a>

            </div>
        </div>
    </div>

    <footer>
        <div class="footer-content">
            <p>&copy; 2024 HabitaFlow. All rights reserved.</p>
            <ul class="footer-links">
                <li><a href="/about.php">About Us</a></li>
                <li><a href="/privacy.php">Privacy Policy</a></li>
                <li><a href="/index.php">User Home</a></li>
            </ul>
        </div>
    </footer>
    <!-- Include JS files -->
</body>

</html>