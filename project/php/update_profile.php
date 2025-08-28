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
    $full_name = $_POST['fullname'];
    $phone = $_POST['phone'];
    $nid = $_POST['nid'];
    $date_of_birth = $_POST['dob'];

    // Handle photo upload if provided
    if (isset($_FILES['photo']) && $_FILES['photo']['size'] > 0) {
        $photo = $_FILES['photo'];
        $photo_name = time() . '_' . $photo['name'];
        $target_dir = "../images/users/";
        $target_file = $target_dir . basename($photo_name);

        if (move_uploaded_file($photo['tmp_name'], $target_file)) {
            // Update user with new photo
            $stmt = $conn->prepare("UPDATE Users SET full_name = ?, phone = ?, nid = ?, date_of_birth = ?, photo = ? WHERE user_id = ?");
            $stmt->bind_param("sssssi", $full_name, $phone, $nid, $date_of_birth, $target_file, $user_id);
        } else {
            $error = "Error uploading photo.";
        }
    } else {
        // Update user without changing photo
        $stmt = $conn->prepare("UPDATE Users SET full_name = ?, phone = ?, nid = ?, date_of_birth = ? WHERE user_id = ?");
        $stmt->bind_param("ssssi", $full_name, $phone, $nid, $date_of_birth, $user_id);
    }

    if ($stmt->execute()) {
        header('Location: ../dashboard.php');
        exit();
    } else {
        $error = "Error: " . $stmt->error;
        echo $error;
    }

    $stmt->close();
}
$conn->close();
