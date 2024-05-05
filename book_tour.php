<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Tours</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #ffcc00, #ff6666, #9966ff, #6699ff); /* 4-color gradient */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 400px;
            background-color: #ffffff; /* White */
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #4CAF50; /* Green */
            text-align: center;
            margin-bottom: 30px;
        }

        label {
            font-weight: bold;
            color: #333333; /* Dark Gray */
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="time"],
        input[type="submit"] {
            width: calc(100% - 30px); /* Adjusting for padding */
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #cccccc; /* Light Gray Border */
            border-radius: 8px;
            box-sizing: border-box;
            background-color: #f9f9f9; /* Light Gray */
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="submit"] {
            background-color: #4CAF50; /* Green */
            color: #ffffff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049; /* Darker Green */
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="date"]:focus,
        input[type="time"]:focus,
        input[type="submit"]:hover {
            border-color: #4CAF50; /* Green on focus/hover */
        }

        input[type="submit"]:active {
            background-color: #3e8e41; /* Darker Green on click */
        }

        input[type="text"]::placeholder,
        input[type="email"]::placeholder,
        input[type="date"]::placeholder,
        input[type="time"]::placeholder {
            color: #aaaaaa; /* Light Gray Placeholder */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Book Tours</h1>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required placeholder="Enter your name">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required placeholder="Enter your email">

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>

            <label for="time">Time:</label>
            <input type="time" id="time" name="time" required>

            <input type="submit" name="submit" value="Book Now">
        </form>
    </div>
</body>
</html>
