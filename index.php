<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Serene Bay Retreat Resort</title>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet"/>
  <link rel="stylesheet" href="mystyles.css" />
  <style>
    /* CSS for modal */
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1000; /* Sit on top */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
      padding-top: 60px;
    }

    .modal-content {
      background-color: #fefefe;
      margin: 5% auto; /* 5% from the top, 15% from the bottom and centered */
      border: 1px solid #888;
      width: 80%; /* Could be more or less, depending on screen size */
    }

    /* Close button */
    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }

    /* Modal Header */
    .modal-header {
      padding: 2px 16px;
      background-color: #5cb85c;
      color: white;
    }

    /* Modal Body */
    .modal-body {
      padding: 2px 16px;
    }

    /* Modal Footer */
    .modal-footer {
      padding: 2px 16px;
      background-color: #5cb85c;
      color: white;
    }
  </style>
</head>
<body>
    <nav>
      <div class="nav__bar">
        <div class="nav__header">
          <div class="logo nav__logo">
            <div>H</div>
            <span>SERENE <br /> BAY RETREAT RESORT</span>
          </div>
          <div class="nav__menu__btn" id="menu-btn">
            <i class="ri-menu-line"></i>
          </div>
        </div>
        <ul class="nav__links" id="nav-links">
          <li><a href="#home">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#room">Room</a></li>
          <li><a href="#feature">Feature</a></li>
          <li><a href="#menu">Menu</a></li>
          <li><a href="#reviews">Reviews</a></li>
          <li><a href="#news">News</a></li>
          <li><a href="#services">Services</a></li>
        </ul>
      </div>
    </nav>

    <header class="header" id="home">
      <div class="section__container header__container">
          <p class="section__subheader">ABOUT US</p>
          <h1>Peak Serenity: <br />Your Mountain Escape</h1>   
      </div>
  </header>
  

  <section class="booking">
    <div class="section__container booking__container">
      <form id="bookingForm" action="availability.php" method="POST">
        <div class="input__group">
          <label for="arrival">Arrival Date</label>
          <input id="arrival" name="arrival" type="date" placeholder="Your Arrival Date" required />
        </div>
        <div class="input__group">
          <label for="departure">Departure Date</label>
          <input id="departure" name="departure" type="date" placeholder="Your Departure Date" required />
        </div>
        <div class="input__group">
          <label for="guests">Guests</label>
          <input id="guests" name="guests" type="number" placeholder="No Of Guests" required />
        </div>
        <button type="submit" class="btn">Check Availability</button>
      </form>
    </div>
  </section>

    <section class="about" id="about">
      <div class="section__container about__container">
        <div class="about__grid">
          <div class="about__image">
            <img src="exthotel.jpg" alt="about" />
          </div>
          <div class="about__card">
            <span><i class="ri-user-line"></i></span>
            <h4>Strong Team</h4>
            <p>
              Unlocking Hospitality Excellence And Ensures Your Perfect Stay
            </p>
          </div>
          <div class="about__image">
            <img src="about-2.jpg" alt="about" />
          </div>
          <div class="about__card">
            <span><i class="ri-calendar-check-line"></i></span>
            <h4>Luxury Room</h4>
            <p>Experience Unrivaled Luxury at Our Exquisite Luxury Rooms</p>
          </div>
        </div>
        <div class="about__content">
          <p class="section__subheader">ABOUT US</p>
          <h2 class="section__header">Uncover Our Alpine Retreat</h2>
          <p class="section__description">
            Welcome to Serene Bay Retreat Resort, your haven for peak serenity. Nestled amidst majestic mountains, our resort offers a tranquil escape like no other. Experience the perfect blend of luxury and nature as you unwind in our exquisite accommodations and enjoy breathtaking views.
          </p>
          <!--<button class="btn">Book Now</button>-->
        </div>
      </div>
    </section>

  <section class="room__container" id="room">
  <p class="section__subheader">ROOMS</p>
  <h2 class="section__header">Hand Picked Rooms</h2>
  <div class="room__grid" id="roomGrid">
    <div class="room__card">
      <a href="book_room.php?room=Deluxe%20Suite&price=120">
        <img src="room-1.jpg" alt="room" />
      </a>
      <div class="room__card__details">
        <div>
          <h4>Deluxe Suite</h4>
          <p>Well-appointed rooms designed for guests who desire a more.</p>
        </div>
        <h3>Rs.11000<span>/night</span></h3>
      </div>

      <div style="text-align: center;">
   <a href="write_review.php?room=Deluxe%20" class="btn">Write a Review</a>
  </div>
    </div>
    
    <div class="room__card">
      <a href="book_room.php?room=Family%20Suite&price=360">
        <img src="room-2.jpg" alt="room" />
      </a>
      <div class="room__card__details">
        <div>
          <h4>Family Suite</h4>
          <p>Consist of multiple rooms and a common living area.</p>
        </div>
        <h3>Rs.31000<span>/night</span></h3>
      </div>

  <div style="text-align: center;">
  <a href="write_review.php?room=Family%20Suite" class="btn">Write a Review</a>
  </div>

    </div>
    
    <div class="room__card">
      <a href="book_room.php?room=Luxury%20Penthouse&price=720">
        <img src="room-3.jpg" alt="room" />
      </a>
      <div class="room__card__details">
        <div>
          <h4>Luxury Penthouse</h4>
          <p>Top-tier accommodations usually on the highest floors of a hotel.</p>
        </div>
        <h3>Rs.61000<span>/night</span></h3>
      </div>
      <div style="text-align: center;">
   <a href="write_review.php?room=Luxury%20Penthouse" class="btn">Write a Review</a>
  </div>
  </div>
