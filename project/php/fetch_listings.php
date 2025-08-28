<?php
// php/fetch_listings.php

include 'db_connection.php';

// Get filters from query parameters
$location = $_GET['location'] ?? '';
$minPrice = $_GET['minPrice'] ?? '';
$maxPrice = $_GET['maxPrice'] ?? '';
$bedrooms = $_GET['bedrooms'] ?? '';
$category = $_GET['category'] ?? '';
$sortBy = $_GET['sortBy'] ?? 'date_posted';

// Build SQL query with filters
$sql = "SELECT L.*, GROUP_CONCAT(LP.photo_path) AS photos
        FROM Listings L
        LEFT JOIN ListingPhotos LP ON L.listing_id = LP.listing_id
        WHERE 1=1";

$params = [];
$types = '';

if (!empty($location)) {
    $sql .= " AND L.location LIKE ?";
    $params[] = '%' . $location . '%';
    $types .= 's';
}

if (!empty($minPrice)) {
    $sql .= " AND L.price >= ?";
    $params[] = $minPrice;
    $types .= 'd';
}

if (!empty($maxPrice)) {
    $sql .= " AND L.price <= ?";
    $params[] = $maxPrice;
    $types .= 'd';
}

if (!empty($bedrooms)) {
    $sql .= " AND L.bedrooms = ?";
    $params[] = $bedrooms;
    $types .= 'i';
}

if (!empty($category)) {
    $sql .= " AND L.category = ?";
    $params[] = $category;
    $types .= 's';
}

$sql .= " GROUP BY L.listing_id";

if ($sortBy == 'price') {
    $sql .= " ORDER BY L.price ASC";
} else {
    $sql .= " ORDER BY L.date_posted DESC";
}

$stmt = $conn->prepare($sql);

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();

$listings = [];
while ($row = $result->fetch_assoc()) {
    // Ensure listing_id is included
    $row['listing_id'] = (int)$row['listing_id'];
    $row['photos'] = explode(',', $row['photos']);
    $listings[] = $row;
}

echo json_encode($listings);

$stmt->close();
$conn->close();
