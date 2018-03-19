'use strict';

const $ = require('jquery-slim');

// require('gsap');
require('gsap/CSSPlugin');
const TweenLite = require('gsap/TweenLite');

// const mapboxgl = require('mapbox-gl');
// const MapboxDirections = require('mapbox-gl-directions');
// var L = require('leaflet');
// var leafletMap = require('leaflet-map');


$(function(){

    const requestAnimFrame = require('./requestAnimFrame.js');
    const throttle = require('./throttle.js');
    //const noTransition = require('./noTransition.js');

    const body = $('body');
    // window.outerWidth returns the window width including the scroll, but it's not working with $(window).outerWidth
    let windowWidth = window.outerWidth, windowHeight = $(window).height();


    function resizeHandler(){
        windowWidth = window.outerWidth;
        windowHeight = $(window).height();
    }

    function loadHandler(){

    }



    function calculateAndDisplayRoute( directionsService, directionsDisplay, waypoints ){
        directionsService.route({

            origin: waypoints[0].location,
            destination: 'Los Angeles, CA',
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
            ['<strong>Truc</strong><time>12/10 - 13/10</time>', new google.maps.LatLng(41.881832, -87.623177), 'step'],
            ['<strong>Truc 2</strong><time>12/10 - 13/10</time>', new google.maps.LatLng(37.084229, -94.513283), 'step', 'http://e-hamel.com'],
            ['<strong>Truc 3</strong><time>12/10 - 13/10</time>', new google.maps.LatLng(35, -94.513283), 'place']
        ];

        let map, waypoints = [], countSteps = 0, currentInfowindow = false;


        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            minZoom: 3,
            maxZoom: 15,
            center: {lat: 37.77, lng: -122.447},
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
                labelContent: elt[3] ? '<a href="' + elt[3] + '" class="marker link ' + elt[2] + '"></a>' : '<div class="marker ' + elt[2] + '"></div>',
                labelAnchor: elt[3] ? new google.maps.Point(12, 12) : new google.maps.Point(10, 10)
            });

            const infowindow = new google.maps.InfoWindow({
                content: '<div class="map-info">' + elt[0] + '</div>',
                pixelOffset: new google.maps.Size(0, 10)
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

        directionsDisplay.setMap(map);
        calculateAndDisplayRoute( directionsService, directionsDisplay, waypoints );
    }

    
    initMap();


    // Since script is loaded asynchronously, load event isn't always fired !!!
    document.readyState === 'complete' ? loadHandler() : $(window).on('load', loadHandler);

    $(window).on('resize', throttle(function(){
        requestAnimFrame(resizeHandler);
    }, 60));

    $(document).on('scroll', throttle(function(){

    }, 60));

});
