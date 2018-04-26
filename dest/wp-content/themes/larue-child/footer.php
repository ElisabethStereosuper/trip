		<?php if( is_active_sidebar('before-footer-widgets') ) { ?>
		<div id="before-footer">
			<?php if ( !function_exists( 'dynamic_sidebar' ) || dynamic_sidebar('Before footer area') ); ?>
		</div>
		<?php }
		 if( is_active_sidebar('footer-widgets') ) { ?>
			<footer id="footer">
				<div class="container">
					<?php if ( !function_exists( 'dynamic_sidebar' ) || dynamic_sidebar('Footer Widgets') ); ?>
				</div>
			</footer>
		<?php } ?>
			<?php if( get_theme_mod('asw_footer_copyright', '') != '' ||  has_nav_menu('footer_navigation') ) { ?>
			<div id="footer-copy-block" role="contentinfo">
				<div class="container">
					<?php if( get_theme_mod('asw_footer_copyright', '') != '' ) { ?>
					<div class="span6">
						<div class="copyright-text"><?php echo esc_html(get_theme_mod('asw_footer_copyright', '')); ?></div>
					</div>
					<?php } else {
						echo '<div class="span6">&nbsp;</div>';
					} ?>
					<?php if( has_nav_menu('footer_navigation') ) { ?>
					<div id="footer-nav-block" role="contentinfo" class="span6 textright">
						<ul id="footer-nav" class="menu">
							<?php wp_nav_menu(array('theme_location' => 'footer_navigation', 'container'=>false, 'items_wrap'=>'%3$s', 'menu_id' => 'footer-nav', 'fallback_cb'=>false, 'depth'=> -1)); ?>
						</ul>
					</div><!-- end footer-nav-block -->
					<?php } ?>
				</div>
			</div><!-- end footer-nav-block -->
			<?php } ?>
			<div class="clear"></div>
		</div> <!-- end boxed -->
	
	<?php wp_footer(); ?>

	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/gmaps-markerslabels.js"></script>

	<script>
		function calculateAndDisplayRoute( directionsService, directionsDisplay, waypoints ){
	        directionsService.route({

	            origin: waypoints[0].location,
	            destination: 'Montréal',
	            travelMode: google.maps.TravelMode['WALKING'],
	            waypoints: waypoints

	        }, function( response, status ){

	            if( status ==='OK' ){
	                directionsDisplay.setDirections(response);
	            }/*else{
	                window.alert('Directions request failed due to ' + status);
	            }*/

	        });
	    }

	    function initMap(){
	        const directionsDisplay = new google.maps.DirectionsRenderer({
	            polylineOptions: {
	                strokeColor: "#c5b274",
	                strokeWeight: 2.5
	            },
	            preserveViewport: true,
	            suppressMarkers: true
	        });
	        const directionsService = new google.maps.DirectionsService;
	        const markers = [
	            ['<strong>Vancouver</strong><time>29/04</time><p>On est bien arrivés :)</p>', new google.maps.LatLng(49.282729, -123.120738), 'step', ''],
	            //['<strong>Truc 2</strong><time>12/10 - 13/10</time><p>Un petit texte</p><a href="#">Voir plus ›</a>', new google.maps.LatLng(37.084229, -94.513283), 'step', 'link'],
	            //['<strong>Truc 3</strong><time>12/10 - 13/10</time>', new google.maps.LatLng(35, -94.513283), 'place', '']
	        ];

	        let map, waypoints = [], countSteps = 0, currentInfowindow = false;


	        map = new google.maps.Map(document.getElementById('map'), {
	            zoom: 4,
	            minZoom: 3,
	            maxZoom: 15,
	            center: {lat: 55, lng: -97},
	            mapTypeControl: false,
	            streetViewControl: false,
	            styles: [
	                {
	                    "featureType": "all",
	                    "elementType": "labels.text.fill",
	                    "stylers": [
	                        {
	                            "saturation": 36
	                        },
	                        {
	                            "color": "#000000"
	                        },
	                        {
	                            "lightness": 40
	                        },
	                    ]
	                },
	                {
	                    "featureType": "all",
	                    "elementType": "labels.text.stroke",
	                    "stylers": [
	                        {
	                            "visibility": "on"
	                        },
	                        {
	                            "color": "#000000"
	                        },
	                        {
	                            "lightness": 16
	                        }
	                    ]
	                },
	                {
	                    "featureType": "all",
	                    "elementType": "labels.icon",
	                    "stylers": [
	                        {
	                            "visibility": "off"
	                        }
	                    ]
	                },
	                {
	                    "featureType": "administrative",
	                    "elementType": "geometry.fill",
	                    "stylers": [
	                        {
	                            "color": "#000000"
	                        },
	                        {
	                            "lightness": 20
	                        }
	                    ]
	                },
	                {
	                    "featureType": "administrative",
	                    "elementType": "geometry.stroke",
	                    "stylers": [
	                        {
	                            "color": "#000000"
	                        },
	                        {
	                            "lightness": 17
	                        },
	                        {
	                            "weight": 1.2
	                        }
	                    ]
	                },
	                {
	                    "featureType": "administrative.country",
	                    "elementType": "geometry.stroke",
	                    "stylers": [
	                        {
	                            "lightness": "-50"
	                        }
	                    ]
	                },
	                {
	                    "featureType": "administrative.country",
	                    "elementType": "labels.text.fill",
	                    "stylers": [
	                        {
	                            "color": "#5f5b4e"
	                        },
	                        {
	                            "weight": "1"
	                        }
	                    ]
	                },
	                {
	                    "featureType": "administrative.country",
	                    "elementType": "labels.text.stroke",
	                    "stylers": [
	                        {
	                            "visibility": "off"
	                        },
	                        {
	                            "weight": "1"
	                        }
	                    ]
	                },
	                {
	                    "featureType": "landscape",
	                    "elementType": "geometry",
	                    "stylers": [
	                        {
	                            "color": "#252425"
	                        },
	                        {
	                            "lightness": "0"
	                        }
	                    ]
	                },
	                {
	                    "featureType": "poi",
	                    "elementType": "geometry",
	                    "stylers": [
	                        {
	                            "color": "#000000"
	                        },
	                        {
	                            "lightness": 21
	                        }
	                    ]
	                },
	                {
	                    "featureType": "poi.park",
	                    "elementType": "geometry",
	                    "stylers": [
	                        {
	                            "lightness": "0"
	                        },
	                        {
	                            "color": "#282828"
	                        }
	                    ]
	                },
	                {
	                    "featureType": "poi.park",
	                    "elementType": "labels.text.fill",
	                    "stylers": [
	                        {
	                            "lightness": "-20"
	                        }
	                    ]
	                },
	                {
	                    "featureType": "poi.park",
	                    "elementType": "labels.text.stroke",
	                    "stylers": [
	                        {
	                            "visibility": "off"
	                        }
	                    ]
	                },
	                {
	                    "featureType": "road.highway",
	                    "elementType": "geometry.fill",
	                    "stylers": [
	                        {
	                            "color": "#000000"
	                        },
	                        {
	                            "lightness": "10"
	                        }
	                    ]
	                },
	                {
	                    "featureType": "road.highway",
	                    "elementType": "geometry.stroke",
	                    "stylers": [
	                        {
	                            "color": "#000000"
	                        },
	                        {
	                            "lightness": "10"
	                        },
	                        {
	                            "weight": 0.2
	                        }
	                    ]
	                },
	                {
	                    "featureType": "road.arterial",
	                    "elementType": "geometry",
	                    "stylers": [
	                        {
	                            "color": "#000000"
	                        },
	                        {
	                            "lightness": "10"
	                        }
	                    ]
	                },
	                {
	                    "featureType": "road.local",
	                    "elementType": "geometry",
	                    "stylers": [
	                        {
	                            "color": "#000000"
	                        },
	                        {
	                            "lightness": "10"
	                        }
	                    ]
	                },
	                {
	                    "featureType": "transit",
	                    "elementType": "geometry",
	                    "stylers": [
	                        {
	                            "color": "#000000"
	                        },
	                        {
	                            "lightness": 19
	                        }
	                    ]
	                },
	                {
	                    "featureType": "water",
	                    "elementType": "geometry",
	                    "stylers": [
	                        {
	                            "color": "#0c2b36"
	                        },
	                        {
	                            "lightness": "0"
	                        }
	                    ]
	                }
	            ]
	        });

	        markers.forEach(function( elt ){
	            const marker = new MarkerWithLabel({
	                position: elt[1],
	                map: map,
	                icon: ' ',
	                labelContent: '<div class="marker ' + elt[2] + ' ' + elt[3] + '"></div>',
	                labelAnchor: elt[3] ? new google.maps.Point(12, 20) : new google.maps.Point(8, 16)
	            });

	            const infowindow = new google.maps.InfoWindow({
	                content: '<div class="map-info">' + elt[0] + '</div>',
	                pixelOffset: new google.maps.Size(0, 20)
	            });

	            marker.addListener('click', function(){
	                if( currentInfowindow ) currentInfowindow.close();
	                
	                infowindow.open(map, marker);
	                currentInfowindow = infowindow;
	            });

	            if( elt[2] === 'step'){
	                waypoints[countSteps] = {location: elt[1]};
	                countSteps ++;
	            }
	        });

	        //directionsDisplay.setMap(map);
	        //calculateAndDisplayRoute( directionsService, directionsDisplay, waypoints );
	    }


	    if( document.getElementById('map') != undefined ) initMap();
	</script>

	</body>
</html>
