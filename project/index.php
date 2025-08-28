<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/images/logo/home-button.png" type="image/icon type" />
    <meta name="google-site-verification" content="" />
    <title>Find Your Dream Home | HabitaFlow</title>
    <meta name="description" content="Discover your next home with HabitaFlow. Browse listings, search by location, price, and category to find the perfect match.">
    <meta name="keywords" content="HabitaFlow, home rentals, apartments, houses, listings, rent, real estate">
    <meta name="author" content="HabitaFlow Team">
    <meta property="og:title" content="Find Your Dream Home | HabitaFlow" />
    <meta property="og:description" content="Discover your next home with HabitaFlow. Browse listings, search by location, price, and category to find the perfect match." />
    <meta property="og:image" content="../images/logo/OPENHOUSE.png" />
    <meta property="og:url" content="https://earlyaccess.duckghor.com/" />
    <meta property="og:type" content="website" />
    <link rel="stylesheet" href="css/home.css">
    <script src="js/home.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <!-- Hero Section with Search Bar -->
    <section id="hero">
        <h1>Find Your Next Home</h1>
        <div id="search-bar">
            <!-- Advanced Search Filter -->
            <input type="text" id="location-filter" placeholder="Location">
            <input type="number" id="min-price-filter" placeholder="Min Price">
            <input type="number" id="max-price-filter" placeholder="Max Price">
            <select id="category-filter">
                <option value="">All Categories</option>
                <option value="family">Family</option>
                <option value="bachelor">Bachelor</option>
                <option value="sublet">Sublet</option>
            </select>
            <button id="search-button">Search</button>
        </div>
    </section>

    <!-- Featured Listings -->
    <section id="featured-listings">
        <h2>Featured Listings</h2>
        <div id="listings-container">
            <!-- Listing Cards will be loaded here -->
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