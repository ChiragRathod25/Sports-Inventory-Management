<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact US</title>
    <link rel="stylesheet" href="../CSS/Home Page/header-footer.css" />
    <link rel="stylesheet" href="../CSS/Home Page/style.css" />
    <link rel="stylesheet" href="../CSS/contactUs.css">
</head>
<body>
    <my-header></my-header>
    <div class="contact-us">
        <h1>Contact Us</h1>
        <p>We'd love to hear from you! Whether you have a question about our services, need assistance or have suggestions, our team is ready to help. Please fill out the form below:</p>
        <form action="../PHP/messages.php" method="POST">
            <label for="name">Your Name</label>
            <input type="text" id="name" name="fname" required>

            <label for="email">Your Email</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Your Message</label>
            <textarea id="message" name="msg" required rows="5"></textarea>
            <input type="submit" value="Submit">
        </form>
    </div>
    <div class="buttons">
        <a href="/HTML/aboutUs.html"><button>About Us</button></a>
        <a href="/HTML/privacyPolicy.html"><button>Privacy Policy</button></a>
        <a href="/HTML/sitemap.html"><button>Site Map</button></a>
    </div> 

    <my-footer></my-footer>
</body>
<script src="../JS/headerFooter.js"></script>
<script src="../JS/default.js"></script>
</html>