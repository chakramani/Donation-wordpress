
/*slider*/


console.log('jaha');
$(document).ready(function() {
    // $('.dropify').dropify();
 
    $("#banner-slider").owlCarousel({
    margin: 10,
    loop:true,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    responsiveClass: true,
    autoHeight: true,
    autoplayTimeout: 1000,
      nav : true,
      navText: ["<div class='nav-button owl-prev'>01</div>", "<div class='nav-button owl-next'>02</div>","<div class='nav-button owl-next'>03</div>"],
      responsive:{
          0: {
              items:1
          },
          600: {
              items:1
          },
          1024: {
              items:1
          },
          1366:{
              items:1
          }
      }
    });

  
});


    // var p = document.querySelector('.progress-bar');
    // p.setAttribute("style"," transition:1s");

// function progress() {
//     const progressBar = document.querySelector('progress');
//     const iter = (value = 0) => {
//       if (value <= 100) {
//         progressBar.setAttribute('value', value);
//         setTimeout(() => iter(value + 1), 100);
//       }
//     };
//     iter();
// }

  
// progress();

jQuery(document).ready(function($) {
  $('.counter').counterUp({
      delay: 10,
      time: 1000
  });
});
