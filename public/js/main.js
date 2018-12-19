// ANIMACIONES

new WOW().init();

// ANIMACIONES NAVEGACION

$(function(){

     $('.nav-link').click(function() {

     if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
         && location.hostname == this.hostname) {

             var $target = $(this.hash);

             $target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');

             if ($target.length) {

                 var targetOffset = $target.offset().top;

                 $('html,body').animate({scrollTop: targetOffset - 120}, 1000);

                 return false;

            }

       }

   });

});