// PAGE LOAD ANIMATION

window.onload = function() {
  // Hide the loader
  document.getElementById("loader").style.display = "none";

  /*// Show and animate the content
  var content = document.getElementById("content");
  content.classList.add("show");   // Trigger fade-in and upward animation

  content.style.display = "block"; // Show content*/
};


// ===== HAMBURGER BUTTON ===== //
$(document).ready(function() {
  
  $('.togglebtn').click(function() {
    $('.togglebtn').toggleClass('change');
  })
    
});


// HIDING SECTIONS AND DISPLAYING ON CLICK

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

///////////////////////////////////////

// TOGGLE SIDEBAR/RESPONSIVE NAVBAR

let menu = document.querySelector('#toggleSidebar');
let navbar = document.querySelector('nav ul .menu');

menu.onclick = () =>{
  menu.classList.toggle('fa-times');
  navbar.classList.toggle('active');
}

/////////////////////////////////////////

//POPUP CONTACTUS

// Display the popup
document.querySelector('.overlay').style.display = 'block';
document.querySelector('.popup').style.display = 'block';

// Close the popup
function closePopup() {
    document.querySelector('.overlay').style.display = 'none';
    document.querySelector('.popup').style.display = 'none';
}
function displayHomeLink() {
  // Display the link after clicking OK
  document.getElementById('homeLink').style.display = 'block';
}
////////////////////////////////////////