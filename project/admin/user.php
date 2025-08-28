<?php
session_start();
include '../php/db_connection.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: admin-login.php');
    exit();
}

// Delete user if delete request is sent
if (isset($_GET['delete_user'])) {
    $user_id = intval($_GET['delete_user']);
    $sql = "DELETE FROM Users WHERE user_id = $user_id";
    $conn->query($sql);
    header('Location: user.php');
}

// Fetch users
$sql = "SELECT * FROM Users";
$users = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Manage Users</title>
    <link rel="stylesheet" type="text/css" href="../admin/styles/user.css">
    <link rel="stylesheet" href="../admin/styles/navbar.css">
    <link rel="icon" href="/images/logo/personalized-support.png" type="image/icon type" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h2>User Accounts</h2>
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Date Joined</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user = $users->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $user['user_id']; ?></td>
                        <td><?php echo htmlspecialchars($user['full_name']); ?></td>
                        <td><?php echo htmlspecialchars($user['username']); ?></td>
                        <td><?php echo $user['phone']; ?></td>
                        <td><?php echo $user['date_joined']; ?></td>
                        <td>
                            <a href="user.php?delete_user=<?php echo $user['user_id']; ?>" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="bottom-links">
            <a href="admin-dashboard.php">Back to Dashboard</a>
        </div>
    </div>
    <footer>
        <div class="footer-content">
            <p>&copy; 2024 HabitaFlow. All rights reserved.</p>
            <ul class="footer-links">
                <li><a href="/about.php">About Us</a></li>
                <li><a href="/privacy.php">Privacy Policy</a></li>
                <li><a href="/index.php">User Home</a></li>
            </ul>
        </div>
    </footer>
</body>

</html>