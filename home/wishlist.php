<?php
session_start();
include 'connect.php'; // Database connection

// Assuming the user is logged in and their ID is stored in the session
$user_id = $_SESSION['user_id']; 
$action = $_POST['action']; // 'add' or 'remove'
$location_id = $_POST['location_id'];

if ($action == 'add') {
    // Add to favorites
    $sql = "INSERT INTO user_fav (user_id, id) VALUES (?, ?)";
} elseif ($action == 'remove') {
    // Remove from favorites
    $sql = "DELETE FROM user_fav WHERE user_id = ? AND id = ?";
}

$stmt = $conn->prepare($sql);
$stmt->bind_param('ii', $user_id, $location_id);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => ucfirst($action) . 'ed to favorites successfully!']);
} else {
    echo json_encode(['success' => false]);
}
$stmt->close();
$conn->close();
?>
