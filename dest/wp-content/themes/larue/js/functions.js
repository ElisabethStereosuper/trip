(function(a){a.isScrollToFixed=function(b){return !!a(b).data("ScrollToFixed")};a.ScrollToFixed=function(d,i){var m=this;m.$el=a(d);m.el=d;m.$el.data("ScrollToFixed",m);var c=false;var H=m.$el;var I;var F;var k;var e;var z;var E=0;var r=0;var j=-1;var f=-1;var u=null;var A;var g;function v(){H.trigger("preUnfixed.ScrollToFixed");l();H.trigger("unfixed.ScrollToFixed");f=-1;E=H.offset().top;r=H.offset().left;if(m.options.offsets){r+=(H.offset().left-H.position().left)}if(j==-1){j=r}I=H.css("position");c=true;if(m.options.bottom!=-1){H.trigger("preFixed.ScrollToFixed");x();H.trigger("fixed.ScrollToFixed")}}function o(){var J=m.options.limit;if(!J){return 0}if(typeof(J)==="function"){return J.apply(H)}return J}function q(){return I==="fixed"}function y(){return I==="absolute"}function h(){return !(q()||y())}function x(){if(!q()){var J=H[0].getBoundingClientRect();u.css({display:H.css("display"),width:J.width,height:J.height,"float":H.css("float")});cssOptions={"z-index":m.options.zIndex,position:"fixed",top:m.options.bottom==-1?t():"",bottom:m.options.bottom==-1?"":m.options.bottom,"margin-left":"0px"};if(!m.options.dontSetWidth){cssOptions.width=H.css("width")}H.css(cssOptions);H.addClass(m.options.baseClassName);if(m.options.className){H.addClass(m.options.className)}I="fixed"}}function b(){var K=o();var J=r;if(m.options.removeOffsets){J="";K=K-E}cssOptions={position:"absolute",top:K,left:J,"margin-left":"0px",bottom:""};if(!m.options.dontSetWidth){cssOptions.width=H.css("width")}H.css(cssOptions);I="absolute"}function l(){if(!h()){f=-1;u.css("display","none");H.css({"z-index":z,width:"",position:F,left:"",top:e,"margin-left":""});H.removeClass("scroll-to-fixed-fixed");if(m.options.className){H.removeClass(m.options.className)}I=null}}function w(J){if(J!=f){H.css("left",r-J);f=J}}function t(){var J=m.options.marginTop;if(!J){return 0}if(typeof(J)==="function"){return J.apply(H)}return J}function B(){if(!a.isScrollToFixed(H)||H.is(":hidden")){return}var M=c;var L=h();if(!c){v()}else{if(h()){E=H.offset().top;r=H.offset().left}}var J=a(window).scrollLeft();var N=a(window).scrollTop();var K=o();if(m.options.minWidth&&a(window).width()<m.options.minWidth){if(!h()||!M){p();H.trigger("preUnfixed.ScrollToFixed");l();H.trigger("unfixed.ScrollToFixed")}}else{if(m.options.maxWidth&&a(window).width()>m.options.maxWidth){if(!h()||!M){p();H.trigger("preUnfixed.ScrollToFixed");l();H.trigger("unfixed.ScrollToFixed")}}else{if(m.options.bottom==-1){if(K>0&&N>=K-t()){if(!L&&(!y()||!M)){p();H.trigger("preAbsolute.ScrollToFixed");b();H.trigger("unfixed.ScrollToFixed")}}else{if(N>=E-t()){if(!q()||!M){p();H.trigger("preFixed.ScrollToFixed");x();f=-1;H.trigger("fixed.ScrollToFixed")}w(J)}else{if(!h()||!M){p();H.trigger("preUnfixed.ScrollToFixed");l();H.trigger("unfixed.ScrollToFixed")}}}}else{if(K>0){if(N+a(window).height()-H.outerHeight(true)>=K-(t()||-n())){if(q()){p();H.trigger("preUnfixed.ScrollToFixed");if(F==="absolute"){b()}else{l()}H.trigger("unfixed.ScrollToFixed")}}else{if(!q()){p();H.trigger("preFixed.ScrollToFixed");x()}w(J);H.trigger("fixed.ScrollToFixed")}}else{w(J)}}}}}function n(){if(!m.options.bottom){return 0}return m.options.bottom}function p(){var J=H.css("position");if(J=="absolute"){H.trigger("postAbsolute.ScrollToFixed")}else{if(J=="fixed"){H.trigger("postFixed.ScrollToFixed")}else{H.trigger("postUnfixed.ScrollToFixed")}}}var D=function(J){if(H.is(":visible")){c=false;B()}};var G=function(J){(!!window.requestAnimationFrame)?requestAnimationFrame(B):B()};var C=function(){var K=document.body;if(document.createElement&&K&&K.appendChild&&K.removeChild){var M=document.createElement("div");if(!M.getBoundingClientRect){return null}M.innerHTML="x";M.style.cssText="position:fixed;top:100px;";K.appendChild(M);var N=K.style.height,O=K.scrollTop;K.style.height="3000px";K.scrollTop=500;var J=M.getBoundingClientRect().top;K.style.height=N;var L=(J===100);K.removeChild(M);K.scrollTop=O;return L}return null};var s=function(J){J=J||window.event;if(J.preventDefault){J.preventDefault()}J.returnValue=false};m.init=function(){m.options=a.extend({},a.ScrollToFixed.defaultOptions,i);z=H.css("z-index");m.$el.css("z-index",m.options.zIndex);u=a("<div />");I=H.css("position");F=H.css("position");k=H.css("float");e=H.css("top");if(h()){m.$el.after(u)}a(window).bind("resize.ScrollToFixed",D);a(window).bind("scroll.ScrollToFixed",G);if("ontouchmove" in window){a(window).bind("touchmove.ScrollToFixed",B)}if(m.options.preFixed){H.bind("preFixed.ScrollToFixed",m.options.preFixed)}if(m.options.postFixed){H.bind("postFixed.ScrollToFixed",m.options.postFixed)}if(m.options.preUnfixed){H.bind("preUnfixed.ScrollToFixed",m.options.preUnfixed)}if(m.options.postUnfixed){H.bind("postUnfixed.ScrollToFixed",m.options.postUnfixed)}if(m.options.preAbsolute){H.bind("preAbsolute.ScrollToFixed",m.options.preAbsolute)}if(m.options.postAbsolute){H.bind("postAbsolute.ScrollToFixed",m.options.postAbsolute)}if(m.options.fixed){H.bind("fixed.ScrollToFixed",m.options.fixed)}if(m.options.unfixed){H.bind("unfixed.ScrollToFixed",m.options.unfixed)}if(m.options.spacerClass){u.addClass(m.options.spacerClass)}H.bind("resize.ScrollToFixed",function(){u.height(H.height())});H.bind("scroll.ScrollToFixed",function(){H.trigger("preUnfixed.ScrollToFixed");l();H.trigger("unfixed.ScrollToFixed");B()});H.bind("detach.ScrollToFixed",function(J){s(J);H.trigger("preUnfixed.ScrollToFixed");l();H.trigger("unfixed.ScrollToFixed");a(window).unbind("resize.ScrollToFixed",D);a(window).unbind("scroll.ScrollToFixed",G);H.unbind(".ScrollToFixed");u.remove();m.$el.removeData("ScrollToFixed")});D()};m.init()};a.ScrollToFixed.defaultOptions={marginTop:0,limit:0,bottom:-1,zIndex:1000,baseClassName:"scroll-to-fixed-fixed"};a.fn.scrollToFixed=function(b){return this.each(function(){(new a.ScrollToFixed(this,b))})}})(jQuery);
!function(a){a.fn.theiaStickySidebar=function(b){function d(b,c){var d=e(b,c);d||(console.log("TSS: Body width smaller than options.minWidth. Init is delayed."),a(document).scroll(function(b,c){return function(d){var f=e(b,c);f&&a(this).unbind(d)}}(b,c)),a(window).resize(function(b,c){return function(d){var f=e(b,c);f&&a(this).unbind(d)}}(b,c)))}function e(b,c){return b.initialized===!0||!(a("body").width()<b.minWidth)&&(f(b,c),!0)}function f(b,c){b.initialized=!0,a("head").append(a('<style>.theiaStickySidebar:after {content: ""; display: table; clear: both;}</style>')),c.each(function(){function h(){c.fixedScrollTop=0,c.sidebar.css({"min-height":"1px"}),c.stickySidebar.css({position:"static",width:"",transform:"none"})}function i(b){var c=b.height();return b.children().each(function(){c=Math.max(c,a(this).height())}),c}var c={};if(c.sidebar=a(this),c.options=b||{},c.container=a(c.options.containerSelector),0==c.container.length&&(c.container=c.sidebar.parent()),c.sidebar.parents().css("-webkit-transform","none"),c.sidebar.css({position:"relative",overflow:"visible","-webkit-box-sizing":"border-box","-moz-box-sizing":"border-box","box-sizing":"border-box"}),c.stickySidebar=c.sidebar.find(".theiaStickySidebar"),0==c.stickySidebar.length){var d=/(?:text|application)\/(?:x-)?(?:javascript|ecmascript)/i;c.sidebar.find("script").filter(function(a,b){return 0===b.type.length||b.type.match(d)}).remove(),c.stickySidebar=a("<div>").addClass("theiaStickySidebar").append(c.sidebar.children()),c.sidebar.append(c.stickySidebar)}c.marginBottom=parseInt(c.sidebar.css("margin-bottom")),c.paddingTop=parseInt(c.sidebar.css("padding-top")),c.paddingBottom=parseInt(c.sidebar.css("padding-bottom"));var e=c.stickySidebar.offset().top,f=c.stickySidebar.outerHeight();c.stickySidebar.css("padding-top",1),c.stickySidebar.css("padding-bottom",1),e-=c.stickySidebar.offset().top,f=c.stickySidebar.outerHeight()-f-e,0==e?(c.stickySidebar.css("padding-top",0),c.stickySidebarPaddingTop=0):c.stickySidebarPaddingTop=1,0==f?(c.stickySidebar.css("padding-bottom",0),c.stickySidebarPaddingBottom=0):c.stickySidebarPaddingBottom=1,c.previousScrollTop=null,c.fixedScrollTop=0,h(),c.onScroll=function(c){if(c.stickySidebar.is(":visible")){if(a("body").width()<c.options.minWidth)return void h();if(c.options.disableOnResponsiveLayouts){var d=c.sidebar.outerWidth("none"==c.sidebar.css("float"));if(d+50>c.container.width())return void h()}var e=a(document).scrollTop(),f="static";if(e>=c.sidebar.offset().top+(c.paddingTop-c.options.additionalMarginTop)){var o,j=c.paddingTop+b.additionalMarginTop,k=c.paddingBottom+c.marginBottom+b.additionalMarginBottom,l=c.sidebar.offset().top,m=c.sidebar.offset().top+i(c.container),n=0+b.additionalMarginTop,p=c.stickySidebar.outerHeight()+j+k<a(window).height();o=p?n+c.stickySidebar.outerHeight():a(window).height()-c.marginBottom-c.paddingBottom-b.additionalMarginBottom;var q=l-e+c.paddingTop,r=m-e-c.paddingBottom-c.marginBottom,s=c.stickySidebar.offset().top-e,t=c.previousScrollTop-e;"fixed"==c.stickySidebar.css("position")&&"modern"==c.options.sidebarBehavior&&(s+=t),"stick-to-top"==c.options.sidebarBehavior&&(s=b.additionalMarginTop),"stick-to-bottom"==c.options.sidebarBehavior&&(s=o-c.stickySidebar.outerHeight()),s=t>0?Math.min(s,n):Math.max(s,o-c.stickySidebar.outerHeight()),s=Math.max(s,q),s=Math.min(s,r-c.stickySidebar.outerHeight());var u=c.container.height()==c.stickySidebar.outerHeight();f=(u||s!=n)&&(u||s!=o-c.stickySidebar.outerHeight())?e+s-c.sidebar.offset().top-c.paddingTop<=b.additionalMarginTop?"static":"absolute":"fixed"}if("fixed"==f){var v=a(document).scrollLeft();c.stickySidebar.css({position:"fixed",width:g(c.stickySidebar)+"px",transform:"translateY("+s+"px)",left:c.sidebar.offset().left+parseInt(c.sidebar.css("padding-left"))-v+"px",top:"0px"})}else if("absolute"==f){var w={};"absolute"!=c.stickySidebar.css("position")&&(w.position="absolute",w.transform="translateY("+(e+s-c.sidebar.offset().top-c.stickySidebarPaddingTop-c.stickySidebarPaddingBottom)+"px)",w.top="0px"),w.width=g(c.stickySidebar)+"px",w.left="",c.stickySidebar.css(w)}else"static"==f&&h();"static"!=f&&1==c.options.updateSidebarHeight&&c.sidebar.css({"min-height":c.stickySidebar.outerHeight()+c.stickySidebar.offset().top-c.sidebar.offset().top+c.paddingBottom}),c.previousScrollTop=e}},c.onScroll(c),a(document).scroll(function(a){return function(){a.onScroll(a)}}(c)),a(window).resize(function(a){return function(){a.stickySidebar.css({position:"static"}),a.onScroll(a)}}(c)),"undefined"!=typeof ResizeSensor&&new ResizeSensor(c.stickySidebar[0],function(a){return function(){a.onScroll(a)}}(c))})}function g(a){var b;try{b=a[0].getBoundingClientRect().width}catch(a){}return"undefined"==typeof b&&(b=a.width()),b}var c={containerSelector:"",additionalMarginTop:0,additionalMarginBottom:0,updateSidebarHeight:!0,minWidth:0,disableOnResponsiveLayouts:!0,sidebarBehavior:"modern"};b=a.extend(c,b),b.additionalMarginTop=parseInt(b.additionalMarginTop)||0,b.additionalMarginBottom=parseInt(b.additionalMarginBottom)||0,d(b,this)}}(jQuery);

