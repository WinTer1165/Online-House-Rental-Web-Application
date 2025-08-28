<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Dashboard - HabitaFlow</title>
    <link rel="icon" href="/images/logo/home-button.png" type="image/icon type" />
    <link rel="stylesheet" href="css/dashboard.css">
    <script src="js/dashboard.js" defer></script>
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
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="privacy.php">Privacy Policy</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="php/logout.php">Logout</a></li>
        </ul>
    </nav>

    <!-- User Profile Section -->
    <section id="user-profile">
        <img id="user-photo" src="" alt="Profile Photo">
        <h2 id="user-name"></h2>
        <button id="edit-profile-button">Edit Profile</button>
    </section>

    <!-- User Listings Section -->
    <section id="user-listings">
        <h2>Your Listings</h2>
        <button id="create-listing-button">Create New Listing</button>
        <div id="listings">
            <!-- User's listings will be loaded here -->
        </div>
    </section>

    <!-- Create Listing Modal -->
    <div id="create-listing-modal" class="modal">
        <div class="modal-content">
            <span class="close-button" id="close-create-modal">&times;</span>
            <h2>Create New Listing</h2>
            <form id="create-listing-form" action="php/create_listing.php" method="POST" enctype="multipart/form-data">
                <!-- Listing Fields -->
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>

                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea>

                <label for="price">Price:</label>
                <input type="number" id="price" name="price" required>

                <label for="category">Category:</label>
                <select id="category" name="category" required>
                    <option value="family">Family</option>
                    <option value="bachelor">Bachelor</option>
                    <option value="sublet">Sublet</option>
                </select>

                <label for="location">Location:</label>
                <input type="text" id="location" name="location" required>

                <label for="bedrooms">Bedrooms:</label>
                <input type="number" id="bedrooms" name="bedrooms" required>

                <label for="photos">Photos:</label>
                <input type="file" id="photos" name="photos[]" accept="image/*" multiple required>

                <button type="submit">Create Listing</button>
            </form>
        </div>
    </div>

    <!-- Edit Profile Modal -->
    <div id="edit-profile-modal" class="modal">
        <div class="modal-content">
            <span class="close-button" id="close-edit-modal">&times;</span>
            <h2>Edit Profile</h2>
            <form id="edit-profile-form" action="php/update_profile.php" method="POST" enctype="multipart/form-data">
                <label for="edit-fullname">Full Name:</label>
                <input type="text" id="edit-fullname" name="fullname" required>

                <label for="edit-phone">Phone Number:</label>
                <input type="tel" id="edit-phone" name="phone" pattern="\d{11}" required>

                <label for="edit-nid">NID:</label>
                <input type="text" id="edit-nid" name="nid" pattern="\d{10}" required>

                <label for="edit-dob">Date of Birth:</label>
                <input type="date" id="edit-dob" name="dob" required>

                <label for="edit-photo">Profile Photo:</label>
                <input type="file" id="edit-photo" name="photo" accept="image/*">

                <button type="submit">Update Profile</button>
            </form>
        </div>
    </div>

    <!-- Edit Listing Modal -->
    <div id="edit-listing-modal" class="modal">
        <div class="modal-content">
            <span class="close-button" id="close-edit-listing-modal">&times;</span>
            <h2>Edit Listing</h2>
            <form id="edit-listing-form" action="php/update_listing.php" method="POST" enctype="multipart/form-data">
                <!-- Hidden input to store the listing ID -->
                <input type="hidden" id="edit-listing-id" name="listing_id">

                <!-- Listing Fields -->
                <label for="edit-title">Title:</label>
                <input type="text" id="edit-title" name="title" required>

                <label for="edit-description">Description:</label>
                <textarea id="edit-description" name="description" required></textarea>

                <label for="edit-price">Price:</label>
                <input type="number" id="edit-price" name="price" required>

                <label for="edit-category">Category:</label>
                <select id="edit-category" name="category" required>
                    <option value="family">Family</option>
                    <option value="bachelor">Bachelor</option>
                    <option value="sublet">Sublet</option>
                </select>

                <label for="edit-location">Location:</label>
                <input type="text" id="edit-location" name="location" required>

                <label for="edit-bedrooms">Bedrooms:</label>
                <input type="number" id="edit-bedrooms" name="bedrooms" required>

                <label for="edit-photos">Photos (Upload to replace existing):</label>
                <input type="file" id="edit-photos" name="photos[]" accept="image/*" multiple>

                <button type="submit">Update Listing</button>
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