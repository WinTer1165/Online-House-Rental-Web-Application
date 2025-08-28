<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contact Us | HabitaFlow</title>
    <meta name="description" content="Get in touch with the HabitaFlow team. We're here to help with any questions or concerns you may have about our services.">
    <meta name="keywords" content="HabitaFlow, Contact Us, support, customer service, inquiries">
    <meta name="author" content="HabitaFlow Team">
    <meta property="og:title" content="Contact Us | HabitaFlow" />
    <meta property="og:description" content="Reach out to HabitaFlow for any assistance or inquiries. Our team is ready to help you with your needs." />
    <meta property="og:image" content="images/logo/contact.png" />
    <meta property="og:url" content="https://earlyaccess.duckghor.com/contact.php" />
    <meta property="og:type" content="website" />
    <link rel="icon" href="images/logo/home-button.png" type="image/icon type" />
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-eNQH4nH8xCmglnqF2Tm+8bk8e3qe1m0/HRtIYl1JnOWZqhmsx1F9q4ikxd8wYrhc" crossorigin="anonymous">
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
            <li><a href="privacy.php">Privacy Policy</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="about.php">About Us</a></li>
            <?php if (isset($_SESSION['user_id'])) { ?>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="php/logout.php">Logout</a></li>
            <?php } else { ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="signup.php">Sign Up</a></li>
            <?php } ?>
        </ul>
    </nav>

    <!-- Contact Us Section -->
    <section id="contact">
        <div class="container">
            <h1>Contact Us</h1>
            <p>If you have any questions, comments, or concerns, please fill out the form below, and we'll get back to you as soon as possible.</p>
            <?php
            if (isset($_SESSION['form_success'])) {
                echo "<p class='form-message form-success'>{$_SESSION['form_success']}</p>";
                unset($_SESSION['form_success']);
            } elseif (isset($_SESSION['form_error'])) {
                echo "<p class='form-message form-error'>{$_SESSION['form_error']}</p>";
                unset($_SESSION['form_error']);
            }
            ?>
            <form action="contact_process.php" method="post">
                <label for="name"><i class="fas fa-user"></i> Name:</label>
                <input type="text" id="name" name="name" placeholder="Your Name" required>

                <label for="email"><i class="fas fa-envelope"></i> Email:</label>
                <input type="email" id="email" name="email" placeholder="Your Email" required>

                <label for="subject"><i class="fas fa-tag"></i> Subject:</label>
                <input type="text" id="subject" name="subject" placeholder="Subject" required>

                <label for="message"><i class="fas fa-comment-dots"></i> Message:</label>
                <textarea id="message" name="message" rows="6" placeholder="Your Message" required></textarea>

                <button type="submit"><i class="fas fa-paper-plane"></i> Submit</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <p>&copy; 2024 HabitaFlow. All rights reserved.</p>
            <ul class="footer-links">
                <li><a href="/admin/admin-index.php">Admin Login</a></li>
            </ul>
        </div>
    </footer>
</body>

</html>