</section>


    <section class="intro">
      <div class="section__container intro__container">
        <div class="intro__cotent">
          <p class="section__subheader">INTRO VIDEO</p>
          <h2 class="section__header">Meet With Our Luxury Place</h2>
          <p class="section__description">
            Discover the essence of serenity as you immerse yourself in the tranquil ambiance and unparalleled beauty of our resort. Let Serene Bay Retreat Resort be your escape to nature's tranquility, where every moment is designed to refresh your soul. Join us for an unforgettable mountain retreat that will leave you inspired and revitalized.
          </p>
          <!--<button class="btn">Book Now</button>-->
        </div>
        <div class="intro__video">
          <video src="mountain.mp4" autoplay muted loop></video>
        </div>
      </div>
    </section>

    <section class="section__container feature__container" id="feature">
      <p class="section__subheader">FACILITIES</p>
      <h2 class="section__header">Core Features</h2>
      <div class="feature__grid">
        <div class="feature__card">
          <span><i class="ri-time-line"></i></span>
          <h4>Quite Hours</h4>
          <p>
            We understand that peace and uninterrupted rest are essential for a
            rejuvenating experience.
          </p>
        </div>
        <div class="feature__card">
          <span><i class="ri-map-pin-line"></i></span>
          <h4>Best Location</h4>
          <p>
            At our hotel booking website, we take pride in offering
            accommodations in the most prime and sought-after locations.
          </p>
        </div>
        <div class="feature__card">
          <span><i class="ri-coupon-line"></i></span>
          <h4>Special Offers</h4>
          <p>
            Whether you're planning the best holiday getaway, or a business trip, our
            carefully curated special offers cater to all your needs.
          </p>
        </div>
      </div>
    </section>

    <section class="menu" id="menu">
      <div class="section__container menu__container">
        <div class="menu__header">
          <div>
            <p class="section__subheader">MENU</p>
            <h2 class="section__header">Our Menu Hightlights</h2>
          </div>
          <div class="section__nav">
            <span><i class="ri-arrow-left-line"></i></span>
            <span><i class="ri-arrow-right-line"></i></span>
          </div>
        </div>
        <ul class="menu__items">
          <li>
            <img src="menu-1.jpeg" alt="menu" />
            <div class="menu__details">
              <h4>Mirage Medley Salad</h4>
              <p>
              Mirage Medley Salad tantalizes with its blend of crisp greens, succulent fruits, and nuts, creating a flavorful illusion of freshness and satisfaction in every bite.
              </p>
            </div>
          </li>
          <li>
            <img src="menu-2.jpeg" alt="menu" />
            <div class="menu__details">
              <h4>Enchanted Berry Bliss Delight</h4>
              <p>
                
