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
    $type = htmlspecialchars(trim($_GET['type'])); 
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
        echo "<h3>Suggested places</h3>";
        echo "</div>";
        
        // Output data for each row
        echo "<div class='results-container'>";
        while ($row = $result->fetch_assoc()) {
            echo "<div class='loc-card'>";

            echo "<div class='loc-title'>";
                echo "<p class='name'> " . htmlspecialchars($row['name']) . "</p>";
                
                echo "<img src='" . htmlspecialchars($row['image_url']) . "' alt='Failed to load' class='image-class' />"; 
            echo "</div>";
            
            echo "<div class='details'>";
            echo "<div class='google-rating-box'>
                <div class='google-rating-stars'>";
                    $rating = htmlspecialchars($row['g_rating']);
                    $fullStars = floor($rating); // Full stars
                    $partialStarWidth = ($rating - $fullStars) * 100; // Partial star width as percentage
                    $maxStars = 5; // Maximum number of stars
            
                    // Display background stars
                    for ($i = 0; $i < $maxStars; $i++) {
                        echo '<span class="rating-star-bg">★</span>';
                    }
            
                    // Overlay filled stars
                    echo '<div class="rating-star-filled" style="width: ' . min($partialStarWidth + $fullStars * 20, 100) . '%;">';
                    for ($i = 0; $i < $maxStars; $i++) {
                        echo '<span class="rating-star-bg">★</span>';
                    }
                    echo "</div>
                </div>
                <span>";
                 echo  $rating."</span>";
         $reviewCount = htmlspecialchars($row['g_reviewcount']); // Original review count
         $reviewCountInThousands = $reviewCount*1000; // Convert to thousands
     
         // Format the value with one decimal point and append "K"
         echo "<p>  from " . number_format($reviewCountInThousands, 1) . "K reviews</p>";
     
            echo "</div>";
            echo "<p>State: " . htmlspecialchars($row['state']) . "</p>";
            echo "<p>City: " . htmlspecialchars($row['city']) . "</p>";
            echo "<p>Entry Fee: " . htmlspecialchars($row['entry_fee']) . "&#8377;</p>";
            echo "<p>Best time to visit: " . htmlspecialchars($row['best_visit_time']) . "</p>";
            echo "<form class='detail-btn' action='loc_details.php'>
            <input type='hidden' name='location_name' value='" . htmlspecialchars($row['city']) . "' />
            <button type='submit' class='location-btn' data-location='". htmlspecialchars($row['city']) . "'>More About City <i class='fas fa-arrow-right'></i></button>
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
