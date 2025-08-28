<?php
session_start();
include '../php/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hashing the password
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $sql = "INSERT INTO Admins (full_name, username, password, email) VALUES ('$full_name', '$username', '$password', '$email')";

    if ($conn->query($sql) === TRUE) {
        header('Location: admin-login.php');
    } else {
        $error = "Error: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Registration</title>
    <link rel="stylesheet" type="text/css" href="../admin/styles/register.css">
    <link rel="icon" href="/images/logo/personalized-support.png" type="image/icon type" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <div class="form-container">
        <a href="admin-index.php" class="admin-home-link">Admin Home</a>
        <h2>Admin Registration</h2>
        <?php if (isset($error)) echo "<p>$error</p>"; ?>
        <form method="POST" action="">
            <input type="text" name="full_name" placeholder="Full Name" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
    </div>
</body>

</html>