Enchanted Berry Bliss Delight enchants taste buds with a symphony of fresh berries, velvety yogurt, and crunchy granola, weaving a spell of pure bliss and irresistible flavor in each mouthful.
              </p>
            </div>
          </li>
          <li>
            <img src="menu-3.jpeg" alt="menu" />
            <div class="menu__details">
              <h4>Tropical Tango Burger</h4>
              <p>
              Tropical Tango Burger features grilled pineapple, zingy mango salsa, and creamy avocado, culminating in a plant-based symphony of tropical flavors and textures.
              </p>
            </div>
          </li>
          <li>
            <img src="menu-4.jpg" alt="menu" />
            <div class="menu__details">
              <h4>Fruit Parfait</h4>
              <p>
                Our Fruit Parfait is a delightful culinary masterpiece of
                freshness and flavor.
              </p>
            </div>
          </li>
          <li>
            <img src="menu-5.jpeg" alt="menu" />
            <div class="menu__details">
              <h4>Raspberry Apple Crisp </h4>
              <p>
                
Raspberry Apple Crisp tantalizes with tart raspberries, sweet apples, and a golden oat topping, creating a warm and comforting dessert delight.
              </p>
            </div>
          </li>
          <li>
            <img src="menu-6.jpeg" alt="menu" />
            <div class="menu__details">
              <h4>Rose Petal Pudding</h4>
              <p>
                
Rose Petal Pudding delights with delicate rose flavor, creamy texture, and a sprinkle of petals, offering a floral-infused culinary experience.
              </p>
            </div>
          </li>
          <li>
            <img src="menu-7.jpeg" alt="menu" />
            <div class="menu__details">
              <h4>Mystic Spice Chowmein</h4>
              <p>
                
Mystic Spice Chowmein entices with aromatic spices, vibrant veggies, and tender noodles, conjuring an exotic and flavorful culinary adventure.
              </p>
            </div>
          </li>
          <li>
            <img src="menu-8.jpeg" alt="menu" />
            <div class="menu__details">
              <h4>Chai Panna Cota</h4>
              <p>
              Chai Panna Cotta enchants with its velvety texture infused with aromatic chai spices, creating a luxurious dessert that captivates the senses with every spoonful.
              </p>
            </div>
          </li>
          <li>
            <img src="menu-9.jpeg" alt="menu" />
            <div class="menu__details">
              <h4>Lemon Butter Cheese Ravioli</h4>
              <p>
                
