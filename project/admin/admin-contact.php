<?php
session_start();
include '../php/db_connection.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: admin-login.php');
    exit();
}

// Delete message if delete request is sent
if (isset($_GET['delete_message'])) {
    $message_id = intval($_GET['delete_message']);
    $stmt = $conn->prepare("DELETE FROM ContactMessages WHERE id = ?");
    $stmt->bind_param("i", $message_id);
    $stmt->execute();
    $stmt->close();
    header('Location: admin-contact.php');
    exit();
}

// Fetch contact messages
$sql = "SELECT * FROM ContactMessages ORDER BY date_submitted DESC";
$messages = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Contact Messages</title>
    <link rel="stylesheet" type="text/css" href="../admin/styles/contact.css">
    <link rel="stylesheet" href="../admin/styles/navbar.css">
    <link rel="icon" href="/images/logo/personalized-support.png" type="image/icon type" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h2>Contact Messages</h2>
        <table>
            <thead>
                <tr>
                    <th>Message ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Date Submitted</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($message = $messages->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $message['id']; ?></td>
                        <td><?php echo htmlspecialchars($message['name']); ?></td>
                        <td><?php echo htmlspecialchars($message['email']); ?></td>
                        <td><?php echo htmlspecialchars($message['subject']); ?></td>
                        <td><?php echo nl2br(htmlspecialchars($message['message'])); ?></td>
                        <td><?php echo $message['date_submitted']; ?></td>
                        <td>
                            <a href="admin-contact.php?delete_message=<?php echo $message['id']; ?>" onclick="return confirm('Are you sure you want to delete this message?')">Delete</a>
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