<?php
session_start();
include 'php/db_connection.php';

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Get the listing ID from the URL parameter
if (isset($_GET['listing_id'])) {
    $listing_id = $_GET['listing_id'];

    // Fetch the listing details
    $stmt = $conn->prepare("SELECT L.*, U.full_name, U.phone, GROUP_CONCAT(LP.photo_path) AS photos
                            FROM Listings L
                            JOIN Users U ON L.user_id = U.user_id
                            LEFT JOIN ListingPhotos LP ON L.listing_id = LP.listing_id
                            WHERE L.listing_id = ?
                            GROUP BY L.listing_id");
    $stmt->bind_param("i", $listing_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $listing = $result->fetch_assoc();
        // Split the photos into an array
        $photos = explode(',', $listing['photos']);
    } else {
        // Listing not found
        echo "Listing not found.";
        exit();
    }
    $stmt->close();
} else {
    // No listing ID provided
    echo "Invalid request.";
    exit();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($listing['title']); ?> - HabitaFlow</title>
    <link rel="icon" href="/images/logo/home-button.png" type="image/icon type" />
    <link rel="stylesheet" href="css/listing_details.css">
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

    <!-- Listing Details -->
    <div class="listing-details">
        <h1><?php echo htmlspecialchars($listing['title']); ?></h1>
        <div class="gallery">
            <?php foreach ($photos as $photo) { ?>
                <img src="<?php echo $photo; ?>" alt="Listing Photo">
            <?php } ?>
        </div>
        <p><strong>Price:</strong> ৳ <?php echo number_format($listing['price'], 2); ?></p>
        <p><strong>Category:</strong> <?php echo ucfirst($listing['category']); ?></p>
        <p><strong>Location:</strong> <?php echo htmlspecialchars($listing['location']); ?></p>
        <p><strong>Bedrooms:</strong> <?php echo $listing['bedrooms']; ?></p>
        <p><strong>Description:</strong></p>
        <p><?php echo nl2br(htmlspecialchars($listing['description'])); ?></p>
        <h2>Contact Information</h2>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($listing['full_name']); ?></p>
        <p><strong>Phone:</strong> <?php echo htmlspecialchars($listing['phone']); ?></p>
    </div>
</body>

</html>