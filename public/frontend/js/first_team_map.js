var mapStyle = [
    {
        "featureType": "administrative",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#444444"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [
            {
                "color": "#f2f2f2"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "all",
        "stylers": [
            {
                "saturation": -100
            },
            {
                "lightness": 45
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "color": "#26ae61"
            },
            {
                "visibility": "on"
            }
        ]
    }
];




var markerIcon = {
    path: 'M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z',
    fillColor: '#26ae61',
    fillOpacity: 0.95,
    scale: 2,
    strokeColor: '#fff',
    strokeWeight: 3,
    anchor: new google.maps.Point(12, 24)
};


var map;
var viewportMarkers = [];
var infoWindow;
var markerCount = 0;
var properties = [];



var centerPoint = [];
var livewirePropertyIds = [];
var mapzoom = 0;
var current_center_point = [];
var current_zoom = 7;
var current_bound_lat0 = 0;  //NorthEast latitude
var current_bound_lng0 = 0;  //NorthEast longitude
var current_bound_lat1 = 0;  //SouthWest latitude
var current_bound_lng1 = 0;  //SouthWest longitude

function LivewireFuctionForDragChange(params) { }
function LivewireFuctionForZoomChange(params) { }

function firstTeamInitMap($centerPoint, $zoom) {
    current_zoom = $zoom;

    console.log('init center of map:', centerPoint[0], centerPoint[1]);

    var lat = $centerPoint[0];
    var lng = $centerPoint[1];
    var iniZoom = $zoom;
    var myLatLng = new google.maps.LatLng(lat, lng);


    var setInitMapTypeId=google.maps.MapTypeId.ROADMAP;
    if (current_zoom > 15) {

        setInitMapTypeId=google.maps.MapTypeId.HYBRID;
    } else {
        setInitMapTypeId=google.maps.MapTypeId.ROADMAP;
    }

    var options = {
        zoom: iniZoom,
        center: myLatLng,
        // styles: mapStyle,
        mapTypeId:setInitMapTypeId
    }
    map = new google.maps.Map($('.map-canvas')[0], options);
    mapzoom = 10;
    // Add event listeners for when the map has changed: drag, zoom in/out or page refreshed.
    google.maps.event.addListener(map, 'zoom_changed', function () { onMapZoomedShowMarkerInViewport() });
    google.maps.event.addListener(map, 'dragend', function () { onMapDragendShowMarkerInViewport() });
    google.maps.event.addListener(map, 'idle', function () { onMapIdleShowMarkerInViewport() });

}



function onMapIdleShowMarkerInViewport() {
    showMarkersInViewport();
}

function onMapZoomedShowMarkerInViewport() {
    showMarkersInViewport();
    current_zoom = map.getZoom();


    if (current_zoom > 15) {
        if (map.getMapTypeId() != google.maps.MapTypeId.HYBRID) {
            map.setMapTypeId(google.maps.MapTypeId.HYBRID)
            map.setTilt(0); // disable 45 degree imagery
        }
    } else {
        if (map.getMapTypeId() != google.maps.MapTypeId.ROADMAP) {
            map.setMapTypeId(google.maps.MapTypeId.ROADMAP)
            map.setTilt(0); // disable 45 degree imagery
    }
    }

    if (mapzoom < current_zoom) {
        console.log('mapzoom-me-in', current_zoom);
        if (current_zoom >= 13 && current_zoom % 3 == 2) {
            LivewireFuctionForZoomChange(current_bound_lat0, current_bound_lng0, current_bound_lat1, current_bound_lng1, current_zoom, current_center_point);
        }else{
            LivewireFuctionForDragChange(livewirePropertyIds);
        }
    }

    if (mapzoom > current_zoom) {
        console.log('mapzoom-me-out', current_zoom);
        if (current_zoom < 16 && current_zoom % 3 == 2) {
            LivewireFuctionForZoomChange(current_bound_lat0, current_bound_lng0, current_bound_lat1, current_bound_lng1, current_zoom, current_center_point);
        }else{
            LivewireFuctionForDragChange(livewirePropertyIds);
        }
    }
    mapzoom = current_zoom;


}
function onMapDragendShowMarkerInViewport() {
    showMarkersInViewport();
    console.log('on map drag filter ',livewirePropertyIds);
    LivewireFuctionForDragChange(livewirePropertyIds);

}

// Create a function to add markers to the map.
function showMarkersInViewport() {

    if (viewportMarkers != null) {
        for (i = 0; i < viewportMarkers.length; i++) {
            viewportMarkers[i].setMap(null);
        }
        viewportMarkers = [];
        livewirePropertyIds = [];

    }






    current_center_point = [map.getCenter().lat(), map.getCenter().lng()]
    current_bound_lat0 = map.getBounds().getNorthEast().lat();
    current_bound_lng0 = map.getBounds().getNorthEast().lng();
    current_bound_lat1 = map.getBounds().getSouthWest().lat();
    current_bound_lng1 = map.getBounds().getSouthWest().lng();



    // call the getProperties() function to retrieve the locations (property) in the current viewport.
    var propertiesInViewport = getProperties(map.getBounds());
    if (propertiesInViewport == null) return;
    if (current_zoom < 6) return;
    // Next, iterate through the elements in the property array for each airport in the viewport:
    //   1. Create a marker and place it on the map
    //   2. Add an event listener to the click event of the marker to display an InfoWindow with data about the selected airport
    //   3. Add a new row to the table beside the map that summarizes the property on the map
    for (i = 0; i < propertiesInViewport.length; i++) {
        // create a new marker
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(propertiesInViewport[i].Location.Latitude, propertiesInViewport[i].Location.Longitude),
            icon: 'https://mysql-first-team.ml/frontend/images/google-marker/google-marker-red.png',
            title: 'Property: ' + propertiesInViewport[i].Address,
            property_ids: propertiesInViewport[i].id,
        });
        // "marker.objInfo sets its objInfo property to the airport's description. This object will populate the InfoWindow with the property's data
        marker.objInfo =

            '<div id="content">' +
            '<div class="infoWindow" style="width:200px; height:200px;">' +
            '<a target="_blank" href="' + propertiesInViewport[i].uri + '" class="full-width-anchor"><div class="photo"><img id="photos_main" class="img-responsive" style="width:100%;height:100%;" src="' + propertiesInViewport[i].P_image + '">' +
            '<span class="card-info offers">' + propertiesInViewport[i].Status + '</span></div>' +
            '<div class="info"><div class="price"><span class="value">$' + propertiesInViewport[i].PropertyFeatures.Price + '</span></div>' +
            '<div class="i-feature"><span class="bed"><img src="https://realestate.firstteam.com/wp-content/plugins/ft-idx-sync/assets/images/bed.svg" width="20" alt="" class="bedrooms-picture"><span class="value">&nbsp;' + propertiesInViewport[i].PropertyFeatures.Bed + '</span></span>&nbsp;&nbsp;' +
            '<span class="bath"><img src="https://realestate.firstteam.com/wp-content/plugins/ft-idx-sync/assets/images/bathroom.svg" width="20" alt="" class="bedrooms-picture"><span class="value">&nbsp;' + propertiesInViewport[i].PropertyFeatures.Bath + '</span></span>&nbsp;&nbsp;' +
            '<span class="sqrfit"><img src="https://realestate.firstteam.com/wp-content/plugins/ft-idx-sync/assets/images/house-design.svg" width="20" alt="" class="sqrfit-picture">&nbsp;&nbsp;<span class="value">&nbsp;' + propertiesInViewport[i].PropertyFeatures.Sqf + '</span>&nbsp;</span>&nbsp;&nbsp;' +
            '<span class="sqrfit"><i class="fas fa-building"></i><span class="value">&nbsp;' + propertiesInViewport[i].PropertyFeatures.Type + '</span></span></div>' +
            '<div class="addr">' + propertiesInViewport[i].Address + '</div></div></a></div>' +
            '</div>';


        // add the click event's listener for each marker to open the info-Window
        (function (index, selectedMarker) {

            google.maps.event.addListener(selectedMarker, 'mouseover', function () {
                if (infoWindow != null) infoWindow.setMap(null);
                infoWindow = new google.maps.InfoWindow();
                infoWindow.setContent(selectedMarker.objInfo);
                infoWindow.open(map, selectedMarker);
                selectedMarker.setIcon('https://mysql-first-team.ml/frontend/images/google-marker/google-marker-green.png');
            });

            google.maps.event.addListener(selectedMarker, 'mouseout', function () {
                infoWindow.close();
                selectedMarker.setIcon('https://mysql-first-team.ml/frontend/images/google-marker/google-marker-red.png');
            });
        })(i, marker)



        // place the marker on the map
        marker.setMap(map);
        // add the marker to the viewportMarkers array
        viewportMarkers.push(marker);
        livewirePropertyIds.push(marker.property_ids);


        markerCount++;
    }

    // new MarkerClusterer(map, viewportMarkers, {
    //     imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m',
    //     gridSize: 10,
    //     minimumClusterSize: 2
    //   });
}



