<?php
session_start();
include '../db_connection.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, return an error message
    echo json_encode(['error' => 'User not logged in']);
    exit();
}

$user_id = $_SESSION['user_id'];

// Prepare the SQL statement
$stmt = $conn->prepare("SELECT user_id, full_name, username, phone, nid, date_of_birth, photo, date_joined FROM Users WHERE user_id = ?");
$stmt->bind_param("i", $user_id);

// Execute the statement
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    // Fetch user data
    $user = $result->fetch_assoc();
    // Return user data as JSON
    echo json_encode($user);
} else {
    // If user not found, return an error message
    echo json_encode(['error' => 'User not found']);
}

$stmt->close();
$conn->close();
