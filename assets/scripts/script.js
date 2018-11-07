$(document).ready(function(){
    // Animated Navigation Bar
    $(function(){
     var shrinkHeader = 100;
      $(window).scroll(function() {
        var scroll = getCurrentScroll();
          if (scroll >= shrinkHeader) {
               $('.float-navigation').addClass('shrink');
            }
            else {
                $('.float-navigation').removeClass('shrink');
            }
      });
    function getCurrentScroll() {
        return window.pageYOffset || document.documentElement.scrollTop;
        }
    });

    // FIRST CAROUSEL
    $('.karusele1').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        dots:false, 
        responsive:{
            0:{
                items:1
            }
        },
        autoplay:true,
        autoplayTimeout:4000,
        autoplayHoverPause:false
    });

    // SECOND CAROUSEL IN THE NEWS SECTION
    $('.karusele2').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        dots:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }                   
        }
    });

    // FIXED SCROLL-BACK-TO-TOP BUTTON
    // A) When the user scrolls down 100px from the top of the document, fade in the button
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100){
            $('.myBtn').fadeIn(150);
        } else {
            $('.myBtn').fadeOut(150);
        }
    });
    // B) When the user clicks on the button, scroll to the top of the document
    $('.myBtn').click(function(){
        $('body, html').animate({
            scrollTop: 0
        }, 500);
    });

    // KEEP THE COLOR OF AN ANTUR WHEN SELECTED
    $('.keep-color').on('click', function(){
        $('.keep-color').removeClass('selected');
        $(this).addClass('selected');
    });
});

// BURGER tClassList toggle
var burgeris = document.querySelectorAll(".icon_burger");
var meniu = document.querySelectorAll(".topnav");
burgeris[0].addEventListener("click", function(){
    meniu[0].classList.toggle("responsive");
})



