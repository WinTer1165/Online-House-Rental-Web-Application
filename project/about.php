<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>About Us | HabitaFlow</title>
    <meta name="description" content="Learn about HabitaFlow, your trusted partner in finding the perfect home. Meet our team and discover our mission to help you find your dream property.">
    <meta name="keywords" content="HabitaFlow, About Us, real estate, team, mission, home rentals, property listings">
    <meta name="author" content="HabitaFlow Team">
    <meta property="og:title" content="About Us | HabitaFlow" />
    <meta property="og:description" content="Discover HabitaFlow's mission, values, and the team dedicated to helping you find your dream home." />
    <meta property="og:image" content="../images/logo/about.png" />
    <meta property="og:url" content="https://earlyaccess.duckghor.com/" />
    <meta property="og:type" content="website" />
    <link rel="icon" href="/images/logo/home-button.png" type="image/icon type" />
    <link rel="stylesheet" href="css/about.css">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-xxx"
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
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

    <!-- About Section -->
    <section id="about">
        <div class="container">
            <h1>About HabitaFlow</h1>
            <p>
                Welcome to HabitaFlow, your number one source for finding the perfect home. We're dedicated to providing you the best listings, with a focus on reliability, customer service, and uniqueness.
            </p>
            <p>
                Founded in 2024, HabitaFlow has come a long way from its beginnings. When we first started out, our passion for helping people find their dream homes drove us to start our own business.
            </p>
            <p>
                We hope you enjoy our service as much as we enjoy offering them to you. If you have any questions or comments, please don't hesitate to email us at help@HabitaFlow.com</a>.
            </p>
            <p>
                Sincerely,<br>
                The HabitaFlow Team
            </p>
        </div>
    </section>

    <!-- Team Section -->
    <section id="team">
        <div class="container">
            <h2>Meet Our Team</h2>
            <div class="team-members">
                <!-- Team Member 1 -->
                <div class="team-member">
                    <img src="images/team/member1.png" alt="Team Member 1">
                    <h3>Li Wei</h3>
                    <p>Founder & CEO</p>
                </div>
                <!-- Team Member 2 -->
                <div class="team-member">
                    <img src="images/team/member2.jpg" alt="Team Member 2">
                    <h3>Jack Smith</h3>
                    <p>Co-Founder & COO</p>
                </div>
                <!-- Team Member 2 -->
                <div class="team-member">
                    <img src="images/team/member3.jpg" alt="Team Member 2">
                    <h3>Wang Fang</h3>
                    <p>Co-Founder & CTO</p>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
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