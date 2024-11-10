<?php
session_start();
require 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
   $username=$_SESSION['username'];
  $user_id=$_SESSION['user_id'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $sql = "INSERT INTO queries_data (username, user_id, email, message) VALUES ('$username', '$user_id', '$email', '$message')"; 
    if ($conn->query($sql) === TRUE) {
      $popupMsg="Your message has been sent successfully!"; 
   }
    else 
    {
       $popupMsg= "Error: " . $sql . "<br>" . $conn->error;
        } 
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