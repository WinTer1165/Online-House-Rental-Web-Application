<?php
session_start();
include 'php/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collecting form data
    $full_name = $_POST['fullname'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = $_POST['phone'];
    $nid = $_POST['nid'];
    $date_of_birth = $_POST['dob'];

    // Handle file upload
    $photo = $_FILES['photo'];
    $photo_name = time() . '_' . $photo['name'];
    $target_dir = "images/users/";
    $target_file = $target_dir . basename($photo_name);

    // Move the uploaded file
    if (move_uploaded_file($photo['tmp_name'], $target_file)) {
        // Insert into database
        $stmt = $conn->prepare("INSERT INTO Users (full_name, username, password, phone, nid, date_of_birth, photo) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $full_name, $username, $password, $phone, $nid, $date_of_birth, $target_file);

        if ($stmt->execute()) {
            $_SESSION['user_id'] = $stmt->insert_id;
            header('Location: dashboard.php');
            exit();
        } else {
            $error = "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $error = "Error uploading photo.";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up | HabitaFlow - Create Your Account</title>
    <meta name="description" content="Sign up for HabitaFlow to find your perfect home. Create an account to access exclusive listings, save your favorites, and manage your profile.">
    <meta name="keywords" content="HabitaFlow, sign up, create account, home rentals, property listings, real estate">
    <meta name="author" content="HabitaFlow Team">
    <meta property="og:title" content="Sign Up | HabitaFlow - Create Your Account" />
    <meta property="og:description" content="Join HabitaFlow to discover your next home. Sign up now to access personalized features and exclusive listings." />
    <meta property="og:image" content="../images/logo/register.png" />
    <meta property="og:url" content="https://earlyaccess.duckghor.com/" />
    <meta property="og:type" content="website" />
    <link rel="icon" href="images/logo/home-button.png" type="image/icon type" />
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="js/signup.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <!-- Navigation Bar -->
    <nav>
        <div class="logo">
            <a href="index.php" class="main-logo">HabitaFlow</a>
        </div>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="listing.php">Listings</a></li>
            <?php if (isset($_SESSION['user_id'])) { ?>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="php/logout.php">Logout</a></li>
            <?php } else { ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="signup.php">Sign Up</a></li>
            <?php } ?>
        </ul>
    </nav>
    <!-- Signup Form -->
    <div class="signup-container">
        <form id="signup-form" action="signup.php" method="POST" enctype="multipart/form-data">
            <h2>Create Your Account</h2>

            <?php if (isset($error)) {
                echo "<p class='error'>$error</p>";
            } ?>

            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" required>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" pattern="\d{11}" required>

            <label for="nid">NID:</label>
            <input type="text" id="nid" name="nid" pattern="\d{10}" required>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>

            <label for="photo">Profile Photo:</label>
            <input type="file" id="photo" name="photo" accept="image/*" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit"><i class="fas fa-user-plus"></i>  Sign Up</button>
            <p>Already have an account? <a href="../login.php">Login here</a></p>
        </form>
    </div>
</body>

</html>