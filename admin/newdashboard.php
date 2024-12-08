<?php include 'count.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="newdashboard.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <script src="dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function showSection(sectionId) {
        // Hide all sections
        const sections = document.querySelectorAll('.dash-section');
        sections.forEach(section => {
          section.style.display = 'none';
        });
      
        // Show the selected section
        const sectionToShow = document.getElementById(sectionId);
        sectionToShow.style.display = 'block';
      }
        </script>
</head>
<body>
         <!-- HEADER -->       
    <header class="main-header">
        <div class="logo">
            <h2>YathraTales.Co</h2>
        </div>
        <div class="admin-profile">
            <span>Admin</span>    
        <form class="logout" action="logout.php" method="post">
          <button class="logout-btn" type="submit" name="logout">
          <span>Logout</span>
          </button>
        </form>
        </div>
    </header>
            <!--END  HEADER --> 

<!--------------------------------------- Topbar ----------------------------------------------------->
   <div class="topbar">
    <ul class="topbar-menu">
            <li><a href="#" onclick="showSection('dash')" class="active">Dashboard</a></li>
            <li><a href="#" onclick="showSection('users')">Users</a></li>
            <li><a href="#" onclick="showSection('locations')"> Locations</a></li>
            <li><a href="#" onclick="showSection('add-location')">Add Locations</a></li>
            <li><a href="#" onclick="showSection('review')">Reviews</a></li>
            <li><a href="#" onclick="showSection('queries')" >Queries</a></li>                
        </ul>
    </div>


<!--------------------------------- Dashboard Widgets -------------------------------------------->
<section id="dash" class="dash-section" style="display: block;">

    <div class="active-section"> 

        <div class="left-side">

    <!---OVERVIEW------->
        <div class="overview">
            <h2 class="title">Overview</h2>
                <div class="stats-cards">
                    <div class="stat">
                        <h3>Total Users</h3>
                        <h2> <?php echo $totalUsers; ?></h2>
                    </div>
                    <div class="stat">
                        <h3>Total Locations</h3>
                        <h2> <?php echo $totalLocations; ?></h2>  
                    </div>
                    <div class="stat">
                        <h3>Total Reviews</h3>
                        <h2> <?php echo $totalReviews; ?></h2>
                     </div>
                     <div class="stat">
                        <h3>Queries</h3>
                        <h2> <?php echo $totalQueries; ?></h2>
                     </div>
                </div>
                </div> 
        <div class="chart">
        <div id="chart-container">
    <h2>Number of Users Signed Up Per Week</h2>
    <canvas id="signupChart" width="400" height="200"></canvas>
</div>

<!-- JavaScript to Fetch Data and Create Chart -->
<script>
    // Fetch user sign-up data from the server
    fetch('chartdata.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json(); // Convert to JSON
        })
        .then(data => {
            // Assuming data is an array of objects with "week" and "num_users"
            // Example: [{week: 1, num_users: 10}, {week: 2, num_users: 15}, ...]

            // Prepare the labels (weeks) and data (number of users)
            const weeks = data.map(row => 'Week ' + row.week);
            const userCounts = data.map(row => row.num_users);

            // Ensure we have a canvas element with the ID 'userChart' in the HTML
            const ctx = document.getElementById('userChart').getContext('2d');

            // Create a chart using Chart.js
            const userChart = new Chart(ctx, {
                type: 'line', // Line chart type
                data: {
                    labels: weeks, // Labels for the x-axis
                    datasets: [{
                        label: 'Number of Users Signed Up Per Week',
                        data: userCounts, // Data for the y-axis
                        backgroundColor: 'rgba(75, 192, 192, 0.2)', // Line fill color
                        borderColor: 'rgba(75, 192, 192, 1)', // Line border color
                        borderWidth: 2, // Line width
                        pointBackgroundColor: '#ffffff', // Point background color
                        pointBorderColor: '#4bc0c0', // Point border color
                        pointRadius: 5, // Point size
                        pointHoverRadius: 8 // Point size on hover
                    }]
                },
                options: {
                    responsive: true, // Makes the chart responsive
                    scales: {
                        y: {
                            beginAtZero: true, // Y-axis starts from zero
                            title: {
                                display: true, // Display the title
                                text: 'Number of Users' // Title of Y-axis
                            }
                        },
                        x: {
                            title: {
                                display: true, // Display the title
                                text: 'Week of the Year' // Title of X-axis
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: true, // Show the legend
                            position: 'top', // Position of the legend
                            labels: {
                                color: '#333' // Color of the legend labels
                            }
                        }
                    }
                }
            });
        })
        .catch(error => console.error('There was a problem with the fetch operation:', error));
</script>
        </div>
            </div>

    <div class="right-side">
<!----------- ADMIN GREET CARD ------------->

        <div class="greet-admin">
            <h2>Have A Good Day Admin!</h2>
         </div>
<!--------------------CALENDER------------------------------->

<div class="calendar-container">
        <div class="calendar-header">
            <h2 id="month-year"></h2>
        </div>
        <div class="calendar-body">
            <div class="calendar-weekdays">
                <div class="calendar-day">Sun</div>
                <div class="calendar-day">Mon</div>
                <div class="calendar-day">Tue</div>
                <div class="calendar-day">Wed</div>
                <div class="calendar-day">Thu</div>
                <div class="calendar-day">Fri</div>
                <div class="calendar-day">Sat</div>
            </div>
            <div id="calendar-dates"></div>
        </div>
    </div>
</div>
    </div>
</section>
   <!-- USER TABLE -->
   <section id="users" class="dash-section">
    <div class="section">
        <h2>User Activity</h2>
         <?php include 'users.php';?>
    </div>
</section>

        <!-- LOCATIONS TABLE -->
<section id="locations" class="dash-section">
    <div class="section">
        <h2>Our Locations</h2>
         <?php include 'location_data.php';?>
    </div>
</section>

    <!-- ADD LOCATION -->
    <section id="add-location" class="dash-section">
    <div class="section">
    <h2>Provide Details</h2>
        <?php include 'add_location.php';?>
    </div>
</section>

    <!-- REVIEW TABLE -->
<section id="review" class="dash-section">
    <div class="section">
    <h2>Manage Reviews</h2>
        <?php include 'reviews.php';?>
    </div>
</section>
    
<!---->
     <!-- QUERY TABLE -->
     <section id="queries" class="dash-section">
        <div class="section">
            <h2>Manage Queries</h2>
            <?php include 'queries.php';?>
        </div>
    </section>
</section>
</div>

<script>
const currentDate = new Date();
   const currentDay = currentDate.getDate();
   const currentMonth = currentDate.getMonth();
   const currentYear = currentDate.getFullYear();
   const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

   const monthYearLabel = document.getElementById('month-year');
   const calendarDates = document.getElementById('calendar-dates');

   const monthNames = ["January", "February", "March", "April", "May", "June", 
                       "July", "August", "September", "October", "November", "December"];
   monthYearLabel.textContent = `${monthNames[currentMonth]} ${currentYear}`;

   const firstDay = new Date(currentYear, currentMonth, 1).getDay();

   for (let i = 0; i < firstDay; i++) {
       const emptyCell = document.createElement('div');
       emptyCell.classList.add('calendar-date', 'empty');
       calendarDates.appendChild(emptyCell);
   }

   for (let day = 1; day <= daysInMonth; day++) {
       const dateCell = document.createElement('div');
       dateCell.classList.add('calendar-date');
       if (day === currentDay) {
           dateCell.classList.add('today');
       }
       dateCell.textContent = day;
       calendarDates.appendChild(dateCell);
   }

</script>


</body>
</html>