<?php include_once "../global_tools.php"; ?>
<!doctype html>
<html lang="en">

<head>
	<?php
	createHead(
		"Adil's Repo",
		"A repo containing a simple stylesheet for responsive layouts.",
		"https://adil.hanney.org/repo/previews/index.png",
        null,
		"2021-01-24",
		"Text"
	);
	?>

    <link href="/assets/ext/bootstrap.5.1.3.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/global_styles.css">
	<link rel="stylesheet" href="assets/repo.css">
</head>

<body>
	<!-- these scripts are needed immediately to animate page load -->
    <?php customThemeScripts(); ?>
	<script src="/assets/ext/jquery.3.6.0.min.js"></script>
	<script src="/assets/ext/js.cookie.2.2.1.min.js"></script>
	
	<?php createHeader(); ?>

    <div class="container">
        <a href="PinchToZoom_js.php" class="item">
            <h3>PinchToZoom.js</h3>
            <p>A script to allow custom touch-screen pinch to zoom functionality on an element-by-element basis rather than zooming the whole page.</p>
            <p class="mb-0">Todo:</p>
            <ul>
                <li>Support zooming with mouse scroll</li>
            </ul>
            <div><code class="language-html" data-lang="html">&lt;script src="https://adil.hanney.org/repo/PinchToZoom.js" type="module"&gt;&lt;/script&gt;</code></div>
            <br>
            <button type="button" class="btn btn-primary">Click here for more</button>
        </a>
    </div>

    <div class="container">
        <a href="rvalues_css.php" class="item">
            <h3>rvalues.css</h3>
            <p>A simple stylesheet for facilitating responsive layouts.</p>
            <p class="alert">2022 Update: This uses a bootstrap-like approach to dividing widths/heights, whereas
                nowadays you may get much better use out of a
                "<code class="language-css" data-lang="css">display: flex;</code>"
                based approach.</p>
            <div><code class="language-html" data-lang="html">&lt;link href="https://adil.hanney.org/repo/rvalues.css" rel="stylesheet"&gt;</code></div>
            <br>
            <button type="button" class="btn btn-primary">Click here for more</button>
        </a>
    </div>
	
	<script async defer src="assets/script.js" ></script>
	<script async defer src="../assets/js/autotype.js"></script>
	<script async defer src="../assets/js/global_scripts.js"></script>
</body>

</html>