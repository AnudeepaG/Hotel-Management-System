<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reviews</title>
</head>
<body style="background-color: #f2f2f2; font-family: Arial, sans-serif;">

  <h2 style="text-align: center; color: navy;">All Reviews</h2>

  <div style="margin: 0 auto; width: 80%; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $name = $_POST['name'];
        $room = $_POST['room'];
        $rating = $_POST['rating'];
        $feedback = $_POST['feedback'];

        // Validate and sanitize input data (you might want to add more validation)
        $name = htmlspecialchars($name);
        $room = htmlspecialchars($room);
        $rating = intval($rating);
        $feedback = htmlspecialchars($feedback);

        // Connect to your database
        $servername = "localhost";
        $username = "root";
        $dbname = "hotel_booking";

        // Create connection
        $conn = new mysqli($servername, $username, null, $dbname);

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to insert review into the database
        $sql = "INSERT INTO reviews (name, room, rating, feedback) VALUES ('$name', '$room', $rating, '$feedback')";

        if ($conn->query($sql) === TRUE) {
            echo "<p style='color: green;'>Review submitted successfully</p>";
        } else {
            echo "<p style='color: red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }
        // Close connection
        $conn->close();
    }

    // Connect to your database for retrieving reviews
    $servername = "localhost";
    $username = "root";
    $dbname = "hotel_booking";

    // Create connection
    $conn = new mysqli($servername, $username,null, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    // SQL query to retrieve reviews
    $sql = "SELECT * FROM reviews";
    $result = $conn->query($sql);

    // Check if there are reviews
    if ($result->num_rows > 0) {
      // Output data of each row
      while ($row = $result->fetch_assoc()) {
        // Display each review
        echo "<div style='background-color: navy; color: #fff; border-radius: 5px; padding: 10px; margin-bottom: 20px;'>";
        echo "<p><strong>Name:</strong> " . $row["name"] . "</p>";
        echo "<p><strong>Room Type:</strong> " . $row["room"] . "</p>";
        echo "<p><strong>Rating:</strong> " . $row["rating"] . "</p>";
        echo "<p><strong>Feedback:</strong> " . $row["feedback"] . "</p>";
        echo "</div>";
      }
    } else {
      echo "<p style='color: navy;'>No reviews yet.</p>";
    }
    // Close connection
    $conn->close();
    ?>
  </div>
</body>
</html>
