<!-- admin/navbar.php -->
<link rel="stylesheet" href="../admin/styles/navbar.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<nav class="navbar">
    <div class="navbar-container">
        <a href="admin-dashboard.php" class="navbar-logo">
            AdminPanel
        </a>
        <ul class="navbar-menu">
            <li class="navbar-item">
                <a href="admin-index.php" class="navbar-link">Home</a>
            </li>
            <li class="navbar-item">
                <a href="admin-dashboard.php" class="navbar-link">Listings Dashboard</a>
            </li>
            <li class="navbar-item">
                <a href="user.php" class="navbar-link">Manage Users</a>
            </li>
            <li class="navbar-item">
                <a href="admin-contact.php" class="navbar-link">Contact Messages</a>
            </li>
            <li class="navbar-item">
                <a href="admin-logout.php" class="navbar-link">Logout</a>
            </li>
        </ul>
        <div class="navbar-toggle" id="mobile-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </div>
</nav>
<script src="../admin/scripts/navbar.js"></script>