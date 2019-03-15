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

        var locations = {!!json_encode($locations)!!};

        console.log(locations.lenth);
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 11,
          center: {lat: 33.678, lng: -116.243},
          mapTypeId: 'terrain'
        });

        var rectangle = new google.maps.Rectangle({
          strokeColor: '#FF0000',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#FF0000',
          fillOpacity: 0.35,
          map: map,
          bounds: {
            north: 33.685,
            south: 33.671,
            east: -116.234,
            west: -116.251
          }
        });
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
