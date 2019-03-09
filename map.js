//For map
var map;
var locations = [{lat: 40.416775, lng: -3.703790},{lat: 40.41, lng: -3.8}];
function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 40.416775, lng: -3.703790},
    disableDefaultUI: true,
    zoom: 11
    });
    for (var i = 0; i < locations.length; i++) {
        addMarker(locations[i], map);
      }
}   

function addMarker(location, map) {
    var marker = new google.maps.Marker({
      position: location,
      map: map
    });
  }
 