<?php
// Check if form is submitted for registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    // Include your database connection code here
    $servername = "localhost";
    $username = "root";
    $database = "hotel_booking";
    
    $conn = new mysqli($servername, $username, null, $database);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Define variables and initialize with empty values
    $username = $email = $password = "";
    $username_err = $email_err = $password_err = "";

    // Processing form data when form is submitted
    if (empty(trim($_POST["reg_username"]))) {
        $username_err = "Please enter a username.";
    } else {
        // Prepare a select statement to check if the username already exists
        $sql = "SELECT id FROM guests WHERE username = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);

            // Set parameters
            $param_username = trim($_POST["reg_username"]);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Store result
                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["reg_username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Validate email
    if (empty(trim($_POST["reg_email"]))) {
        $email_err = "Please enter an email.";
    } elseif (!filter_var(trim($_POST["reg_email"]), FILTER_VALIDATE_EMAIL)) {
        $email_err = "Please enter a valid email address.";
    } else {
        $email = trim($_POST["reg_email"]);
    }

    // Validate password
    if (empty(trim($_POST["reg_password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["reg_password"])) < 6) {
        $password_err = "Password must have at least 6 characters.";
    } else {
        $password = trim($_POST["reg_password"]);
    }

    // Check input errors before inserting into database
    if (empty($username_err) && empty($email_err) && empty($password_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sss", $param_username, $param_email, $param_password);

            // Set parameters
            $param_username = $username;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to login page
                header("location: login.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $mysqli->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login & Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            color: #333;
        }

        .form-container p {
            color: red;
            text-align: center;
        }

        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="password"],
        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-container input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
        .hide {
            display: none;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Register as a Guest</h2>
        <?php if(isset($register_error)) { echo "<p>$register_error</p>"; } ?>
        <form class="register-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="text" name="reg_username" placeholder="Username" required><br>
            <input type="email" name="reg_email" placeholder="Email" required><br>
            <input type="password" name="reg_password" placeholder="Password" required><br>
            <input type="submit" name="register" value="Register">
        </form>
        <p>Already have an account? <a href="#" onclick="toggleLoginForm()">Login</a></p>
    </div>
    <div class="form-container hide" id="loginForm">
        <h2>Login as a Guest</h2>
        <?php if(isset($login_error)) { echo "<p>$login_error</p>"; } ?>
        <form class="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" value="Login">
        </form>
    </div>
    <script>
        function toggleLoginForm() {
            var loginForm = document.getElementById("loginForm");
            loginForm.classList.toggle("hide");
        }
    </script>
</body>
</html>
