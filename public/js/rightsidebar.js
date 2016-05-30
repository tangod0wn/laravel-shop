$(function() {
    $('.checkbar, .nav-controller').on('click', function(event) {
        $('nav').toggleClass('focus');
    });
    $('.checkbar, .nav-controller').on('mouseover', function(event) {
        $('.checkbar').addClass('focus');
    });
    
    $('.number-spinner button').on('click', function(event) {
         $('.checkbar').toggleClass('focus');
    });   
    // $('.checkbar, .nav-controller').on('mouseout', function(event) {
    //     $('.checkbar').removeClass('focus');
    // });    
});