Lemon Butter Cheese Ravioli dazzles with creamy cheese filling, zesty lemon-infused butter sauce, and delicate pasta, a harmonious blend of flavors.
              </p>
            </div>
          </li>
          <li>
            <img src="menu-10.jpeg" alt="menu" />
            <div class="menu__details">
              <h4>Golden Oasis Delight Cake</h4>
              <p>
              Golden Oasis Delight Cake mesmerizes with its golden hue, layers of moist sponge, rich cream, and decadent fruit, a sublime indulgence for all occasions.
              </p>
            </div>
          </li>
        </ul>

        <section class="reviews" id="reviews">
          <div class="section__container1 reviews__container">
              <p class="section__subheader1">REVIEWS</p>
              <h2 class="section__header1">What Our Guests Say</h2>

              <div class="reviews__grid">
                  <div class="review__card">
                      <h4>Sweta</h4>
                      <p>Stayed on March 20, 2024</p>
                      <p class="rating">★★★★★</p>
                      <p class="review__text">
                          "The most relaxing stay I've ever had! The room was beautiful and the views were breathtaking. The staff were incredibly welcoming and accommodating. Can't wait to come back!"
                      </p>
                  </div>
                  <div class="review__card">
                      <h4>Shalie</h4>
                      <p>Stayed on April 5, 2024</p>
                      <p class="rating">★★★★☆</p>
                      <p class="review__text">
                          "A wonderful retreat in the mountains! The resort is gorgeous and the amenities are top-notch. A little expensive, but definitely worth it for a special occasion!"
                      </p>
                  </div>
                  <div class="review__card">
                      <h4>Mayank</h4>
                      <p>Stayed on April 10, 2024</p>
                      <p class="rating">★★★★★</p>
                      <p class="review__text">
                          "Fantastic experience! The food was delicious, and the staff went above and beyond to make our stay unforgettable. Highly recommend!"
                      </p>
                  </div>
              </div>
          </div>
        </section>

  <section class="section__container news__container" id="news">
  <div class="news__header">
    <div>
      <p class="section__subheader">BLOG</p>
      <h2 class="section__header">News Feeds</h2>
    </div>
    <div class="section__nav">
      <span><i class="ri-arrow-left-line"></i></span>
      <span><i class="ri-arrow-right-line"></i></span>
    </div>
  </div>
  <div class="news__grid">
    <a href="news-1.html" class="news__card">
      <img src="newshead1.jpg" alt="news" />
      <div class="news__card__title">
        <p>25th Nov 2023</p>
        <p>By Siddharth</p>
      </div>
      <h4>Exploring Local Culinary Gems: A Foodie's Guide.</h4>
      <p>
        Join Emily as she takes you on a gastronomic adventure through the
        neighborhood surrounding our hotel.
      </p>
    </a>
    <a href="news-2.html" class="news__card">
      <img src="news-2.jpg" alt="news" />
      <div class="news__card__title">
        <p>15th Jan 2024</p>
        <p>By Ananya</p>
      </div>
      <h4>Balancing Mind, Body, and Soul at Our Hotel.</h4>
      <p>
        Discover holistic spa treatments, fitness facilities, and
        mindfulness practices that will leave you feeling refreshed.
      </p>
    </a>
    <a href="news-3.html" class="news__card">
      <img src="news-3.jpg" alt="news" />
      <div class="news__card__title">
        <p>30th April 2024</p>
        <p>By Jyotii</p>
      </div>
      <h4>Exploring Outdoor Activities Near Our Hotel.</h4>
      <p>
        From hiking and biking trails to water sports and wildlife
        encounters, she highlights ways to experience nature's wonders.
      </p>
    </a>
  </div>
</section>

<section class="services" id="services" style="padding: 50px 0;">
  <div class="section__container services__container">
    <p class="section__subheader" style="text-align: center;">SERVICES</p><br>
    <h2 class="section__header" style="text-align: center;">Our Extra Services</h2><br>
    <div class="services__grid" style="display: flex; justify-content: space-around; flex-wrap: wrap;">
      <div class="service__card" style="width: 45%; margin-bottom: 30px;">
        <video src="spa.mp4" autoplay muted loop style="width: 100%; height: auto; margin-bottom: 10px;"></video>
        <i class="ri-spa-line" style="font-size: 48px; margin-bottom: 10px;"></i>
        <h4 style="text-align: center;">Spa</h4>
        <p style="text-align: center;">Indulge in rejuvenating spa treatments for ultimate relaxation.</p>
        <div style="text-align: center;"><br>
          <a href="book_spa.php" class="btn">Book Spa</a>
        </div>
      </div>
      <div class="service__card" style="width: 45%; margin-bottom: 30px;">
        <video src="gym.mp4" autoplay muted loop style="width: 100%; height: auto; margin-bottom: 10px;"></video>
        <!--<i class="ri-run-line" style="font-size: 48px; margin-bottom: 10px;"></i>-->
        <h4 style="text-align: center;">Gym</h4>
        <p style="text-align: center;">Stay fit during your stay with our well-equipped gym facilities.</p>
        <div style="text-align: center;"><br>
          <a href="book_gym.php" class="btn">Book Gym</a>
        </div>
      </div>
      <div class="service__card" style="width: 45%; margin-bottom: 30px;">
        <video src="amenities-1.mp4" autoplay muted loop style="width: 100%; height: auto; margin-bottom: 10px;"></video>
        <i class="ri-swimming-fill" style="font-size: 48px; margin-bottom: 10px;"></i>
        <h4 style="text-align: center;">Pool Activities</h4>
        <p style="text-align: center;">Enjoy various poolside activities for both adults and children.</p>
        <div style="text-align: center;"><br>
          <a href="book_pool.php" class="btn">Book Pool Party</a>
        </div>
      </div>
      <div class="service__card" style="width: 45%; margin-bottom: 30px;">
        <video src="mountain-1.mp4" autoplay muted loop style="width: 100%; height: auto; margin-bottom: 10px;"></video>
        <!--<i class="ri-road-map-fill" style="font-size: 48px; margin-bottom: 10px;"></i>-->
        <h4 style="text-align: center;">Tour Guides</h4>
        <p style="text-align: center;">Explore nearby attractions with our experienced tour guides.</p>
        <div style="text-align: center;"><br>
          <a href="book_tour.php" class="btn">Book Tour Guide</a>
        </div>
      </div>
    </div>
  </div>
