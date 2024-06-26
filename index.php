<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CSS/Home Page/style.css">
  <link rel="stylesheet" href="./CSS/Home Page/header-footer.css">
  <title>Sports Inventory Management</title>
  </head>
<style>
  button[type="submit"] {
    background-color: #4CAF50; /* Green background */
    border: none; /* Remove border */
    color: white; /* White text color */
    padding: 15px 32px; /* Padding */
    text-align: center; /* Centered text */
    text-decoration: none; /* Remove underline */
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer; /* Cursor on hover */
    transition-duration: 0.4s; /* Transition */
  }
  
  button[type="submit"]:hover {
    border-radius: 10px;
    background-color: #45a049; /* Darker green on hover */
}
</style>
<body>
    <my-header></my-header>
  <section id="intro" class="flex-row">
    <div class="container flex-column">
      <h2 id="workhard-quote">
        WORK HARD</br>
        UNTIL YOU WIN
      </h2>
      <div class="flex-column sub-container">
        <p>
          Unlock your Potential...
        </p>
        <button type="button">Shop Now</button>
      </div>
    </div> 
    <div class="container  flex-column">
      <img src="./CSS/Home Page/cartoon_badmintons.png" alt="">
    </div>
  </section>
<hr>

 <section class="shop-category">
    <h2>
      Shop by Sports
    </h2>
    <div class="flex-row">
      <div class=" box"><img src="./CSS/Home Page/shop-Category/cricket.jpg" alt="">
        <figcaption>Cricket</figcaption>
      </div>
      <div class="box"><img src="./CSS/Home Page/shop-Category/Basketball.jpg" alt="">
        <figcaption>Basketball</figcaption>
      </div>
      <div class="box"><img src="./CSS/Home Page/shop-Category/football.jpg" alt="">
        <figcaption>Football</figcaption>
      </div>
      <div class="box"><img src="./CSS/Home Page/shop-Category/squash.jpg" alt="">
        <figcaption>Squash</figcaption>
      </div>
      <div class="box"><img src="./CSS/Home Page/shop-Category/tableTennis.jpg" alt="">
        <figcaption>Table Tennis</figcaption>
      </div>
      <div class="box"><img src="./CSS/Home Page/shop-Category/Tennis.jpg" alt="">
        <figcaption>Tennis</figcaption>
      </div>
    </div>
  </section> 

  <hr>
  <section id="Stories">
    <h2>
      GOAT Stories
    </h2>
    <div class="flex-row">
      <div class="box"><img src="./CSS/Home Page/GOAT-stories/pv.avif" alt="">
      </div>
      <div class=" box"><img src="./CSS/Home Page/GOAT-stories/rohit.webp" alt="">
      </div>
      <div class="box"><img src="./CSS/Home Page/GOAT-stories/niraj.jpg" alt="">
      </div>
      <div class="box"><img src="./CSS/Home Page/GOAT-stories/sachin.jfif" alt="">
      </div>
      <div class="box"><img src="./CSS/Home Page/GOAT-stories/sunil.jpg" alt="">
      </div>
      <div class="box"><img src="./CSS/Home Page/GOAT-stories/virat.jpg" alt="">
      </div>
    </div>
  </section>
  <hr>

  <section id="reviews" class="flex-row">
    <h2>Customer Reviews</h2>
    <div class="review-card">
      <p>"I am extremely satisfied with the quality of the products and the prompt delivery. Highly recommended!"</p>
      <p>- Rajesh Kumar</p>
    </div>
    <div class="review-card">
      <p>"The customer service provided by this company is exceptional. They went above and beyond to assist me with my queries. Will definitely be a returning customer!"</p>
      <p>- Priya Sharma</p>
    </div>
    <div class="review-card">
      <p>"I have been a loyal customer for years and I have never been disappointed. The products are top-notch and the prices are unbeatable. Keep up the great work!"</p>
      <p>- Sanjay Patel</p>
    </div>
    <div class="review-card">
      <p>"I recently made a purchase and I am extremely happy with my experience. The website is user-friendly and the checkout process was seamless. Will definitely recommend to my friends!"</p>
      <p>- Aishwarya Singh</p>
    </div>
    <!-- Add more reviews as needed -->
  </section>

  <section id="contact-us" class="flex-row">
    <div>
      
    <h2>Contact Us</h2>
    <div class="contact-info">
      <div class="contact-item">
        <span class="material-icons">location_on</span>
        <p>29, Tulsi Appartment, Opposite satyam sports,Surat, India</p>
      </div>
      <div class="contact-item">
        <span class="material-icons">phone</span>
        <p>+91 98752 23785</p>
      </div>
      <div class="contact-item">
        <span class="material-icons">email</span>
        <p>info@htsports.com</p>
      </div>
    </div>
    </div>
    <div class="contact-form flex-column">
      
    <h2>Send Message</h2>
    <form class="flex-column" action="./PHP/messages.php" method="POST">
        <input type="text" name="fname" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <textarea placeholder="Your Message" name="msg" required></textarea>
        <button type="submit">Send</button>
      </form>
    </div>
  </section>

 <my-footer></my-footer>
</body>

<script src="./JS/headerFooter.js"></script>
<script src="./JS/default.js"></script>

</html>