$(".cp-header__nav--icon, .cp-nav__close--icon").click(function(e){
    e.preventDefault();
    $('body').toggleClass('nav-open');
    $('.cp-nav').toggleClass('active');
    $('.cp-header').toggleClass('nav-open');
});

$('.menu-item-has-children--toggle').on('click', function() {
    parent = $(this).parent('li');
    $(parent).toggleClass('active')
})