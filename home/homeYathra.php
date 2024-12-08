 <?php
 require 'connect.php';
session_start(); // Start or resume the session
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  // If not logged in, redirect to the login page
  header("Location: /Tourist Guide project/welcome/signup.php");
  exit;
}

// Check if the username is set in the session
if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
  $user_id = $_SESSION['user_id'];
} else {
  $username = 'Guest'; 
}
?>
<?php include 'count.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yathratales.co</title>
    <link rel="stylesheet" href="homeYathra.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="home.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="slide.js" ></script>
<link rel="stylesheet" href="slide.css">

    <script>
      function showSection(sectionId) {
  // Hide all sections
  const sections = document.querySelectorAll('.content-section');
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
  <!--LOADER-->
  <div id="loader">
    <div class="dot-container">
      <div class="dot dot1"></div>
      <div class="dot dot2"></div>
      <div class="dot dot3"></div>
  </div>
</div>


        <nav>
          <div class="sitename">
            <h3>YathraTales.co</h3>
          </div>
            <ul class="menu">
            <li><a href="homeYathra.php">Home</a></li>
            <li><a href="#" onclick="showSection('exploreind')">Explore India</a></li>
            <li><a href="#" onclick="showSection('budget-tracker')">Expense Tracker</a></li>
            <li><a href="#" onclick="showSection('emergency')">Helpline</a></li>  
          </ul>
          <div class="admin-profile">
           <a href="profile.php"><?php echo $_SESSION['username'];?></a>
            <script src="home.js"></script>
        </nav>

  <!--HERO SECTION-->
  <section id="home" class="content-section" style="display: block;">
<div class="hero" id="hero-content">
       <div class="title">
         <p class="yathra">Yathra</p>
         <p class="tales">Tales.co</p>
       </div>
     <p class="hero-p">Plan your trip with us and travel around India with the most affordable packages!</p>
     <a href="#locations" class="btn">Explore Locations!</a>   
</div>

<!-- POPULAR LOCATIONS -->
 <section id="carousel" class="img-carousel">
<div class="carousel">
    <div class="carousel__nav">
     <span id="moveLeft" class="carousel__arrow">
          <svg class="carousel__icon" width="24" height="24" viewBox="0 0 24 24">
      <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path>
  </svg>
      </span>
      <span id="moveRight" class="carousel__arrow" >
        <svg class="carousel__icon"  width="24" height="24" viewBox="0 0 24 24">
    <path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
  </svg>    
      </span>
    </div>
    <div class="carousel-item carousel-item--1">
      <div class="carousel-item__image"></div>
      <div class="carousel-item__info">
        <div class="carousel-item__container">
        <h2 class="carousel-item__subtitle">Kashmir </h2>
        <h1 class="carousel-item__title">Taj Mahal</h1>
        </h1>
        <p class="carousel-item__description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
        <a href="#" class="carousel-item__btn">Explore the tour</a>
          </div>
      </div>
    </div>
    <div class="carousel-item carousel-item--2">
      <div class="carousel-item__image"></div>
      <div class="carousel-item__info">
        <div class="carousel-item__container">
        <h2 class="carousel-item__subtitle">New Delhi </h2>
        <h1 class="carousel-item__title">Lotus Temple</h1>
        <p class="carousel-item__description">Clear Glass Window With Brown and White Wooden Frame iste natus error sit voluptatem accusantium doloremque laudantium.</p>
        <a href="#" class="carousel-item__btn">Read the article</a>
          </div>
      </div>
    </div>
      <div class="carousel-item carousel-item--3">
      <div class="carousel-item__image"></div>
      <div class="carousel-item__info">
        <div class="carousel-item__container">
        <h2 class="carousel-item__subtitle">Goa</h2>
        <h1 class="carousel-item__title">Beach</h1>
        <p class="carousel-item__description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
        <a href="#" class="carousel-item__btn">Explore the palms</a>
          </div>
      </div>
    </div>
    
     <div class="carousel-item carousel-item--4">
      <div class="carousel-item__image"></div>
      <div class="carousel-item__info">
        <div class="carousel-item__container">
        <h2 class="carousel-item__subtitle">Kerala </h2>
        <h1 class="carousel-item__title">Munnar </h1>
        <p class="carousel-item__description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
        <a href="#" class="carousel-item__btn">Explore the beach</a>
          </div>
      </div>
    </div>
    
   <div class="carousel-item carousel-item--5">
      <div class="carousel-item__image"></div>
      <div class="carousel-item__info">
        <div class="carousel-item__container">
        <h2 class="carousel-item__subtitle">Nepal </h2>
        <h1 class="carousel-item__title">Kathmandu</h1>
        <p class="carousel-item__description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
        <a href="#" class="carousel-item__btn">Read the article</a>
          </div>
      </div>
    </div>
    
    <div class="carousel-item carousel-item--6">
      <div class="carousel-item__image"></div>
      <div class="carousel-item__info">
        <div class="carousel-item__container">
        <h2 class="carousel-item__subtitle">Tamil Nadu</h2>
        <h1 class="carousel-item__title">Adiyogi Shiva Statue</h1>
        <p class="carousel-item__description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
        <a href="#" class="carousel-item__btn">Read the article</a>
          </div>
      </div>
    </div>
  </div>
  </section>
<section id="locations">
  <section class="locations">
      <h2>Popular Locations</h2> 
      <div class="location-cards">
          <div class="card">
              <img src="taj.jpg" alt="Taj Mahal">
              <h3>Taj Mahal</h3>
              <p>Kashmir</p>
          </div>
          <div class="card">
              <img src="lotustemp.jpg" alt="NewDelhi">
              <h3>Lotus Temple</h3>
              <p>New Delhi</p>
          </div>
          <div class="card">
              <img src="goa.jpg" alt="Goa">
              <h3>Beach</h3>
              <p>Goa</p>
          </div>
          <div class="card">
              <img src="munnar.jpg" alt="Kerala">
              <h3>Munnar</h3>
              <p>Kerala</p>
          </div>
          <div class="card">
              <img src="kathmandu.jpg" alt="Nepal">
              <h3>Kathmandu</h3>
              <p>Nepal</p>
          </div>
          <div class="card">
              <img src="shiva.jpg" alt="Tamil nadu">
              <h3>Adiyogi Shiva Statue</h3>
              <p>Tamil Nadu</p>
          </div>
      </div>
  </section>
</section>

<!---------------------------------------------------------------------------------------------SERVICE SECTION-------------
<section id="services">
<div class="container">
      <h1>Our Services</h1>
      <div class="row">
        <div class="service">
          <i class="fas fa-laptop-code"></i>
          <h2>Explore India</h2>
          <p>
          <a href="#" onclick="showSection('exploreind')">Explore Now</a>
          </p>
        </div>
       <div class="service">
          <i class="fas fa-chart-line"></i>
          <h2>Personalized Travel Plan</h2>
          <p>
          <a href="#" onclick="showSection('travel-plan')">Get Now</a>
          </p>
        </div>
        <div class="service">
          <i class="fab fa-sketch"></i>
          <h2>Travel Budget Tracker</h2>
          <p>
          <a href="#" onclick="showSection('budget-tracker')">Budget Tracker</a>
          </p>
        </div>
        <div class="service">
          <i class="fas fa-database"></i>
          <h2>Emergency Contact Details</h2>
          <p>
          <a href="#" onclick="showSection('emergency')">Get Contact Details</a>
          </p>
        </div>
      </div>
    </div>
</section>
<!-----------------------------------------------------------------------End of services--->


<!---------------------------------------------------------------------------------------------------------------REVIEWS SECTION-->
<div class="rev-section">

  <h2 class="rev-title">Our Guests Love Us</h2>
  <p class="note">Hear from our Guests !!</p>
  
  <div class="reviews">
  
  <div class="review">
     <div class="head-review">
        <img src="profile1.jpg" width="250px">
     </div>
     <div class="body-review">
        <div class="name-review">Nathan D</div>
        <div class="place-review">United States</div>
        <div class="rating">
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star-half"></i>
        </div>
        <div class="desc-review">
          "I recently booked a trip through this website and couldn't be happier! 
          The user interface was intuitive, and I found great deals on trip. 
          Customer support was prompt and helpful when I had questions. Highly recommend!"</div>
     </div>
  </div>
  
  <div class="review">
     <div class="head-review">
        <img src="profile2.jpg" width="250px">
     </div>
     <div class="body-review">
        <div class="name-review">Mary Will</div>
        <div class="place-review">Paris</div>
        <div class="rating">
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
        </div>
        <div class="desc-review">
          "I used Yathratales.co to plan my recent trip to Kerala, and I couldn’t be happier with the experience! 
          The site offered tailored recommendations that fit my budget perfectly.
           I loved how easy it was to navigate and find exactly what I was looking for.
          Highly recommend!"</div>
     </div>
  </div>
  <div class="review">
     <div class="head-review">
        <img src="profile3.jpg" width="250px">
     </div>
     <div class="body-review">
        <div class="name-review">Natasha June</div>
        <div class="place-review">New York</div>
        <div class="rating">
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star-half"></i>
        </div>
        <div class="desc-review">
          "Planning a trip can be overwhelming, but Yathratales.co made it so much easier.
           The customer support team was also super helpful and quick to respond to my queries. 
          If you’re looking for a reliable travel guide, Yathratales is the way to go!"</div>
     </div>
  </div>
  
  </div>
  
  </div>
</section> 
<!--------------------------------------------------------------------------------END OF REVIEWS--
<!----------------------------------------------------------------------END OF HOMEPAGE-->



<!---------------------------------------------------------------------------------------------------PREFERENCE FORM-->
<section id="exploreind" class="content-section">
    <div id="modalForm" class="modal" >
     <h2>Tell Us Your Preferences!</h2>

     <div class="form-container">
        <form action="location.php" method="get">
    <h3>Let Us Know Your Interests</h3>
            <label for="region">Region:</label>
            <select id="region" name="region">
            <option value=""></option>
                <option value="South India">South India</option>
                <option value="North India">North India</option>
                <option value="West India">West India</option>
                <option value="East India">East India</option> 
                <option value="Central India">Central India</option>                
            </select>
      <label for="type">Type</label>
        <div class="search-container">
        <input type="text" id="searchInput" name="type" class="search-input" placeholder="Eg: temple,beach,park..." autocomplete="off">
        <div id="dropdownList" class="dropdown-list hidden"></div>
    </div>

    <script>
        const options = [
            "Amusement Park", "Aquarium", "Beach", "Bird Sanctuary", "Border Crossing", 
            "Botanical Garden", "Cave", "Church", "Commercial Complex", "Confluence", 
            "Cricket Ground", "Cultural", "Dam", "Entertainment", "Film Studio", 
            "Fort", "Ghat", "Government Building", "Gravity Hill", "Gurudwara", 
            "Hill", "Historical", "Island", "Lake", "Landmark", 
            "Mall", "Market", "Mausoleum", "Memorial", "Monastery", 
            "Monument", "Mosque", "Mountain Peak", "Museum", "National Park", 
            "Natural Feature", "Observatory", "Orchard", "Palace", "Park", 
            "Prehistoric Site", "Promenade", "Race Track", "Religious Complex", 
            "Religious Shrine", "Religious Site", "River Island", "Rock Carvings", 
            "Scenic Area", "Scenic Point", "Science", "Sculpture Garden", "Shrine", 
            "Site", "Ski Resort", "Spiritual Center", "Sunrise Point", "Suspension Bridge", 
            "Tea Plantation", "Temple", "Theme Park", "Tomb", "Township", 
            "Trekking", "Urban Development Project", "Valley", "Viewpoint", "Village", 
            "Vineyard", "Waterfall", "Wildlife Sanctuary", "Zoo"
        ];

        const searchInput = document.getElementById("searchInput");
        const dropdownList = document.getElementById("dropdownList");

        // Function to update the dropdown based on the search input
        function updateDropdown() {
            const query = searchInput.value.toLowerCase();
            const filteredOptions = options
                .filter(option => option.toLowerCase().includes(query))
                .sort((a, b) => a.toLowerCase().localeCompare(b.toLowerCase()));
            
            dropdownList.innerHTML = ""; // Clear existing options

            if (filteredOptions.length > 0) {
                dropdownList.classList.remove("hidden");
                filteredOptions.forEach(option => {
                    const div = document.createElement("div");
                    div.className = "dropdown-item";
                    div.textContent = option;
                    div.onclick = () => {
                        searchInput.value = option; // Set input value on click
                        dropdownList.classList.add("hidden"); // Hide dropdown
                    };
                    dropdownList.appendChild(div);
                });
            } else {
                dropdownList.classList.add("hidden");
            }
        }

        // Event listener for input changes
        searchInput.addEventListener("input", updateDropdown);

        // Close dropdown if clicked outside
        document.addEventListener("click", (e) => {
            if (!document.querySelector(".search-container").contains(e.target)) {
                dropdownList.classList.add("hidden");
            }
        });
    </script>

        <label for="g_rating">Google Rating</label>
            <select id="g_rating" name="g_rating">
              <option value="0"></option>
                <option value="1.0">Above 1.0</option>
                <option value="2.0">Above 2.0</option>
                <option value="3.0">Above 3.0</option>
                <option value="4.0">Above 4.0</option>
            </select>

            <button type="submit" value="Submit">Submit</button>
        </form>
    </div>
       </div>
       </section>
<!-------------------------------------------------------------------------------------------------------BUDGET TRACKER-->


<section id="budget-tracker" class="content-section">
  
  <?php include 'budget.php';?>

 </section>

<!----------------------------------------------------------------------------------END OF BUDGET TRACKER-->


<!--------------------------------------------------------------------------------------------------------------CONTACT US-->
    <section id="contactus" class="content-section">
        <div class="contact-container">
            <div class="contact-img">
                <img src="charminar.jpg" alt="Contact Image">
            </div>
            <div class="contact-form">
                <h2>Contact Us</h2>
                <form action="contactus.php" method="POST">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" placeholder="Your Email" required>
                    
                    <label for="message">Your queries *</label>
                    <textarea id="message" name="message" required></textarea>
                    
                    <button type="submit" class="submit-btn">Submit</button>
                </form>
            </div>
        </section>
<!---------------------------------------------------------------------------------END OF CONTACT US-->  

<!-------------------------------------------------------------------------------------------------------------------- ABOUT US-->


<section id="aboutus" class="content-section"> 
  <div class="aboutus-container">
    <h2>About Us</h2>
    <p>At Yathratales, we believe that every journey has a story, and we're here to help you craft yours. As a trusted tourism management guide, we are dedicated to making travel easier, more affordable, and deeply enriching for explorers across the globe.</p><p> Whether you’re a thrill-seeker, a culture enthusiast, or simply looking for a peaceful escape, we provide the guidance and tools you need to discover the best destinations with ease.</p></ul>
    <div class="row-container">
      <div class="row">
        <div class="img-col">
          <img src="charminar.jpg" alt="" />
        </div>
        <div class="text-col">
          <h3>
            Our<br />
             Mission
          </h3>
          <p> We aim to empower travelers with reliable insights,
             personalized travel plans, and curated experiences t
             hat capture the heart and soul of each destination.
              Our mission is simple: to help you explore more, for less,
               and with greater purpose.
          </p>
        </div>
      </div>
      <div class="row">
        <div class="text-col">
          <h3>
            Why <br />
            Choose Us?
          </h3>
          <p>
            <b>Expert Knowledge:</b> With years of experience in tourism management, we bring you tips and tricks from industry insiders.
             <b> Experiences:</b> Every traveler is unique. That’s why we offer tailored itineraries and expert recommendations that fit your preferences, budget, and schedule.
            <b>Sustainable Travel:</b> We prioritize eco-friendly and sustainable tourism practices, encouraging responsible travel that benefits both the traveler and the environment.
            <b>24/7 Support:</b> Our team is here to assist you at every step of your journey, ensuring you have a hassle-free and unforgettable experience.</p>        
          </p>
        </div>
        <div class="img-col n-margin">
          <img src="bali.jpg" alt="" />
        </div>
      </div>
    </div>
    <p>Join us at Yathratales.co and let us guide you through the world’s most incredible destinations, one tale at a time. Your next adventure awaits!</p>

</div>
</section>

<!-- END OF ABOUT US-->
 <!------------------------------------------------------------------------------EMERGENCY-->

<section id="emergency" class="content-section">
    <div class="em-container">
        <h1>In Case of Emergency!</h1>
        <ul class="contact-list">
            <li>
                <span class="contact-name">Police</span>
                <span class="contact-number">100
                <a href="tel:100" class="call-button">
                  <i class="fas fa-phone"></i>
                </a></span>
            </li>
            <li>
                <span class="contact-name">Ambulance</span>
                <span class="contact-number">102
                <a href="tel:102" class="call-button">
                  <i class="fas fa-phone"></i>
                </a></span>
            </li>
            <li>
                <span class="contact-name">Fire Department</span>
                <span class="contact-number">101
                <a href="tel:101" class="call-button">
                  <i class="fas fa-phone"></i>
                </a></span>
            </li>
            <li>
                <span class="contact-name">Disaster Management</span>
                <span class="contact-number">108
                <a href="tel:108" class="call-button">
                  <i class="fas fa-phone"></i>
                </a></span>
            </li>
            <li>
                <span class="contact-name">Tourist Helpline</span>
                <span class="contact-number">1363
                <a href="tel:1363" class="call-button">
                  <i class="fas fa-phone"></i>
                </a></span>
            </li>
            <li>
                <span class="contact-name">Women Helpline</span>
                <span class="contact-number">1091
                <a href="tel:1091" class="call-button">
                  <i class="fas fa-phone"></i>
                </a></span>
            </li>
        </ul>

        <div class="contact-note">
            <strong>Note:</strong> In case of any emergencies, always try to contact the local emergency service number that is most relevant to your situation. Stay calm and provide accurate details to the responders.
        </div>
    </div>
</section>

<!----------------------------------------EMERGENCY-->

<!--RATE US-->

<section id="rateus" class="content-section">
<div class="rate-content">
    <form class="rate-form" action="rate.php" method="POST">
        <h2 class="ask-rating">Will you give us a rating?</h2>
        <!-- Star Rating -->
        <div class="rating">
            <input type="radio" name="rating" value="5" id="star5"><label for="star5">&#9733;</label>
            <input type="radio" name="rating" value="4" id="star4"><label for="star4">&#9733;</label>
            <input type="radio" name="rating" value="3" id="star3"><label for="star3">&#9733;</label>
            <input type="radio" name="rating" value="2" id="star2"><label for="star2">&#9733;</label>
            <input type="radio" name="rating" value="1" id="star1"><label for="star1">&#9733;</label>
        </div>

        <button type="submit">Send</button>
    </form>
</div>
</section>

    <!--TERMS AND CONDITIONS-->
    <section id="terms-conditions" class="content-section">
      <h2>Terms and Conditions</h2>
  <div>
  
    <ul>
      <p>
          <p>
              <li><b>INTRODUCTION</b></li>
              Welcome to Yathratales.co. By accessing our website and services, you agree to the following terms and conditions.
               Please read them carefully before using our services. 
               These terms apply to all users, including visitors, customers, and contributors of content.
            </p>
            <p>
              <li><b>ACCEPTANCE OF TERMS</b></li>
              By using Yathratales.co, you accept and agree to be bound by these terms. 
              
            </p>
            <p>
              <li><b>SERVICE DESCRIPTION</b></li>
              Yathratales.co provides tourism management guidance, travel advice, itinerary planning, and related content to help users enhance their travel experience. 
              All content provided is for informational purposes only and should not be considered professional advice.
            </p> 
            <p>
              <li><b>USE OF WEBSITE</b></li>
              You agree to use the website for lawful purposes only.
          You must not use the site to engage in any illegal, fraudulent, or harmful activity.
          You are prohibited from attempting to interfere with the proper working of the site, including hacking or introducing malicious code.
            </p>
            <p>
              <li><b>USER RESPONSIBILITY</b></li>
              All information you provide to Yathratales.co must be accurate, current, and complete.
              We are not liable for any direct or indirect loss or damage resulting from reliance on the information provided on this website.
              Our website may contain links to third-party websites or services that are not owned or controlled by Yathratales.co.
               We are not responsible for the content, privacy policies, or practices of any third-party websites or services.
               Yathratales.co reserves the right to modify or update these terms at any time.
                Users will be notified of any material changes, and continued use of the website after such changes constitutes acceptance of the updated terms.
          
            </p>
            <p>
              <li><b>TERMINATION</b></li>
              We reserve the right to terminate or suspend your access to Yathratales.co at our discretion, without prior notice, for any violation of these terms or for any other reason.</p>
               
            <p>
                We understand that legal terms can be exhausting to 
                read, and we’ve tried to make the experience more
                 pleasant. If you have suggestions on how we can improve them, 
                you are welcome to <a href="#" onclick="showSection('contactus')" >contact us</a>.
            </p>
      </p>
  </ul>
  </div>
  </section>
<!--END OF TERMS-->


<!-- PRIVACYPOLICY-->  

<section id="privacypolicy" class="content-section">
  <h2>Privacy Policy</h2>
 <div class="content">
 <h4>Please read carefully</h4>
 <p>
  At Yathratales.co, we are committed to protecting your privacy and ensuring the security of your personal information. 
  This Privacy Policy explains how we collect, use, share, and protect your data when you visit our website or use our services. </p> 
     
   <p> We collect both personal and non-personal information from users to improve our services and provide a personalized experience.
     The types of information we may collect include:

    <b>Personal Information:</b> This includes information you provide when you contact us, subscribe to our newsletter, or use our services. 
    It may include your name, email address, phone number, and any other relevant details.
    <b>Non-Personal Information:</b> This includes browsing behavior, device information, IP address, and other technical data that do not personally identify you.</p> 
     
  <p> We do not sell, trade, or rent your personal information to third parties. However, we may share your information with:

    1)Service Providers: We may share data with trusted third-party vendors who assist us in operating our website, conducting business, or serving you (e.g., payment processors or customer support services). 
    These third parties are obligated to keep your information confidential and use it only for the services they provide.
    2-10
    2) Requirements: We may disclose your information when required by law or to protect the rights, safety, or property of Yathratales.co, our users, or others.
 </p>
  
