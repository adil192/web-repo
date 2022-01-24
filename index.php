<?php include_once "../global_tools.php"; ?>
<!doctype html>
<html lang="en">

<head>
	<?php
	createHead(
		$title="Adil's Repo",
		$desc="A repo containing a simple stylesheet for responsive layouts.",
		$image="https://adil.hanney.org/repo/previews/index.png"
	);
	?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="../assets/css/global_styles.css">
	<link rel="stylesheet" href="assets/repo.css">
</head>

<body>
	<!-- these scripts are needed immediately to animate page load -->
    <?php customThemeScripts(); ?>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/js-cookie@2.2.1/src/js.cookie.min.js"></script>
	
	<?php createHeader(); ?>
	
	<div class="item container">
		<h3>rvalues.css</h3>
		<p>A simple stylesheet for responsive layouts.</p>
		<div><code class="language-html" data-lang="html">&lt;link href="https://adil.hanney.org/repo/rvalues.css" rel="stylesheet"&gt;</code></div>
		<a href="rvalues_css.php" class="btn btn-link">more</a>
	</div>
	
	<script async defer src="assets/script.js" ></script>
	<script async defer src="../assets/js/autotype.js"></script>
	<script async defer src="../assets/js/global_scripts.js"></script>
</body>

</html>