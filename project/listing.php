<?php
// listing.php

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Browse Listings | HabitaFlow</title>
    <meta name="description" content="Explore our extensive list of rental properties. Filter by location, price, bedrooms, and category to find your perfect home with HabitaFlow.">
    <meta name="keywords" content="HabitaFlow, listings, rentals, apartments, houses, rent, real estate, property search">
    <meta name="author" content="HabitaFlow Team">
    <link rel="icon" href="/images/logo/home-button.png" type="image/icon type" />
    <link rel="stylesheet" href="css/listing.css">
    <meta property="og:title" content="Browse Listings | HabitaFlow" />
    <meta property="og:description" content="Explore our extensive list of rental properties. Filter by location, price, bedrooms, and category to find your perfect home with HabitaFlow." />
    <meta property="og:image" content="../images/logo/OPENHOUSE.png" />
    <meta property="og:url" content="https://earlyaccess.duckghor.com/" />
    <meta property="og:type" content="website" />
    <script src="js/listing.js" defer></script>
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

    <!-- Filters and Sorting -->
    <div id="filter-sort-bar">
        <!-- Advanced Search Filter Fields -->
        <input type="text" id="location-filter" placeholder="Location">
        <input type="number" id="min-price-filter" placeholder="Min Price">
        <input type="number" id="max-price-filter" placeholder="Max Price">
        <input type="number" id="bedrooms-filter" placeholder="Bedrooms">

        <!-- Category Filter -->
        <select id="category-filter">
            <option value="">All Categories</option>
            <option value="family">Family</option>
            <option value="bachelor">Bachelor</option>
            <option value="sublet">Sublet</option>
        </select>

        <!-- Sorting Options -->
        <select id="sort-by">
            <option value="date_posted">Date Posted</option>
            <option value="price">Price</option>
        </select>

        <!-- Search Button -->
        <button id="search-button">Search</button>
    </div>

    <!-- Listings Container -->
    <div id="listings-container">
        <!-- Listings will be dynamically loaded here -->
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