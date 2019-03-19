function sendAsyncRequest(url, method, params, callback,fallback) {
	var request = getRequest();
	request.open(method, url, true);

	request.setRequestHeader("Content-Type",
			"application/x-www-form-urlencoded;charset=ISO-8859-1");
	request.setRequestHeader("X-Requested-With", "XMLHttpRequest");

	request.callback = callback;
	request.onreadystatechange = function() {
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
	var jsonResponse = JSON.parse(responseText);


	.
	.
	.

}
function invocar(){
	var parameters = getParameters(document.formName);
	sendAsyncRequest("urlSignum?"+parameters,"GET",null,procesar,fallo);
	//----fin----
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
