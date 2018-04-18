'use strict';
!function () {
    var AJAXrequest = new XMLHttpRequest();
    var response;
    var authorID;
    AJAXrequest.open('GET', '/get-citation', false);
    AJAXrequest.send();
    response = JSON.parse(AJAXrequest.responseText);
    for (authorID in response) {
        var value = JSON.stringify(response[authorID]);
        window.sessionStorage.setItem(authorID, value);
    }
}();
