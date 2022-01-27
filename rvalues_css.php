<?php include_once "../global_tools.php"; ?>
<!doctype html>
<html lang="en">

<head>
	<?php
	createHead(
		"rvalues.css",
		"A simple stylesheet for responsive layouts.",
		"https://adil.hanney.org/repo/previews/rvalues_css.png",
        null
	);
	?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="../assets/css/global_styles.css">
	<link rel="stylesheet" href="assets/repo.css">
	<link rel="stylesheet" href="assets/tests.css">
	<link rel="stylesheet" href="rvalues.css">
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
		<p>CSS: <a href="rvalues.css">rvalues.css</a>
			<br>SCSS: <a href="rvalues.scss">rvalues.scss</a></p>
		<a href="#screenprint" class="btn btn-primary">next</a>
	</div>
	<div class="item container" id="screenprint">
		<h3>Screen and print</h3>
		<p>Try printing this page to see the difference...</p>
		<div class="Rparent">
			<div class="R Ximin1 Xismall2 Xiprint2">
				<code>.screenonly/.noprint</code>
				<p>Elements with these classes will <strong>not</strong> show up when printing.</p>
			</div>
			<div class="R Ximin1 Xismall2 Xiprint2">
				<code>.printonly/.noscreen</code>
				<p>Elements with these classes will <strong>only</strong> show up when printing.</p>
			</div>
		</div>
		<hr class="noprint">
		<div class="Rparent">
			<div class="R Ximin1 Xismall2">
				<div><code>&lt;p class="printonly"&gt;This is .printonly&lt;/p&gt;</code></div>
				<div><code>&lt;p class="screenonly"&gt;This is .screenonly&lt;/p&gt;</code></div>
				<div><code>&lt;p class="noscreen"&gt;This is .noscreen&lt;/p&gt;</code></div>
				<div><code>&lt;p class="noprint"&gt;This is .noprint&lt;/p&gt;</code></div>
			</div>
			<div class="R Ximin1 Xismall2 no-child-margins">
				<small>Output:</small>
				<p class="printonly">This is .printonly</p>
				<p class="screenonly">This is .screenonly</p>
				<p class="noscreen">This is .noscreen</p>
				<p class="noprint">This is .noprint</p>
			</div>
		</div>
		<a href="#scrolling" class="btn btn-primary">next</a>
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
		<a href="#rparents" class="btn btn-primary">next</a>
	</div>
	<div class="item container" id="rparents">
		<h3>Spacing issues</h3>
		<p>If we format our html normally, there will be small gaps between <code>display: inline-block;</code> elements due to whitespace (like linebreaks).
		<a href="https://css-tricks.com/fighting-the-space-between-inline-block-elements/">read more...</a></p>
		<p>Problem:</p>
		<div class="Rparent">
			<div class="R Ximin1 Xismall2">
				<dull>
					<div><code>&lt;div class="<focus>R Ximin4</focus> blue"&gt; imin4 &lt;/div&gt;</code></div>
					<div><code>&lt;div class="<focus>R Ximin4</focus> red"&gt; imin4 &lt;/div&gt;</code></div>
					<div><code>&lt;div class="<focus>R Ximin4</focus> purple"&gt; imin4 &lt;/div&gt;</code></div>
					<div><code>&lt;div class="<focus>R Ximin4</focus> teal"&gt; imin4 &lt;/div&gt;</code></div>
				</dull>
			</div>
			<div class="R Ximin1 Xismall2">
				<div class="test smaller">
					<div class="R Ximin4 blue">imin4</div>
					<div class="R Ximin4 red">imin4</div>
					<div class="R Ximin4 purple">imin4</div>
					<div class="R Ximin4 teal">imin4</div>
				</div>
			</div>
		</div>
		<p>There are three ways to go around this...</p>
		<p>1. Removing space between elements: <small class="R Ximin1 Xasmall">This can hurt readability.</small></p>
		<div class="Rparent">
			<div class="R Ximin1 Xismall2">
				<code>
					<dull>
						&lt;div class="R Ximin4 blue"&gt; imin4
						<focus>&lt;/div&gt;&lt;div</focus>
						class="R Ximin4 red"&gt; imin4
						<focus>&lt;/div&gt;&lt;div</focus>
						class="R Ximin4 purple"&gt; imin4
						<focus>&lt;/div&gt;&lt;div</focus>
						class="R Ximin4 teal"&gt; imin4 &lt;/div&gt;
					</dull>
				</code>
			</div>
			<div class="R Ximin1 Xismall2">
				<div class="test smaller">
					<div class="R Ximin4 blue">imin4</div><div class="R Ximin4 red">imin4</div><div class="R Ximin4 purple">imin4</div><div class="R Ximin4 teal">imin4</div>
				</div>
			</div>
		</div>
		<p>2. Using comments: <small class="R Ximin1 Xasmall">Make sure there's no space between the comments and elements.</small></p>
		<div class="Rparent">
			<div class="R Ximin1 Xismall2">
				<div><code><dull>&lt;div class="R Ximin4 blue"&gt; imin4 &lt;/div&gt;</dull>&lt;!--</code></div>
				<div><code>--&gt;<dull>&lt;div class="R Ximin4 red"&gt; imin4 &lt;/div&gt;</dull>&lt;!--</code></div>
				<div><code>--&gt;<dull>&lt;div class="R Ximin4 purple"&gt; imin4 &lt;/div&gt;</dull>&lt;!--</code></div>
				<div><code>--&gt;<dull>&lt;div class="R Ximin4 teal"&gt; imin4 &lt;/div&gt;</dull></code></div>
			</div>
			<div class="R Ximin1 Xismall2">
				<div class="test smaller">
					<div class="R Ximin4 blue">imin4</div><!--
					--><div class="R Ximin4 red">imin4</div><!--
					--><div class="R Ximin4 purple">imin4</div><!--
					--><div class="R Ximin4 teal">imin4</div>
				</div>
			</div>
		</div>
		<p>3. Using <code>.Rparent</code>: <small class="R Ximin1 Xasmall">This might mess with font-sizes.</small></p>
		<div class="Rparent">
			<div class="R Ximin1 Xismall2">
				<div><code>&lt;div class="Rparent"&gt;</code></div>
				<dull>
					<div><code><indent></indent>&lt;div class="R Ximin4 blue"&gt; imin4 &lt;/div&gt;</code></div>
					<div><code><indent></indent>&lt;div class="R Ximin4 red"&gt; imin4 &lt;/div&gt;</code></div>
					<div><code><indent></indent>&lt;div class="R Ximin4 purple"&gt; imin4 &lt;/div&gt;</code></div>
					<div><code><indent></indent>&lt;div class="R Ximin4 teal"&gt; imin4 &lt;/div&gt;</code></div>
				</dull>
				<div><code>&lt;/div&gt;</code></div>
			</div>
			<div class="R Ximin1 Xismall2">
				<div class="test smaller Rparent">
					<div class="R Ximin4 blue">imin4</div>
					<div class="R Ximin4 red">imin4</div>
					<div class="R Ximin4 purple">imin4</div>
					<div class="R Ximin4 teal">imin4</div>
				</div>
			</div>
		</div>
		<a href="#namingscheme" class="btn btn-primary">next</a>
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
		<a href="#xandy" class="btn btn-primary">next</a>
	</div>
	<div class="item container" id="xandy">
		<h3>1) X and Y</h3>
		<p>X is for width and Y is for height.</p>
		<div class="Rparent">
			<div class="R Ximin1 Xismall2">
				<div><code>.Ximin2</code></div>
				<div class="test test-set-height Rparent">
					<div class="R Ximin2 Yimin1 blue"></div>
					<div class="R Ximin2 Yimin1 red"></div>
				</div>
			</div>
			<div class="R Ximin1 Xismall2">
				<div><code>.Yimin2</code></div>
				<div class="test test-set-height Rparent">
					<div class="R Yimin2 blue"></div>
					<div class="R Yimin2 red"></div>
				</div>
			</div>
		</div>
		<p>We will be focussing on X in this page but Y is exactly the same.</p>
		<a href="#prefix" class="btn btn-primary">next</a>
	</div>
	<div class="item container" id="prefix">
		<h3>2) Prefix</h3>
		<div class="Rparent">
			<div class="R Ximin1 Xismall2">
				<div><code>.Ximin2</code></div>
				<p>items - there will be N items that can fit
					<br>this example would fit 2 items / 50% each</p>
				<div class="test Rparent">
					<div class="R Ximin2 green"></div>
					<div class="R Ximin2 purple"></div>
				</div>
			</div>
			<div class="R Ximin1 Xismall2">
				<div><code>.Xpmin50</code></div>
				<p>percent - pretty self explanatory</p>
				<div class="test Rparent">
					<div class="R Xpmin50 green"></div>
					<div class="R Xpmin50 purple"></div>
				</div>
			</div>
			<div class="R Ximin1 Xismall2">
				<div><code>.Xrmin6</code></div>
				<p>responsive - based off of the bootstrap columns
					<br>this example is 6/12 columns / 50% each</p>
				<div class="test Rparent">
					<div class="R Xrmin6 green"></div>
					<div class="R Xrmin6 purple"></div>
				</div>
			</div>
			<div class="R Ximin1 Xismall2">
				<div><code>.Xamin</code></div>
				<p>auto - use this to undo specific widths, such as filling the screen on a phone but auto-sizing on a desktop
					<br>this does not use any arguments <a href="#args">(4)</a></p>
				<div class="test Rparent">
					<div class="R Xamin green">example</div>
					<div class="R Xamin purple">text</div>
				</div>
			</div>
		</div>
		<a href="#widths" class="btn btn-primary">next</a>
	</div>
	<div class="item container" id="widths">
		<h3>3) Widths</h3>
        <p>We can resize content based on how wide the user's screen/browser is.</p>

		<p class="screenonly">Try viewing this on different devices, or resize your browser window...</p>
        <p class="printonly">Note: this has been disabled to better format the printed webpage.</p>

		<div class="Rparent">
			<div class="R Ximin1 Xismall2">
				<div><code>.Ximin1</code></div>
				<p>min - this will be applied on all devices</p>
				<div class="test Rparent">
					<div class="R Ximin1 Xiprint4 blue"></div>
					<div class="R Ximin1 Xiprint4 red"></div>
					<div class="R Ximin1 Xiprint4 green"></div>
					<div class="R Ximin1 Xiprint4 purple"></div>
				</div>
			</div>
			<div class="R Ximin1 Xismall2">
				<div><code><dull>.Ximin1</dull>.Xismall2</code></div>
				<p>small - this will be applied on 'small' devices (768px wide and bigger)</p>
				<div class="test Rparent">
					<div class="R Ximin1 Xismall2 Xiprint4 blue"></div>
					<div class="R Ximin1 Xismall2 Xiprint4 red"></div>
					<div class="R Ximin1 Xismall2 Xiprint4 green"></div>
					<div class="R Ximin1 Xismall2 Xiprint4 purple"></div>
				</div>
			</div>
			<div class="R Ximin1 Xismall2">
				<div><code><dull>.Ximin1.Xismall2</dull>.Ximedium3</code></div>
				<p>medium - this will be applied on 'medium' devices (992px wide and bigger)</p>
				<div class="test Rparent">
					<div class="R Ximin1 Xismall2 Ximedium3 Xiprint4 blue"></div>
					<div class="R Ximin1 Xismall2 Ximedium3 Xiprint4 red"></div>
					<div class="R Ximin1 Xismall2 Ximedium3 Xiprint4 green"></div>
					<div class="R Ximin1 Xismall2 Ximedium3 Xiprint4 purple"></div>
				</div>
			</div>
			<div class="R Ximin1 Xismall2">
				<div><code><dull>.Ximin1.Xismall2.Ximedium3</dull>.Xilarge4</code></div>
				<p>large - this will be applied on 'large' devices (1500px wide and bigger)</p>
				<div class="test Rparent">
					<div class="R Ximin1 Xismall2 Ximedium3 Xilarge4 Xiprint4 blue"></div>
					<div class="R Ximin1 Xismall2 Ximedium3 Xilarge4 Xiprint4 red"></div>
					<div class="R Ximin1 Xismall2 Ximedium3 Xilarge4 Xiprint4 green"></div>
					<div class="R Ximin1 Xismall2 Ximedium3 Xilarge4 Xiprint4 purple"></div>
				</div>
			</div>
		</div>
		<a href="#args" class="btn btn-primary">next</a>
	</div>
	<div class="item container" id="args">
		<h3>4) Arguments</h3>
		<div class="Rparent">
			<div class="R Ximin1 Xismall2">
				<div><code>.Ximin$</code></div>
				<p>0-12 <code>i</code>tems</p>
				<div class="form-group noprint">
					<input type="range" min="0" max="12" value="4" class="form-control-range" id="itemsRange" onInput="itemsRange(this);">
				</div>
				<span class="printonly">e.g. &nbsp;</span><code id="itemsRangeLabel">.Ximin4</code>
				<div class="test Rparent" id="itemsRangeTest">
					<div class="R Ximin4 blue" data-color="blue"></div>
					<div class="R Ximin4 red" data-color="red"></div>
					<div class="R Ximin4 green" data-color="green"></div>
					<div class="R Ximin4 purple" data-color="purple"></div>
					<div class="R Ximin4 orange" data-color="orange"></div>
					<div class="R Ximin4 teal" data-color="teal"></div>
					<div class="R Ximin4 blue" data-color="blue"></div>
					<div class="R Ximin4 red" data-color="red"></div>
					<div class="R Ximin4 green" data-color="green"></div>
					<div class="R Ximin4 purple" data-color="purple"></div>
					<div class="R Ximin4 orange" data-color="orange"></div>
					<div class="R Ximin4 teal" data-color="teal"></div>
				</div>
			</div>
			<div class="R Ximin1 Xismall2">
				<div><code>.Xpmin$</code></div>
				<p>0-100 <code>p</code>ercent</p>
				<div class="form-group noprint">
					<input type="range" min="0" max="100" step="10" value="20" class="form-control-range" id="percentsRange" onInput="percentsRange(this);">
				</div>
                <span class="printonly">e.g. &nbsp;</span><code id="percentsRangeLabel">.Xpmin20</code>
				<div class="test Rparent" id="percentsRangeTest">
					<div class="R Xpmin20 blue" data-color="blue"></div>
					<div class="R Xpmin20 red" data-color="red"></div>
					<div class="R Xpmin20 green" data-color="green"></div>
					<div class="R Xpmin20 purple" data-color="purple"></div>
					<div class="R Xpmin20 orange" data-color="orange"></div>
					<div class="R Xpmin20 teal" data-color="teal"></div>
					<div class="R Xpmin20 blue" data-color="blue"></div>
					<div class="R Xpmin20 red" data-color="red"></div>
					<div class="R Xpmin20 green" data-color="green"></div>
					<div class="R Xpmin20 purple" data-color="purple"></div>
					<div class="R Xpmin20 orange" data-color="orange"></div>
					<div class="R Xpmin20 teal" data-color="teal"></div>
				</div>
			</div>
			<div class="R Ximin1 Xismall2">
				<div><code>.Xrmin$</code></div>
				<p>An element with this class spans <code>$</code> out of 12 columns. This mimics the columns used in Bootstrap.</p>
				<div class="form-group noprint">
					<input type="range" min="0" max="12" value="3" class="form-control-range" id="colsRange" onInput="colsRange(this);">
				</div>
                <span class="printonly">e.g. &nbsp;</span><code id="colsRangeLabel">.Xrmin3</code>
				<div class="test Rparent" id="colsRangeTest">
					<div class="R Xrmin3 blue" data-color="blue"></div>
					<div class="R Xrmin3 red" data-color="red"></div>
					<div class="R Xrmin3 green" data-color="green"></div>
					<div class="R Xrmin3 purple" data-color="purple"></div>
					<div class="R Xrmin3 orange" data-color="orange"></div>
					<div class="R Xrmin3 teal" data-color="teal"></div>
					<div class="R Xrmin3 blue" data-color="blue"></div>
					<div class="R Xrmin3 red" data-color="red"></div>
					<div class="R Xrmin3 green" data-color="green"></div>
					<div class="R Xrmin3 purple" data-color="purple"></div>
					<div class="R Xrmin3 orange" data-color="orange"></div>
					<div class="R Xrmin3 teal" data-color="teal"></div>
				</div>
			</div>
			<div class="R Ximin1 Xismall2">
				<div><code>.Ximin4.Xasmall</code></div>
				<p>Setting the width to <code>a</code>uto does not need any arguments</p>
				<div class="test Rparent">
					<div class="R Ximin4 Xasmall blue">the</div>
					<div class="R Ximin4 Xasmall red">quick</div>
					<div class="R Ximin4 Xasmall green">brown</div>
					<div class="R Ximin4 Xasmall purple">fox</div>
					<div class="R Ximin4 Xasmall orange">jumps</div>
					<div class="R Ximin4 Xasmall teal">over</div>
					<div class="R Ximin4 Xasmall blue">the</div>
					<div class="R Ximin4 Xasmall red">lazy</div>
					<div class="R Ximin4 Xasmall green">dog</div>
					<div class="R Ximin4 Xasmall purple">and</div>
					<div class="R Ximin4 Xasmall orange">more</div>
					<div class="R Ximin4 Xasmall teal">text</div>
				</div>
			</div>
		</div>
		<a href="#namingscheme" class="btn btn-primary">next</a>
	</div>
	
	<script async defer src="assets/script.js" ></script>
	<script async defer src="../assets/js/autotype.js"></script>
	<script async defer src="../assets/js/global_scripts.js"></script>
</body>

</html>