</section>


    <footer class="footer">
      <div class="section__container footer__container">
        <div class="footer__col">
          <div class="logo footer__logo">
            <div>H</div>
            <span>SERENE <br />BAY RETREAT RESORT</span>
          </div>
          <p class="section__description">
            Let us transport you to a world of unparalleled beauty and comfort at Serene Bay Retreat Resort. Your mountain escape awaits.
          </p>
          <ul class="footer__socials">
            <li>
              <a href="https://www.youtube.com/"><i class="ri-youtube-fill"></i></a>
            </li>
            <li>
              <a href="https://www.instagram.com/?hl=en"><i class="ri-instagram-line"></i></a>
            </li>
            <li>
              <a href="https://www.facebook.com/"><i class="ri-facebook-fill"></i></a>
            </li>
            <li>
              <a href="https://www.linkedin.com/"><i class="ri-linkedin-fill"></i></a>
            </li>
          </ul>
        </div>
        <div class="footer__col">
          <h4>Contact Us</h4>
          <div class="footer__links">
            <li>
              <span><i class="ri-phone-fill"></i></span>
              <div>
                <h5>Phone Number</h5>
                <p>+91 9999-000-4493</p>
              </div>
            </li>
            <li>
              <span><i class="ri-record-mail-line"></i></span>
              <div>
                <h5>Email</h5>
                <p>info@serenebayretreatresort.com</p>
              </div>
            </li>
            <li>
              <span><i class="ri-map-pin-2-fill"></i></span>
              <div>
                <h5>Location</h5>
                <p>Dehradun</p>
              </div>
            </li>
          </div>
        </div>
      </div>
      <div class="footer__bar">
        Made with ❤️ by Serene Bay Retreat Resort. If you enjoyed it, consider buying me a ☕️ to fuel more creativity!
      </div>
    </footer>

    <!-- The Modal -->
  <div id="loginModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <span class="close" onclick="closeModal('loginModal')">&times;</span>
      <?php
      // Include login form
      include_once 'login.php';
      ?>
    </div>
  </div>

<!-- Include PHP login and registration forms here -->
<script src="https://unpkg.com/scrollreveal"></script>
    <script src="main.js"></script>
  <script>
    // Function to open modal
    function openModal(modalId) {
      document.getElementById(modalId).style.display = "block";
    }

    // Function to close modal
    function closeModal(modalId) {
      document.getElementById(modalId).style.display = "none";
    }

    // Check if the user is logged in
    // If not logged in, open the login modal
    <?php
    // Check your login session here
    if (!isset($_SESSION['username'])) {
      echo 'openModal("loginModal");';
    }
    ?>
  </script>
</body>
</html>

