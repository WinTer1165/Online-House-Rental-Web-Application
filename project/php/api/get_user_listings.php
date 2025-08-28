<?php
session_start();
include '../db_connection.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode([]);
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT L.*, GROUP_CONCAT(LP.photo_path) AS photos
        FROM Listings L
        LEFT JOIN ListingPhotos LP ON L.listing_id = LP.listing_id
        WHERE L.user_id = ?
        GROUP BY L.listing_id";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$listings = [];
while ($row = $result->fetch_assoc()) {
    $row['photos'] = explode(',', $row['photos']);
    $listings[] = $row;
}

echo json_encode($listings);

$stmt->close();
$conn->close();
