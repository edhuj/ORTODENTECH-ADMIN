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

	console.log(signalLocations);
	for(var i=0; i<signalLocations["data"].length; i++){
		mycolor = '#31a354';
		if(parseFloat(signalLocations["data"][i].average) <= 1){
        mycolor = '#f03b20';
    }
		if(parseFloat(signalLocations["data"][i].average) > 1 && parseFloat(signalLocations["data"][i].average) <= 2 ){
        mycolor = '#feb24c';
    }
		if(parseFloat(signalLocations["data"][i].average) > 2 && parseFloat(signalLocations["data"][i].average) <= 3 ){
        mycolor = '#ffeda0';
    }
		if(parseFloat(signalLocations["data"][i].average) > 3 && parseFloat(signalLocations["data"][i].average) <= 4 ){
        mycolor = '#31a354';
    }
		if(parseFloat(signalLocations["data"][i].average) > 4 && parseFloat(signalLocations["data"][i].average) <= 5 ){
        mycolor = '#31a354';
    }

		
		drawHexagon(window.map, new google.maps.LatLng(signalLocations["data"][i].latitude, signalLocations["data"][i].longitude), 500, mycolor, signalLocations["data"][i]["id"]);

	}


}

	function drawHexagon(map, position, radius, fillColor, indexID){

			var coordinates = [];
			for(var angle= 0;angle < 360; angle+=60) {
				 coordinates.push(google.maps.geometry.spherical.computeOffset(position, radius, angle));
			}

			// Construct the polygon.
			var polygon = new google.maps.Polygon({
					paths: coordinates,
					strokeColor: '#FFFFFF',
					strokeOpacity: 0.8,
					strokeWeight: 2,
					fillColor: fillColor,
					fillOpacity: 0.35,
					indexID: indexID,
			});

			google.maps.event.addListener(polygon, 'click', function (event) {
        //alert the index of the polygon

				getHexagonData(polygon.indexID);
				$(".modal-header .modal-title").text("Detalle del punto");
    		$(".signum_data_table").text(this.position);
				$('#myModal').modal('show');

    	});

			google.maps.event.addListenerOnce(polygon, 'rightclick', function() {
				console.log("Show smaller triangles");
				getInternalData(polygon.indexID);
      });

			polygon.setMap(map);
			window.polygons.push(polygon);
			//map.setCenter(position);
	}



	function getInternalData(hexagonId){
		$('#myLoader').modal('show');
		sendAsyncRequest("/api/internalhexagondetail?id="+hexagonId, "GET", null, showInternalHexagonData, fallo);
	}

	function showInternalHexagonData(responseText){
		var signalHexagon = JSON.parse(responseText);
		for(var i=0; i<window.polygons.length; i++){
			if(window.polygons[i].indexID == signalHexagon["hexagon"].id){
					window.polygons[i].setOptions({fillOpacity: 0.0, strokeColor: "#FFFFFF", stroleOpacity:0.0});
					window.polygons[i].setMap(null);
					google.maps.event.addListener(window.polygons[i], 'click', function (event) {

		    	});
			}
		}

		hexagonCenter = new google.maps.LatLng(signalHexagon["hexagon"].latitude, signalHexagon["hexagon"].longitude);

		hexagonRadio = 20;
		currentPosition = hexagonCenter;

		level=1;
		while( level*hexagonRadio*Math.sqrt(3) < 500){
			for(var position=0; position<360; position+=60){
				currentPosition = google.maps.geometry.spherical.computeOffset(hexagonCenter, level*hexagonRadio*Math.sqrt(3), position);
				drawRawHexagons(window.map, currentPosition, hexagonRadio, 120+position, level, signalHexagon);
			}
			level = level+1;
		}

		$('#myLoader').modal('hide');
	}

	function drawRawHexagons(map, position, radius, orientation, level, jsonSignum){
		for(var raw = 0; raw<level; raw++){
			position = google.maps.geometry.spherical.computeOffset(position, radius*Math.sqrt(3), orientation);
			drawHexagonX(map, position, radius, "#ffff00", jsonSignum);
		}
	}

	function drawHexagonX(map, position, radius, fillColor, jsonSignum){

				var coordinates = [];
				for(var angle= 30;angle < 360; angle+=60) {
					 coordinates.push(google.maps.geometry.spherical.computeOffset(position, radius, angle));
				}

				var polygon = new google.maps.Polygon({
						paths: coordinates,
						strokeColor: '#000000',
						strokeOpacity: 0.8,
						strokeWeight: 2,
						fillColor: fillColor,
						fillOpacity: 0.35,
				});

				marcas = {"motorola":0, "samsung":0, "LGE":0, "HUAWEI":0};
				q_marcas = {"motorola":0, "samsung":0, "LGE":0, "HUAWEI":0};
				for(var key in  jsonSignum["signums"]){
					signumPoint = new google.maps.LatLng(jsonSignum["signums"][key].latitude, jsonSignum["signums"][key].longitude);
					inside = google.maps.geometry.poly.containsLocation(signumPoint, polygon);
					if(inside){
						marcas[jsonSignum["signums"][key].manufacturer] += parseInt(jsonSignum["signums"][key].level);
						q_marcas[jsonSignum["signums"][key].manufacturer] += 1;
					}
				}
				q_signal_levels = marcas["motorola"]+marcas["samsung"]+marcas["LGE"]+marcas["HUAWEI"];
				q_signals =  q_marcas["motorola"]+q_marcas["samsung"]+q_marcas["LGE"]+q_marcas["HUAWEI"]

				if(q_signals>0){
					console.log(marcas);
					mycolor = '#31a354';
					if(parseFloat(q_signal_levels/q_signals) <= 1){
			        mycolor = '#f03b20';
			    }
					if(parseFloat(q_signal_levels/q_signals) > 1 && parseFloat(q_signal_levels/q_signals) <= 2 ){
			        mycolor = '#feb24c';
			    }
					if(parseFloat(q_signal_levels/q_signals) > 2 && parseFloat(q_signal_levels/q_signals) <= 3 ){
			        mycolor = '#ffeda0';
			    }
					if(parseFloat(q_signal_levels/q_signals) > 3 && parseFloat(q_signal_levels/q_signals) <= 4 ){
			        mycolor = '#31a354';
			    }
					if(parseFloat(q_signal_levels/q_signals) > 4 && parseFloat(q_signal_levels/q_signals) <= 5 ){
			        mycolor = '#31a354';
			    }

					polygon.setOptions({fillOpacity: 0.5, strokeColor: "#000000", stroleOpacity:0.5, fillColor:mycolor});


					/*google.maps.event.addListener(polygon, 'click', function (event) {
		        //alert the index of the polygon
						//getHexagonData(polygon.indexID);
						$(".modal-header .modal-title").text("Detalle del punto");
		    		$(".signum_data_table").text(this.position);
						$('#myModal').modal('show');

		    	});*/

					polygon.setMap(map);
				}
		}

	function getHexagonData(hexagonId){
		sendAsyncRequest("/api/hexagondetail?id="+hexagonId, "GET", null, showHexagonData, fallo);
	}

	function showHexagonData(responseText){
			var table = document.getElementById("signum_data_table");
			hexagonData = JSON.parse(responseText);
			//$('#signum_data_table tbody').html("");

			var Parent = document.getElementById("signum_data_table");
			while(Parent.hasChildNodes())
			{
	 			Parent.removeChild(Parent.firstChild);
			}

			head = table.insertRow(0);
			header1 = head.insertCell(0);
			header2 = head.insertCell(1);
			header3 = head.insertCell(2);

			header1.innerHTML = "Marca";
			header2.innerHTML = "Mediciones";
			header3.innerHTML = "Promedio";

			for(var i=0; i<hexagonData.length; i++){
				var row = table.insertRow(i+1);

				var cell1 = row.insertCell(0);
				var cell2 = row.insertCell(1);
				var cell3 = row.insertCell(2);

				// Add some text to the new cells:
				cell1.innerHTML = hexagonData[i]['manufacturer'];
				cell2.innerHTML = hexagonData[i]['counter'];
				cell3.innerHTML = hexagonData[i]['average'].toFixed(2);
			}
	}

function invocar(){
	var parameters = getParameters(document.signum_filter_form);
	sendAsyncRequest(document.signum_filter_form.action+"?"+parameters,"GET",null,procesar,fallo);
	//----fin----
}

function fallo(){
  console.log("failed");
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