(function($) {
    "use strict";
    $.fn.visible = function(partial) {

      var $t            = $(this),
          $w            = $(window),
          viewTop       = $w.scrollTop(),
          viewBottom    = viewTop + $w.height(),
          _top          = $t.offset().top + $t.height()/5,
          _bottom       = _top + $t.height(),
          compareTop    = partial === true ? _bottom : _top,
          compareBottom = partial === true ? _top : _bottom;
        return ((compareBottom <= viewBottom) && (compareTop >= viewTop));
    };
    function larue_isMobile(){
        var windowWidth = window.screen.width < window.outerWidth ? window.screen.width : window.outerWidth;
        if(('ontouchstart' in document.documentElement) || windowWidth < 783){
            return true;
        } else {
            return false;
        }
    }
    function larue_header_size(){
        if(larue_isMobile() || !jQuery('#header-main.fixed_header').length) {
            return false;
        }
        $('.fixed_header .navigation_wrapper').scrollToFixed({
            marginTop:$('#wpadminbar').height(),
            minWidth: 783,
            zIndex:9000
        });
    }
    function larue_home_parallax() {
        $(window).scroll(function () {
            var coords, yPos = ($(window).scrollTop() / 2);
            coords = yPos + 'px';
            $('.featured-post-img img').css({
                top: coords
            });

        });
    }
    function fixSidebar() {
        var marginTop = $('.navigation_wrapper').height() + $('#wpadminbar').height() + 50;
        $('#sidebar').theiaStickySidebar({
          // Settings
          additionalMarginTop: marginTop
        });
    }
    $( document ).ready( function() {

        fixSidebar();

        var win = $(window),
            allMods = $(".post-masonry");
        win.load(function(){
            var isoOptions = {
                    itemSelector: '.post-masonry',
                    layoutMode: 'masonry',
                    masonry: {
                        columnWidth: '.span6'
                    },
                    percentPosition:true,
                };
            var isoOptionsBlog = {
                    itemSelector: '.post',
                    layoutMode: 'masonry',
                    masonry: {
                        columnWidth: '.span6'
                    },
                    percentPosition:true,
                };
            var $grid = $('.masonry-page #content').isotope(isoOptions);
            var $gridBlog = $('.blog-posts').isotope(isoOptionsBlog);
            var $gridBlog2 = $('#latest-posts .blog-posts');
            var $listBlog = $('.list-posts');

            win.resize(function(){
                $('body').removeClass('overflow-hidden');
                $("#mobile-nav a.close-button").click();
                $grid.isotope('layout');
                $gridBlog.isotope('layout');
            });
            $gridBlog2.infinitescroll({
                navSelector  : '#pagination',    // selector for the paged navigation 
                nextSelector : '#pagination a.next',  // selector for the NEXT link (to page 2)
                itemSelector : '.post',     // selector for all items you'll retrieve
                loading: {
                    finishedMsg: 'No more items to load.',
                    msgText: '<i class="fa fa-spinner fa-spin fa-2x"></i>'
                  },
                animate      : false,
                errorCallback: function(){
                    $('a.loadmore').removeClass('active').hide();
                    $('a.loadmore').addClass('hide');
                },
                appendCallback: true
                },  // call Isotope as a callback
                function( newElements ) {
                    var newElems = $( newElements ); 
                    newElems.imagesLoaded(function(){
                        $gridBlog2.isotope( 'appended', newElems );
                        $gridBlog2.isotope('layout');
                        newElems.fadeIn(); // fade in when ready
                        $('a.loadmore').removeClass('active');
                    });
                }
            );
            $listBlog.infinitescroll({
                navSelector  : '#pagination',    // selector for the paged navigation 
                nextSelector : '#pagination a.next',  // selector for the NEXT link (to page 2)
                itemSelector : '.post',     // selector for all items you'll retrieve
                loading: {
                    finishedMsg: 'No more items to load.',
                    msgText: '<i class="fa fa-spinner fa-spin fa-2x"></i>'
                  },
                animate      : false,
                errorCallback: function(){
                    $('a.loadmore').removeClass('active').hide();
                    $('a.loadmore').addClass('hide');
                },
                appendCallback: true
                },  // call Isotope as a callback
                function( newElements ) {
                    var newElems = $( newElements ); 
                    newElems.imagesLoaded(function(){
                        $listBlog.isotope( 'appended', newElems );
                        $listBlog.isotope('layout');
                        newElems.fadeIn(); // fade in when ready
                        $('a.loadmore').removeClass('active');
                    });
                }
            );
            $(window).unbind('.infscr');
            $('a.loadmore').click(function () {
                $(this).addClass('active');
                $gridBlog2.infinitescroll('retrieve');
                $listBlog.infinitescroll('retrieve');
                return false;
            });
            setTimeout(function(){ $('.page-loading').fadeOut('fast', function (){});}, 100);
        });

        // Already visible modules
        
        allMods.each(function(i, el) {
            var el = $(el);
            if (el.visible(true)) {
                el.addClass("already-visible"); 
            } 
        });
        win.scroll(function(event) {
            allMods.each(function(i, el) {
                var el = $(el);
                if (el.visible(true)) {
                    el.addClass("come-in");
                }
            });
        });

        function hasValue(elem) {
            $(elem).keypress(function(){$(this).addClass('has-content');});

            if($(elem).filter(function() { return $(this).val(); }).length > 0) {
                $(elem).addClass('has-content');
                return true;
            } else {
                $(elem).removeClass('has-content');
                return false;
            }
        }
        $('.pie-wrapper').click(function () {
            $('html, body').animate({
                scrollTop: 0
            }, '800');
            return false;
        });
        larue_header_size();
        larue_home_parallax();
        var allVideos = $('iframe[src*="player.vimeo.com"], iframe[src*="youtube.com"]');
        allVideos.wrap('<div class="video-container"></div>');
        $('.widget_nav_menu .menu .menu-item').on("click", function(e){
            var submenu = $(this).children('.sub-menu');
            var parent_submenu = $(this).parent();
            submenu.toggleClass('sub-menu-show'); //then show the current submenu
            if(submenu.hasClass('sub-menu-show')){
                $('.widget_nav_menu .menu').css('height', submenu.height()+'px');
            } else {
                $('.widget_nav_menu .menu').css('height', parent_submenu.height()+'px');
            }
            if(!$('.sub-menu').hasClass('sub-menu-show')){
                $('.widget_nav_menu .menu').css('height', 'auto');
            } else {
            }
            e.stopPropagation();
            e.preventDefault();
        });
        $('.widget_nav_menu .menu .menu-item a').click(function(f){
            f.stopPropagation();
        });
        $('.menu-button-close').click(function(){
        	$("body").removeClass("overflow-hidden");
        	$("#header .menu-hidden-container").fadeOut('fast');
            $("#header .menu-hidden-container #hidden-nav").animate({left:'-290px'}, 300);
            return false;
        });
    	$(".search-link .search-area input, .menu-hidden-container #hidden-nav").click(function (e) {
            e.stopPropagation();
            //do redirect or any other action on the content
        });
        $("#header .search-link a.search-button").click(
            function () {
            $(this).addClass('active');
            $(this).next().stop().show();
            $("body").addClass("overflow-hidden");
            hasValue($('#header-s'));
            return false;
        });
        $('.search-button-close').click(
            function(){
                $("#header .search-link .search-area").fadeOut('fast');
                $("#header .search-link a").removeClass('active');
                $("body").removeClass("overflow-hidden");
                hasValue($('#header-s'));
                return false;
            }
        );
        $("#mobile-nav a.close-button").click(function(){
            $("#mobile-nav > div > div").stop().hide();
            $("body").removeClass("overflow-hidden");
            $("#mobile-nav a.close-button").stop().hide();
            return false;
        });
        $("#mobile-nav .search-link a.search-button, #mobile-nav .social-menu-button a.social-button, #mobile-nav .hidden-menu-button a.menu-button-open").click(
            function () {
               $("#mobile-nav > div > div").stop().hide();
                $("#mobile-nav a.close-button").stop().hide();
                $(this).next().next().stop().show();
                $(this).parent().find('.close-button').stop().show();
                if ($("body").height() > $(window).height()) {
                    $("body").addClass("overflow-hidden");
                }
                hasValue($('#header-s-mobile'));
                return false;
            }
        );
        $("#header .menu-button-open").click(function (f) {
            f.stopPropagation();
            $("#header .search-link a.active").click();
            hasValue($('#header-s'));
            $(this).next().stop().fadeIn();
            $(this).next().find('#hidden-nav').animate({left:'0px'}, 300);
            return false;
        });

        var $progressPie = $(this).find('#pieWrapper');
        var isProgressIndicatorOn = $('.show-progress-indicator').length;
        var scrollStopped;

        var fadeInCallback = function () {
            if (typeof scrollStopped != 'undefined') {
                clearInterval(scrollStopped);
            }
            scrollStopped = setTimeout(function () {
                $progressPie.removeClass('show');
            }, 1500);
        };
        $progressPie.hover(function(){
            clearInterval(scrollStopped);
        }, function(){
            scrollStopped = setTimeout(function () {
                $progressPie.removeClass('show');
            }, 1500);
        });
        var init = function () {

        var windowHeight = window.innerHeight;
        var pageLength;
        var distance;
        var pos = 0;
        var rotation = 0;

        if (isProgressIndicatorOn) {
          $(window).on('scroll', function () {
            
            fadeInCallback.call(this);
            $progressPie.addClass('show');

            // Pixel length of the post.
            pageLength = $(this).height();

            // Total distance need to travel to "read" the whole post
            distance = pageLength - windowHeight;
            pos = $(window).scrollTop();

            // Are we to the end of the post yet? No, ok...
            if ((pos / distance) <= 1) {
              // Degrees of rotation
              rotation = (pos / distance) * 360;
              // Less than halfway, rotate the left half into the right side
              if ((pos / distance) < 0.5) {
                $('#pieLeft').css('transform', 'rotate(' + rotation + 'deg)');
                $('#maskLeft').removeClass('hide');
                $('#pieRight').addClass('hide');
                $('#pieMask').addClass('hide');
              // More than halfway, show the whole left half on the right,
              // rotate the right half into the left side.
              } else {
                $('#pieLeft').css('transform', 'rotate(180deg)');
                $('#maskLeft').addClass('hide');
                $('#pieRight').removeClass('hide').css('transform', 'rotate(' + rotation + 'deg)');
                $('#pieMask').removeClass('hide');
              }
            // Post is completely scrolled thru, so show everything.
            } else {
              $('#pieLeft').css('transform', 'rotate(180deg)');
              $('#maskLeft').addClass('hide');
              $('#pieRight').removeClass('hide').css('transform', 'rotate(360deg)');
              $('#pieMask').removeClass('hide');
            }
          }.bind(this));
        }
       }.bind(this);

        init();
        

        $( 'a[data-rel^="lightbox-insta"]' ).lightbox();
        $( 'a[data-rel*="lightbox-gallery"]' ).lightbox();
        $( '[id*="gallery"] a[href$=jpg],[id*="gallery"] a[href$=JPG],[id*="gallery"] a[href$=jpeg],[id*="gallery"] a[href$=JPEG],[id*="gallery"] a[href$=png],[id*="gallery"] a[href$=gif]').lightbox();

        $('a[href$=jpg], a[href$=JPG], a[href$=jpeg], a[href$=JPEG], a[href$=png], a[href$=gif], a[href$=bmp]:has(img)').not('[data-rel*="lightbox"]').each(function(){
            if( !$(this).parent().parent().parent().hasClass('gallery') ){
                $(this).lightbox();
            }
        }); 
    });
})(jQuery);