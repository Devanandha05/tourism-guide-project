<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    

<?php
// queries.php
require 'connect.php';

$sql = "SELECT q_id,user_id,username, email, message FROM queries_data";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='data-table'>
            <thead>
                <tr>
                    <th>Query ID</th>
                    <th>User Id</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["q_id"] . "</td>
                <td>" . $row["user_id"] . "</td>
                <td>" . $row["username"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["message"] . "</td>
                <td>
                 <form action='delete_user.php' method='POST'>
                        <input type='hidden' name='q_id' value='" . $row['q_id'] . "'>
                        <button type='submit' class='delete-btn'>Delete</button>
                </form>
                </td>
              </tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<p class='no-rev'>No queries found.</p>";
}
$conn->close();
?>
</body>
</html>