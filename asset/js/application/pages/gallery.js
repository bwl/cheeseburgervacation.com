$(function() {
    $(".navGallery").addClass("active");
    
    $(".img-wrap:nth-child(3n+1)").addClass("last");
    $(".img-wrap a").fancybox();
});