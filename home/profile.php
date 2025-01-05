<?php 
require 'connect.php';
session_start(); // Start or resume the session

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: /Tourist Guide project/welcome/signup.php");
    exit;
}

// Initialize variables
$username = $_SESSION['username'] ?? null;
$user_id = $_SESSION['user_id'] ?? null;

// Fetch DOJ (date of joining) securely
if ($username) {
    $stmt = $conn->prepare("SELECT doj FROM user_data WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $doj_row = $result->fetch_assoc();
    $doj = $doj_row['doj'] ?? "N/A";
    $stmt->close();
}

// Fetch favourite locations securely
$fav_locations = [];
if ($user_id) {
    $stmt = $conn->prepare("
        SELECT loc_data.* 
        FROM user_fav
        INNER JOIN loc_data ON user_fav.id = loc_data.id
        WHERE user_fav.user_id = ?
    ");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $fav_locations[] = $row;
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Dashboard</title>
    <style>
body {
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    background-color: #f5f7fa;
    display: flex;
    flex-direction: column;
    color: #333;
}
.topbar{
    background-color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 15px;
    margin: 0 0 10px;
}
/* Dashboard Layout */
.dashboard {
    display: grid;
    grid-template-columns: 1fr 300px;
    grid-gap: 20px;
    width: 100%;
    height: 100vh;
}

.logo h1 {
    font-size: 1.5rem;
    color: #005245;
}

.logout-btn,.location-btn{
    padding: 10px 20px;
    text-decoration: none;
    color: #ddd;
    font-weight: 4px;
    font-size: 18px;
    border-style: none;
    border-radius: 15px;
    transition: 0.3s ease;
    background-color: #005245;
  }
  .logout button:hover,.location-btn:hover{
    background-color: #218838;
  }

/* Main Content */
.main-content {
    padding: 20px;
    background-color: #f6f6f6;
    border-radius: 8px;
    overflow-y: auto;
}

header {
    margin-bottom: 20px;
}

header h2 {
    color:#005245;
    font-size: 1.5rem;
}

header p {
    color: #005245;
    font-size: 1rem;
    margin-bottom: 10px;
}

.tabs {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
}

.tabs button {
    background: none;
    border: none;
    color: #333;
    font-size: 1rem;
    cursor: pointer;
}

.tabs .active {
    color: #005245;
    font-weight: bold;
}

.places-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

.place-card {
    background: #f5f7fa;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 10px;
    text-align: center;
}

.place-card img {
    width: 100%;
    border-radius: 8px;
    margin-bottom: 10px;
}

.place-card .price {
    color:#005245;
    font-weight: bold;
}

.container {
    background-color: #f6f6f6;
    max-width: 600px;
    margin: 0 auto;
    padding: 10px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.results-container {
    padding: 10px;
    display: flex;
    flex-grow: 1;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;

  }
  .res-title{
    text-align: center;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
    background-color: #005245;
    border-radius: 40px;
    width: 100%;
    padding:10px;
  }
  .image-class{
    width: 260px;
    height:160px;
    padding: 30px;
    border-radius: 15px;
  }
  .loc-card{
    display:flex;
    justify-content: center;
    width: 90%;   /* 50% of the parent element's width */
    height: 30%;  /* 30% of the parent element's height */
    background-color:#ddd;
   margin: 15px 30px;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius:  45px;
    transition: transform 0.4s ease-in;
  }
  .loc-cardd{
    display:flex;
    flex-direction: column;
    justify-content: center;
    width: 60%;   
    height: 30%; 
   margin: 15px 30px;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius:  35px;
    transition: transform 0.4s ease-in;
  }
  .loc-card:hover {
   background-color: #e9e6e6;
   box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
}
.loccard p{
    font-size: 16px;
}
.loc-title{
 margin-top: 15px;

  align-items: center;
}
.google-rating-box {
    display: flex;
    align-items: center;
    padding: 5px;
    border-radius: 10px;
    background: #f9f9f9;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin: 10px auto;
}

.google-rating-stars {
    position: relative;
}

.rating-star-filled {
    color: gold; /* Gold color for filled stars */
    font-size: 24px;
}
.wishlist-icon {
    cursor: pointer;
    font-size: 24px;
    color: grey;
}

.wishlist-icon.active {
    color: red;
}

.results-container .loc-card:nth-child(even) {
    background-color: #e9f1f4;
}

/* Profile Section */
.profile-section {
    background-color:#e9e6e6;
    padding: 20px;
    border-radius: 8px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.profile-card {
    text-align: center;
    margin-bottom: 20px;
    background-color: #f6f6f6;
    padding: 40px;
    border-radius: 15px;
}

.profile-card .avatar {
    border-radius: 50%;
    width: 100px;
    height: 100px;
    margin-bottom: 10px;
}

.profile-card h3 {
    color: #333;
}

.profile-section,main{
    padding: 20px;
}
.doj{
    color: grey;
}
    </style>
</head>
<body>
    <div class="topbar">
        <div class="logo">
            <h1>YathraTales.co</h1>
        </div>
        <form class="logout" action="logout.php" method="get">
            <button class="logout-btn" type="submit" name="logout">Logout</button>
        </form>
    </div>
    <div class="dashboard">
        <!-- Main Content -->
        <main class="main-content">
            <header>
                <h2>Hello, <?php echo htmlspecialchars($username); ?> 👋</h2>
            </header>
            <section class="discover-world">
                <div class="tabs">
                    <button class="active">Your Favourites</button>
                </div>
                <?php if (!empty($fav_locations)): ?>
                    <div class="results-container">
                        <?php foreach ($fav_locations as $row): ?>
                            <div class="loc-card">
                                <div class="loc-title">
                                    <p class="name"><?php echo htmlspecialchars($row['name']); ?></p>
                                    <img src="<?php echo htmlspecialchars($row['image_url']); ?>" alt="Failed to load" class="image-class" />
                                </div>
                                <div class="details">
                                    <div class="google-rating-box">
                                    <div class="google-rating-stars">
                                    <?php
                                        $rating = htmlspecialchars($row['g_rating']);
                                        echo $rating."<span class='rating-star-filled'>★</span>";
                                    ?>
                                </div>
                                    <?php
                                    $reviewCount = htmlspecialchars($row['g_reviewcount']) * 1000; // Convert to thousands
                                    echo "<p>from " . number_format($reviewCount, 1) . "K reviews</p>";
                                    ?>
                </div>
            <p>State: <?php echo htmlspecialchars($row['state']); ?></p>
           <p>City: <?php echo htmlspecialchars($row['city']); ?></p>
            <p>Entry Fee: <?php echo htmlspecialchars($row['entry_fee']); ?>&#8377;</p>
            <p>Best time to visit: <?php echo htmlspecialchars($row['best_visit_time']); ?></p>
            <form class="detail-btn" action="loc_details.php" method="get">
             <input type="hidden" name="location_name" value="<?php echo htmlspecialchars($row['city']); ?>" />
             <button type="submit" class="location-btn">More About City</button>
            </form>
            </div>
            </div>
            <?php endforeach; ?>
            </div>
        <?php else: ?>
        <p class="nothing">You have no favourite locations!</p>
        <?php endif; ?>
        </section>
        </main>

        <!-- Profile Section -->
        <aside class="profile-section">
            <div class="profile-card">
                <img class="avatar" src="profile2.jpg" alt="User Profile">
                <h3><?php echo htmlspecialchars($username); ?></h3>
                <p class="doj">Joined on <?php echo htmlspecialchars($doj); ?></p>
            </div>
        </aside>
    </div>
</body>
</html>
