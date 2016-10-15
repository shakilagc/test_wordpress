/**
 * Live-update changed settings in real time in the Customizer preview.
 */

( function( $ ) {
	var api = wp.customize;

	// Site title.
	api( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.logo a' ).text( to );
		} );
	} );

	// Site tagline.
	api( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.header-section .site-description' ).text( to );
		} );
	} );

  // Site Layout
  api( 'sidebar_layout_setting', function( value ) {
    value.bind( function( to ) {
      if( to == 'sidebar_left' ) {
        $('body').addClass('two-col-right');
        tavishaObject.overflowBG();
      } else {
        $('body').removeClass('two-col-right');
        tavishaObject.overflowBG();
      }
    } );
  } );
  
  var css_data = {

    header_background_color: {
      css: [
        {
          selector: '.header-section',
          property: 'background-color'
        }
      ]
    },
    
    header_text_color: {
      css: [
        {
          selector: '.header-section, .header-section a',
          property: 'color'
        },
        {
          selector: '.btn-nav span, .header-section .search-form:before',
          property: 'background-color'
        },
      ]
    },
    
    main_background_color: {
      css: [
        {
          selector: '.content-overflow',
          property: 'background-color'
        }
      ]
    },
    
    general_text_color: {
      css: [
        {
          selector: 'body, h1, h2, h3, h4, h5, h6',
          property: 'color'
        }
      ]
    },
    
    link_text_color: {
      css: [
        {
          selector: 'a, .slide-thumb-item a:hover .slide-title, .synced .slide-thumb-item .slide-title, .entry-post .entry-meta time, code, .post-item:hover .entry-comment-number',
          property: 'color'
        }
      ]
    },
    
    heading_text_color: {
      css: [
        {
          selector: '.category-title:before, .category-block .category-title a, .big-slider-title a, .widget-title, .entry-post .entry-title, .archive-title, .author-info .author-title, .comment-header h3, .commentlist .comment-author, .commentlist .comment-author a',
          property: 'color'
        }
      ]
    },
    
    sidebar_background_color: {
      css: [
        {
          selector: 'body',
          property: 'background-color'
        }
      ]
    },
    
    sidebar_text_color: {
      css: [
        {
          selector: '.widget',
          property: 'color'
        }
      ]
    },
    
    footer_background_color: {
      css: [
        {
          selector: '.footer-section',
          property: 'background-color'
        }
      ]
    },
    
    footer_text_color: {
      css: [
        {
          selector: '.footer-section',
          property: 'color'
        }
      ]
    },
    
    footer_link_color: {
      css: [
        {
          selector: '.footer-section a',
          property: 'color'
        }
      ]
    },

  };

  /* Loop each css Data, and to wp customizer
  ------------------------------------------------------------------- */
  $.each( css_data, function(index, data) {
    api( index, function( value ) {
      value.bind( function( to ) {
        $.each( data.css, function( data_index, data_list ) {
          $( data_list.selector ).css( data_list.property, to );
        });
      } );
    } );
  });

} )( jQuery );
