<?php
require 'connect.php';

########################################### DELETE USERS ##################################################

  if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    // Prepare the SQL delete statement
    $sql = "DELETE FROM user_data WHERE user_id = ?";
    
    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind the review_id parameter
        $stmt->bind_param("i", $user_id);
        
        // Execute the query
        if ($stmt->execute()) {
            // Successfully deleted, redirect to dashboard
            header("Location: newdashboard.php");
            exit;
        } else {
            echo "Error deleting User: " . $conn->error;
        }
        
        // Close the statement
        $stmt->close();
    }
}
########################################### DELETE REVIEWS ##################################################

if (isset($_POST['review_id'])) {
    $review_id = $_POST['review_id'];

    // Prepare the SQL delete statement
    $sql = "DELETE FROM review_data WHERE review_id = ?";
    
    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind the review_id parameter
        $stmt->bind_param("i", $review_id);
        
        // Execute the query
        if ($stmt->execute()) {
            // Successfully deleted, redirect to dashboard
            header("Location: newdashboard.php");
            exit;
        } else {
            echo "Error deleting review: " . $conn->error;
        }
        
        // Close the statement
        $stmt->close();
    }
}
########################################### DELETE LOCATIONS ##################################################
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Prepare the SQL delete statement
    $sql = "DELETE FROM location_data WHERE id = ?";
    
    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind the review_id parameter
        $stmt->bind_param("i", $id);
        
        // Execute the query
        if ($stmt->execute()) {
            // Successfully deleted, redirect to dashboard
            header("Location: newdashboard.php");
            exit;
        } else {
            echo "Error deleting Location data: " . $conn->error;
        }
        
        // Close the statement
        $stmt->close();
    }
}

########################################### DELETE QUERIES ##################################################

if (isset($_POST['q_id'])) {
    $q_id = $_POST['q_id'];

    // Prepare the SQL delete statement
    $sql = "DELETE FROM queries_data WHERE q_id = ?";
    
    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind the review_id parameter
        $stmt->bind_param("i", $q_id);
        
        // Execute the query
        if ($stmt->execute()) {
            // Successfully deleted, redirect to dashboard
            header("Location: newdashboard.php");
            exit;
        } else {
            echo "Error deleting Query: " . $conn->error;
        }
        
        // Close the statement
        $stmt->close();
    }
}