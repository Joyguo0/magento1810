jQuery(function($) {
    $('#nav li ul').hide();
    $('#nav li').each(function() {
        $(this).mouseover(
            function() {
                $(this).find('ul').show();
                $('.nav-collapse').css('height','auto');
            });
        $(this).mouseout(
            function() {
                $(this).find('ul').hide();
            });

    });
	$('.navbg a').click(function(){
	   $('.nav-collapse').css('height','auto');
	});
});
