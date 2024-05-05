<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Write a Review</title>
  <style>
    body {
      background-color: #f5f5fa; /* Beige */
      font-family: Arial, sans-serif;
      color: #333; /* Dark grey */
    }
    
    h2 {
      text-align: center;
      color: #6a5acd; /* Lilac */
    }
    
    form {
      margin: 0 auto;
      width: 80%;
      background-color: #fff; /* White */
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1); /* Soft shadow */
    }
    
    label {
      display: block;
      margin-bottom: 5px;
      color: #6a5acd; /* Lilac */
    }
    
    input[type="text"],
    textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc; /* Light grey */
      border-radius: 5px;
      margin-bottom: 10px;
      box-sizing: border-box; /* Make sure padding and border don't affect width */
    }
    
    .stars {
      display: inline-block;
      font-size: 30px;
      margin-bottom: 10px;
    }
    
    .stars a {
      text-decoration: none;
      color: gold;
    }
    
    .stars a:hover,
    .stars a:hover ~ a {
      color: #6a5acd; /* Lilac */
    }
    
    button[type="submit"] {
      padding: 10px 20px;
      background-color: #6a5acd; /* Lilac */
      color: #fff; /* White */
      border: none;
      cursor: pointer;
      border-radius: 5px;
      transition: background-color 0.3s ease; /* Smooth transition */
    }
    
    button[type="submit"]:hover {
      background-color: #4b0082; /* Dark purple */
    }
  </style>
</head>
<body>
  <h2>Write a Review</h2>
  
  <form action="reviews.php" method="post">
    <div>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>
    </div>
    
    <div>
      <label for="room">Room Type:</label>
      <input type="text" id="room" name="room" required>
    </div>
    
    <div class="stars">
      <label for="rating">Rating:</label>
      <input type="hidden" id="rating" name="rating" required>
      <a href="#" onclick="rate(1)" style="margin-right: 5px;">☆</a>
      <a href="#" onclick="rate(2)" style="margin-right: 5px;">☆</a>
      <a href="#" onclick="rate(3)" style="margin-right: 5px;">☆</a>
      <a href="#" onclick="rate(4)" style="margin-right: 5px;">☆</a>
      <a href="#" onclick="rate(5)" style="margin-right: 5px;">☆</a>
    </div>
    
    <div>
      <label for="feedback">Feedback:</label>
      <textarea id="feedback" name="feedback" rows="5" placeholder="Write your feedback here..." required></textarea>
    </div>
    
    <button type="submit">Submit Review</button>
  </form>
  
  <script>
    // JavaScript for star rating
    function rate(stars) {
      // Set the hidden input value to the selected number of stars
      document.getElementById('rating').value = stars;
      
      // Clear previous rating
      document.querySelectorAll('.stars a').forEach(function (star, index) {
        if (index < stars) {
          star.textContent = '★'; // Filled star
        } else {
          star.textContent = '☆'; // Empty star
        }
      });
    }
  </script>
</body>
</html>
