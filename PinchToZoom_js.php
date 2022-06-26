<?php include_once "../global_tools.php"; ?>
<!doctype html>
<html lang="en">

<head>
	<?php
	createHead(
		"PinchToZoom.js",
		"A script to allow custom touch-screen pinch to zoom functionality on an element-by-element basis rather than zooming the whole page.",
		"https://adil.hanney.org/repo/previews/PinchToZoom_js.png",
        null,
        "2022-05-28",
        "Software"
	);
	?>

    <link href="/assets/ext/bootstrap.5.1.3.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/global_styles.css">
	<link rel="stylesheet" href="assets/repo.css">
	<link rel="stylesheet" href="assets/tests.css">
	<link rel="stylesheet" href="rvalues.css">
</head>

<body>
	<!-- these scripts are needed immediately to animate page load -->
	<?php customThemeScripts(); ?>
	<script src="/assets/ext/jquery.3.6.0.min.js"></script>
	<script src="/assets/ext/js.cookie.2.2.1.min.js"></script>
	
	<?php createHeader(); ?>

    <div class="container">
        <div class="item" id="top">
            <h3>PinchToZoom.js</h3>
            <p>A script to allow custom touch-screen pinch to zoom functionality on an element-by-element basis rather than zooming the whole page.</p>
            <div><code class="language-html" data-lang="html">&lt;script src="https://adil.hanney.org/repo/PinchToZoom.js" type="module"&gt;&lt;/script&gt;</code></div>

            <p>JavaScript: <a href="PinchToZoom.js">PinchToZoom.js</a>
                <br>TypeScript: <a href="PinchToZoom.ts">PinchToZoom.ts</a></p>

            <p>You can view a real life usage of PinchToZoom.js in my <a href="/nonogram">Nonogram</a> PWA.</p>

            <a href="#default" class="btn btn-primary">next</a>
        </div>
        <div class="item" id="default">
            <h3>Default behaviour</h3>
            <p>Use a phone or tablet to try the pinch-to-zoom functionality on this box.</p>

            <div class="test square-demo-container">
                <div class="square blue"></div>
            </div>

            <div class="Rparent">
                <div class="R Ximin1 Ximedium2">
                    <h4>TypeScript</h4>
                    <code class="language-ts" data-lang="ts">
<b>import {allowPinchToZoom, PinchToZoomHandler} from "./lib/PinchToZoom";</b>

let square: HTMLElement;
let pinchToZoomHandler: PinchToZoomHandler = null;

window.addEventListener("load", function() {
    square = document.querySelector("#square");
    pinchToZoomHandler = <b>allowPinchToZoom(square);</b>
});
                    </code>
                </div>
                <div class="R Ximin1 Ximedium2">
                    <h4>JavaScript</h4>
                    <code class="language-js" data-lang="js">
<b>import {allowPinchToZoom} from "./lib/PinchToZoom.js";</b>

let square;
let pinchToZoomHandler = null;

window.addEventListener("load", function() {
    square = document.querySelector("#square");
    pinchToZoomHandler = <b>allowPinchToZoom(square)</b>;
});
                    </code>
                </div>
            </div>

            <a href="#event" class="btn btn-primary">next</a>
        </div>
        <div class="item" id="event">
            <h3>Event handler for pinch change</h3>

            <p>The below demo shows the <code>scale</code> and <code>offset</code> values when the
                <code>PinchToZoomHandler.onChange</code> function is called, rounded to 2 decimal places.</p>
            <p>Note that the <code>offset</code> is the position of the midpoint of the two fingers
                relative to the midpoint of the element's original position, and does not change with <code>scale</code>.</p>
            <div class="test square-demo-container">
                <p>
                    <span id="demo2_scale">1.00</span>x<br>
                    <span id="demo2_offset">(0.00, 0.00)</span>
                </p>
                <div class="square red" id="demo2_square"></div>
            </div>

            <div class="Rparent">
                <div class="R Ximin1 Ximedium2">
                    <h4>TypeScript</h4>
                    <code class="language-ts" data-lang="ts">
pinchToZoomHandler = <b>allowPinchToZoom(square)</b>;

<b>pinchToZoomHandler.onChange</b> = (scale: number, offset: {x: number, y: number}) => {
    console.log(scale, offset);
};
                    </code>
                </div>
                <div class="R Ximin1 Ximedium2">
                    <h4>JavaScript</h4>
                    <code class="language-js" data-lang="js">
pinchToZoomHandler = <b>allowPinchToZoom(square)</b>;

<b>pinchToZoomHandler.onChange</b> = (scale, offset) => {
    console.log(scale, offset);
};
                    </code>
                </div>
            </div>

            <a href="#reflexive" class="btn btn-primary">next</a>
        </div>
        <div class="item" id="reflexive">
            <h3>Reflexive</h3>
            <p>By default the element will not return to its original size after
                the pinch ends. This demo sets the <code>reflexive</code> flag to <code>true</code>.</p>

            <div class="test square-demo-container">
                <div class="square orange" id="demo3_square"></div>
            </div>

            <div class="Rparent">
                <div class="R Ximin1 Ximedium2">
                    <h4>TypeScript</h4>
                    <code class="language-ts" data-lang="ts">
pinchToZoomHandler = <b>allowPinchToZoom(square)</b>;

pinchToZoomHandler.<b>reflexive</b> = true;
                    </code>
                </div>
                <div class="R Ximin1 Ximedium2">
                    <h4>JavaScript</h4>
                    <code class="language-js" data-lang="js">
pinchToZoomHandler = <b>allowPinchToZoom(square)</b>;

pinchToZoomHandler.<b>reflexive</b> = true;
                    </code>
                </div>
            </div>

            <a href="#scrollwheel" class="btn btn-primary">next</a>
        </div>
        <div class="item" id="scrollwheel">
            <h3>Zooming with the scroll wheel (beta)</h3>
            <p>By default, desktop users can zoom in and out using the scroll wheel.
                This functionality sometimes might not be needed on desktop &dash; or you don't want to get in the way
                of scrolling through the page &dash; in which case you can set the <code>isScrollZoomEnabled</code>
                flag to <code>false</code>.</p>

            <div class="test square-demo-container">
                <div class="square teal" id="demo4_square"></div>
            </div>

            <div class="Rparent">
                <div class="R Ximin1 Ximedium2">
                    <h4>TypeScript</h4>
                    <code class="language-ts" data-lang="ts">
pinchToZoomHandler = <b>allowPinchToZoom(square)</b>;

pinchToZoomHandler.<b>isScrollZoomEnabled</b> = false;
                    </code>
                </div>
                <div class="R Ximin1 Ximedium2">
                    <h4>JavaScript</h4>
                    <code class="language-js" data-lang="js">
pinchToZoomHandler = <b>allowPinchToZoom(square)</b>;

pinchToZoomHandler.<b>isScrollZoomEnabled</b> = false;
                    </code>
                </div>
            </div>

            <a href="#top" class="btn btn-primary">Back to top</a>
        </div>
    </div>
	
	<script async defer src="assets/script.js" ></script>
	<script async defer src="../assets/js/autotype.js"></script>
	<script async defer src="../assets/js/global_scripts.js"></script>
    <script async defer src="assets/pinchtozoom_demos.js" type="module"></script>
</body>

</html>