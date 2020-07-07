/*$(function() {
	// START circle transition to new link on <a> click
	$("a.transitionlink").each(function() {
		var thislink = $(this);
		var thiscircle = $(".transitioncircle", this);

		thislink.on('click', function(e) {
			e.preventDefault();
			//var new_diameter = Math.max(window.outerWidth, window.outerHeight) * 2;
			var new_diameter = Math.sqrt(Math.pow(window.outerWidth,2) + Math.pow(window.outerHeight,2)) * 2; // pythagoras
			console.log(new_diameter);
			thiscircle.css("--zoomed-diameter", new_diameter+"px");
			thiscircle.css("animation", "1s zoomIn");
			thiscircle.css("z-index", 50).css("width", new_diameter).css("height", new_diameter);
			$("html, body").css("overflow", "hidden");
			setTimeout(function() {
				var offset = thislink.offset();
				var w = thislink.width(), h = thislink.height();
				console.log(w, h);
				Cookies.set('o_top', offset.top + h/2, { expires: 1 });
				Cookies.set('o_left', offset.left + w/2, { expires: 1 });
				Cookies.set('diameter', new_diameter, { expires: 1 });
				window.location.href = thislink.attr("href");
			}, 1000);
		});
	});
	// END circle transition to new link on <a> click
});*/


function itemsRange(slider) {
	var newclass = "Ximin" + $(slider).val();
	$("#itemsRangeLabel").text("."+newclass);
	$("div", "#itemsRangeTest").each(function() {
		var box = $(this);
		box.removeClass().addClass(newclass).addClass(box.data("color"));
	});
}
function percentsRange(slider) {
	var newclass = "Xpmin" + $(slider).val();
	$("#percentsRangeLabel").text("."+newclass);
	$("div", "#percentsRangeTest").each(function() {
		var box = $(this);
		box.removeClass().addClass(newclass).addClass(box.data("color"));
	});
}
function colsRange(slider) {
	var newclass = "Xrmin" + $(slider).val();
	$("#colsRangeLabel").text("."+newclass);
	$("div", "#colsRangeTest").each(function() {
		var box = $(this);
		box.removeClass().addClass(newclass).addClass(box.data("color"));
	});
}