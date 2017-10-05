<script>
/*geocoding text address code snippet
var url = 'https://maps.googleapis.com/maps/api/geocode/json?address=';
var key = '&key=AIzaSyBNUK8PzNikDsLsi8g645rNzmU6omFC2GE';
var address = document.getElementById('address').value;
var xmlhttp = new XMLHttpRequest();
var responseData = null;
xmlhttp.open('GET', url+address+key, true);
xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4) {
        if(xmlhttp.status == 200) {
            responseData = JSON.parse(xmlhttp.responseText);
         }
    }
};
xmlhttp.send(null);
*NOTE: Use this code snippet to get the latitude and longitude of an address*
*/
function initMap() 
{
    var lat = 10.3098842; //replace with responseData.results[0].geometry.location.lat
    var llong = 123.89314549999995;//replace with responseData.results[0].geometry.location.lng

    
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: lat, lng: llong},
        zoom: 16,
        mapTypeId: 'roadmap'
      });
    var pos = {
        lat: lat,
        lng: llong
      };
    var marker = new google.maps.Marker({
        map: map,
        position:pos
      });

    // Create the search box and link it to the UI element.
    var input = document.getElementById('address');
    var searchBox = new google.maps.places.SearchBox(input);
    // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    // Bias the SearchBox results towards current map's viewport.
    map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
    });

    var markers = [];
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
            var icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
              };
            marker.setPosition(place.geometry.location);
            marker.setTitle(place.name);
            lat=place.geometry.location.lat();
            llong=place.geometry.location.lng();
            
            if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
        });
        map.setCenter({lat:lat,lng:llong});
    });
}

function geocodeLatLng(geocoder, map, infowindow,latitude,longitude) 
{
    var latlng = {lat: latitude, lng: longitude};
    geocoder.geocode({'location': latlng}, function(results, status) {
        if (status === 'OK') {
            if (results[1]) {
                $("#address").val(results[1].formatted_address);
            } else {
                window.alert('No results found');
            }
        } else {
            window.alert('Geocoder failed due to: ' + status);
        }
    });
}
function handleLocationError(browserHasGeolocation, marker, pos) 
{
    alert("Error");
    marker.setPosition(pos);
    marker.setContent(browserHasGeolocation ?
      'Error: The Geolocation service failed.' :
      'Error: Your browser doesn\'t support geolocation.');
}
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNUK8PzNikDsLsi8g645rNzmU6omFC2GE&libraries=places&callback=initMap">
</script>