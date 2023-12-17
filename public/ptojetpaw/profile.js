$(document).ready(function(){
    $('#menu').click(function(){
        $(this).toggleClass('fa-times');
        $('header').toggleClass('active')
    })
})

$(window).on('scroll load',function(){
    $('#menu').removeClass('fa-times');
    $('header').removeClass('active')
})