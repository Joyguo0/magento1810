jQuery(function($){
	$('#nav li ul').hide();
	$('#nav li').each(function(){
		$(this).toggle(
				  function(){
					  $(this).find('ul').show()},
					  function(){
						  $(this).find('ul').hide()}
					
					);
	});
});