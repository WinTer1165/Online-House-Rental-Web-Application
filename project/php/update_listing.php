<?php
session_start();
include 'db_connection.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $listing_id = $_POST['listing_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $location = $_POST['location'];
    $bedrooms = $_POST['bedrooms'];

    // Verify that the listing belongs to the user
    $stmt = $conn->prepare("SELECT listing_id FROM Listings WHERE listing_id = ? AND user_id = ?");
    $stmt->bind_param("ii", $listing_id, $user_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        // Update listing details
        $stmt_update = $conn->prepare("UPDATE Listings SET title = ?, description = ?, price = ?, category = ?, location = ?, bedrooms = ? WHERE listing_id = ?");
        $stmt_update->bind_param("ssdssii", $title, $description, $price, $category, $location, $bedrooms, $listing_id);

        if ($stmt_update->execute()) {
            // Handle photo uploads if new photos are provided
            if (isset($_FILES['photos']) && $_FILES['photos']['size'][0] > 0) {
                // Delete existing photos from server and database
                $stmt_photos = $conn->prepare("SELECT photo_path FROM ListingPhotos WHERE listing_id = ?");
                $stmt_photos->bind_param("i", $listing_id);
                $stmt_photos->execute();
                $result_photos = $stmt_photos->get_result();
                while ($row = $result_photos->fetch_assoc()) {
                    if (file_exists($row['photo_path'])) {
                        unlink($row['photo_path']); // Delete photo file
                    }
                }
                $stmt_photos->close();

                // Delete photo records
                $stmt_delete_photos = $conn->prepare("DELETE FROM ListingPhotos WHERE listing_id = ?");
                $stmt_delete_photos->bind_param("i", $listing_id);
                $stmt_delete_photos->execute();
                $stmt_delete_photos->close();

                // Insert new photos
                $photos = $_FILES['photos'];
                $photo_count = count($photos['name']);
                for ($i = 0; $i < $photo_count; $i++) {
                    $photo_name = time() . '_' . $photos['name'][$i];
                    $target_dir = "../images/listings/";
                    $target_file = $target_dir . basename($photo_name);

                    if (move_uploaded_file($photos['tmp_name'][$i], $target_file)) {
                        // Insert photo record
                        $stmt_photo = $conn->prepare("INSERT INTO ListingPhotos (listing_id, photo_path) VALUES (?, ?)");
                        $stmt_photo->bind_param("is", $listing_id, $target_file);
                        $stmt_photo->execute();
                        $stmt_photo->close();
                    }
                }
            }
            // Redirect back to the dashboard
            header('Location: ../dashboard.php');
            exit();
        } else {
            $error = "Error updating listing: " . $stmt_update->error;
            echo $error;
        }
        $stmt_update->close();
    } else {
        echo "Listing not found or you do not have permission to edit it.";
    }

    $stmt->close();
}
$conn->close();
