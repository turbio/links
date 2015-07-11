var working = false;
lastRequest = "";

function updateTable(){
	var httpRequest = new XMLHttpRequest();

	requestString = "link_table.php?search=" + document.getElementById("search").value;
	if(requestString == lastRequest){
		working = false;
		return;
	}
	lastRequest = requestString;

	httpRequest.open("GET", requestString, true);

	httpRequest.onload = function(e){
		console.log("requested...");
		document.getElementById("link_table").innerHTML = httpRequest.responseText;
	};

	httpRequest.onerror = function (e){
		console.error(httpRequest.statusText);
	};

	httpRequest.send(null);
	working = false;
}

function searchChange(){
	if(!working){
		working = true;
		setTimeout(updateTable, 500);
	}
}