</div>
</section>
<!-------------------------------------------------------------------------------------------END OF PRIVACYPOLICY-->

    <footer class="footer">
      <svg class="footer-wave-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 100" preserveAspectRatio="none">
        <path class="footer-wave-path" d="M851.8,100c125,0,288.3-45,348.2-64V0H0v44c3.7-1,7.3-1.9,11-2.9C80.7,22,151.7,10.8,223.5,6.3C276.7,2.9,330,4,383,9.8 c52.2,5.7,103.3,16.2,153.4,32.8C623.9,71.3,726.8,100,851.8,100z"></path>
      </svg>
      <div class="footer-content">
        <div class="footer-content-column">
            <div class="footer-menu">
              <h2 class="footer-menu-name"> Quick Links</h2>
              <ul id="menu-quick-links" class="footer-menu-list">
                <li class="menu-item menu-item-type-custom menu-item-object-custom">
                </li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom">
                  <a href="#" onclick="showSection('rateus')">Give us a rating</a>
                </li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page">
                  <a href="#" onclick="showSection('aboutus')">About Us</a>
                </li>
              </ul>
            </div>
          </div>
        <div class="footer-content-column">
          <div class="footer-menu">
            <h2 class="footer-menu-name"> Legal</h2>
            <ul id="menu-legal" class="footer-menu-list">
              <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-privacy-policy menu-item-170434">
                <a href="#" onclick="showSection('privacypolicy')">Privacy Notice</a>
              </li>
              <li class="menu-item menu-item-type-post_type menu-item-object-page">
                <a href="#" onclick="showSection('terms-conditions')">Terms of Use</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="footer-content-column">
          <div class="footer-call-to-action">
            <h2 class="footer-call-to-action-title"> Let's Chat</h2>
            <p class="footer-call-to-action-description"> Have a support question?</p>
            <a class="footer-call-to-action-button button" href="#" onclick="showSection('contactus')"> Get in Touch </a>
          </div>
          <div class="footer-call-to-action">
            <h2 class="footer-call-to-action-title"> You Call Us</h2>
            <p class="footer-call-to-action-link-wrapper"> <a class="footer-call-to-action-link" href="tel:0124-64XXXX" target="_self"> 0124-64XXXX </a></p>
          </div>
        </div>
        <div class="footer-social-links"> 
          <svg class="footer-social-amoeba-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 236 54">
            <path class="footer-social-amoeba-path" d="M223.06,43.32c-.77-7.2,1.87-28.47-20-32.53C187.78,8,180.41,18,178.32,20.7s-5.63,10.1-4.07,16.7-.13,15.23-4.06,15.91-8.75-2.9-6.89-7S167.41,36,167.15,33a18.93,18.93,0,0,0-2.64-8.53c-3.44-5.5-8-11.19-19.12-11.19a21.64,21.64,0,0,0-18.31,9.18c-2.08,2.7-5.66,9.6-4.07,16.69s.64,14.32-6.11,13.9S108.35,46.5,112,36.54s-1.89-21.24-4-23.94S96.34,0,85.23,0,57.46,8.84,56.49,24.56s6.92,20.79,7,24.59c.07,2.75-6.43,4.16-12.92,2.38s-4-10.75-3.46-12.38c1.85-6.6-2-14-4.08-16.69a21.62,21.62,0,0,0-18.3-9.18C13.62,13.28,9.06,19,5.62,24.47A18.81,18.81,0,0,0,3,33a21.85,21.85,0,0,0,1.58,9.08,16.58,16.58,0,0,1,1.06,5A6.75,6.75,0,0,1,0,54H236C235.47,54,223.83,50.52,223.06,43.32Z"></path>
          </svg>
          <a class="footer-social-link linkedin" href="https://in.linkedin.com/" target="_blank">
            <span class="hidden-link-text">Linkedin</span>
            <svg class="footer-social-icon-svg" xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 30 30">
              <path class="footer-social-icon-path" d="M9,25H4V10h5V25z M6.501,8C5.118,8,4,6.879,4,5.499S5.12,3,6.501,3C7.879,3,9,4.121,9,5.499C9,6.879,7.879,8,6.501,8z M27,25h-4.807v-7.3c0-1.741-0.033-3.98-2.499-3.98c-2.503,0-2.888,1.896-2.888,3.854V25H12V9.989h4.614v2.051h0.065 c0.642-1.18,2.211-2.424,4.551-2.424c4.87,0,5.77,3.109,5.77,7.151C27,16.767,27,25,27,25z"></path>
            </svg>
          </a>
          <a class="footer-social-link twitter" href="https://x.com/i/flow/login" target="_blank">
            <span class="hidden-link-text">Twitter</span>
            <svg class="footer-social-icon-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 26">
              <path class="footer-social-icon-path" d="M 25.855469 5.574219 C 24.914063 5.992188 23.902344 6.273438 22.839844 6.402344 C 23.921875 5.75 24.757813 4.722656 25.148438 3.496094 C 24.132813 4.097656 23.007813 4.535156 21.8125 4.769531 C 20.855469 3.75 19.492188 3.113281 17.980469 3.113281 C 15.082031 3.113281 12.730469 5.464844 12.730469 8.363281 C 12.730469 8.773438 12.777344 9.175781 12.867188 9.558594 C 8.503906 9.339844 4.636719 7.246094 2.046875 4.070313 C 1.59375 4.847656 1.335938 5.75 1.335938 6.714844 C 1.335938 8.535156 2.261719 10.140625 3.671875 11.082031 C 2.808594 11.054688 2 10.820313 1.292969 10.425781 C 1.292969 10.449219 1.292969 10.46875 1.292969 10.492188 C 1.292969 13.035156 3.101563 15.15625 5.503906 15.640625 C 5.0625 15.761719 4.601563 15.824219 4.121094 15.824219 C 3.78125 15.824219 3.453125 15.792969 3.132813 15.730469 C 3.800781 17.8125 5.738281 19.335938 8.035156 19.375 C 6.242188 20.785156 3.976563 21.621094 1.515625 21.621094 C 1.089844 21.621094 0.675781 21.597656 0.265625 21.550781 C 2.585938 23.039063 5.347656 23.90625 8.3125 23.90625 C 17.96875 23.90625 23.25 15.90625 23.25 8.972656 C 23.25 8.742188 23.246094 8.515625 23.234375 8.289063 C 24.261719 7.554688 25.152344 6.628906 25.855469 5.574219 "></path>
            </svg>
          </a>
          <a class="footer-social-link youtube" href="https://www.youtube.com/" target="_blank">
            <span class="hidden-link-text">Youtube</span>
            <svg class="footer-social-icon-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
              <path class="footer-social-icon-path" d="M 15 4 C 10.814 4 5.3808594 5.0488281 5.3808594 5.0488281 L 5.3671875 5.0644531 C 3.4606632 5.3693645 2 7.0076245 2 9 L 2 15 L 2 15.001953 L 2 21 L 2 21.001953 A 4 4 0 0 0 5.3769531 24.945312 L 5.3808594 24.951172 C 5.3808594 24.951172 10.814 26.001953 15 26.001953 C 19.186 26.001953 24.619141 24.951172 24.619141 24.951172 L 24.621094 24.949219 A 4 4 0 0 0 28 21.001953 L 28 21 L 28 15.001953 L 28 15 L 28 9 A 4 4 0 0 0 24.623047 5.0546875 L 24.619141 5.0488281 C 24.619141 5.0488281 19.186 4 15 4 z M 12 10.398438 L 20 15 L 12 19.601562 L 12 10.398438 z"></path>
            </svg>
          </a>
          <a class="footer-social-link github" href="https://github.com/" target="_blank">
            <span class="hidden-link-text">Github</span>
            <svg class="footer-social-icon-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
              <path class="footer-social-icon-path" d="M 16 4 C 9.371094 4 4 9.371094 4 16 C 4 21.300781 7.4375 25.800781 12.207031 27.386719 C 12.808594 27.496094 13.027344 27.128906 13.027344 26.808594 C 13.027344 26.523438 13.015625 25.769531 13.011719 24.769531 C 9.671875 25.492188 8.96875 23.160156 8.96875 23.160156 C 8.421875 21.773438 7.636719 21.402344 7.636719 21.402344 C 6.546875 20.660156 7.71875 20.675781 7.71875 20.675781 C 8.921875 20.761719 9.554688 21.910156 9.554688 21.910156 C 10.625 23.746094 12.363281 23.214844 13.046875 22.910156 C 13.15625 22.132813 13.46875 21.605469 13.808594 21.304688 C 11.144531 21.003906 8.34375 19.972656 8.34375 15.375 C 8.34375 14.0625 8.8125 12.992188 9.578125 12.152344 C 9.457031 11.851563 9.042969 10.628906 9.695313 8.976563 C 9.695313 8.976563 10.703125 8.65625 12.996094 10.207031 C 13.953125 9.941406 14.980469 9.808594 16 9.804688 C 17.019531 9.808594 18.046875 9.941406 19.003906 10.207031 C 21.296875 8.65625 22.300781 8.976563 22.300781 8.976563 C 22.957031 10.628906 22.546875 11.851563 22.421875 12.152344 C 23.191406 12.992188 23.652344 14.0625 23.652344 15.375 C 23.652344 19.984375 20.847656 20.996094 18.175781 21.296875 C 18.605469 21.664063 18.988281 22.398438 18.988281 23.515625 C 18.988281 25.121094 18.976563 26.414063 18.976563 26.808594 C 18.976563 27.128906 19.191406 27.503906 19.800781 27.386719 C 24.566406 25.796875 28 21.300781 28 16 C 28 9.371094 22.628906 4 16 4 Z "></path>
            </svg>
          </a>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="footer-copyright-wrapper">
          <p class="footer-copyright-text">
            <a class="footer-copyright-link" href="#" target="_self"> ©2024 | Created By DDBG | All rights reserved. </a>
          </p>
        </div>
      </div>
    </footer>
  </div>
  <!--CHATBOT-->
<script src="https://widget.cxgenie.ai/widget.js" data-aid="e0ebbdff-03b8-45a7-8a2b-0e3f63a7be17" data-lang="en"></script>
</body>
</html>
