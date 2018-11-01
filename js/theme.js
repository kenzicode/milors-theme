/**
 * Theme function js.
 *
 */

 ( function( $ ) {


  $('.flexslider').flexslider({
    animation: "fade",
    animationSpeed: 800,
    touch: true,
    directionNav: false,
    
  });




mainNav = $( '.main-nav' );
footerWidget = $('.footer-widget');


 	(function() {

 		footerWidget.find('.es_form_container').addClass('subscribe-form');
 		footerWidget.find('.es_widget_form').addClass('form-inline align-items-center text-center form-row');
 		footerWidget.find('.es_textbox').removeClass( 'es_textbox' ).addClass('form-group subscribe-input-text');
 		footerWidget.find('.es_button').removeClass( 'es_button' ).addClass('form-group');
 		footerWidget.find('.es_textbox_class').addClass('form-control');
 		footerWidget.find('.es_textbox_class').attr('placeholder', 'Your Email Address');
 		footerWidget.find('.es_textbox_button').addClass('btn btn-primary');
 		footerWidget.find('.es_caption, .es_lablebox').remove();

 		mainNav.find( 'li' ).removeClass( 'menu-item menu-item-object-custom menu-item-type-custom menu-item-type-post_type menu-item-object-page menu-item-type-taxonomy menu-item-object-category').addClass( 'nav-item' );

 		mainNav.find( '.menu-item-has-children' )
 			.on( 'mouseenter', function(){ 
 				mainNav.find( '.sub-menu' ).removeClass( 'fadeOut' ).addClass( 'show' );
 			})
 			.on( 'mouseleave', function() {
 				mainNav.find( '.sub-menu' ).removeClass( 'show' ).addClass( 'fadeOut' );	
 			

 			
 		});
 	}
 	)();
 }) ( jQuery );