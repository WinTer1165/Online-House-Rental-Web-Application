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
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $location = $_POST['location'];
    $bedrooms = $_POST['bedrooms'];

    // Insert listing
    $stmt = $conn->prepare("INSERT INTO Listings (user_id, title, description, price, category, location, bedrooms) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issdssi", $user_id, $title, $description, $price, $category, $location, $bedrooms);

    if ($stmt->execute()) {
        $listing_id = $stmt->insert_id;

        // Handle photo uploads
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

        header('Location: ../dashboard.php');
        exit();
    } else {
        $error = "Error: " . $stmt->error;
        echo $error;
    }
    $stmt->close();
}
$conn->close();
