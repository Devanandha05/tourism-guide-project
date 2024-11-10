document.addEventListener('DOMContentLoaded', function() {
    const sections = document.querySelectorAll('.content-section');
    const links = document.querySelectorAll('.topbar-menu li a');

    links.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            // Remove 'active' class from all links
            links.forEach(l => l.classList.remove('active'));
            // Add 'active' class to the clicked link
            link.classList.add('active');

            // Remove 'active' class from all sections
            sections.forEach(section => section.classList.remove('active'));
            // Add 'active' class to the corresponding section
            const targetSection = document.querySelector(link.getAttribute('href'));
            targetSection.classList.add('active');
        });
    });

    // Set default section to Dashboard (or any other section you prefer)
    document.querySelector('.topbar-menu li a.active').click();
});

// HIDING SECTIONS AND DISPLAYING ON CLICK
/*
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
  */