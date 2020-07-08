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

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
	<link rel="stylesheet" href="../assets/css/global_styles.css">
	<link rel="stylesheet" href="assets/repo.css">
</head>

<body>
	<!-- these scripts are needed immediately to animate page load -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
	
	<?php createHeader("Adil's Repo"); ?>
	
	<div class="item container">
		<h3>rvalues.css</h3>
		<p>A simple stylesheet for responsive layouts.</p>
		<div><code class="language-html" data-lang="html">&lt;link href="https://adil.hanney.org/repo/rvalues.css" rel="stylesheet"&gt;</code></div>
		<a href="rvalues_css.php" class="btn btn-link">more</a>
	</div>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous" async></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous" async></script>
	<script async defer src="assets/script.js" ></script>
	<script async defer src="../assets/js/autotype.js"></script>
	<script async defer src="../assets/js/global_scripts.js"></script>
</body>

</html>