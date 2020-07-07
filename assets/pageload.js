do {
	// offsets of previous link
	let o_top = Cookies.get('o_top'); Cookies.remove('o_top');
	let o_left = Cookies.get('o_left'); Cookies.remove('o_left');
	let diameter = Cookies.get('diameter'); Cookies.remove('diameter');

	if (!o_top || !o_left || !diameter) {
		console.log("will not animate page load");
		break;
	}

	let closingcircle = $("<span></span>");
	closingcircle.addClass("transitioncircle");
	closingcircle.css("--zoomed-diameter", diameter+"px");
	closingcircle.css("animation", "1s zoomOut");
	closingcircle.offset({top: o_top, left: o_left});

	$("html, body").css("overflow", "hidden");
	$("body").append(closingcircle);
	setTimeout(function() {
		$("html, body").css("overflow", "auto");
	}, 900);
} while (0);