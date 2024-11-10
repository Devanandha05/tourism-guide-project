<?php
    // Include your database connection
    include 'connect.php';
       
    // Start the session
    session_start();
       
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the submitted username and password
        $username = $_POST['username'];
        $password = $_POST['password'];
       
        // Query to find the user in the database
        $sql = "SELECT user_id, password, is_admin FROM user_data WHERE username='$username'";
        $result = $conn->query($sql);
       
        // Check if the user exists
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            // Verify the password
            if (password_verify($password, $row['password'])) {
                // Set session variables
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username']=$username;
                $_SESSION['loggedin'] = true;
                $_SESSION['is_admin'] = $row['is_admin'];
                // Redirect based on user type
                if ($row['is_admin']) {
                    header("Location:  /TOURIST GUIDE PROJECT/admin/newdashboard.php");
                } else {
                    
                    header("Location:  /TOURIST GUIDE PROJECT/home/homeYathra.php");
                }
            } else {
                echo "<p class='error'>Invalid password!</p>";
            }
        } else {
            echo "<p class='error'>No user found with that username!</p>";
        }
    }
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
</head>
<body>
    <div class="login">
    <div class="container">
        <h2>Welcome Back! </h2>
        <!-- Form submission happens to the same PHP file -->
        <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="all-input">
            <div class="input">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" autocomplete="off" required>
        </div>

        <div class="input">
        <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
       </div>
         <button type="submit" class="button">Login</button>
        </form>
    </div>
        <h4> Don't have an account?  <a href="signup.php">Sign up</a></h4>
    </div>
</body>
</html>
