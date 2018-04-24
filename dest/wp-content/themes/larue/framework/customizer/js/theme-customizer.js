(function( $ ) {
	var api = wp.customize;

	api( 'asw_menu_font_size', function( value ) {
	    value.bind( function( to ) {
	        $( '#navigation .menu li a' ).css('font-size', to);
	    });
	});
	api( 'asw_menu_font_family', function( value ) {
	    value.bind( function( to ) {
	    	var tmp = to.replace(/\s/g, '+');
	    	if( !$('link#google-font-5').length ){
	    		$('head').append('<link rel="stylesheet" id="google-font-5" href="#" type="text/css" media="all">');
	    	}
	    	if(to != 'Arial' && to != 'Verdana' && to != 'Trebuchet' && to != 'Georgia, sans-serif' && to != 'Times New Roman, sans-serif' && to != 'Tahoma' && to != 'Palatino' && to != 'Helvetica, sans-serif'){
	    		$('link#google-font-5').attr({href:"https://fonts.googleapis.com/css?family="+tmp+":100,100italic,200,200italic,300,300italic,400,400italic,600,600italic,700,700italic,800,800italic&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext,greek-ext,greek,vietnamese"})
	    	}
	    	$( '#navigation .menu li a' ).css('font-family', to);
	    });
	});
	api( 'asw_menu_font_weight', function( value ) {
	    value.bind( function( to ) {
	        $( '#navigation .menu li a' ).css('font-weight', to);
	    });
	});
	api( 'asw_widgets_headings_font_weight', function( value ) {
	    value.bind( function( to ) {
	        $( '.widget-title' ).css('font-weight', to);
	    });
	});
	api( 'asw_menu_item_color', function( value ) {
	    value.bind( function( to ) {
	        $( '#navigation .menu li a' ).css('color', to);
	    });
	});
	api( 'asw_header_border_color', function( value ) {
	    value.bind( function( to ) {
	        $( '#navigation, #header' ).css('border-color', to);
	    });
	});
	api( 'asw_menu_item_color_active', function( value ) {
	    value.bind( function( to ) {
	        $( '#navigation .menu li a' ).hover(function(){$(this).css('color', to)}, function(){$(this).css('color', '')});
	        $( '#navigation .menu li.current-menu-item > a, #navigation .menu li.current-menu-ancestor > a ').css('color', to);
	    });
	});
	api( 'asw_home_slider', function( value ) {
	    value.bind( function( to ) {
	        false === to ? $( '#main > .post-slider' ).hide() : $( '#main > .post-slider' ).show();
	    });
	});
	api( 'asw_header_grid', function( value ) {
	    value.bind( function( to ) {
	        if ( 'fullwidth' === to ) {
	            $( '#header .container, #header .fullwidth' ).addClass('fullwidth').removeClass('container');
	        } else {
	            $( '#header .container, #header .fullwidth' ).addClass('container').removeClass('fullwidth');
	        }
	    });
	});
    api( 'asw_progress_indicator', function( value ) {
	    value.bind( function( to ) {
	        false === to ? $( '#main' ).removeClass('show-progress-indicator') : $( '#main' ).addClass('show-progress-indicator');
	    } );
	} );
    api( 'asw_header_bg_color', function( value ) {
        value.bind( function( to ) {
            $( '#header' ).css( 'background-color', to );
        } );
    });
    api( 'asw_footer_bg_color', function( value ) {
        value.bind( function( to ) {
            $( '#footer' ).css( 'background-color', to );
        } );
    });
    api( 'asw_footer_copy_bg_color', function( value ) {
        value.bind( function( to ) {
            $( '#footer-copy-block' ).css( 'background-color', to );
        } );
    });
    api( 'asw_header_image', function( value ) {
	    value.bind( function( to ) {
	        $( '#header' ).css('background-image','url('+ to +')');
	    });
	    value.bind( function( to ) {
	        0 === $.trim( to ).length ?
	            $( '#header' ).css('background-image','url()') :
	            $( '#header' ).css('background-image','url('+ to +')');
	    });
	});
	api( 'asw_body_bg_image', function( value ) {
	    value.bind( function( to ) {
	        $( 'body' ).css('background-image','url('+ to +')');
	    });
	    value.bind( function( to ) {
	        0 === $.trim( to ).length ?
	            $( 'body' ).css('background-image','url()') :
	            $( 'body' ).css('background-image','url('+ to +')');
	    });
	});
	api( 'asw_header_bg_size', function( value ) {
	    value.bind( function( to ) {
	 		var bSize = 'auto';
	        switch( to.toString().toLowerCase() ) {
	
	            case 'cover':
	                bSize = 'cover';
	                break;
	 
	            case 'contain':
	                bSize = 'contain';
	                break;
	 
	            default:
	                bSize = 'auto';
	                break;
	 
	        }
	        $( '#header' ).css({
	            backgroundSize: bSize
	        });
	    });
	});
	api( 'asw_body_bg_size', function( value ) {
	    value.bind( function( to ) {
	 		var bSize = 'auto';
	        switch( to.toString().toLowerCase() ) {
	
	            case 'cover':
	                bSize = 'cover';
	                break;
	 
	            case 'contain':
	                bSize = 'contain';
	                break;
	 
	            default:
	                bSize = 'auto';
	                break;
	 
	        }
	        $( 'body' ).css({
	            backgroundSize: bSize
	        });
	    });
	});
	api( 'asw_body_bg_repeat', function( value ) {
	    value.bind( function( to ) { $( 'body' ).css({ backgroundRepeat: to }); });
	});
	api( 'asw_body_bg_color', function( value ) {
	    value.bind( function( to ) { $( 'body' ).css({ backgroundColor: to }); });
	});
	api( 'asw_nav_textalign', function( value ) {
	    value.bind( function( to ) {
	        $( '#navigation' ).removeClass('textcenter textright textleft').addClass(to);
	    });
	});
	api( 'asw_header_socials', function( value ) {
	    value.bind( function( to ) {
	        false === to ? $( '#topbar .social-icons' ).fadeOut('fast') : $( '#topbar .social-icons' ).fadeIn('fast');
	    });
	});
	api( 'asw_header_topbar', function( value ) {
	    value.bind( function( to ) {
	        false === to ? $( '#topbar' ).fadeOut('fast') : $( '#topbar' ).fadeIn('fast');
	    });
	});
	api( 'asw_header_search_button', function( value ) {
	    value.bind( function( to ) {
	        false === to ? $( '#header .search-link' ).fadeOut('fast') : $( '#header .search-link' ).fadeIn('fast');
	    });
	});
	api( 'asw_header_hidden_nav', function( value ) {
	    value.bind( function( to ) {
	        false === to ? $( '#header .hidden-menu-button' ).fadeOut('fast') : $( '#header .hidden-menu-button' ).fadeIn('fast');
	    });
	});
	api( 'asw_boxed_style', function( value ) {
	    value.bind( function( to ) {
	        false === to ? $( '#main' ).removeClass('boxed') : $( '#main' ).addClass('boxed');
	    });
	});
	api( 'asw_main_bg_color', function( value ) {
	    value.bind( function( to ) { $( '#main' ).css({ backgroundColor: to }); });
	});
	api( 'asw_media_logo', function( value ) {
	    value.bind( function( to ) {
	    	if( !$( '#header .logo img' ).length ) {
	    		$( '#header .logo' ).html('<img src="">');
	    	}
	        0 === $.trim( to ).length ?
	            $( '#header .logo img' ).attr( 'src', '' ).hide() :
	            $( '#header .logo img' ).attr( 'src', to ).show();
	    });
	});
	api( 'asw_media_logo_width', function( value ) {
	    value.bind( function( to ) {
	        $( '#header .logo img' ).css('max-width', to+'px');
	        $( '#header .logo img' ).css('height', 'auto');
	    });
	});
	api( 'asw_sidebar_pos', function( value ) {
	    value.bind( function( to ) {
	        switch(to){
	        	case 'sidebar-left':
	        		$('#content').removeClass('sidebar-right span12').addClass('sidebar-left span9');
	        		$('#sidebar').show();
	        	break;
	        	case 'none':
	        		$('#content').removeClass('sidebar-right sidebar-left span9').addClass('span12');
	        		$('#sidebar').hide();
	        	break;
	        	default:
	        		$('#content').removeClass('sidebar-left span12').addClass('sidebar-right span9');
	        		$('#sidebar').show();
	        	break;
	        }
	    });
	});
	api( 'asw_footer_copyright', function( value ) {
        value.bind( function( to ) {
        	if(!$('#footer-copy-block').length){
        		if($('#footer-nav-block').length){
	        		$('#footer-nav-block').before('<div class="span6"><div class="copyright-text"></div></div>'); 
	        	} else {
	        		$('#footer').after('<div id="footer-copy-block" role="contentinfo" class="aligncenter"><div class="container"><div class="span12"><div class="copyright-text"></div></div></div></div>');
	        	}
        	} 
            $( '.copyright-text' ).text( to );
        } );
    });
	
	api( 'asw_posts_headings_font_size', function( value ) {
	    value.bind( function( to ) {
	    	to = parseInt(to);
	        $( '.title h2' ).css('font-size', to+6+'px');
	        $( '.title h3' ).css('font-size', to+'px');
	        $( '.post.featured .title h2' ).css('font-size', (to+4)+'px');
	    });
	});
	api( 'asw_posts_headings_font_weight', function( value ) {
	    value.bind( function( to ) {
	        $( '.title h2, .title h3' ).css('font-weight', to);
	    });
	});
	api( 'asw_posts_headings_font_family', function( value ) {
	    value.bind( function( to ) {
	    	var tmp = to.replace(/\s/g, '+');
	    	if( !$('link#google-font-2').length ){
	    		$('head').append('<link rel="stylesheet" id="google-font-2" href="#" type="text/css" media="all">');
	    	}
	    	if(to != 'Arial' && to != 'Verdana' && to != 'Trebuchet' && to != 'Georgia, sans-serif' && to != 'Times New Roman, sans-serif' && to != 'Tahoma' && to != 'Palatino' && to != 'Helvetica, sans-serif'){
	    		$('link#google-font-2').attr({href:"https://fonts.googleapis.com/css?family="+tmp+":100,100italic,200,200italic,300,300italic,400,400italic,600,600italic,700,700italic,800,800italic&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext,greek-ext,greek,vietnamese"})
	    	}
	    	$( '.title h2, .title h3' ).css('font-family', to);
	    });
	});
	api( 'asw_posts_headings_item_color', function( value ) {
	    value.bind( function( to ) {
	        $( '.title h2, .title h2 a, .title h3 a' ).css('color', to);
	    });
	});
	api( 'asw_posts_headings_item_color_active', function( value ) {
	    value.bind( function( to ) {
	        $( '.title h2 a, .title h3 a, .related-item-title a' ).hover(function(){$(this).css('color', to)}, function(){$(this).css('color', '')});
	    });
	});
	api( 'asw_widgets_headings_font_size', function( value ) {
	    value.bind( function( to ) {
	        $( '.widget-title' ).css('font-size', to);
	    });
	});
	api( 'asw_widgets_headings_font_family', function( value ) {
	    value.bind( function( to ) {
	    	var tmp = to.replace(/\s/g, '+');
	    	if( !$('link#google-font-3').length ){
	    		$('head').append('<link rel="stylesheet" id="google-font-3" href="#" type="text/css" media="all">');
	    	}
	    	if(to != 'Arial' && to != 'Verdana' && to != 'Trebuchet' && to != 'Georgia, sans-serif' && to != 'Times New Roman, sans-serif' && to != 'Tahoma' && to != 'Palatino' && to != 'Helvetica, sans-serif'){
	    		$('link#google-font-3').attr({href:"https://fonts.googleapis.com/css?family="+tmp+":100,100italic,200,200italic,300,300italic,400,400italic,600,600italic,700,700italic,800,800italic&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext,greek-ext,greek,vietnamese"})
	    	}
	    	$( '.widget-title' ).css('font-family', to);
	    });
	});
	api( 'asw_widgets_headings_item_color', function( value ) {
	    value.bind( function( to ) {
	        $( '.widget-title' ).css('color', to);
	    });
	});
	api( 'asw_widgets_headings_separator', function( value ) {
	    value.bind( function( to ) {
	        false === to ? $( '.widget-title' ).removeClass('separator') : $( '.widget-title' ).addClass('separator');
	    } );
	} );
	api( 'asw_accent_color', function( value ) {
	    value.bind( function( to ) {
	        $( '.post-slider-item' ).hover(function(){$(this).find('.post-more').css('background-color', to);}, function(){$(this).find('.post-more').css('background-color', '');});
	    	$('.pie-top-button, .post .meta-categories, #hidden-nav .menu li.current-menu-item a').css('color', to);
	    	$('#hidden-nav .menu li a, .widget .latest-blog-list .meta-categories a, .author .comment-reply a').hover(function(){$(this).css('color', to)}, function(){$(this).css('color', '')});
	    	$('.pie').css('background-color', to);
	    	$('.single-post .post.featured .title .meta-date .meta-categories a').css('border-color', to);
	    	$('input[type="text"], input[type="password"], input[type="email"], input[type="url"], input[type="tel"], input[type="number"], textarea').focus(function(){$(this).css('border-color', to)});
	    	$('input[type="text"], input[type="password"], input[type="email"], input[type="url"], input[type="tel"], input[type="number"], textarea').focusout(function(){$(this).css('border-color', '')});
	    	$( '.instagram-item' ).hover(function(){$(this).find('img').css('border-color', to);}, function(){$(this).find('img').css('border-color', '');});
	    	if( !$('style#asw_accent_color').length ){
	    		$('<style id="asw_accent_color">#sidebar .widget.widget_socials .social-icons li a:before, input[type="submit"]:hover, input[type="submit"]:before, .button:before, button:before, #footer .social-icons li a:before{background-color:'+to+'}</style>').appendTo('head');
	    	} else {
	    		$('style#asw_accent_color').html('#sidebar .widget.widget_socials .social-icons li a:before, input[type="submit"]:hover, input[type="submit"]:before, .button:before, button:before, #footer .social-icons li a:before{background-color:'+to+'}');
	    	}
	    	
	    });
	});
	api( 'asw_body_font_size', function( value ) {
	    value.bind( function( to ) {
	        $( 'body' ).css('font-size', to);
	    });
	});
	api( 'asw_container_width', function( value ) {
	    value.bind( function( to ) {
	        if( !$('style#container_width').length ){
	    		$('<style id="container_width">.container{max-width:'+to+'px;}</style>').appendTo('head');
	    	} else {
	    		$('style#container_width').html('.container{max-width:'+to+'px;}');
	    	}
	    });
	});
	api( 'asw_body_font_family', function( value ) {
	    value.bind( function( to ) {
	    	var tmp = to.replace(/\s/g, '+');
	    	if( !$('link#google-font-4').length ){
	    		$('head').append('<link rel="stylesheet" id="google-font-4" href="#" type="text/css" media="all">');
	    	}
	    	if(to != 'Arial' && to != 'Verdana' && to != 'Trebuchet' && to != 'Georgia, sans-serif' && to != 'Times New Roman, sans-serif' && to != 'Tahoma' && to != 'Palatino' && to != 'Helvetica, sans-serif'){
	    		$('link#google-font-4').attr({href:"https://fonts.googleapis.com/css?family="+tmp+":100,100italic,200,200italic,300,300italic,400,400italic,600,600italic,700,700italic,800,800italic&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext,greek-ext,greek,vietnamese"})
	    	}
	    	$( 'body' ).css('font-family', to);
	    });
	});
	api( 'asw_body_color', function( value ) {
	    value.bind( function( to ) {
	        $( 'body' ).css('color', to);
	    });
	});
	api( 'asw_links_color', function( value ) {
	    value.bind( function( to ) {
	        $( 'a' ).css('color', to);
	    });
	});
	api( 'asw_links_color_hover', function( value ) {
	    value.bind( function( to ) {
	        $( 'a' ).hover(function(){$(this).css('color', to)}, function(){$(this).css('color', '')});
	    });
	});
 
})( jQuery );