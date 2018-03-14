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



    let map;

    function calculateAndDisplayRoute( directionsService, directionsDisplay ){
        directionsService.route({

            origin: {lat: 41.881832, lng: -87.623177},
            destination: 'Los Angeles, CA',
            travelMode: google.maps.TravelMode['WALKING'],
            waypoints: [
                {location: {lat: 37.084229, lng: -94.513283}}
            ]

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
                strokeWeight: 3
            },
            suppressMarkers: true
        });
        const directionsService = new google.maps.DirectionsService;
        let marker;

        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            minZoom: 3,
            maxZoom: 17,
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

        marker = new MarkerWithLabel({
            position: new google.maps.LatLng(41.881832, -87.623177),
            map: map,
            //title: loc[i][0],
            icon: '.',
            labelContent: '<div class="marker"></div>',
            labelAnchor: new google.maps.Point(10, 10)
        });
        marker.setMap( map );
        marker = new MarkerWithLabel({
            position: new google.maps.LatLng(37.084229, -94.513283),
            map: map,
            //title: loc[i][0],
            icon: '.',
            labelContent: '<div class="marker"></div>',
            labelAnchor: new google.maps.Point(10, 10)
        });
        marker.setMap( map );

        directionsDisplay.setMap(map);
        calculateAndDisplayRoute(directionsService, directionsDisplay);
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
