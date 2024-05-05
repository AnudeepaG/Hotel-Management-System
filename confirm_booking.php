<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Booking Confirmation</title>
<style>
    body {
        background-color: navy;
        color: white;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    .container {
        position: relative;
        width: 80%;
        margin: 0 auto;
        text-align: center;
        padding: 50px;
    }
    .confirmation {
        background-color: goldenrod;
        border-radius: 10px;
        padding: 20px;
        margin-top: 20px;
    }
    .button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin-top: 20px;
        cursor: pointer;
        border-radius: 5px;
    }
    .button:hover {
        background-color: #45a049;
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
        <source src="food.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $room_name = $_POST['room_name'];
    $guest_name = $_POST['guest_name'];
    $check_in_date = $_POST['check_in_date'];
    $check_out_date = $_POST['check_out_date'];
    $total_nights = $_POST['total_nights'];
    $total_price = $_POST['total_price'];
    
    // Perform database operations to update record
    // Connect to database
    $servername = "localhost";
    $username = "root";
    $dbname = "hotel_booking";
    
    // Create connection
    $conn = new mysqli($servername, $username, null, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Check if the hotel is at full capacity
    $max_capacity = 100; // Set your maximum capacity here
    $sql_check_capacity = "SELECT COUNT(*) as booked_rooms FROM rooms";
    $result_check_capacity = $conn->query($sql_check_capacity);
    
    if ($result_check_capacity) {
        $row = $result_check_capacity->fetch_assoc();
        $booked_rooms = $row['booked_rooms'];
        
        if ($booked_rooms >= $max_capacity) {
            ?>
            <div class='confirmation'>
                <h2>Booking confirmed successfully!</h2>
                <p>Your room number is <?php echo $room_number; ?> on floor <?php echo $floor_number; ?>.</p>
                <p>Total amount to pay: $<?php echo $total_price; ?></p>
                <p>Thank you for choosing us!</p>
            </div>
            <?php
            $conn->close();
            exit(); // Stop further execution of the script
        }
    } else {
        echo "Error checking hotel capacity: " . $conn->error;
        $conn->close();
        exit(); // Stop further execution of the script
    }
    
    // Prepare SQL statement
    $sql = "INSERT INTO rooms(room_name, guest_name, check_in_date, check_out_date, total_nights,total_price)
            VALUES ('$room_name', '$guest_name', '$check_in_date', '$check_out_date', '$total_nights','$total_price')";
    
    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        // Get the ID of the inserted record
        $booking_id = $conn->insert_id;
        
        // Generate random room and floor numbers
        $room_number = rand(101, 999); // Random room number between 101 and 999
        $floor_number = rand(1, 10);    // Random floor number between 1 and 10
        ?>
        <div class="confirmation">
            <h2>Booking confirmed successfully!</h2>
            <p>Your room number is <?php echo $room_number; ?> on floor <?php echo $floor_number; ?>.</p>
            <p>Total amount to pay: $<?php echo $total_price; ?></p>
            <p>Thank you for choosing us!</p>
        </div>
        <?php
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    // Close connection
    $conn->close();
} else {
    // Redirect to book_room.php if form is not submitted
    header("Location: book_room.php");
    exit();
}

?>
</div>
</body>
</html>
