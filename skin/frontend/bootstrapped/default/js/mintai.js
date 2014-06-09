jQuery(function($) {
    $('#nav li ul').hide();
    $('#nav li').each(function() {
        $(this).mouseover(
            function() {
                $(this).find('ul').show();
            });
        $(this).mouseout(
            function() {
                $(this).find('ul').hide();
            });

    });
});