// The following function returns all properties in the current viewport in the selected array
// The "a" argument is a LatLngBounds object with the viewport's bounds. It doesn't have to be "a", you can
// call it anything. Example "abc", "xyz", etc. you just can't use numbers like "1" or "123".
function getProperties(a) {
    if (a == null || a == undefined) return null;
    var selected = [];
    for (i = 0; i < properties.length; i++) {
        if (a.contains(new google.maps.LatLng(properties[i].Location.Latitude, properties[i].Location.Longitude))) {
            selected.push(properties[i]);
        }
    }
    return selected;
}

//  The highlightMarker() function opens the InfoWindow object that corresponds
//  to the marker in the viewportMarkers array

function highlightMarker(index) {
    if (infoWindow != null) infoWindow.setMap(null);
    infoWindow = new google.maps.InfoWindow();
    infoWindow.setContent(viewportMarkers[index].objInfo);
    infoWindow.open(map, viewportMarkers[index]);

    // Bounce the marker for two seconds when the corresonding link is clicked in the result box.
    viewportMarkers[index].setAnimation(google.maps.Animation.BOUNCE);
    setTimeout(function () {
        viewportMarkers[index].setAnimation(null);
    }, 100); // This sets the time for the bounce. You can make it longer or shorter.
}
// Pan the map to center the marker when the "CODE" link is clicked in the results box.
function zoomMarker(index) {
    map.panTo(viewportMarkers[index].getPosition())
}
