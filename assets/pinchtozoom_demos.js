import {allowPinchToZoom} from "../PinchToZoom.js";

window.addEventListener("load", function() {
    let squares = document.querySelectorAll(".square");
    squares.forEach((square) => {
        allowPinchToZoom(square);
    })

    setupDemo_eventHandler();
    setupDemo_reflexive();
    setupDemo_scrollWheel();
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

function setupDemo_reflexive() {
    let square = document.querySelector("#demo3_square");
    let handler = allowPinchToZoom(square);
    handler.reflexive = true;
}

function setupDemo_scrollWheel() {
    let square = document.querySelector("#demo4_square");
    let handler = allowPinchToZoom(square);
    handler.isScrollZoomEnabled = false;
}
