<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Serene Bay Retreat Resort</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="mystyles.css" />
  </head>
  <body>
<?php
    function checkAvailability($arrivalDate, $departureDate, $guests) {
        $localhost = "localhost"; // or your host address
        $root = "root"; // your database username
        $hotel_booking = "hotel_booking"; // your database name
    
        try {
            // Create connection
            $conn = new mysqli($localhost, $root, null, $hotel_booking);
    
            // Check connection
            if ($conn->connect_error) {
                throw new Exception("Connection failed: " . $conn->connect_error);
            }
    
            // Prepare SQL statement to check for conflicting bookings
            $sql = "SELECT COUNT(*) AS count FROM bookings 
                    WHERE arrival_date <= ? AND departure_date >= ?";
            
            // Prepare and bind parameters
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $departureDate, $arrivalDate);
            
            // Execute SQL query
            $stmt->execute();
    
            // Get result
            $result = $stmt->get_result();
    
            // Check if there are any conflicting bookings
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $count = $row["count"];
                
                // If count is greater than 0, there are conflicting bookings
                return ($count == 0);
            } else {
                // No conflicting bookings
                return true;
            }
        } catch (Exception $e) {
            // Log error
            error_log('Error: ' . $e->getMessage());
    
            // Display user-friendly error message
            echo "An error occurred while checking availability. Please try again later.";
            return false;
        } finally {
            // Close connection
            if ($conn) {
                $conn->close();
            }
        }
    }
    
   function displayAvailabilityMessage($isAvailable) {
    if ($isAvailable) {
        $message = "Booking is available for the selected dates!";
        $class = "available";
        $background_color = "#d4edda"; // light green
        $border_color = "#c3e6cb"; // green
        $text_color = "#155724"; // dark green
    } else {
        $message = "Sorry, booking is not available for the selected dates.";
        $class = "not-available";
        $background_color = "#f8d7da"; // light red
        $border_color = "#f5c6cb"; // red
        $text_color = "#721c24"; // dark red
    }
    echo '<div class="availability-message ' . $class . '">';
    echo '<div style="text-align:center; padding: 10px; background-color: ' . $background_color . '; border: 1px solid ' . $border_color . '; border-radius: 10px; color: ' . $text_color . '; font-size: 16px; font-family: \'Roboto\', sans-serif; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);">';
    echo '<p style="margin: 0;">' . $message . '</p>';
    echo '</div>';
    echo '</div>';
}
 
   // Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate arrival date
    if (empty($_POST['arrival']) || !strtotime($_POST['arrival'])) {
        echo "Please enter a valid arrival date.";
        exit; // Stop further execution
    }

    // Validate departure date
    if (empty($_POST['departure']) || !strtotime($_POST['departure'])) {
        echo "Please enter a valid departure date.";
        exit; // Stop further execution
    }

    // Validate number of guests
    if (empty($_POST['guests']) || !is_numeric($_POST['guests']) || $_POST['guests'] <= 0) {
        echo "Please enter a valid number of guests.";
        exit; // Stop further execution
    }

    // Get current date
    $currentDate = date('Y-m-d');

    // Validate arrival date and departure date against current date
    if ($_POST['arrival'] < $currentDate || $_POST['departure'] < $currentDate) {
        echo "Please select dates that are not before the current date.";
        exit; // Stop further execution
    }

    $arrivalDate = $_POST['arrival'];
    $departureDate = $_POST['departure'];
    $guests = $_POST['guests'];

    // Check availability
    $isAvailable = checkAvailability($arrivalDate, $departureDate, $guests);

    // Display availability message
    displayAvailabilityMessage($isAvailable);
}
?>

<video src="interior.mp4" autoplay muted loop></video>
<video src="nature.mp4" autoplay muted loop></video>