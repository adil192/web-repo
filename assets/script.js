function itemsRange(slider) {
	let newClass = "Ximin" + $(slider).val();
	$("#itemsRangeLabel").text("."+newClass);
	$("div", "#itemsRangeTest").each(function() {
		let box = $(this);
		box.removeClass().addClass(newClass).addClass(box.data("color"));
	});
}
function percentsRange(slider) {
	let newClass = "Xpmin" + $(slider).val();
	$("#percentsRangeLabel").text("."+newClass);
	$("div", "#percentsRangeTest").each(function() {
		let box = $(this);
		box.removeClass().addClass(newClass).addClass(box.data("color"));
	});
}
function colsRange(slider) {
	let newClass = "Xrmin" + $(slider).val();
	$("#colsRangeLabel").text("."+newClass);
	$("div", "#colsRangeTest").each(function() {
		let box = $(this);
		box.removeClass().addClass(newClass).addClass(box.data("color"));
	});
}