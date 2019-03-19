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
          center: {lat:-12.066910, lng:-77.023073},
          mapTypeId: 'terrain'
        });

        console.log(signalLocations.length);
        for (i = 0; i < signalLocations.length; i++) {

          mycolor = '#31a354';
          
          console.log(signalLocations[i].manufacturer);
          if(parseInt(signalLocations[i].level) == 1){
              mycolor = '#f03b20'
          }
          if(parseInt(signalLocations[i].level) == 2){
            mycolor = '#feb24c'
          }
          if(parseInt(signalLocations[i].level) == 3){
            mycolor = '#ffeda0'
          }
          if(parseInt(signalLocations[i].level) == 4){
            mycolor = '#31a354'
          }
          if(parseInt(signalLocations[i].level) == 5){
            mycolor = '#31a354'
          }


          new google.maps.Circle({
            strokeColor: mycolor,
            strokeOpacity: 1.0,
            strokeWeight: 2,
            fillColor: mycolor,
            fillOpacity: 1.0,
            map: map,
            center: {
              lat: parseFloat(signalLocations[i].latitude),lng: parseFloat(signalLocations[i].longitude),
            },
            radius:20
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
