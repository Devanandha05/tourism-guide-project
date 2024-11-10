<?php
// Database connection settings
$host = 'localhost';      // Database host
$dbname = 'tourism_guide'; // Database name
$username = 'root';   // Database username
$password = ''; // Database password

// Create a connection
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

session_start();
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
// Check if the form is submitted and if a rating is selected
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['rating'])) {
    // Get the rating value
    $rating = $_POST['rating'];

    // Prepare the SQL statement to insert the rating
    $sql = "INSERT INTO review_data (rating, user_id, username) VALUES (:rating, :user_id, :username)";
    $stmt = $conn->prepare($sql);
    
    // Bind the rating value to the SQL statement and execute
    $stmt->bindParam(':rating', $rating, PDO::PARAM_INT);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT); // Assuming user_id is an integer
$stmt->bindParam(':username', $username, PDO::PARAM_STR); // Assuming username is a string

    if ($stmt->execute()) {
        $popupMsg="Your message has been sent successfully!"; 
   }
    else 
    {
       $popupMsg = "Error: " . $sql . "<br>" . $conn->errorInfo()[2];
    } 

     }
      else {
    echo "Please select a rating.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popup Message</title>
    <link rel="stylesheet" href="popup.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">

</head>
<body>

<?php if (!empty($popupMsg)) : ?>
    <div class="popup">
        <h2><?php echo $popupMsg; ?></h2>
        <a href="homeYathra.php" class="btn" id="homeLink">Ok</a>
      </div>
    <script src="home.js"></script>
<?php endif; ?>

</body>
</html>