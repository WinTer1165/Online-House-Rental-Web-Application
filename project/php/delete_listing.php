<?php
session_start();
include 'db_connection.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "Unauthorized";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $listing_id = $_POST['listing_id'];
    $user_id = $_SESSION['user_id'];

    // Verify that the listing belongs to the user
    $stmt = $conn->prepare("SELECT listing_id FROM Listings WHERE listing_id = ? AND user_id = ?");
    $stmt->bind_param("ii", $listing_id, $user_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        // Delete photos from server and database
        $stmt_photos = $conn->prepare("SELECT photo_path FROM ListingPhotos WHERE listing_id = ?");
        $stmt_photos->bind_param("i", $listing_id);
        $stmt_photos->execute();
        $result_photos = $stmt_photos->get_result();
        while ($row = $result_photos->fetch_assoc()) {
            unlink($row['photo_path']); // Delete photo file
        }
        $stmt_photos->close();

        // Delete photo records
        $stmt_delete_photos = $conn->prepare("DELETE FROM ListingPhotos WHERE listing_id = ?");
        $stmt_delete_photos->bind_param("i", $listing_id);
        $stmt_delete_photos->execute();
        $stmt_delete_photos->close();

        // Delete listing
        $stmt_delete = $conn->prepare("DELETE FROM Listings WHERE listing_id = ?");
        $stmt_delete->bind_param("i", $listing_id);
        $stmt_delete->execute();
        $stmt_delete->close();

        echo "Listing deleted successfully";
    } else {
        echo "Listing not found or you do not have permission to delete it.";
    }

    $stmt->close();
}
$conn->close();
