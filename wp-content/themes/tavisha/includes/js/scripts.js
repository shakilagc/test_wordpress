(function($){

"use strict";
window.tavishaObject = {
  overflowBG: null
};

/* Overflowing background section for main content
------------------------------------------------------------------- */
var overflowBG = function() {
  var $mainSection = $('.main-section'),
      $mainContent = $('.main-content'),
      mainContentWidth = $mainContent.width(),
      left = (($(window).width() - $mainSection.children('.row').width()) / 2),
      width = left + mainContentWidth,
      height = $mainSection.height();
  
  // Content right
  if( $('body').hasClass('two-col-right') ) {
    $('.content-overflow').css({
      width: width,
      right: left * -1,
      left: 'auto',
      height: height
    });

  // Content left
  } else {
    $('.content-overflow').css({
      width: width,
      left: left * -1,
      right: 'auto',
      height: height
    });
  }
}

$(window)
  .load(function(){
    overflowBG();
  })
  .resize( $.debounce( 250, overflowBG ) );

window.tavishaObject.overflowBG = overflowBG;


/* Slider Components
------------------------------------------------------------------- */
var SliderComponent = {
  el: {},

  /**
   * Setup Elements
   */
  setupElements: function() {
    this.el.$bigSlider = $('.big-slider');
    this.el.$thumbSlider = $('.slide-thumbnails');
  },

  /**
   * Setup Sliders
   */
  setupSlider: function() {
    var self = this;

    this.el.$bigSlider.owlCarousel({
      singleItem: true,
      navigation: false,
      pagination: false,
      mouseDrag: false,
      touchDrag: false,
      afterInit: function() {
        self.el.$bigSlider = $('.big-slider');
      },
      afterAction: function( el ) {
        var current = this.currentItem;
        
        self.el.$thumbSlider
          .find(".owl-item")
          .removeClass("synced")
          .eq(current)
          .addClass("synced");

        if( self.el.$thumbSlider.data("owlCarousel") !== undefined ){
          self.center.call( self, current );
        }
      }
    });

    this.el.$thumbSlider.owlCarousel({
      navigation: true,
      items: 4,
      paginationSpeed: 250,
      rewindSpeed: 250,
      rewindNav: false,
      navigationText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
      afterInit: function( el ) {
        self.el.$thumbSlider = $('.slide-thumbnails');
        el.find(".owl-item").eq(0).addClass("synced");
      }
    });
  },

  /**
   * Event Binding
   */
  eventBinding: function() {
    this.el.$thumbSlider.on( 'click', '.owl-item', $.proxy( this.syncSlider, this ) );
  },

  /**
   * Sync Slider
   */
  syncSlider: function( e ) {
    e.preventDefault();

    var number = $(e.currentTarget).data( 'owlItem' );
    this.el.$bigSlider.trigger( 'owl.goTo', number );
  },

  /**
   * Center Thumbnail Slider
   */
  center: function( number ) {
    var sync2visible = this.el.$thumbSlider.data("owlCarousel").owl.visibleItems,
        num = number,
        found = false;

    for(var i in sync2visible){
      if(num === sync2visible[i]){
        var found = true;
      }
    }
     
    if(found === false){
      if( num>sync2visible[sync2visible.length-1] ){
        this.el.$thumbSlider.trigger("owl.goTo", num - sync2visible.length+2)
      } else {
        if(num - 1 === -1){
          num = 0;
        }
        this.el.$thumbSlider.trigger("owl.goTo", num);
      }
    } else if(num === sync2visible[sync2visible.length-1]){
      this.el.$thumbSlider.trigger("owl.goTo", sync2visible[1])
    } else if(num === sync2visible[0]){
      this.el.$thumbSlider.trigger("owl.goTo", num-1)
    }
  },

  /**
   * Initialization
   */
  init: function() {
    this.setupElements();
    this.setupSlider();
    this.eventBinding();
  }
};



/* ===================================================================
  DOCUMENT READY
=================================================================== */
$(document).ready(function(){

  // Responsive video embeding
  $('.entry-content').fitVids();

  // Initate Slider
  SliderComponent.init();

  /**
   * Menu Navigation 
   */
  var $mobileMenu = $('#mobile-menu-target').mmenu({
    isMenu: true,
    panelNodeType: "nav, div, ul, ol",
    slidingSubmenus: false,
    extensions: ["multiline"],
    offCanvas: {
      position: 'left',
      zposition: 'front'
    }
  }, {
    panelClass: 'menu-panel',
    listClass: 'mobile-menu'
  });

  var mmenuAPI = $mobileMenu.data('mmenu');
  $mobileMenu.on('click', '.hide-menu', function(e){
    e.preventDefault();
    mmenuAPI.close();
  });


  /**
   * Search Button on Mobile
   */
  var $searchWrapper = $('.search-wrapper');
  $('.search-button').on('click', function(){
    $searchWrapper.toggle(0, function(){
      if( $searchWrapper.is(':visible') ) {
        $searchWrapper.find('input')[0].focus();
      }
    });
  });

});

})(jQuery);