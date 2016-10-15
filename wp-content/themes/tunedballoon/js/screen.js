/**
	 * Enables menu toggle for small screens.
	 */
 jQuery.noConflict()(function($){
				$(document).ready(function(){	
	( function() {
		var nav = $( '#mainnav' ), button, menu;
		if ( ! nav )
			return;

		button = nav.find( '.menu-toggle' );
		menu   = nav.find( '.nav-menu' );
		if ( ! button )
			return;

		// Hide button if menu is missing or empty.
		if ( ! menu || ! menu.children().length ) {
			button.hide();
			return;
		}

		$( '.menu-toggle' ).on( 'click', function() {
			nav.toggleClass( 'toggled-on' );
		} );
	} )();
	});
					});
					
					



			