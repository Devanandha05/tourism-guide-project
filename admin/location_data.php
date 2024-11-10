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
// locations.php
include 'connect.php';
$sql = "SELECT `id`, `zone`, `state`, `city`, `type`, `name`, `time_hrs`, `g_rating`, `entry_fee`, `weekly_off`, `dslr`, `g_reviewcount`, `best_visit_time` FROM `loc_data`"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='data-table'>
            <thead>
                <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Region</th>
                <th>State</th>
                <th>City</th>
                <th>Type</th>
                <th>Google Rating</th>
                <th>Review count</th>
                <th>Entry Fee</th>
                <th>Weekly off</th>
                <th>Best Visit Time</th>
                <th></th>

                </tr>
            </thead>
            <tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["zone"] . "</td>
                <td>" . $row["state"] . "</td>
                <td>" . $row["city"] . "</td>
                <td>" . $row["type"] . "</td>
                <td>" . $row["g_rating"] . "</td>
                <td>" . $row["g_reviewcount"] . "</td>
                <td>" . $row["entry_fee"] . "</td>
                <td>" . $row["weekly_off"] . "</td>
                <td>" . $row["best_visit_time"] . "</td> 
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
    echo "<p class='no-rev'>No Locations found.</p>";
}
$conn->close();
?>
</body>
</html>