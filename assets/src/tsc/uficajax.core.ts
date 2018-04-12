'use strict';
! function() {
	let AJAXrequest: XMLHttpRequest = new XMLHttpRequest();
	let response: Object;
	let nodeID: string;
	AJAXrequest.open('GET', '/get-citation', false);
	AJAXrequest.send();
	response = JSON.parse(AJAXrequest.responseText);
	for (nodeID in response) {
		let value: string = JSON.stringify(response[nodeID]);
		window.sessionStorage.setItem(nodeID, value);
	}
}();

