var geocoder;
var map;

function map_initialize() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(48.866667, 2.333333);
    var mapOptions = {
        zoom: 12,
        center: latlng
        }
    var map_canvas = $(".map_canvas")[0];
    map = new google.maps.Map(map_canvas, mapOptions);
    }
    
function codeAddress(address, name, delay) {
    setTimeout(function(){
        geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            //map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: map,
                icon: "/images/lib.png",
                position: results[0].geometry.location
            });
            google.maps.event.addListener(marker,'click',function() {
                map.setZoom(12);
                //map.setCenter(marker.getPosition());
            });
            var infowindow = new google.maps.InfoWindow({
                content: name
                });
            infowindow.open(map,marker);
        } 
        else { console.log("Geocode was not successful for the following reason: " + status); } 
    })
        
    }, delay);
}
