<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="locations.css">
</head>

<body>
<header>
    <div class="back-btn">
        <a href="homeYathra.php"><i class="fas fa-arrow-left"></i> Return Home</a>
    </div>

    <div class="title">
        YathraTales.co
    </div>
</header> 

<div id="wikiInfo">
<?php

if (isset($_GET['location_name'])) {
    $place = htmlspecialchars($_GET['location_name']);
    
    // Wikipedia API URL
    $url = "https://en.wikipedia.org/w/api.php?action=query&prop=extracts|pageimages&exintro=&explaintext=&format=json&titles=" . urlencode($place) . "&pithumbsize=500";

    // Fetch data from the Wikipedia API
    $response = file_get_contents($url);

    // Check if the response was fetched
    if ($response !== false) {
        // Convert JSON response to PHP array
        $data = json_decode($response, true);

        // Check if the query contains valid pages
        if (isset($data['query']['pages'])) {
            $pages = $data['query']['pages'];
            $page = array_shift($pages); // Get the first page

            // Extract text content
            if (isset($page['extract'])) {
                $extract = $page['extract'];

                // Display the extracted content
                echo "<h2 class='para-title'>$place</h2>";
                
                // Extract image content (thumbnail)
                if (isset($page['thumbnail']['source'])) {
                    $imageUrl = $page['thumbnail']['source'];
                    echo "<div class='place-img-weather'> ";
                    echo " <div class='place-img'>";                
                    // Display the image
                    echo "<img src='$imageUrl' alt='Image of $place' class='wiki-image' />";
                    echo "</div>";
                } else {
                    echo "<h3>No image available for this location.</h3>";
                }

                // Fetch weather data using OpenWeatherMap API
                $apiKey = '626428a764ef5662b64de504a11d9d71'; // Your OpenWeatherMap API Key
                $weatherUrl = "https://api.openweathermap.org/data/2.5/forecast?q={$place}&units=metric&cnt=40&appid={$apiKey}";

                // Fetch weather data
                $weatherResponse = file_get_contents($weatherUrl);
                
                if ($weatherResponse !== false) {
                    // Convert JSON response to PHP array
                    $weatherData = json_decode($weatherResponse, true);

                    // Check if the weather data is available
                    if ($weatherData['cod'] == "200") {
                        // Display the weather information
                        echo "<div id='weatherInfo' class='place-weather'>";
                        echo "<h3>Weather forecast for " . $place . "</h3>";

                        // Keep track of the dates already displayed
                        $displayedDates = [];
                        echo "<div class='forecast-list'>";
                        // Loop through each 3-hour forecast and display only one per day
                        foreach ($weatherData['list'] as $forecast) {
                            $dateTime = date('Y-m-d H:i:s', $forecast['dt']); // Convert UNIX timestamp to readable date
                            $date = date('Y-m-d', $forecast['dt']); // Extract just the date part
                            //added a condition to check if the forecast hour is 12:00:00 (date('H', $forecast['dt']) == '12'). This ensures that only the noon forecast is displayed.
                            // Display forecast only if it's around noon (12:00:00) and hasn't been displayed for that day
                            if (!in_array($date, $displayedDates) && date('H', $forecast['dt']) == '12') {
                                echo "<div class='forecast'>";
                                echo "<p><strong>Date & Time:</strong> " . $dateTime . "</p>";
                                echo "<p><strong>Temperature:</strong> " . $forecast['main']['temp'] . "°C</p>";
                                echo "<p><strong>Weather:</strong> " . $forecast['weather'][0]['description'] . "</p>";
                                echo "<p><strong>Humidity:</strong> " . $forecast['main']['humidity'] . "%</p>";
                                echo "<p><strong>Wind Speed:</strong> " . $forecast['wind']['speed'] . " m/s</p>";
                                echo "</div>";

                                // Add the date to the list of displayed dates
                                $displayedDates[] = $date;
                            }
                        }
                        echo "</div>";
                        echo "</div></div>"; // Closing div for place-weather
                    } else {
                        echo "<h3>Weather data not found for this location.</h3>";
                    }
                } else {
                    echo "<h3>Failed to fetch weather data.</h3>";
                }
                echo "<div class='about-city'>";
                echo "<h2>About city</h2>";
                echo "<p class='para'>$extract</p>";

            } else {
                echo "<h3>No extract available for this location.</h3>";
            }

        } else {
            echo "<h3>No valid page found.</h3>";
        }
    } else {
        echo "<h3>Failed to fetch data from Wikipedia API.</h3>";
    }
    echo "</div>";
} else {
    echo "<h3>Sorry, no data available.</h3>";
}
?>
</div>

</body>
</html>
