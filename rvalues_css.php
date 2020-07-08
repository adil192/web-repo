<?php include_once "../create_meta_tags.php"; ?>
<!doctype html>
<html lang="en">

<head>
	<?php
	create_meta_tags(
		$title="rvalues.css",
		$desc="A simple stylesheet for responsive layouts.",
		$image="https://adil.hanney.org/repo/previews/rvalues_css.png"
	);
	?>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
	<link rel="stylesheet" href="/assets/css/global_styles.css">
	<link rel="stylesheet" href="assets/repo.css">
	<link rel="stylesheet" href="assets/tests.css">
	<link rel="stylesheet" href="rvalues.css">

	<title>rvalues.css</title>
</head>

<body>
	<!-- these scripts are needed immediately to animate page load -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
	<script src="assets/pageload.js"></script>
	
	<div class="sliding">
		<a class="btn btn-link btn-back" href="./">❮</a>
		<div class="sliding-box">
			<h1 class="auto-type" data-auto-type-text="rvalues.css" data-auto-type-avg-delay="150"
			><!--[if !IE]><!--><noscript><!--<![endif]-->rvalues.css<!--[if !IE]><!--></noscript><!--<![endif]--><!--
			--><!--[if !IE]><!--><script class="temporary">
                    let previous_sliding_text = Cookies.get('previous_sliding_text'); Cookies.remove('previous_sliding_text');
                    if (previous_sliding_text) document.write(previous_sliding_text);
                    Cookies.set('previous_sliding_text', "rvalues.css", { expires: 1 });
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
		<p>CSS: <a href="rvalues.css">rvalues.css</a>
			<br>SCSS: <a href="rvalues.scss">rvalues.scss</a></p>
		<a href="#screenprint" class="btn btn-link">next</a>
	</div>
	<div class="item container" id="screenprint">
		<h3>Screen and print</h3>
		<p>Try printing this page to see the difference...</p>
		<div class="Rparent">
			<div class="Ximin1 Xismall2">
				<code>.screenonly/.noprint</code>
				<p>Elements with these classes will <strong>not</strong> show up when printing.</p>
			</div>
			<div class="Ximin1 Xismall2">
				<code>.printonly/.noscreen</code>
				<p>Elements with these classes will <strong>only</strong> show up when printing.</p>
			</div>
		</div>
		<hr>
		<div class="Rparent">
			<div class="Ximin1 Xismall2">
				<div><code>&lt;p class="printonly"&gt;This is .printonly&lt;/p&gt;</code></div>
				<div><code>&lt;p class="screenonly"&gt;This is .screenonly&lt;/p&gt;</code></div>
				<div><code>&lt;p class="noscreen"&gt;This is .noscreen&lt;/p&gt;</code></div>
				<div><code>&lt;p class="noprint"&gt;This is .noprint&lt;/p&gt;</code></div>
			</div>
			<div class="Ximin1 Xismall2 no-child-margins">
				<small>Output:</small>
				<p class="printonly">This is .printonly</p>
				<p class="screenonly">This is .screenonly</p>
				<p class="noscreen">This is .noscreen</p>
				<p class="noprint">This is .noprint</p>
			</div>
		</div>
		<a href="#scrolling" class="btn btn-link">next</a>
	</div>
	<div class="item container" id="scrolling">
		<h3>Scrolling</h3>
		<p>By default, rvalues.css applies this rule to all elements:</p>
		<div><code>* {</code></div>
		<div><code><indent></indent>scroll-behavior: smooth;</code></div>
		<div><code><indent></indent>transition: all 0.1s ease-in-out;</code></div>
		<div><code>}</code></div>
		<p>This means if you click a button like <a href="#rparents">this one</a> it will smoothly scroll to the specified element (the next section in this case).
			<br>If you don't like the transition rule, it has a low specificity so it can be easily overridden.</p>
		<a href="#rparents" class="btn btn-link">next</a>
	</div>
	<div class="item container" id="rparents">
		<h3>Spacing issues</h3>
		<p>If we format our html normally, there will be small gaps between <code>display: inline-block;</code> elements due to whitespace (like linebreaks).
		<a href="https://css-tricks.com/fighting-the-space-between-inline-block-elements/">read more...</a></p>
		<p>Problem:</p>
		<div class="Rparent">
			<div class="Ximin1 Xismall2">
				<dull>
					<div><code>&lt;div class="<focus>Ximin4</focus> blue"&gt; imin4 &lt;/div&gt;</code></div>
					<div><code>&lt;div class="<focus>Ximin4</focus> red"&gt; imin4 &lt;/div&gt;</code></div>
					<div><code>&lt;div class="<focus>Ximin4</focus> purple"&gt; imin4 &lt;/div&gt;</code></div>
					<div><code>&lt;div class="<focus>Ximin4</focus> teal"&gt; imin4 &lt;/div&gt;</code></div>
				</dull>
			</div>
			<div class="Ximin1 Xismall2">
				<div class="test smaller">
					<div class="Ximin4 blue">imin4</div>
					<div class="Ximin4 red">imin4</div>
					<div class="Ximin4 purple">imin4</div>
					<div class="Ximin4 teal">imin4</div>
				</div>
			</div>
		</div>
		<p>There are three ways to go around this...</p>
		<p>1. Removing space between elements: <small class="Ximin1 Xasmall">This can hurt readability.</small></p>
		<div class="Rparent">
			<div class="Ximin1 Xismall2">
				<code>
					<dull>
						&lt;div class="Ximin4 blue"&gt; imin4
						<focus>&lt;/div&gt;&lt;div</focus>
						class="Ximin4 red"&gt; imin4
						<focus>&lt;/div&gt;&lt;div</focus>
						class="Ximin4 purple"&gt; imin4
						<focus>&lt;/div&gt;&lt;div</focus>
						class="Ximin4 teal"&gt; imin4 &lt;/div&gt;
					</dull>
				</code>
			</div>
			<div class="Ximin1 Xismall2">
				<div class="test smaller">
					<div class="Ximin4 blue">imin4</div><div class="Ximin4 red">imin4</div><div class="Ximin4 purple">imin4</div><div class="Ximin4 teal">imin4</div>
				</div>
			</div>
		</div>
		<p>2. Using comments: <small class="Ximin1 Xasmall">Make sure there's no space between the comments and elements.</small></p>
		<div class="Rparent">
			<div class="Ximin1 Xismall2">
				<div><code><dull>&lt;div class="Ximin4 blue"&gt; imin4 &lt;/div&gt;</dull>&lt;!--</code></div>
				<div><code>--&gt;<dull>&lt;div class="Ximin4 red"&gt; imin4 &lt;/div&gt;</dull>&lt;!--</code></div>
				<div><code>--&gt;<dull>&lt;div class="Ximin4 purple"&gt; imin4 &lt;/div&gt;</dull>&lt;!--</code></div>
				<div><code>--&gt;<dull>&lt;div class="Ximin4 teal"&gt; imin4 &lt;/div&gt;</dull></code></div>
			</div>
			<div class="Ximin1 Xismall2">
				<div class="test smaller">
					<div class="Ximin4 blue">imin4</div><!--
					--><div class="Ximin4 red">imin4</div><!--
					--><div class="Ximin4 purple">imin4</div><!--
					--><div class="Ximin4 teal">imin4</div>
				</div>
			</div>
		</div>
		<p>3. Using <code>.Rparent</code>: <small class="Ximin1 Xasmall">This might mess with font-sizes.</small></p>
		<div class="Rparent">
			<div class="Ximin1 Xismall2">
				<div><code>&lt;div class="Rparent"&gt;</code></div>
				<dull>
					<div><code><indent></indent>&lt;div class="Ximin4 blue"&gt; imin4 &lt;/div&gt;</code></div>
					<div><code><indent></indent>&lt;div class="Ximin4 red"&gt; imin4 &lt;/div&gt;</code></div>
					<div><code><indent></indent>&lt;div class="Ximin4 purple"&gt; imin4 &lt;/div&gt;</code></div>
					<div><code><indent></indent>&lt;div class="Ximin4 teal"&gt; imin4 &lt;/div&gt;</code></div>
				</dull>
				<div><code>&lt;/div&gt;</code></div>
			</div>
			<div class="Ximin1 Xismall2">
				<div class="test smaller Rparent">
					<div class="Ximin4 blue">imin4</div>
					<div class="Ximin4 red">imin4</div>
					<div class="Ximin4 purple">imin4</div>
					<div class="Ximin4 teal">imin4</div>
				</div>
			</div>
		</div>
		<a href="#namingscheme" class="btn btn-link">next</a>
	</div>
	<div class="item container" id="namingscheme">
		<h3>0) Responsive layout naming scheme</h3>
		<div><code>.{X/Y}{prefix}{width}{arg?}</code></div>
		<br>
		<ul>
			<li><a href="#xandy">1) X and Y</a></li>
			<li><a href="#prefix">2) Prefix</a></li>
			<li><a href="#widths">3) Widths</a></li>
			<li><a href="#args">4) Arguments</a></li>
		</ul>
		<a href="#xandy" class="btn btn-link">next</a>
	</div>
	<div class="item container" id="xandy">
		<h3>1) X and Y</h3>
		<p>X is for width and Y is for height.</p>
		<div class="Rparent">
			<div class="Ximin1 Xismall2">
				<div><code>.Ximin2</code></div>
				<div class="test Rparent" style="height: 200px;">
					<div class="Ximin2 Yimin1 blue"></div>
					<div class="Ximin2 Yimin1 red"></div>
				</div>
			</div>
			<div class="Ximin1 Xismall2">
				<div><code>.Yimin2</code></div>
				<div class="test Rparent" style="height: 200px;">
					<div class="Yimin2 blue"></div>
					<div class="Yimin2 red"></div>
				</div>
			</div>
		</div>
		<p>We will be focussing on X in this page but Y is exactly the same.</p>
		<a href="#prefix" class="btn btn-link">next</a>
	</div>
	<div class="item container" id="prefix">
		<h3>2) Prefix</h3>
		<div class="Rparent">
			<div class="Ximin1 Xismall2">
				<div><code>.Ximin2</code></div>
				<p>items - there will be N items that can fit
					<br>this example would fit 2 items / 50% each</p>
				<div class="test Rparent">
					<div class="Ximin2 green"></div>
					<div class="Ximin2 purple"></div>
				</div>
			</div>
			<div class="Ximin1 Xismall2">
				<div><code>.Xpmin50</code></div>
				<p>percent - pretty self explanatory</p>
				<div class="test Rparent">
					<div class="Xpmin50 green"></div>
					<div class="Xpmin50 purple"></div>
				</div>
			</div>
			<div class="Ximin1 Xismall2">
				<div><code>.Xrmin6</code></div>
				<p>responsive - based off of the bootstrap columns
					<br>this example is 6/12 columns / 50% each</p>
				<div class="test Rparent">
					<div class="Xrmin6 green"></div>
					<div class="Xrmin6 purple"></div>
				</div>
			</div>
			<div class="Ximin1 Xismall2">
				<div><code>.Xamin</code></div>
				<p>auto - use this to undo specific widths, such as filling the screen on a phone but auto-sizing on a desktop
					<br>this does not use any arguments <a href="#args">(4)</a></p>
				<div class="test Rparent">
					<div class="Xamin green">example</div>
					<div class="Xamin purple">text</div>
				</div>
			</div>
		</div>
		<a href="#widths" class="btn btn-link">next</a>
	</div>
	<div class="item container" id="widths">
		<h3>3) Widths</h3>
		<p>we can resize content based on how wide the user's screen/browser is.
			<br>try viewing this on different devices, or resize your browser window...</p>
		<div class="Rparent">
			<div class="Ximin1 Xismall2">
				<div><code>.Ximin1</code></div>
				<p>min - this will be applied on all devices</p>
				<div class="test Rparent">
					<div class="Ximin1 blue"></div>
					<div class="Ximin1 red"></div>
					<div class="Ximin1 green"></div>
					<div class="Ximin1 purple"></div>
				</div>
			</div>
			<div class="Ximin1 Xismall2">
				<div><code><dull>.Ximin1</dull>.Xismall2</code></div>
				<p>small - this will be applied on 'small' devices (768px wide and bigger)</p>
				<div class="test Rparent">
					<div class="Ximin1 Xismall2 blue"></div>
					<div class="Ximin1 Xismall2 red"></div>
					<div class="Ximin1 Xismall2 green"></div>
					<div class="Ximin1 Xismall2 purple"></div>
				</div>
			</div>
			<div class="Ximin1 Xismall2">
				<div><code><dull>.Ximin1.Xismall2</dull>.Ximedium3</code></div>
				<p>medium - this will be applied on 'medium' devices (992px wide and bigger)</p>
				<div class="test Rparent">
					<div class="Ximin1 Xismall2 Ximedium3 blue"></div>
					<div class="Ximin1 Xismall2 Ximedium3 red"></div>
					<div class="Ximin1 Xismall2 Ximedium3 green"></div>
					<div class="Ximin1 Xismall2 Ximedium3 purple"></div>
				</div>
			</div>
			<div class="Ximin1 Xismall2">
				<div><code><dull>.Ximin1.Xismall2.Ximedium3</dull>.Xilarge4</code></div>
				<p>large - this will be applied on 'large' devices (1500px wide and bigger)</p>
				<div class="test Rparent">
					<div class="Ximin1 Xismall2 Ximedium3 Xilarge4 blue"></div>
					<div class="Ximin1 Xismall2 Ximedium3 Xilarge4 red"></div>
					<div class="Ximin1 Xismall2 Ximedium3 Xilarge4 green"></div>
					<div class="Ximin1 Xismall2 Ximedium3 Xilarge4 purple"></div>
				</div>
			</div>
		</div>
		<a href="#args" class="btn btn-link">next</a>
	</div>
	<div class="item container" id="args">
		<h3>4) Arguments</h3>
		<div class="Rparent">
			<div class="Ximin1 Xismall2">
				<div><code>.Ximin$</code></div>
				<p>0-12 <code>i</code>tems</p>
				<div class="form-group">
					<input type="range" min="0" max="12" value="4" class="form-control-range" id="itemsRange" onInput="itemsRange(this);">
				</div>
				<code id="itemsRangeLabel">.Ximin4</code>
				<div class="test Rparent" id="itemsRangeTest">
					<div class="Ximin4 blue" data-color="blue"></div>
					<div class="Ximin4 red" data-color="red"></div>
					<div class="Ximin4 green" data-color="green"></div>
					<div class="Ximin4 purple" data-color="purple"></div>
					<div class="Ximin4 orange" data-color="orange"></div>
					<div class="Ximin4 teal" data-color="teal"></div>
					<div class="Ximin4 blue" data-color="blue"></div>
					<div class="Ximin4 red" data-color="red"></div>
					<div class="Ximin4 green" data-color="green"></div>
					<div class="Ximin4 purple" data-color="purple"></div>
					<div class="Ximin4 orange" data-color="orange"></div>
					<div class="Ximin4 teal" data-color="teal"></div>
				</div>
			</div>
			<div class="Ximin1 Xismall2">
				<div><code>.Xpmin$</code></div>
				<p>0-100 <code>p</code>ercent</p>
				<div class="form-group">
					<input type="range" min="0" max="100" step="10" value="20" class="form-control-range" id="percentsRange" onInput="percentsRange(this);">
				</div>
				<code id="percentsRangeLabel">.Xpmin20</code>
				<div class="test Rparent" id="percentsRangeTest">
					<div class="Xpmin20 blue" data-color="blue"></div>
					<div class="Xpmin20 red" data-color="red"></div>
					<div class="Xpmin20 green" data-color="green"></div>
					<div class="Xpmin20 purple" data-color="purple"></div>
					<div class="Xpmin20 orange" data-color="orange"></div>
					<div class="Xpmin20 teal" data-color="teal"></div>
					<div class="Xpmin20 blue" data-color="blue"></div>
					<div class="Xpmin20 red" data-color="red"></div>
					<div class="Xpmin20 green" data-color="green"></div>
					<div class="Xpmin20 purple" data-color="purple"></div>
					<div class="Xpmin20 orange" data-color="orange"></div>
					<div class="Xpmin20 teal" data-color="teal"></div>
				</div>
			</div>
			<div class="Ximin1 Xismall2">
				<div><code>.Xrmin$</code></div>
				<p>An element with this class spans <code>$</code> out of 12 columns. This mimics the columns used in Bootstrap.</p>
				<div class="form-group">
					<input type="range" min="0" max="12" value="3" class="form-control-range" id="colsRange" onInput="colsRange(this);">
				</div>
				<code id="colsRangeLabel">.Xrmin3</code>
				<div class="test Rparent" id="colsRangeTest">
					<div class="Xrmin3 blue" data-color="blue"></div>
					<div class="Xrmin3 red" data-color="red"></div>
					<div class="Xrmin3 green" data-color="green"></div>
					<div class="Xrmin3 purple" data-color="purple"></div>
					<div class="Xrmin3 orange" data-color="orange"></div>
					<div class="Xrmin3 teal" data-color="teal"></div>
					<div class="Xrmin3 blue" data-color="blue"></div>
					<div class="Xrmin3 red" data-color="red"></div>
					<div class="Xrmin3 green" data-color="green"></div>
					<div class="Xrmin3 purple" data-color="purple"></div>
					<div class="Xrmin3 orange" data-color="orange"></div>
					<div class="Xrmin3 teal" data-color="teal"></div>
				</div>
			</div>
			<div class="Ximin1 Xismall2">
				<div><code>.Ximin2.Xasmall</code></div>
				<p>Setting the width to <code>a</code>uto does not need any arguments</p>
				<div class="test Rparent">
					<div class="Ximin2 Xasmall blue">the</div>
					<div class="Ximin2 Xasmall red">quick</div>
					<div class="Ximin2 Xasmall green">brown</div>
					<div class="Ximin2 Xasmall purple">fox</div>
					<div class="Ximin2 Xasmall orange">jumps</div>
					<div class="Ximin2 Xasmall teal">over</div>
					<div class="Ximin2 Xasmall blue">the</div>
					<div class="Ximin2 Xasmall red">lazy</div>
					<div class="Ximin2 Xasmall green">dog</div>
					<div class="Ximin2 Xasmall purple">and</div>
					<div class="Ximin2 Xasmall orange">more</div>
					<div class="Ximin2 Xasmall teal">text</div>
				</div>
			</div>
		</div>
		<a href="#namingscheme" class="btn btn-link">next</a>
	</div>
	
	<script async defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script async defer src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script async defer src="assets/script.js" ></script>
	<script async defer src="../assets/js/autotype.js"></script>
	<script async defer src="../assets/js/global_scripts.js"></script>
</body>

</html>