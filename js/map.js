var gmarkers = []; // An array to hold our markers for later manipulation
var infowindow = new google.maps.InfoWindow();
var map = null;

function initializeMap() {

	map = new google.maps.Map(document.getElementById('map'), { zoom: 15, center: new google.maps.LatLng(34.0625115, -118.23896259999998), mapTypeId: google.maps.MapTypeId.ROADMAP, mapTypeControl: false });

	for (var i = 0; i < locations.length; i++) {  

	  var marker = new google.maps.Marker({
	    position: locations[i].latlng,
	    shadow: new google.maps.MarkerImage("/wp-content/themes/trails/images/marker-shadow.png", null, null, new google.maps.Point(0, 34), new google.maps.Size(37, 34)),
	    icon: locations[i].marker,
	    map: map,
		format : locations[i].format,
		group : locations[i].group,
		optimized : false
	  });

	// Save a reference to the newly created marker for later manipulation
      gmarkers.push(marker);

	  google.maps.event.addListener(marker, 'click', (function(marker, i) {
	    return function() {
	      infowindow.setContent(locations[i].info);
	      infowindow.open(map, marker);
	    }
	  })(marker, i));
	}

}


