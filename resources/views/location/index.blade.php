<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Signum</title>
    <style>
      #map {
        height: 100%;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>

    <script>
      function initMap() {

        signalLocations = {!!json_encode($locations)!!};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 11,
          center: {lat: 33.678, lng: -116.243},
          mapTypeId: 'terrain'
        });

        console.log(signalLocations.length);
        for (i = 0; i < signalLocations.length; i++) {
          console.log("Hello "+signalLocations[i].accuracy);
          new google.maps.Circle({
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#FF0000',
            fillOpacity: 0.35,
            map: map,
            center: {
              lat: parseFloat(signalLocations[i].latitude),lng: parseFloat(signalLocations[i].longitude),
            },
            radius:100
          });
        }

      }
    </script>

  </head>
  <body>
    <div id="map"></div>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGAOvDgtDnuRnLbShwZpEGVZTRPZNINIQ&callback=initMap">
    </script>
  </body>
</html>
