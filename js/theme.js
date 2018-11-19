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





// $('.dropdown-toggle').click(function() { if ($(window).width() > 768) if ($(this).next('.dropdown-menu').is(':visible')) window.location = $(this).attr('href'); });



mainNav = $( '.main-nav' );
footerWidget = $('.footer-widget');



	mobileNav = $( '.mobileNav' );

 	function initMobileNav( container ) {
 		mobileNav.find( 'ul > li > a' ).addClass( 'nav-link' );
 		mobileNav.find( '.menu-item-has-children' ).addClass( 'nav-item dropdown' );
 		mobileNav.find( '.menu-item-has-children > a' ).addClass( 'nav-link dropdown-toggle' );
 		mobileNav.find( '.menu-item-has-children > a' ).attr( 'data-toggle', 'dropdown' );
 		mobileNav.find( '.menu-item-has-children > a' ).attr( 'id', 'navbarDropdown' );
 		mobileNav.find( '.menu-item-has-children > a' ).attr( 'aria-haspopup', 'true' );
 		mobileNav.find( '.menu-item-has-children > a' ).attr( 'aria-expanded', 'false' );
 		mobileNav.find( '.menu-item-has-children > a' ).attr( 'role', 'button' );
 		mobileNav.find( '.menu-item-has-children > ul' ).removeClass( 'sub-menu' ).addClass('dropdown-menu');
 		mobileNav.find( '.menu-item-has-children > ul' ).attr( 'aria-labelledby', 'navbarDropdown' );
 		mobileNav.find( '.menu-item-has-children > ul' ).attr( 'data-display', 'static' );
 		mobileNav.find( '.menu-item-has-children > ul > li' ).addClass( 'dropdown-item' );
 	}
 	initMobileNav( $('.mobileNav') );



 	$( '.dropdown-toggle').on('click', function(e) {
 		if(!$(this).next().hasClass('show')) {
 			$(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
 		}

 		var $subMenu = $(this).next('.dropdown-menu');
 		$subMenu.toggleClass('show');

	  	$(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
    		$('.dropdown-submenu .show').removeClass("show");
  		});

  		return false;
 	});

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