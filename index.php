<?php include_once "../create_meta_tags.php"; ?>
<!doctype html>
<html lang="en">

<head>
	<?php
	create_meta_tags(
		$title="Adil's Repo",
		$desc="A repo containing a simple stylesheet for responsive layouts.",
		$image="https://adil.hanney.org/repo/previews/index.png"
	);
	?>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
	<link rel="stylesheet" href="/assets/css/global_styles.css">
	<link rel="stylesheet" href="assets/repo.css">
</head>

<body>
	<!-- these scripts are needed immediately to animate page load -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
	
	<div class="sliding">
		<div class="sliding-box">
			<h1 class="auto-type" data-auto-type-text="Adil's Repo" data-auto-type-avg-delay="150"
			><!--[if !IE]><!--><noscript><!--<![endif]-->Adil's Repo<!--[if !IE]><!--></noscript><!--<![endif]--><!--
			--><!--[if !IE]><!--><script class="temporary">
                    let previous_sliding_text = Cookies.get('previous_sliding_text'); Cookies.remove('previous_sliding_text');
                    if (previous_sliding_text) document.write(previous_sliding_text);
                    Cookies.set('previous_sliding_text', "Adil's Repo", { expires: 1 });
				</script><!--<![endif]--></h1>
		</div>
		<div class="sliding-credit">
			<span data-nosnippet>Image by Simon Clayton from Pexels</span>
		</div>
	</div>
	
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