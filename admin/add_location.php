<?php
    require 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $zone = $conn->real_escape_string($_POST['region']);
    $state = $conn->real_escape_string($_POST['state']);
    $city = $conn->real_escape_string($_POST['city']);
    $type = $conn->real_escape_string($_POST['type']);
    $name = $conn->real_escape_string($_POST['name']);
    $image_url = $conn->real_escape_string($_POST['image_url']);
    $time_hrs = (float)$_POST['time_hrs'];
    $g_rating = (float)$_POST['g_rating'];
    $entry_fee = (float)$_POST['entry_fee'];
    $weekly_off = $conn->real_escape_string($_POST['weekly_off']);
    $dslr = isset($_POST['yes']) ? 'Yes' : 'No';
    $g_reviewcount = (float)$_POST['g_reviewcount'];
    $best_visit_time = $conn->real_escape_string($_POST['best_visit_time']);

    // SQL query to insert data
    $sql = "INSERT INTO loc_data (zone , state, city, type, name, image_url, time_hrs, g_rating, entry_fee, weekly_off,dslr, g_reviewcount, best_visit_time)
            VALUES ('$zone', '$state', '$city', '$type', '$name', '$image_url', $time_hrs, $g_rating, $entry_fee, '$weekly_off', '$dslr', $g_reviewcount, '$best_visit_time')";
    // Execute the query and check for success
    if ($conn->query($sql) === TRUE) {
        echo "<p class='success'>New location added successfully!</p>";
    } else {
        echo "<p class='error'>Error: " . $sql . "</p><br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>new location</title>
    <link rel="stylesheet" href="add_location.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
</head>
<body>
    <div class="loc-form">
        <div class="container">
            <!-- Form submission to the same PHP file -->
            <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <div class="fields">
        <div class="left">
            <div class="input">
                <label for="region">Region:</label>
                <input type="text" id="region" name="region" required>
            </div>
            <div class="input">
                <label for="state">State</label>
                <input type="text" id="state" name="state" required>
            </div>
            <div class="input">
                <label for="city">City</label>
                <input type="text" id="city" name="city" required>
            </div>
            <div class="input">
                <label for="type">Location Type</label>
                <input type="text" id="type" name="type" required>
            </div>
        </div>
        
        <div class="middle">
            <div class="input">
                <label for="name">Name of the Place</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="input">
                <label for="image_url">Image URL</label>
                <input type="text" id="image_url" name="image_url" required>
            </div>
            <div class="input">
                <label for="time_hrs">Time in hours</label>
                <input type="number" id="time_hrs" name="time_hrs" step="0.1"  required>
            </div>
            <div class="input">
                <label for="g_rating">Google Rating</label>
                <input type="number" id="g_rating" name="g_rating" step="0.1" required>
            </div>
        </div>
        
        <div class="right">
            <div class="input">
                <label for="entry_fee">Entry Fee</label>
                <input type="number" id="entry_fee" name="entry_fee" required>
            </div>
            <div class="input">
                <label for="weekly_off">Weekly Off</label>
                <input type="text" id="weekly_off" name="weekly_off" required>
            </div>
            <div class="input">
                <label for="dslr">DSLR Allowed</label>
                <div class="options">
                <p>Yes <input type="radio" id="yes" name="dslr" value="Yes" required></p>
                <p>No <input type="radio" id="no" name="dslr" value="No" required></p>
            </div></div>
            <div class="input">
                <label for="g_reviewcount">Review Count</label>
                <input type="number" id="g_reviewcount" name="g_reviewcount" step="0.1" required>
            </div>
            <div class="input">
                <label for="best_visit_time">Best Visit Time</label>
                <input type="text" id="best_visit_time" name="best_visit_time" required>
            </div>
        </div>
    </div>
    <button type="submit" class="button">Add</button>
</form>

        </div>
    </div>
</body>
</html>
