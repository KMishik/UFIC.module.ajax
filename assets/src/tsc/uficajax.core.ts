! function() {
	"use strict";
	let AJAXrequest: XMLHttpRequest = new XMLHttpRequest();
	let response: Object;
	let authorID: string;
	AJAXrequest.open('GET', '/get-citation', false);
	AJAXrequest.send();
	response = JSON.parse(AJAXrequest.responseText);
	for (authorID in response) {
		let value: string = JSON.stringify(response[authorID]);
		window.sessionStorage.setItem(authorID, value);
	}
}();

