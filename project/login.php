<?php
session_start();
include 'php/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch user
    $stmt = $conn->prepare("SELECT user_id, password FROM Users WHERE username = ?");
    $stmt->bind_param("s", $username);

    if ($stmt->execute()) {
        $stmt->store_result();
        if ($stmt->num_rows == 1) {
            $stmt->bind_result($user_id, $hashed_password);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
                // Login successful
                $_SESSION['user_id'] = $user_id;
                header('Location: dashboard.php');
                exit();
            } else {
                $error = "Invalid username or password.";
            }
        } else {
            $error = "Invalid username or password.";
        }
    } else {
        $error = "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login | HabitaFlow</title>
    <meta name="description" content="Login to your HabitaFlow account to manage your listings and find your perfect home. Secure and easy access to your dashboard.">
    <meta name="keywords" content="HabitaFlow, login, user account, home rentals, property listings, dashboard">
    <meta name="author" content="HabitaFlow Team">
    <meta property="og:title" content="Login | HabitaFlow" />
    <meta property="og:description" content="Access your HabitaFlow account to manage your listings and preferences." />
    <meta property="og:image" content="../images/logo/login.png" />
    <meta property="og:url" content="https://earlyaccess.duckghor.com/" />
    <meta property="og:type" content="website" />
    <link rel="icon" href="/images/logo/home-button.png" type="image/icon type" />
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="js/login.js" defer></script>
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
                <li><a href="login.php"> Login</a></li>
                <li><a href="signup.php">Sign Up</a></li>
            <?php } ?>
        </ul>
    </nav>

    <!-- Login Form -->
    <div class="login-container">
        <form id="login-form" action="login.php" method="POST" novalidate>
            <h2>Login to Your Account</h2>

            <?php if (isset($error)) {
                echo "<p class='error'>$error</p>";
            } ?>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit"><i class="fas fa-sign-in-alt"></i> Login</button>
            <p><a href="forgot_password.php">Forgot your password?</a></p>
            <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
        </form>
    </div>

</body>

</html>