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
