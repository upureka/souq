var map, marker, infoWindow, latInp, lngInp, locInp;

function init() {
    latInp = $('#lat');
    lngInp = $('#lng');
    locInp = $('#loc');

    var mapOptions = {
        zoom: 9,
        mapTypeControl: true,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.VERTICAL_BAR,
            position: google.maps.ControlPosition.RIGHT_BOTTOM
        },
        zoomControl: true,
        zoomControlOptions: {
            position: google.maps.ControlPosition.LEFT_CENTER
        },
        scaleControl: true,
        streetViewControl: true,
        streetViewControlOptions: {
            position: google.maps.ControlPosition.LEFT_TOP
        },
        fullscreenControl: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        scrollwheel: false
    };

    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    // Create the DIV to hold the control and call the constructor passing in this DIV
    var geolocationDiv = document.createElement('div');
    var geolocationControl = new GeolocationControl(geolocationDiv, map);

    map.set('styles', [{
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
                "color": "#46bcec"
            },
            {
                "visibility": "on"
            }
        ]
    },{
        "featureType": "administrative.country",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "simplified"
            },
            {
                "hue": "#ff0000"
            }
        ]
    }]);

    map.controls[google.maps.ControlPosition.BOTTOM_CENTER].push(geolocationDiv);
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(locInp[0]);

    if (navigator.geolocation && latInp && lngInp) {
        addSearchBox();

        map.addListener('click', function(p) {
            resolvePlace(p.latLng);
        });

        lat = latInp.val();
        lng = lngInp.val();
//        address = locInp.val();
        if (lat.length && lng.length) {
            success({formatted_address: locInp.val()}, new google.maps.LatLng(lat, lng));
        }else{
            map.setCenter(new google.maps.LatLng(30, 30));
        }
    }


}

function GeolocationControl(controlDiv, map) {

    // Set CSS for the control button
    var controlUI = document.createElement('div');
    controlUI.style.backgroundColor = '#444';
    controlUI.style.borderStyle = 'solid';
    controlUI.style.borderWidth = '1px';
    controlUI.style.borderColor = 'white';
    controlUI.style.height = '28px';
    controlUI.style.marginTop = '5px';
    controlUI.style.cursor = 'pointer';
    controlUI.style.textAlign = 'center';
    controlUI.title = ' ';
    controlDiv.appendChild(controlUI);

    // Set CSS for the control text
    var controlText = document.createElement('div');
    controlText.style.fontFamily = 'Arial,sans-serif';
    controlText.style.fontSize = '10px';
    controlText.style.color = 'white';
    controlText.style.paddingLeft = '10px';
    controlText.style.paddingRight = '10px';
    controlText.style.marginTop = '8px';
    controlText.innerHTML = ' ';
    controlUI.appendChild(controlText);

    // Setup the click event listeners to geolocate user
    google.maps.event.addDomListener(controlUI, 'click', geolocate);

}

function geolocate() {

    if (navigator.geolocation) {

        navigator.geolocation.getCurrentPosition(function (position) {

            var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

            resolvePlace(pos);
        }, function () {
            handleLocationError(true, infoWindow, map.getCenter());
        });

    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }
}

function resolvePlace(pos) {

    var geocoder = new google.maps.Geocoder;
    geocoder.geocode({ 'location': pos }, function (results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            if (results[0]) {
                success(results[0],pos);
            } else {
                error('No results found');
            }
        } else {
            error(status);
        }
    });

}

function error(status) {
    window.alert('Geocoder failed due to: ' + status);
}

function success(place,pos) {

    if(marker){
        marker.setMap(null);
        infoWindow.close();
    }

    marker = new google.maps.Marker({
        title: place.formatted_address,
        draggable: true,
        animation: google.maps.Animation.DROP,
        map: map,
        position: pos
    });

    marker.addListener('mousedown', function() {
        infoWindow.close();
    });
    marker.addListener('mouseup', function() {
        var latlng = marker.getPosition();
        latInp.val(latlng.lat);
        lngInp.val(latlng.lng);

        var geocoder = new google.maps.Geocoder;
        geocoder.geocode({ 'location': latlng }, function (results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    infoWindow.setPosition(latlng);
                    infoWindow.setContent(results[0].formatted_address);
                    locInp.val(results[0].formatted_address);
                    $('#location').val(results[0].formatted_address);
                    infoWindow.open(map,marker);
                } else {
                    alert('No results found');
                }
            } else {
                alert(status);
            }
        });
    });

    infoWindow = new google.maps.InfoWindow({ map: map });
    infoWindow.setPosition(pos);
    infoWindow.setContent(place.formatted_address);
    map.setCenter(pos);
    infoWindow.open(map,marker);

    //update lat and lng
    latInp.val(pos.lat);
    lngInp.val(pos.lng);
    locInp.val(place.formatted_address);

}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ? 'Error: The Geolocation service failed.' : 'Error: Your browser doesn\'t support geolocation.');
}

function addSearchBox() {

    // Create the search box and link it to the UI element.
    var searchBox = new google.maps.places.SearchBox(locInp[0]);

    // Bias the SearchBox results towards current map's viewport.
    map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
    });

    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener('places_changed', function() {
        var places = searchBox.getPlaces();

        if (places.length == 0) {
            return;
        }

        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function(place) {
            if (!place.geometry) {
                console.log("Returned place contains no geometry");
                return;
            }

            success({formatted_address: locInp.val()}, place.geometry.location);

            if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
        });
        map.fitBounds(bounds);
    });
}