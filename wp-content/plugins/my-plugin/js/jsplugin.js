jQuery(document).ready( function($) {

	$.ajax({
		url: "",
		success: function( data ) {
			//alert( 'Your home page has ' + $(data).find('div').length + ' div elements.');
			alert( 'Welcome to my site');
		}
	});

	//jQuery('#post')[0].encoding = 'multipart/form-data';
	
});

