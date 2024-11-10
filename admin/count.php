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
$locationQuery = "SELECT COUNT(*) AS total_locations FROM loc_data";
$locationResult = $conn->query($locationQuery);
$totalLocations = ($locationResult->num_rows > 0) ? $locationResult->fetch_assoc()['total_locations'] : 0;

// Query to get total queries
$queryQuery = "SELECT COUNT(*) AS total_queries FROM queries_data";
$queryResult = $conn->query($queryQuery);
$totalQueries = ($queryResult->num_rows > 0) ? $queryResult->fetch_assoc()['total_queries'] : 0;


?>