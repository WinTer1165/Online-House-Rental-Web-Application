<?php
include '../db_connection.php';

$sql = "SELECT L.*, GROUP_CONCAT(LP.photo_path) AS photos
        FROM Listings L
        LEFT JOIN ListingPhotos LP ON L.listing_id = LP.listing_id
        GROUP BY L.listing_id
        ORDER BY date_posted DESC
        LIMIT 6"; // Get the latest 6 listings

$result = $conn->query($sql);

$listings = [];
while ($row = $result->fetch_assoc()) {
    $row['photos'] = explode(',', $row['photos']);
    $listings[] = $row;
}

echo json_encode($listings);

$conn->close();
