<?php
session_start();
include 'php/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['code_verified']) && $_SESSION['code_verified'] === true) {
        $user_id = $_SESSION['user_id'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];

        // Validate passwords match
        if ($password !== $password_confirm) {
            $_SESSION['message'] = "Passwords do not match.";
            header("Location: reset_password.php");
            exit();
        }

        // Hash the new password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Update the user's password
        $stmt = $conn->prepare("UPDATE Users SET password = ? WHERE user_id = ?");
        $stmt->bind_param("si", $hashed_password, $user_id);

        if ($stmt->execute()) {
            // Delete the used code
            $delete_stmt = $conn->prepare("DELETE FROM PasswordReset WHERE user_id = ?");
            $delete_stmt->bind_param("i", $user_id);
            $delete_stmt->execute();

            // Unset session variables
            unset($_SESSION['code_verified']);
            unset($_SESSION['user_id']);

            $_SESSION['message'] = "Your password has been reset successfully. You can now log in.";
            header("Location: login.php");
            exit();
        } else {
            $_SESSION['message'] = "Error updating password. Please try again.";
            header("Location: reset_password.php");
            exit();
        }
    } else {
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
