import {allowPinchToZoom} from "../PinchToZoom.js";

window.addEventListener("load", function() {
    let squares = document.querySelectorAll(".square");
    squares.forEach((square) => {
        allowPinchToZoom(square);
    })

    setupDemo_eventHandler();
});

function setupDemo_eventHandler() {
    let scaleSpan = document.querySelector("#demo2_scale");
    let offsetSpan = document.querySelector("#demo2_offset");
    let square = document.querySelector("#demo2_square");

    let handler = allowPinchToZoom(square);
    handler.onChange = function (scale, offset) {
        scaleSpan.innerText = scale.toFixed(2) + "";
        offsetSpan.innerText = "(" + offset.x.toFixed(2) + ", " + offset.y.toFixed(2) + ")";
    }
}
