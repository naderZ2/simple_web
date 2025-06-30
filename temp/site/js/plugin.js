$( document ).ready(function() {
  (function($) {

    $.fn.menumaker = function(options) {

        var cssmenu = $(this), settings = $.extend({
          //title: "",
          format: "dropdown",
          sticky: false
        }, options);

        return this.each(function() {
          cssmenu.prepend('<div id="menu-button">' + settings.title + '</div>');
          $(this).find("#menu-button").on('click', function(){
            $(this).toggleClass('menu-opened');
            var mainmenu = $(this).next('ul');
            if (mainmenu.hasClass('open')) {
              mainmenu.slideToggle().removeClass('open');
            }
            else {
              mainmenu.slideToggle().addClass('open');
              if (settings.format === "dropdown") {
                mainmenu.find('ul').slideToggle();
              }
            }
          });

          cssmenu.find('li ul').parent().addClass('has-sub');

          multiTg = function() {
            cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
            cssmenu.find('.submenu-button').on('click', function() {
              $(this).toggleClass('submenu-opened');
              if ($(this).siblings('ul').hasClass('open')) {
                $(this).siblings('ul').removeClass('open').slideToggle();
              }
              else {
                $(this).siblings('ul').addClass('open').slideToggle();
              }
            });
          };

          if (settings.format === 'multitoggle') multiTg();
          else cssmenu.addClass('dropdown');

          if (settings.sticky === true) cssmenu.css('position', 'fixed');

          resizeFix = function() {
            if ($( window ).width() > 991) {
              cssmenu.find('ul').show();
            }

            if ($(window).width() <= 991) {
              cssmenu.find('ul').hide().removeClass('open');
            }
          };
          resizeFix();
          return $(window).on('resize', resizeFix);

        });
    };
  })(jQuery);


  (function($){
  $(document).ready(function(){

  $("#cssmenu").menumaker({
     title: "",
     format: "multitoggle"
  });

  });
  })(jQuery);

$('#cssmenu > ul > li > a').click(function(){
$('#cssmenu > ul > li > a').removeClass("active");
$(this).addClass("active");
});



revapi = jQuery('.tp-banner').revolution(
{
delay:10000,
startwidth:1170,
startheight:600,
hideThumbs:10
});
$('.pagination li a').click(function(){
$('.pagination li a').removeClass("active");
$(this).addClass("active");
});
$(window).scroll(function() {
  if ($(this).scrollTop() > 10){
  $('.navmenu').addClass("sticky");
  }
  else{
  if ($(this).scrollTop() < 10){
  $('.navmenu').removeClass("sticky");
  }}
});

$(window).scroll(function(){
  if ($(this).scrollTop() > 600) {
  $('.scrollToTop').fadeIn();
  } else {
  $('.scrollToTop').fadeOut();
  }
});
//Click event to scroll to top
$('.scrollToTop').click(function(){
  $('html, body').animate({scrollTop : 0},800);
  return false;
});

jQuery(function(){
jQuery("a.bla-2").YouTubePopUp( { autoplay: 1 } ); // Disable autoplay
});



});
