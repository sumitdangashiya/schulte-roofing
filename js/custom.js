jQuery( document ).ready( function() {
	jQuery( 'form#wpseo-storelocator-form' ).attr( 'action', '#wpseo-storelocator-form' );
	
	var widget_archive = jQuery( ".widget_archive select" ).val();
	if( widget_archive == '' ) {
		jQuery( ".widget_archive select option:first-child" ).text("Archive");
	}
	var sub_cat_dd_val = jQuery( '.widget_categories select option:selected' ).text();
	jQuery( '.widget_categories select option:selected' ).text( jQuery.trim( sub_cat_dd_val ) );
	
	setTimeout( function(){
		jQuery( 'select' ).select2({
			minimumResultsForSearch: Infinity
		});
		jQuery( '.sr-blog-sidebar select' ).select2({
			minimumResultsForSearch: Infinity,
			dropdownParent: jQuery('.sr-blog-sidebar')
		});
		jQuery( document ).on( 'select2:open', 'select', function() {
			jQuery( '.select2-results ul.select2-results__options' ).unbind( 'mousewheel' );
			jQuery( '.select2-results' ).mCustomScrollbar();
		});
	},10 );
	
	function srmobilemenu() {
		if( jQuery( window ).height() < 450 ) {
			jQuery( 'html' ).addClass( 'sr-landscape-view' );
		} else {
			jQuery( 'html' ).removeClass( 'sr-landscape-view' );
		}
		jQuery( 'ul.ubermenu-nav > li li.ubermenu-has-submenu-drop:not(.ubermenu-active)' ).show();
		jQuery( 'ul.ubermenu-nav > li > a' ).show();
		if( jQuery( '.ubermenu-responsive-toggle' ).hasClass( 'ubermenu-responsive-toggle-open' ) ){
			jQuery( 'html' ).addClass( 'sr-menu-open' );
		}
		setTimeout( function(){
			jQuery( '.ubermenu-responsive-toggle' ).on( 'ubermenutoggledopen' , function(e){
				jQuery( 'html' ).addClass( 'sr-menu-open' );
			});
			jQuery( '.ubermenu-responsive-toggle' ).on( 'ubermenutoggledclose' , function(e){
				jQuery( 'html' ).removeClass( 'sr-menu-open' );
			});
			
			jQuery( '.ubermenu-nav > li' ).on( 'ubermenuopen', function(){
				var mobile_height           = jQuery( window ).height();
				var mobile_menu_height      = jQuery( '.main-navigation .ubermenu .ubermenu-nav > li.ubermenu-active > a' ).outerHeight(true);
				var mobile_menu_logo_height = jQuery( '.sr-menu-open .header-logo' ).innerHeight();
				var total_mobile_height     = parseInt(mobile_height) - parseInt(mobile_menu_height) - parseInt(mobile_menu_logo_height);
				
				jQuery( 'ul.ubermenu-nav > li:not(.ubermenu-active)' ).hide();
				
				if( jQuery( 'ul.ubermenu-nav > li.ubermenu-active li' ).hasClass( 'ubermenu-active' ) ) {					
					jQuery( 'ul.ubermenu-nav > li.ubermenu-active > a' ).hide();
					jQuery( 'ul.ubermenu-nav > li.ubermenu-active .ubermenu-tabs-group > li.ubermenu-has-submenu-drop:not(.ubermenu-active)' ).hide();
					var parent_nav_mobile_height = jQuery( '.ubermenu-main.ubermenu-transition-slide .ubermenu-active > .ubermenu-submenu.ubermenu-submenu-type-mega' ).innerHeight();					
					var total_parent_nav_mobile_height = parseInt(mobile_height) - parseInt(mobile_menu_logo_height);
					jQuery( '.ubermenu-main.ubermenu-transition-slide .ubermenu-active > .ubermenu-submenu.ubermenu-submenu-type-mega' ).css({
						'height' : total_parent_nav_mobile_height,
						'padding-top' : '0'
					});					
					jQuery( 'ul.ubermenu-nav .ubermenu-submenu li.ubermenu-has-submenu-drop.ubermenu-active > ul' ).css( 'height' , total_mobile_height );
				} else {
					jQuery( '.ubermenu-main.ubermenu-transition-slide .ubermenu-active > .ubermenu-submenu.ubermenu-submenu-type-mega' ).css( 'height' , total_mobile_height );
				}
			});
			jQuery( '.ubermenu-nav > li' ).on( 'ubermenuclose', function(){
				var mobile_height           = jQuery( window ).height();
				var mobile_menu_height      = jQuery( '.main-navigation .ubermenu .ubermenu-nav > li.ubermenu-active > a' ).outerHeight(true);
				var mobile_menu_logo_height = jQuery( '.sr-menu-open .header-logo' ).innerHeight();
				var total_mobile_height     = parseInt(mobile_height) - parseInt(mobile_menu_height) - parseInt(mobile_menu_logo_height);
				
				jQuery( '.sr-menu-open .header-bottom' ).show();
				if ( jQuery( 'ul.ubermenu-nav > li.ubermenu-active > a' ).attr( 'aria-expanded' ) == 'true' ) {
					jQuery( 'ul.ubermenu-nav > li.ubermenu-active > a' ).show();
					jQuery( 'ul.ubermenu-nav > li.ubermenu-active li.ubermenu-has-submenu-drop:not(.ubermenu-active)' ).show();
					jQuery( 'ul.ubermenu-nav .ubermenu-submenu li.ubermenu-has-submenu-drop > ul' ).css( 'height' , '' );
					jQuery( '.ubermenu-main.ubermenu-transition-slide .ubermenu-active > .ubermenu-submenu.ubermenu-submenu-type-mega' ).css( 'height' , total_mobile_height );
				} else {
					jQuery( 'ul.ubermenu-nav > li:not(.ubermenu-active)' ).show();
					jQuery( '.ubermenu-main .ubermenu-submenu.ubermenu-submenu-type-mega' ).css({
						'height' : '',
						'padding-top' : ''
					});
				}
			});
		},10 );
	}

	// mobile menu add remove class	
	if ( jQuery( window ).width() < 768 ) {
		srmobilemenu();
	}
	
	jQuery( window ).resize( function() {
		if ( jQuery( window ).width() < 768 ) {
			jQuery( '.ubermenu' ).ubermenu( 'closeAllSubmenus' );
			jQuery( '.ubermenu-main .ubermenu-submenu.ubermenu-submenu-type-mega' ).css({
				'height' : '',
				'padding-top' : ''
			});
			jQuery( 'ul.ubermenu-nav .ubermenu-submenu li.ubermenu-has-submenu-drop > ul' ).css( 'height' , '' );
			srmobilemenu();
		} else {
			jQuery( 'html' ).removeClass( 'sr-landscape-view' );
			jQuery( '.ubermenu' ).ubermenu( 'closeAllSubmenus' );
			jQuery( 'ul.ubermenu-nav > li' ).show();
			jQuery( 'ul.ubermenu-nav > li > a' ).show();
			jQuery( 'html' ).removeClass( 'sr-menu-open' );
			jQuery( '.header-bottom' ).show();
			jQuery( '.ubermenu-nav > li' ).on( 'ubermenuopen', function(){
				jQuery( '.ubermenu-main .ubermenu-submenu.ubermenu-submenu-type-mega' ).css({
					'height' : '',
					'padding-top' : ''
				});
				jQuery( 'ul.ubermenu-nav > li:not(.ubermenu-active)' ).show();
				jQuery( 'ul.ubermenu-nav > li.ubermenu-active > a' ).show();
				jQuery( 'ul.ubermenu-nav > li.ubermenu-active li.ubermenu-has-submenu-drop:not(.ubermenu-active)' ).show();
			});
			jQuery( '.ubermenu-nav li' ).on( 'ubermenuclose', function(){
				jQuery( 'ul.ubermenu-nav > li' ).show();
				jQuery( '.ubermenu-main .ubermenu-submenu.ubermenu-submenu-type-mega' ).css({
					'height' : '',
					'padding-top' : ''
				});
				jQuery( '.header-bottom' ).show();
			});
		}
	});

	//search icon
	jQuery( '.header-search button' ).on( 'click', function() {
		jQuery( '.header-search-div' ).slideToggle( 'slow' );
		jQuery( '.sticky-wrapper' ).css( 'height' , 'auto' );
	});
	jQuery( '.sr-search-close' ).on('click', function() {
		jQuery( '.header-search-div' ).slideUp( 'slow' );
		jQuery( '.sticky-wrapper' ).css( 'height' , 'auto' );
	});

	//Quote form pop up
	jQuery( '.sr-header-contact-btn' ).on( 'click', '#quote_btn' , function() {
		jQuery( '#quoteform' ).show();
	});

	var quoteform_modal   = document.getElementById('quoteform');
	var quoteform_btn     = document.getElementById("quote_btn");
	var quoteform_close   = document.getElementById("sr_quote_close");
	var digitalform_close = document.getElementById("sr_digitalform_close");

	// When the user clicks on close btn (x), close the modal
	quoteform_close.onclick = function() {
  		quoteform_modal.style.display = "none";
	}
	digitalform_close.onclick = function() {
  		digitalform_modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if ( event.target == quoteform_modal ) {
			quoteform_modal.style.display = "none";
		} else if ( event.target == digitalform_modal ) {
			digitalform_modal.style.display = "none";
		}
	}

	//Digital Publication form popup up
	jQuery( '#digital-btn' ).on( 'click', function() {
		var sr_mc_fname = jQuery('.sr-mc-fname').val();
		var sr_mc_lname = jQuery('.sr-mc-lname').val();
		var sr_mc_email = jQuery('.sr-mc-email').val();
		if (sr_mc_fname != '') {
			jQuery('.sr-mc-fname').prev('.sr-placeholder').hide();
		}
		if (sr_mc_lname != '') {
			jQuery('.sr-mc-lname').prev('.sr-placeholder').hide();
		}
		if (sr_mc_email != '') {
			jQuery('.sr-mc-email').prev('.sr-placeholder').hide();
		}
		jQuery( '#digitalform' ).show();
	});
	var digitalform_modal = document.getElementById('digitalform');
	var digitalform_btn   = document.getElementById("digital-btn");


	jQuery('.placeholder').click(function() {
	  jQuery(this).siblings('p').children('input').focus();
	});
	jQuery('.form-group input').focus(function() {
	  jQuery(this).parent('p').siblings('.placeholder').hide();
	});
	jQuery('.form-group input').blur(function() {
	  var $this = jQuery(this);
	  if ($this.val().length == 0)
		jQuery(this).parent('p').siblings('.placeholder').show();
	});
	jQuery('.sr-placeholder').click(function() {
		jQuery(this).siblings('.comment-field-input').focus();
	});
	jQuery('.comment-field-input').focus(function() {
		jQuery(this).siblings('.sr-placeholder').hide();
	});
	jQuery('.comment-field-input').blur(function() {
		var $this = jQuery(this);
		if ($this.val().length == 0)
			jQuery(this).siblings('.sr-placeholder').show();
	});

	/*mailchimp checkbox*/
	jQuery('.phyaddresschk').click(function(){
		if(jQuery(this).prop("checked") == true){
			jQuery('.phyaddress').show("slow");
		}
		else if(jQuery(this).prop("checked") == false){
			jQuery('.phyaddress').hide("slow");
		}
	});
	jQuery('.sr-digital-submit').on('click', function(){
		var sr_fname = jQuery('.sr-mc-fname').val();
		var sr_lname = jQuery('.sr-mc-lname').val();
		var sr_email = jQuery('.sr-mc-email').val();
		if(sr_fname == '') {
			jQuery('.sr-mc-fname').siblings('.mce_inline_error').show();
			return false;
		} else if (sr_lname == '') {
			jQuery('.sr-mc-fname').siblings('.mce_inline_error').hide();
			jQuery('.sr-mc-lname').siblings('.mce_inline_error').show();
			return false;
		} else if (sr_email == '') {
			jQuery('.sr-mc-lname').siblings('.mce_inline_error').hide();
			jQuery('.sr-mc-email').siblings('.mce_inline_error').show();
			return false;
		}
		return true;
		jQuery('.mc4wp-form').submit();
	});

	//portfolio carousel
	jQuery( '.sr-portfolio' ).owlCarousel({
		items:2,
		dots:true,
		pagination: true,
		margin:24,
		responsiveClass:true,
		responsive:{
			0:{
				items:2,
				margin:10
			},
			560:{
				items:3
			},
			767:{
				items:2,
				margin:24,
			}
		}
	});
	//Client Logo carousel
	setTimeout(function(){
		jQuery( '#client-logo-slider' ).owlCarousel({
			items:6,
			loop:true,
			dots:false,
			pagination: false,
			margin:24,
			responsiveClass:true,
			responsive:{
				0:{
					items:1,
					autoplay:true,
					autoplayTimeout:3000
				},
				480:{
					items:2
				},
				768:{
					items:4
				},
				991:{
					items:6
				}
			}
		});
	}, 10);

	//kd filter js
	var currentRequest = null;
	jQuery( '#sr-kb-filter .kbcategory' ).click( function() {
		var choices = jQuery( '.kbcategory:checked' ).map( function() {return this.value;}).get().join(',');
		currentRequest = jQuery.ajax({
								url: srajax.ajaxurl,
								type :'POST',
								data : {
									'action' : 'filter_kb', // the php name function
									'choices' : choices,
								},
								beforeSend : function() {
									if( currentRequest != null ) {
										currentRequest.abort();
									}
								},
								success: function (result) {
									jQuery( '.kb-filter-output' ).html(result);
									jQuery( '.sr-kb-item-content' ).matchHeight();
									var choices_title = jQuery( '.kbcategory:checked' ).map(function() {
										return jQuery( this ).data( 'title' );
									}).get().join(',');
									if( choices_title == '' ) {
										jQuery( '.sr-kb-filter-title h2' ).text('All')
									} else {
										jQuery( '.sr-kb-filter-title h2' ).text(choices_title);
									}
								}
							});
	});

	//Smooth scroll
	jQuery( '.sr-commercial-target li a' ).on( 'click', function(e){
		var target = jQuery(this.hash);
		jQuery( '.sr-commercial-target li a.active' ).removeClass( 'active' );
		jQuery(this).addClass( 'active' );
		target = target.length ? target : jQuery( '[name=' + this.hash.slice(1) +']' );
		if ( target.length ) {
			jQuery( 'html, body' ).animate({
				scrollTop: target.offset().top - 237
			}, 1000);
			return false;
		}
	});
	jQuery(window).scroll(function(){
		var scrollPos = jQuery(document).scrollTop();
		jQuery( '.sr-commercial-target li a' ).each(function () {
			var currLink = jQuery( this );
			var refElement = jQuery(currLink.attr("href"));
			if ( refElement.length ) {
				if ( refElement.position().top - 100 <= scrollPos && refElement.position().top + refElement.height() > scrollPos ) {
					jQuery( '.sr-commercial-target li a' ).removeClass( 'active' );
					currLink.addClass( 'active' );
				}
				else{
					currLink.removeClass( 'active' );
				}
			}
		});
	});

	//sticky header
	if ( jQuery( window ).width() > 991 ) {
		var left = jQuery( '.main-navigation .ubermenu ul.ubermenu-nav > li:first-child' ).offset().left;
		setTimeout( function() {
		jQuery( 'body .ubermenu-has-submenu-mega ul.ubermenu-submenu.ubermenu-submenu-type-mega' ).css( 'padding-left', left );
		}, 10);
	} else {
		jQuery( 'body .ubermenu-has-submenu-mega ul.ubermenu-submenu.ubermenu-submenu-type-mega' ).css( 'padding-left', '' );
	}
	if ( jQuery( window ).width() > 767 ) {
		jQuery( '#masthead' ).sticky({ topSpacing: 0 , zIndex: 999999 });
		jQuery( '.sr-commercial-target-sec > .wpb_column' ).sticky({ topSpacing: jQuery( '#masthead' ).height() });
	} else {
		jQuery( '#masthead' ).unstick();
		jQuery( '.sr-commercial-target-sec .is-sticky > .wpb_column' ).unstick();
	}

	//filterable portfolio
	var containerEl = document.querySelector( '[data-ref~="sr-portfolio-items"]' );
	if ( containerEl ) {
		var mixer = mixitup(containerEl, {
			selectors: {
				target: '[data-ref~="mixitup-item"]'
			}
		});
	}
	jQuery( '.sr-portfolio-item-image .post-thumbnail' ).matchHeight();
	jQuery( '.sr-kb-item-content' ).matchHeight();
	jQuery( '.sr-portfolio-desc' ).matchHeight();
	jQuery( document ).on( 'click', '.portfolio-subcat-dropdown > .portfolio-cat', function() {
		if ( jQuery( window ).width() < 480 ) {
			jQuery( this ).next().toggle();
		}
	});

	/*get quote confirmation popup using mailchimp form*/	
	if( jQuery( '.mc4wp-form-submitted' ).length > 0 ) {
		if( jQuery( '.mc4wp-form-success' ).length > 0 ) {
			jQuery( '#digital-btn' ).trigger( 'click' );
			jQuery( '#digitalform .sr-quote-form' ).remove();
			jQuery( '#digitalform' ).append(
				'<div class="modal-content sr-quote-form">'+
				'<h2>Confirmation</h2>'+
				'<h5>Thank you.</h5>'+
				'<p>We have received your subscription to our quarterly publication. If you entered your physical address, you will receive a physical copy of our magazine at your address in addition to the digital version in your email.</p>'+
				'<ul class="sr-digital-btn-success">'+						
				'<li><a href="/blog/" class="sr-all-btn">Visit the Blog</a></li>'+
				'<li><a href="/expert-advice/" class="sr-all-btn">Get Expert Advice</a></li>'+
				'<li><a href="/portfolio/" class="sr-all-btn">View Our Work</a></li>'+
				'</ul>'+
				'</div>'
			);
		}
	}
	
	/*get quote confirmation popup using sp form*/
	if( jQuery( '#jp-message' ).length > 0 ) {			
		jQuery( '.sr-header-contact-btn #quote_btn' ).trigger( 'click' );
		jQuery( '#quoteform .sr-quote-form' ).remove();
		jQuery( '#quoteform' ).append(
			'<div class="modal-content sr-quote-form">'+
			'<h2>Confirmation</h2>'+
			'<h5>Thank you.</h5>'+
			'<p>We have received your quote request. We reviewing it and will have an assigned project manager reach out to you within 24 hours on business days. Should you need emergency roofing service, you can always reach out to us immediately at <a href="tel:+18003677663">1-800-FOR-ROOF</a>.</p>'+
			'<ul class="sr-digital-btn-success">'+						
			'<li><a href="/blog/" class="sr-all-btn">Visit the Blog</a></li>'+
			'<li><a href="/expert-advice/" class="sr-all-btn">Get Expert Advice</a></li>'+
			'<li><a href="/portfolio/" class="sr-all-btn">View Our Work</a></li>'+
			'</ul>'+
			'</div>'
		);
	}
});
jQuery( window ).resize( function() {
	if ( jQuery( window ).width() > 991 ) {
		var left = jQuery(".main-navigation .ubermenu ul.ubermenu-nav > li:first-child").offset().left;
		jQuery("body .ubermenu-has-submenu-mega ul.ubermenu-submenu.ubermenu-submenu-type-mega").css("padding-left", left);
	} else {
		jQuery("body .ubermenu-has-submenu-mega ul.ubermenu-submenu.ubermenu-submenu-type-mega").css("padding-left", '');
	}

	jQuery( '.sr-commercial-target-sec .wpb_column.vc_column_container' ).unstick();
	if ( jQuery( window ).width() > 767 ) {
		jQuery("#masthead").sticky({ topSpacing: 0 , zIndex: 999999 });
		jQuery(".sr-commercial-target-sec > .wpb_column").sticky({ topSpacing: jQuery("#masthead").height() });
		jQuery( '.sr-commercial-target-sec .wpb_column.vc_column_container' ).sticky( 'update' );
	} else {
		jQuery("#masthead").unstick();
		jQuery(".sr-commercial-target-sec .is-sticky > .wpb_column").unstick();
	}
	jQuery( 'select' ).select2({
		minimumResultsForSearch: Infinity
	});
	jQuery( '.sr-blog-sidebar select' ).select2({
		minimumResultsForSearch: Infinity,
		dropdownParent: jQuery('.sr-blog-sidebar')
	});
});

