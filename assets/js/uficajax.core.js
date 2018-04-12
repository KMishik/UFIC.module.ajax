'use strict';
!function () {
    var AJAXrequest = new XMLHttpRequest();
    var response;
    var nodeID;
    AJAXrequest.open('GET', '/get-citation', false);
    AJAXrequest.send();
    response = JSON.parse(AJAXrequest.responseText);
    for (nodeID in response) {
        var value = JSON.stringify(response[nodeID]);
        window.sessionStorage.setItem(nodeID, value);
    }
}();
