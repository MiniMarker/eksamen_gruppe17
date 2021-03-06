function initMap() {
    var locations = [
        ['<div id="content"> <div id="siteNotice"></div>' +
         '<h2 id="firstHeading" class="firstHeading">Anker Hotell</h2>' +
         '<div id="bodyContent">' +
         '<p>Storgata 53, Oslo</p></div></div>', 59.917714, 10.75591, 4],
        
        ['<div id="content"> <div id="siteNotice"></div>' +
         '<h2 id="firstHeading" class="firstHeading">Thon Hotel Spectrum</h2>' +
         '<div id="bodyContent">' +
         '<p>Brugata 7, Oslo</p></div></div>', 59.913985, 10.753463, 3],
        
        ['<div id="content"> <div id="siteNotice"></div>' +
         '<h2 id="firstHeading" class="firstHeading">Scandic Vulkan</h2>' +
         '<div id="bodyContent">' +
         '<p>Maridalsveien , Oslo</p></div></div>', 59.9222276, 10.7488562, 2],
        
        ['<div id="content"> <div id="siteNotice"></div>' +
         '<h2 id="firstHeading" class="firstHeading">PS: Hotel Vulkan</h2>' +
         '<div id="bodyContent">' +
         '<p>Vulkan 22, Oslo</p></div></div>', 59.9221828, 10.7490982, 1]
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var bounds = new google.maps.LatLngBounds();

    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map
        });

        bounds.extend(marker.position);

        google.maps.event.addListener(marker, 'mouseover', (function (marker, i) {
            return function () {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
            }
        })(marker, i));
        google.maps.event.addListener(marker, 'mouseout', (function (marker, i) {
            return function () {
                infowindow.setContent(locations[i][0]);
                infowindow.close(map, marker);
            }
        })(marker, i));
    }

    map.fitBounds(bounds);

    var listener = google.maps.event.addListener(map, "idle", function () {
        map.setZoom(15);
        google.maps.event.removeListener(listener);
    });
}
