<?php
session_start();
    // Include the database connection
    require 'connect.php';

    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve and sanitize form data
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        // Insert user data into the database
        $sql = "INSERT INTO user_data (username,email,doj, password ) VALUES ('$username', '$email',CURDATE(), '$password')";

        $_SESSION['username']=$row['username'];
        if ($conn->query($sql) === TRUE) {
            $_SESSION['username']=$username;
            $_SESSION['loggedin'] = true;
            header("Location: /TOURIST GUIDE PROJECT/home/homeYathra.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <script>
        function validateForm() {
            var username = document.getElementById("username").value;
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;

            // Username validation
            var usernamePattern = /^[a-zA-Z0-9_]{5,15}$/; 
            if (username === "") {
                alert("Name must be filled out");
                return false;
            } else if (!usernamePattern.test(username)) {
                alert("Invalid username. Username must be 5-15 characters long and contain only letters, numbers, or underscores.");
                return false;
            }

            // Email validation
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address");
                return false;
            }

            // Password validation
            var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{6,}$/;
            if (!passwordPattern.test(password)) {
                alert("Password must be at least 6 characters long, contain at least one lowercase letter, one uppercase letter, one number, and one special character.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <div class="login">
        <div class="container">
            <h2>Join Us and Explore </h2>
            <!-- Form submission to the same PHP file -->
            <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="input">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="input">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="input">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                <button type="submit" class="button" onclick="return validateForm();">Signup</button>
            </form>
        </div>

        <div class="footer">
            <h4>Already a user? <a href="loginn.php">Login</a></h4>
        </div>
    </div>
</body>
</html>
