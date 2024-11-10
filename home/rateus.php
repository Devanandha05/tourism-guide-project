<?php

require 'connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize the inputs
    $username=$_POST['username'];  
    $rating = (int)$_POST['rating']; // Ensure rating is an integer
    $review = trim($_POST['review']); // Remove extra whitespace

    // Prepare the SQL statement
    $sql = "INSERT INTO review_data (username,rating, review) VALUES (?,?, ?)";
    
    // Use prepared statements to avoid SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sis",$username, $rating, $review); // 'i' for integer, 's' for string

    // Execute the statement
    if ($stmt->execute()) {
        echo "Feedback submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
