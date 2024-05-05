<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Room</title>
  <style>
    body {
      background-color: navy;
      color: white;
      font-family: Arial, sans-serif;
    }

    h1, h2 {
      color: goldenrod;
    }

    input[type="text"],
    input[type="date"],
    input[type="number"],
    button {
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid goldenrod;
      border-radius: 5px;
      background-color: navy;
      color: goldenrod;
    }

    input[type="text"],
    input[type="date"],
    input[type="number"] {
      width: 100%;
      box-sizing: border-box;
    }

    button {
      cursor: pointer;
    }

    button:hover {
      background-color: goldenrod;
      color: navy;
    }

    form {
      max-width: 400px;
      margin: 0 auto;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    .container {
      position: relative;
      padding: 20px;
      border-radius: 10px;
      margin-top: 50px;
      overflow: hidden;
    }

    video {
      position: fixed;
      top: 0;
      left: 0;
      min-width: 100%;
      min-height: 100%;
      z-index: -1;
    }
  </style>
</head>
<body>
  <div class="container">
    <video autoplay loop muted>
      <source src="view.mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video>
    <h1>Book Room</h1>
    <?php
    // Retrieve room and price from parameters
    $room_name = $_GET['room'];
    $total_price = $_GET['price'];
    ?>
    <div>
      <h2><?php echo $room_name; ?></h2>
      <p>Price: $<?php echo $total_price; ?>/night</p>

      <form action="confirm_booking.php" method="post">
        <input type="hidden" name="room_name" value="<?php echo $room_name; ?>">
        <label for="guest_name">Guest Name:</label>
        <input type="text" id="guest_name" name="guest_name" required><br>
        <label for="check_in_date">Check-in Date:</label>
        <input type="date" id="check_in_date" name="check_in_date" required><br>
        <label for="check_out_date">Check-out Date:</label>
        <input type="date" id="check_out_date" name="check_out_date" required><br>
        <label for="total_nights">Total Nights:</label>
        <input type="number" id="total_nights" name="total_nights" min="1" required onchange="calculateTotalPrice()"><br>
        <input type="hidden" name="total_price" id="total_price" value="<?php echo $total_price; ?>">
        <button type="submit">Book Now</button>
      </form>
    </div>

    <script>
      function calculateTotalPrice() {
        var totalNights = parseInt(document.getElementById('total_nights').value);
        var pricePerNight = <?php echo $total_price; ?>;
        var totalPrice = totalNights * pricePerNight;
        document.getElementById('total_price').value = totalPrice;
      }
    </script>
  </div>
</body>
</html>
