var room = document.getElementById("room_type");

room.onchange = function() {
    switch(room.value) {
        case "single_room":
            alert("Single Room Selected");
            break;
        case "double_room":
            alert("Double Room Selected");
            break;
        case "quad_room":
            alert("Quad Room Selected");
            break;
        case "studio_room":
            alert("Studio Room Selected");
            break;
        case "royal_room":
            alert("Royal Room Selected");
            break;
    }
};