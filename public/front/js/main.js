$('.home-slider').owlCarousel({
    loop:true,
    dots: true,
    margin:10,
    nav:true,
    items: 1,
	navText: ['<img src="../front/img/nav-left.png">','<img src="../front/img/nav-right.png">'],
})
$('.course-slider').owlCarousel({
    loop:true,
    dots: true,
    margin:10,
    nav:true,
    navText: ['<img src="../front/img/nav-left.png">','<img src="../front/img/nav-right.png">'],
    responsive : {
        0 : {
            items: 1
        },
        768 : {
            items: 2
        },
        1240 : {
            items: 3
        }
    }
})
$('.comment-slider').owlCarousel({
    loop:true,
    dots: true,
    margin:10,
    nav:true,
    navText: ['<img src="../front/img/nav-left.png">','<img src="../front/img/nav-right.png">'],
    responsive : {
        0 : {
            items: 1
        },
        992 : {
            items: 2
        }
    }
})
$('.media-slider').owlCarousel({
    loop:true,
    dots: true,
    margin:10,
    nav:true,
    navText: ['<img src="../front/img/nav-left.png">','<img src="../front/img/nav-right.png">'],
    responsive : {
        0 : {
            items: 1
        },
        768 : {
            items: 2
        },
        1240 : {
            items: 3
        }
    }
})
$(".about-drop-head").click(function(){
    if($(this).parent().hasClass('active')) {
        $(this).parent().removeClass("active")
    }
    else {
        $(".about-drop-item").removeClass("active")
        $(this).parent().addClass("active")
    }
})
$(window).scroll(function() {    
    var scroll = $(window).scrollTop();
    if(scroll <100){
        $(".to-top").css("display","none")
    }else{
        $(".to-top").css("display","flex")
    }
    if(scroll > 500){
        $(".single-form").addClass("sticky")
    }else{
        $(".single-form").removeClass("sticky")
    }
    if(scroll > 100){
        $("header").addClass("fixed")
    }else{
        $("header").removeClass("fixed")
    }
})
$('.to-top').on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop:0}, '300');
});
$(".close-icon").click(function(){
    $(".navbar").removeClass("active")
})
$(".mobile-nav").click(function(){
    $(".navbar").addClass("active")
})
$('.contact-number').mask('+000 00 000 00 00');
$(".text-input").keypress(function (e) {
    var s = new RegExp("^[a-zA-Z_ф-яФ-я_a-əA-ə_]+$"),
        a = String.fromCharCode(e.charCode ? e.charCode : e.which);
    return !!s.test(a) || (e.preventDefault(), !1);
})
AOS.init();
$("select").niceSelect()