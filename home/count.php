<?php

require 'connect.php';
// Query to get total users
$userQuery = "SELECT COUNT(*) AS total_users FROM user_data";
$userResult = $conn->query($userQuery);
$totalUsers = ($userResult->num_rows > 0) ? $userResult->fetch_assoc()['total_users'] : 0;

// Query to get total reviews
$reviewQuery = "SELECT COUNT(*) AS total_reviews FROM review_data";
$reviewResult = $conn->query($reviewQuery);
$totalReviews = ($reviewResult->num_rows > 0) ? $reviewResult->fetch_assoc()['total_reviews'] : 0;

// Query to get total queries
$queryQuery = "SELECT COUNT(*) AS total_locations FROM loc_data";
$queryResult = $conn->query($queryQuery);
$totalLocations = ($queryResult->num_rows > 0) ? $queryResult->fetch_assoc()['total_locations'] : 0;

?>