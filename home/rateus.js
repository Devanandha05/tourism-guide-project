$(function() {

    //The parent of stars 
    var parent;
    //To store the currnet level and previous level
    var arr = [];

    //Hover 
    $(".rate-container i").mouseover(function() {
        $(this).addClass('hovered');
        $(this).prevUntil('h1').addClass('hovered');

        //Mouse leave
    }).mouseleave(function() {
        $(this).prevUntil("h1").removeClass('hovered');
        $(this).removeClass('hovered');

        //Done
    }).click(function() {
        //selected
        $(this).addClass('clicked');
        $(this).prevUntil('h1').addClass('clicked');

        //currnet level that you select
        var currentEle = $(this);
        //parent of levels
        parent = $('.rate-container');
        //current index of current level    
        index = parent.children().index(currentEle);
        //store currnet and previous index    

        if (arr.length < 2) {
            arr.push(index)
        }
        //if u want to change your rate to lesser than level
        //the first index is previuos level and the second is current level

        if (arr[0] > arr[1] || arr[0] < arr[1]) {

            $(this).addClass('clicked');
            $(this).nextUntil('#l-' + arr[0] + 1).removeClass('clicked');

        }
        //preventing double click on the same level
        if (arr[0] === arr[1]) {

            arr = [arr[0]];
        }


    });

});

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
  