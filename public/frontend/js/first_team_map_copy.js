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


//Initiate google map API
function firstTeamInitMap($centerPoint, $zoom) {
    current_zoom = $zoom;
    infoWindow.close();
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
        mapTypeId:setInitMapTypeId,
        mapId: "4504f8b37365c3d0",
    }
    map = new google.maps.Map($('.map-canvas')[0], options);

    mapzoom = 10;

    // Add event listeners for when the map has changed: drag, zoom in/out or page refreshed.
    google.maps.event.addListener(map, 'zoom_changed', function () { onMapZoomedShowMarkerInViewport() });
    google.maps.event.addListener(map, 'dragend', function () { onMapDragendShowMarkerInViewport() });
    google.maps.event.addListener(map, 'idle', function () { onMapIdleShowMarkerInViewport() });

}

var infoWindow = new google.maps.InfoWindow();

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
        // for (i = 0; i < viewportMarkers.length; i++) {
        //     viewportMarkers[i].setMap(null);
        // }
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

        var marker = new google.maps.marker.AdvancedMarkerView({
            map,
            content: buildContent(propertiesInViewport[i], current_zoom),
            position: new google.maps.LatLng(propertiesInViewport[i].position.lat, propertiesInViewport[i].position.lng),
            title: propertiesInViewport[i].status,
          });


        // "marker.objInfo sets its objInfo property to the airport's description. This object will populate the InfoWindow with the property's data
        marker.url =propertiesInViewport[i].uri;
        marker.objInfo =

            '<div id="content">' +
            '<div class="infoWindow" style="width:200px; height:200px;">' +
            '<a target="_blank" href="' + propertiesInViewport[i].uri + '" class="full-width-anchor"><div class="photo"><img id="photos_main" class="img-responsive" style="width:100%;height:100%;" src="' + propertiesInViewport[i].image + '">' +
            '<span class="card-info offers">' + propertiesInViewport[i].status + '</span></div>' +
            '<div class="info"><div class="price"><span class="value">$' + propertiesInViewport[i].PropertyFeatures.price + '</span></div>' +
            '<div class="i-feature"><span class="bed"><img src="https://realestate.firstteam.com/wp-content/plugins/ft-idx-sync/assets/images/bed.svg" width="20" alt="" class="bedrooms-picture"><span class="value">&nbsp;' + propertiesInViewport[i].PropertyFeatures.bed + '</span></span>&nbsp;&nbsp;' +
            '<span class="bath"><img src="https://realestate.firstteam.com/wp-content/plugins/ft-idx-sync/assets/images/bathroom.svg" width="20" alt="" class="bedrooms-picture"><span class="value">&nbsp;' + propertiesInViewport[i].PropertyFeatures.bath + '</span></span>&nbsp;&nbsp;' +
            '<span class="sqrfit"><img src="https://realestate.firstteam.com/wp-content/plugins/ft-idx-sync/assets/images/house-design.svg" width="20" alt="" class="sqrfit-picture">&nbsp;&nbsp;<span class="value">&nbsp;' + propertiesInViewport[i].PropertyFeatures.sqf + '</span>&nbsp;</span>&nbsp;&nbsp;' +
            '<span class="sqrfit"><i class="fas fa-building"></i><span class="value">&nbsp;' + propertiesInViewport[i].PropertyFeatures.type + '</span></span></div>' +
            '<div class="addr">' + propertiesInViewport[i].address + '</div></div></a></div>' +
            '</div>';


        // add the click event's listener for each marker to open the info-Window
        (function (index, selectedMarker) {

            const element = selectedMarker.element;


            ["click", "pointerenter"].forEach((event) => {
                element.addEventListener(event, () => {


                  infoWindow.close();
                  infoWindow.setContent(selectedMarker.objInfo);
                  infoWindow.open(map, selectedMarker);
                });
              });


            // ["blur", "pointerleave"].forEach((event) => {
            //     element.addEventListener(event, () => {
            //         infoWindow.close();
            //     });
            // });





        })(i, marker)



        // place the marker on the map
        // marker.setMap(map);
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
        if (a.contains(new google.maps.LatLng(properties[i].position.lat, properties[i].position.lng))) {
            selected.push(properties[i]);
        }
    }
    return selected;
}

function buildContent(property, zoom_check) {

    var color_code = '';
    switch (property.status) {
        case "ACT":
            color_code = 'active-list'
            break;
        case "PND":
            color_code = 'pending'
            break;
        case "CSN":
            color_code = 'coming-soon'
            break;
        case "REG":
            color_code = 'registered'
            break;
        case "SLD":
            color_code = 'sold'
            break;

        default:
            color_code = 'active-list'
            break;
    }
    const content = document.createElement("div");
    content.classList.add("property");
    if (zoom_check > 15) {
        content.innerHTML = `<div class="price-tag-marker ${color_code}">$${property.PropertyFeatures.short_price}</div>`;
    } else {
        content.innerHTML = `<div class=" dot-marker ${color_code}"></div>`;
    }

    return content;
  }
