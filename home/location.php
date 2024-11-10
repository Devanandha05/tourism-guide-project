<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tourist Locations</title>
    <link rel="stylesheet" href="locations.css"> <!-- Link to your CSS file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
  <script>

    function toggleWishlist(element, locationId) {
    const isFavorite = element.classList.contains('favorite'); // Check if already a favorite
    const action = isFavorite ? 'remove' : 'add'; // Toggle action

    // AJAX request to the server
    fetch('wishlist.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: `action=${action}&location_id=${locationId}`,
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        // Toggle heart icon class based on the response
        element.classList.toggle('active'); // Change appearance of heart (filled or empty)
        alert(data.message);
      } else {
        alert('Something went wrong!');
      }
    })
    .catch(error => {
      console.error('Error:', error);
    });
  }
  </script>
</head>

<body>  
<header>
    <div class="back-btn">
        <a href="homeYathra.php"><i class="fas fa-arrow-left"></i></a>
    </div>
    <div class="title">
        YathraTales.co
    </div>
</header> 

<div class="container">
<?php 
// Check if form was submitted via GET method
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    
    // Retrieve the form data using $_GET superglobal
    $region = $_GET['region'];  
    $type = $_GET['type'];
    $g_rating = $_GET['g_rating'];
    
    // Database connection
    require 'connect.php';
    
    // Prepare SQL query with placeholders, fetching both location data and guides in one query
    $sql = "SELECT * 
            FROM loc_data
            WHERE loc_data.zone = ? AND loc_data.type = ? AND loc_data.g_rating > ?";
                
    // Prepare statement
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    
    // Bind parameters
    $stmt->bind_param("ssd", $region, $type, $g_rating);
    
    // Execute statement
    $stmt->execute();
    
    // Get result
    $result = $stmt->get_result();
    
    // Check if there are results
    if ($result->num_rows > 0) {
        echo "<div class='res-title'>";
        echo "<h3>Matching places according to your preferences:</h3>";
        echo "</div>";
        
        // Output data for each row
        echo "<div class='results-container'>";
        while ($row = $result->fetch_assoc()) {
            echo "<div class='loc-card'>";

            echo "<div class='loc-title'>";
                echo "<p class='name'> " . htmlspecialchars($row['name']) . "</p>";
                echo "<img src='" . htmlspecialchars($row['image_url']) . "' alt='Failed to load' class='image-class' />"; 
            echo "</div>";

           /* $place = htmlspecialchars($row['city']);

            $apiKey = '626428a764ef5662b64de504a11d9d71'; // Your OpenWeatherMap API Key
            $weatherUrl = "https://api.openweathermap.org/data/2.5/weather?q=" . urlencode($place) . "&appid=$apiKey&units=metric";
           
            // Fetch weather data
            $weatherResponse = file_get_contents($weatherUrl);
            
            if ($weatherResponse !== false) {
                // Convert JSON response to PHP array
                $weatherData = json_decode($weatherResponse, true);

                // Check if the weather data is available
                if ($weatherData['cod'] == 200) {
                    // Display the weather information
                    echo "<div id='weatherInfo' class='place-weather'>";
                    echo "<h3>Weather in " . $weatherData['name'] . ", " . $weatherData['sys']['country'] . "</h3>";
                    echo "<p><strong>Temperature:</strong> " . $weatherData['main']['temp'] . "°C</p>";
                    echo "<p><strong>Weather:</strong> " . $weatherData['weather'][0]['description'] . "</p>";
                    echo "<p><strong>Humidity:</strong> " . $weatherData['main']['humidity'] . "%</p>";
                    echo "<p><strong>Wind Speed:</strong> " . $weatherData['wind']['speed'] . " m/s</p>";
                    echo "</div>";
                } else {
                    echo "<h3>Weather data not found for this location.</h3>";
                }
            } else {
                echo "<h3>Failed to fetch weather data.</h3>";
                echo "</div>";
            }*/
            
            echo "<div class='details'>";
            echo "<p>State: " . htmlspecialchars($row['state']) . "</p>";
            echo "<p>City: " . htmlspecialchars($row['city']) . "</p>";
            echo "<p>Google Rating: " . htmlspecialchars($row['g_rating']) . "</p>";
            echo "<p>Entry Fee: " . htmlspecialchars($row['entry_fee']) . "</p>";
            echo "<p>Best time to visit: " . htmlspecialchars($row['best_visit_time']) . "</p>";
            echo "<form class='detail-btn' action='loc_details.php'>
            <input type='hidden' name='location_name' value='" . htmlspecialchars($row['city']) . "' />
            <button type='submit' class='location-btn' data-location='". htmlspecialchars($row['city']) . "'>More About City</button>
        </form>";
            echo "</div>";

            // Add a button for more city details
            echo "<div class='btns'>";
            echo "<span class='wishlist-icon' onclick='toggleWishlist(this," . htmlspecialchars($row['id']) . ")'>
                        <i class='fa fa-heart'></i>
                      </span>
                  </div>";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "<p class='nothing'>Sorry, no results found.</p>";
    }
    
    // Close statement and connection
    $stmt->close();
    $conn->close(); 
    
} else {
    echo "<h3>Please fill out all fields.</h3>";
}
?>
</div>
</body>
</html>
