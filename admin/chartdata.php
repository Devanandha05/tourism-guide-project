<?php
// Connect to your database (adjust with your DB connection details)
$pdo = new PDO('mysql:host=localhost;dbname=tourism_guide', 'root', '');

// Query to count users signed up per week
$query = "SELECT WEEK(doj) AS week, COUNT(user_id) AS num_users FROM user_data GROUP BY WEEK(doj) ORDER BY week ASC";
$stmt = $pdo->prepare($query);
$stmt->execute();

// Fetch all rows
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Send the data as JSON
header('Content-Type: application/json');
echo json_encode($results);
?>
