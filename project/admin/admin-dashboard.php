<?php
session_start();
include '../php/db_connection.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: admin-login.php');
    exit();
}

// Delete listing if delete request is sent
if (isset($_GET['delete_listing'])) {
    $listing_id = intval($_GET['delete_listing']);

    // Start transaction
    $conn->begin_transaction();

    try {
        // Delete associated photos first
        $sql_delete_photos = "DELETE FROM ListingPhotos WHERE listing_id = ?";
        $stmt_photos = $conn->prepare($sql_delete_photos);
        $stmt_photos->bind_param("i", $listing_id);
        $stmt_photos->execute();
        $stmt_photos->close();

        // Then delete the listing
        $sql_delete_listing = "DELETE FROM Listings WHERE listing_id = ?";
        $stmt_listing = $conn->prepare($sql_delete_listing);
        $stmt_listing->bind_param("i", $listing_id);
        $stmt_listing->execute();
        $stmt_listing->close();

        // Commit transaction
        $conn->commit();

        header('Location: admin-dashboard.php');
        exit();
    } catch (Exception $e) {
        // Rollback transaction on error
        $conn->rollback();
        echo "Error deleting listing: " . $e->getMessage();
    }
}

// Fetch listings
$sql = "SELECT * FROM Listings";
$listings = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../admin/styles/dashboard.css">
    <link rel="icon" href="/images/logo/personalized-support.png" type="image/icon type" />
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
        <h3>Listings</h3>
        <table>
            <thead>
                <tr>
                    <th>Listing ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Date Posted</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($listing = $listings->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $listing['listing_id']; ?></td>
                        <td><?php echo htmlspecialchars($listing['title']); ?></td>
                        <td><?php echo htmlspecialchars($listing['description']); ?></td>
                        <td><?php echo $listing['price']; ?></td>
                        <td><?php echo $listing['date_posted']; ?></td>
                        <td>
                            <a href="admin-dashboard.php?delete_listing=<?php echo $listing['listing_id']; ?>" onclick="return confirm('Are you sure you want to delete this listing?')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="bottom-links">
            <a href="user.php">Manage Users</a>
            <a href="admin-logout.php">Logout</a>
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
</body>

</html>