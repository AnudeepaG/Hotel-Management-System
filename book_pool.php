<?php
// Database connection
$servername = "localhost";
$username = "root";
$dbname = "hotel_booking";

$conn = new mysqli($servername, $username, null, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If form is submitted
if (isset($_POST['submit'])) {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    // Insert data into database
    $sql = "INSERT INTO poolservice(name, email, date, time) VALUES ('$name', '$email', '$date', '$time')";

    if ($conn->query($sql) === TRUE) {
        // Display confirmation message
        echo "<script>alert('Pool services booked successfully!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Pool Parties</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background: #ecf0f1; /* Light Gray */
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    padding: 20px;
}

.container {
    max-width: 400px;
    background-color: #fff; /* White */
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
}

h1 {
    color: #3498db; /* Blue */
    text-align: center;
    margin-bottom: 30px;
}

label {
    font-weight: bold;
    color: #2980b9; /* Darker Blue */
    display: block;
    margin-bottom: 10px;
}

input[type="text"],
input[type="email"],
input[type="date"],
input[type="time"],
input[type="submit"] {
    width: 100%;
    padding: 15px;
    margin-bottom: 20px;
    border: none;
    border-radius: 8px;
    box-sizing: border-box;
    background-color: #ecf0f1; /* Light Gray */
    font-size: 16px;
}

input[type="submit"] {
    background-color: #3498db; /* Blue */
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #2980b9; /* Darker Blue */
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Book Pool Parties</h1>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>

            <label for="time">Time:</label>
            <input type="time" id="time" name="time" required>

            <input type="submit" name="submit" value="Book Now">
        </form>
    </div>
</body>
</html>
