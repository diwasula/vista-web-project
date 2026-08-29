window.onload = function () {
    var params = new URLSearchParams(window.location.search);

    var roomField     = document.getElementById("h_room_type");
    var dateInField   = document.getElementById("h_date_in");
    var dateOutField  = document.getElementById("h_date_out");
    var adultsField   = document.getElementById("h_adults");
    var childrenField = document.getElementById("h_children");

    if (roomField)     roomField.value     = params.get("room_type") || "";
    if (dateInField)   dateInField.value   = params.get("date_in")   || "";
    if (dateOutField)  dateOutField.value  = params.get("date_out")  || "";
    if (adultsField)   adultsField.value   = params.get("Adults")    || "1";
    if (childrenField) childrenField.value = params.get("Children")  || "0";
};

var form = document.getElementById("detailsForm");

form.onsubmit = function(event) {
    var firstName = document.getElementById("firstName").value;

    alert("Thank you, " + firstName + "! Your reservation at Vista Hotel has been successfully confirmed!!");
};
