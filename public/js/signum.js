function sendAsyncRequest(url, method, params, callback, fallback) {
	var request = getRequest();
	request.open(method, url, true);

	request.setRequestHeader("Content-Type",
			"application/x-www-form-urlencoded;charset=ISO-8859-1");
	request.setRequestHeader("X-Requested-With", "XMLHttpRequest");

	request.callback = callback;
	request.onreadystatechange = function() {
    console.log("Ready state:" + request.readyState);
		if (request.readyState == 4){
			if(request.status == 200){
				callback(request.responseText);
			} else if(request.status == 403){
				window.location.href = "https://punku.azurewebsites.net/";
				return;
			} else if(fallback){
				fallback();
			}
		}
	};

	request.send(params);
}
function getRequest(){
	if (window.XMLHttpRequest) {
		return new XMLHttpRequest();
	}else{
		return new ActiveXObject("Microsoft.XMLHTTP");
	}
}

function procesar(responseText){
	var signalLocations = JSON.parse(responseText);

	console.log(signalLocations);
	for(var i=0; i<signalLocations["data"].length; i++){
		console.log(signalLocations["data"][i].latitude+"..."+signalLocations["data"][i].longitude);
		mycolor = '#31a354';
		if(parseFloat(signalLocations["data"][i].average) <= 1){
        mycolor = '#f03b20'
    }
		if(parseFloat(signalLocations["data"][i].average) > 1 && parseFloat(signalLocations["data"][i].average) <= 2 ){
        mycolor = '#feb24c'
    }
		if(parseFloat(signalLocations["data"][i].average) > 2 && parseFloat(signalLocations["data"][i].average) <= 3 ){
        mycolor = '#ffeda0'
    }
		if(parseFloat(signalLocations["data"][i].average) > 3 && parseFloat(signalLocations["data"][i].average) <= 4 ){
        mycolor = '#31a354'
    }
		if(parseFloat(signalLocations["data"][i].average) > 4 && parseFloat(signalLocations["data"][i].average) <= 5 ){
        mycolor = '#31a354'
    }

		drawHexagon(window.map, new LatLng(signalLocations["data"][i].latitude, signalLocations["data"][i].longitude), 500, mycolor);

	}
  /*for (i = 0; i < signalLocations.length; i++) {
    mycolor = '#31a354';

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
      map: window.map,
      center: {
        lat: parseFloat(signalLocations[i].latitude),lng: parseFloat(signalLocations[i].longitude),
      },
      radius:20
    });
  }*/

}

function drawHexagon(map, position, radius, fillColor){
			if(!google.maps.geometry.poly.containsLocation(position,window.polygonLima) &&
					!google.maps.geometry.poly.containsLocation(position,window.polygonLima2) &&
					!google.maps.geometry.poly.containsLocation(position,window.polygonCallao) &&
					!google.maps.geometry.poly.containsLocation(position,window.polygonCallao1) &&
					!google.maps.geometry.poly.containsLocation(position,window.polygonCallao2) ){
				return;
			}

			saveHexagon(position);

			var coordinates = [];
			for(var angle= 0;angle < 360; angle+=60) {
				 coordinates.push(google.maps.geometry.spherical.computeOffset(position, radius, angle));
			}

			window.peruvianHive.push(position);
			//console.log(position.lat()+","+position.lng());
			// Construct the polygon.
			var polygon = new google.maps.Polygon({
					paths: coordinates,
					strokeColor: '#FF0000',
					strokeOpacity: 0.8,
					strokeWeight: 2,
					fillColor: '#FF0000',
					fillOpacity: 0.35
			});
			polygon.setMap(map);
			map.setCenter(position);
	}


function invocar(){
	var parameters = getParameters(document.signum_filter_form);
	sendAsyncRequest(document.signum_filter_form.action+"?"+parameters,"GET",null,procesar,fallo);
	//----fin----
}

function fallo(){
  console.log("No seas weon pe");
}
function getParameters(form) {
	var params = "";
	for ( var i = 0; i < form.elements.length; i++) {
		var elemento = form.elements[i];

		if (elemento.name == "" || ((elemento.type == "radio" || elemento.type == "checkbox") && !elemento.checked))
			continue;

		params += elemento.name + "=" + encodeURIComponent(elemento.value) + "&";
	}
	return params.length > 0 ? params.substring(0, params.length - 1) : "";
}
