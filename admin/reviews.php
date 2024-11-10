<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Document</title>
</head>
<body>
    
<?php
// reviews.php
include 'connect.php';

$sql = "SELECT id,user_id , username, rating FROM review_data"; // Modify based on your table structure
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='data-table'>
            <thead>
                <tr>
                <th>Review ID</th>
                <th>User Id</th>
                <th>Username</th>
                <th>Rating</th>
                <th></th>
                </tr>
            </thead>
            <tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["user_id"] . "</td>
                <td>" . $row["username"] . "</td>
                <td>" . $row["rating"] . "</td>
                <td>
                 <form action='delete_user.php' method='POST'>
                        <input type='hidden' name='id' value='" . $row['id'] . "'>
                        <button type='submit' class='delete-btn'>Delete</button>
                </form>
                </td>
              </tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<p class='no-rev'>No reviews found.</p>";
}
$conn->close();
?>
</body>
</html>