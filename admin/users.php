<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
</head>
<style>
    .delete-btn {
    background-color: #ff4d4d;
    border: none;
    color: white;
    padding: 5px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.delete-btn:hover {
    background-color: #ff1a1a;
}

</style>
<body>

<?php
// users.php
require 'connect.php';

$sql = "SELECT user_id, username, email, doj FROM user_data WHERE is_admin = 0";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='data-table'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date of Join</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["user_id"] . "</td>
                <td>" . $row["username"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["doj"] . "</td>
              <td>
                    <form action='delete_user.php' method='POST'>
                        <input type='hidden' name='user_id' value='" . $row['user_id'] . "'>
                        <button type='submit' class='delete-btn'>Delete</button>
                    </form>
                </td>
            </tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<tr><td colspan='5'>No users found</td></tr>";
}
$conn->close();
?>
</body>
</html>