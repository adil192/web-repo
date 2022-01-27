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