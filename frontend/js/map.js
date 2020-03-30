var map;

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 16,
        center: new google.maps.LatLng(45.5000579, -73.5802808),
        mapTypeId: 'roadmap',
        zoomControl: false,
        mapTypeControl: false,
        scaleControl: false,
        streetViewControl: false,
        rotateControl: false,
        fullscreenControl: false,
        styles: [{
            "stylers": [{
                "hue": "#ff1a00"
            }, {
                "invert_lightness": true
            }, {
                "saturation": -100
            }, {
                "lightness": 33
            }, {
                "gamma": 0.5
            }]
        }, {
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [{
                "color": "#2D333C"
            }]
        }]
    });

    // Create a single re-usable InfoWindow
    var infowindow = new google.maps.InfoWindow();

    // Icon PNGs
    var iconBase = 'icons/';
    var icons = {
        yearly_events: {
            icon: iconBase + 'calendar.png',
        },
        free_stuff: {
            icon: iconBase + 'gift.png',
        },
        best_views_of_mtl: {
            icon: iconBase + 'photo.png',
        },
        tourist_attractions: {
            icon: iconBase + 'tourist_attractions.png',
        },
        drunk_food: {
            icon: iconBase + 'drunk_food.png',
        },
        activities_under_10$: {
            icon: iconBase + 'money.png',
        },
        nightclubs: {
            icon: iconBase + 'nightclubs.png',
        },
        cheap_eats: {
            icon: iconBase + 'burger.png',
        },
        resto_bars: {
            icon: iconBase + 'beer.png',
        },
        poutines: {
            icon: iconBase + 'poutine.png',
        },

        default: {
            icon: iconBase + 'default.png',
        }
    };

    $.ajax({
        url: baseUrl + '/places',
        dataType: 'json',
    }).done(function (data) {
        var places = data;
        var markers = [];

        $.each(places, function (index, value) {

            var marker = {
                position: new google.maps.LatLng(value.lat, value.lng),
                type: value.categories[0].slug.replace(/-/g, '_')
            }

            markers.push(addMarker(marker, value));

        });

        var markerCluster = new MarkerClusterer(map, markers, {
            imagePath: 'icons/m',
            gridSize: 90,
            minimumClusterSize: 7,
        });
    });

    function addMarker(feature, data) {

        // Set the icon or default
        var icon = typeof icons[feature.type] != 'undefined' ? icons[feature.type].icon : icons['default'].icon;

        // Create marker object
        var marker = new google.maps.Marker({
            position: feature.position,
            icon: icon,
            map: map
        });

        marker.addListener('click', function () {
            infowindow.setContent('<div class="infobox"><b class="infobox__title">' + data.name + '</b>' +
                '<p class="infobox__description">' + data.description + '</p></div>');
            infowindow.open(map, this);
        });

        return marker;
    }
}