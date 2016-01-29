  /*$(function () {
      var map_map;
      my_map = new GMaps({
          el: '#my-map',
          lat: -12.043333,
          lng: -77.028333,
          zoomControl: true,
          panControl: false,
          streetViewControl: false,
          mapTypeControl: false,
          overviewMapControl: false
      });
      // If you want to add a marker
      my_map.addMarker({
          lat: -12.042,
          lng: -77.028333,
          title: 'Marker with InfoWindow',
          infoWindow: {
              content: '&lt;p&gt;Here we are!&lt;/p&gt;'
          }
      });
  });*/
  
  function initMap() {
    var map = new google.maps.Map(document.getElementById('my-map'), {
      zoom: 8,
      center: {lat: -34.397, lng: 150.644}
    });
    var geocoder = new google.maps.Geocoder();

    $( "#formwhere" ).change(function() {
      geocodeAddress(geocoder, map);
    });
  }
    
  function geocodeAddress(geocoder, resultsMap) {
    var address = document.getElementById('formwhere').value;
    geocoder.geocode({'address': address}, function(results, status) {
      if (status === google.maps.GeocoderStatus.OK) {
        resultsMap.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
          map: resultsMap,
          position: results[0].geometry.location
        });
      } else {
        alert('Geocode was not successful for the following reason: ' + status);
      }
    });
  }