/* Tidio Chat custom script*/
var iframe = jQuery('#tidio-chat iframe').contents();
jQuery(window).load(function() {
	//live chat js
	jQuery('.tidio-live-chat').on( 'click', function(e){
		jQuery('#tidio-chat').show();
		tidioChatApi.open();
		hideTdo();
		iframe = jQuery('#tidio-chat iframe').contents();
		iframe_click(iframe);
		iframe.find(".frame-content").trigger('click');
	});
	function iframe_click( iframe ) {
		iframe.find(".frame-content").click(function(){
			iframe = jQuery('#tidio-chat iframe').contents();
			var ic_close  = iframe.find(".material-icons");
			iframe.find(".material-icons").click(function(){
				var close_class = jQuery(this).attr('class');
				var pos = close_class.indexOf('exit-chat');
				if ( pos !== -1 ) {
					jQuery('#tidio-chat').hide();
				}
			});
		});
	}
	function hideTdo() {
		var timer = null;
		var target = document.querySelectorAll('#tidio-chat iframe')[0];
		if(!target || typeof target === 'undefined') {
			if(timer !== null) {
				clearTimeout(timer);
			}
			timer = setTimeout(hideTdo, 500);
			return;
		} else {
			var timer2 = null;
			var tdo = document.querySelectorAll('#tidio-chat iframe')[0].contentWindow.document.querySelectorAll('div.footer-bottom > a.powered')[0];
			if(!tdo || typeof tdo === 'undefined') {
				if(timer2 !== null) {
					clearTimeout(timer2);
				}
				timer2 = setTimeout(hideTdo, 1);
				return;
			}
			document.querySelectorAll('#tidio-chat iframe')[0].contentWindow.document.querySelectorAll('div.footer-bottom > a.powered')[0].style.display = 'none';
			return true;
		}
	}
	setTimeout(function(){
		// Hide Live chat when admin offiline
		if ( jQuery('#tidio-chat').html() != '' ) {
			jQuery('.tidio-live-chat').show();
			iframe = jQuery('#tidio-chat iframe').contents();
			iframe_click(iframe);
		}
	}, 3000);
hideTdo();
});