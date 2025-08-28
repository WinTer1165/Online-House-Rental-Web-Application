#  Online House Rental Application

A modern, user-friendly web application designed to streamline the house rental process in Dhaka, Bangladesh. This platform connects tenants and landlords through a transparent, secure, and efficient rental marketplace.

##  Table of Contents
- [About](#about)
- [Features](#features)
- [Technologies](#technologies)
- [API Configuration](#api-configuration)
- [Usage](#usage)
- [Project Structure](#project-structure)
- [Performance](#performance)

##  About

This project addresses the challenges faced in the Dhaka rental market, including:
- Unreliable and outdated property listings
- Risk of fraud and scams
- Poor user interfaces on existing platforms
- Limited options for bachelors and students

Our solution provides real-time dynamic listings, advanced search filters, transparent pricing, and diverse property choices suitable for families, bachelors, and students.

![Demo 1](https://github.com/WinTer1165/Online-House-Rental-Web-Application/blob/main/images/image10.png?raw=true)

![Demo 2](https://github.com/WinTer1165/Online-House-Rental-Web-Application/blob/main/images/image4.png?raw=true)

![Demo 3](https://github.com/WinTer1165/Online-House-Rental-Web-Application/blob/main/images/image1.png?raw=true)


##  Features

### For Users (Tenants/Landlords)
- **User Authentication**: Secure registration and login system
- **Dynamic Listings**: Create, edit, and delete property listings
- **Advanced Search**: Filter by location, price range, category, date posted, and bedrooms
- **Property Details**: Comprehensive listing information with multiple photos
- **User Dashboard**: Manage personal listings and profile
- **Password Recovery**: SMS-based verification using Twilio API
- **Responsive Design**: Mobile and desktop friendly interface

### For Administrators
- **Admin Dashboard**: Complete oversight of platform activity
- **User Management**: View and manage user accounts
- **Listing Management**: Monitor and control all property listings
- **Message System**: Handle contact form submissions
- **Analytics**: Track platform usage and performance

 PHP 7.4+ and MySQL
- Web browser (Chrome, Firefox, Safari, Edge)
- Text editor or IDE

### Local Setup

1. **Clone the repository**
```bash
git clone https://github.com/WinTer1165/Online-House-Rental-Web-Application.git
cd online-house-rental
```

2. **Start XAMPP**
   - Launch XAMPP Control Panel
   - Start Apache and MySQL services

3. **Move project files**
```bash
# Copy project folder to XAMPP htdocs directory
cp -r online-house-rental /path/to/xampp/htdocs/
```

4. **Access the application**
   - Open browser and navigate to: `http://localhost/online-house-rental`

##  Database Setup

1. **Create Database**
   - Open phpMyAdmin: `http://localhost/phpmyadmin`
   - Create new database: `house_rental_db`

2. **Import Database Schema**

3. **Configure Database Connection**
   - Edit `config/database.php`:
```php
<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'house_rental_db';

$conn = mysqli_connect($host, $username, $password, $database);
?>
```

##  API Configuration

### Twilio SMS API Setup

1. Sign up for a Twilio account at [www.twilio.com](https://www.twilio.com)
2. Get your Account SID and Auth Token
3. Configure in `config/twilio_config.php`:

```php
<?php
$twilio_sid = 'YOUR_ACCOUNT_SID';
$twilio_token = 'YOUR_AUTH_TOKEN';
$twilio_phone = 'YOUR_TWILIO_PHONE_NUMBER';
?>
```

##  Usage

### User Registration & Login
1. Navigate to the homepage
2. Click "Sign Up" to create a new account
3. Fill in required information
4. Login with credentials

### Creating a Listing
1. Login to your account
2. Go to Dashboard
3. Click "Create New Listing"
4. Fill in property details:
   - Title
   - Description
   - Price
   - Category (Family/Bachelor/Sublet)
   - Location
   - Number of bedrooms
   - Upload photos
5. Submit listing

### Searching for Properties
1. Use the search bar on homepage
2. Apply filters:
   - Location
   - Price range (Min/Max)
   - Category
   - Date posted
3. View detailed listings

##  Project Structure

```
online-house-rental/
├── index.php              # Homepage
├── login.php              # User login
├── signup.php             # User registration
├── dashboard.php          # User dashboard
├── listings.php           # All listings page
├── create_listing.php     # Create new listing
├── admin/                 # Admin panel
│   ├── login.php
│   ├── dashboard.ปhp
│   └── manage_users.php
├── assets/                # Static files
│   ├── css/
│   ├── js/
│   └── images/
├── config/                # Configuration files
│   ├── database.php
│   └── twilio_config.php
├── includes/              # Reusable components
│   ├── header.php
│   └── footer.php
└── uploads/               # User uploaded images
```

##  Performance

Based on Google PageSpeed Insights:

| Device  | Performance | Accessibility | Best Practices | SEO |
|---------|-------------|---------------|----------------|-----|
| Mobile  | 99          | 79            | 100            | 91  |
| Desktop | 93          | 79            | 100            | 91  |

##  Deployment

### Live Hosting Requirements
- Domain name ($15-20/year)
- Web hosting service ($40-80/year)
- SSL Certificate (Often included with hosting)
- PHP 7.4+ support
- MySQL 5.7+ support

### Recommended Hosting Providers
1. Namecheap - $92.9/year (Domain + Hosting + SMS API)
2. Hostinger - $64.9/year
3. GoDaddy - $107.9/year


##  Future Improvements

- [ ] Live chat system between tenants and landlords
- [ ] Multi-language support
- [ ] Dark/Light mode toggle
- [ ] Memory caching for improved performance
- [ ] Database backup system
- [ ] Advanced admin controls
- [ ] Mobile application
- [ ] Payment gateway integration
- [ ] Virtual property tours
- [ ] Review and rating system

