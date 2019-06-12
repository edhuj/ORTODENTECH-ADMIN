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
	if(window.polygons){
			for(var i=0; i<window.polygons.length; i++)
				window.polygons[i].setMap(null);
	}
	window.polygons = [];
	var signalLocations = JSON.parse(responseText);

	console.log("----------------------");
	console.log(signalLocations);
	for(var i=0; i<signalLocations.length; i++){
		mycolor = '#31a354';
			//if(i<100 || i > signalLocations.length -100 ){
			//	if(i > signalLocations.length -100)
			//		mycolor = '#ff0000';
				drawHexagonX(window.map, new google.maps.LatLng(signalLocations[i].latitude, signalLocations[i].longitude), 50, mycolor, i);
			//}
	}

}


	function drawHexagonX(map, position, radius, fillColor, jsonSignum){

				var coordinates = [];
				for(var angle= 30;angle < 360; angle+=60) {
					 coordinates.push(google.maps.geometry.spherical.computeOffset(position, radius, angle));
				}

				var polygon = new google.maps.Polygon({
						paths: coordinates,
						strokeColor: fillColor,
						strokeOpacity: 0.8,
						strokeWeight: 2,
						fillColor: fillColor,
						fillOpacity: 0.35,
				});

				mycolor = fillColor;


				polygon.setOptions({fillOpacity: 0.5, strokeColor: fillColor, stroleOpacity:0.5, fillColor:mycolor});
				polygon.setMap(map);
				window.map.setCenter(position);
		}



function invocar(){
	//var parameters = getParameters(document.signum_filter_form);
	//sendAsyncRequest(document.signum_filter_form.action+"?"+parameters,"GET",null,procesar,fallo);
	sendAsyncRequest("/api/smallerhexagons","GET",null,procesar,fallo);
	//console.log("Aqui estamo");
	/*L = 50;
	position = new google.maps.LatLng(0.1584867,-77.3241491);
	position2 = google.maps.geometry.spherical.computeOffset(position, L*3, 90);
	position3 = google.maps.geometry.spherical.computeOffset(position, L*Math.sqrt(3), 120);
	for(x=0; x<100; x++){
		drawRawHexagons(window.map, position2, L, 0, 100,  "{[]}");
		drawRawHexagons(window.map, position3, L, 0, 100,  "{[]}");
		position = position2;
		position2 = google.maps.geometry.spherical.computeOffset(position, L*3, 90);
		position3 = google.maps.geometry.spherical.computeOffset(position, L*Math.sqrt(3), 120);
	}*/


}

function fallo(){
  console.log("failed");
}
