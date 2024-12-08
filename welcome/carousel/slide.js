$(function () {
    // Initialize the first slide
    $('.carousel-item').eq(0).addClass('active');
    let total = $('.carousel-item').length;
    let current = 0;
  
    function setSlide(prev, next) {
      let slide = next;
      if (next >= total) {
        slide = 0;
        current = 0;
      } else if (next < 0) {
        slide = total - 1;
        current = total - 1;
      }
  
      $('.carousel-item').eq(prev).removeClass('active');
      $('.carousel-item').eq(slide).addClass('active');
  
      console.log('current ' + current);
      console.log('prev ' + prev);
    }
  
    $('#moveRight').on('click', function () {
      const next = current + 1;
      const prev = current;
      current = next;
      setSlide(prev, next);
    });
  
    $('#moveLeft').on('click', function () {
      const next = current - 1;
      const prev = current;
      current = next;
      setSlide(prev, next);
    });
  
    // Keyboard navigation
    $(document).on('keydown', function (e) {
      if (e.key === 'ArrowRight') {
        $('#moveRight').trigger('click');
      }
      if (e.key === 'ArrowLeft') {
        $('#moveLeft').trigger('click');
      }
    });
  });
  