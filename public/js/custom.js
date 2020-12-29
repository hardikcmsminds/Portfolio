
$( document ).ready(function() {
	/*$('li:has(.selected1)').addClass('redBorder');
    console.log( "ready!" );*/

    $('.greedy li.color_change a').on('click', function(){
	$('.greedy li').removeClass('redBorder');
	$('.greedy li:has(.selected1)').addClass('redBorder');
});


});



$(document).ready(function() {
  var scrollTop = $(".scrollTopp");
  $(window).scroll(function() {
    var topPos = $(this).scrollTop();
    if (topPos > 100) {
      $(scrollTop).css("opacity", "1");
    } else {
      $(scrollTop).css("opacity", "0");
    }
  }); 
  $(scrollTop).click(function() {
    $('html, body').animate({
      scrollTop: 0
    }, 800);
    return false;
  }); 
}); 