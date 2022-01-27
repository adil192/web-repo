function itemsRange(slider: HTMLInputElement) {
	let newClass = "Ximin" + $(slider).val();
	$("#itemsRangeLabel").text("."+newClass);
	$("div", "#itemsRangeTest").each(function() {
		let box = $(this);
		box.removeClass().addClass("R " + newClass + " " + box.data("color"));
	});
}
function percentsRange(slider: HTMLInputElement) {
	let newClass = "Xpmin" + $(slider).val();
	$("#percentsRangeLabel").text("."+newClass);
	$("div", "#percentsRangeTest").each(function() {
		let box = $(this);
		box.removeClass().addClass("R " + newClass + " " + box.data("color"));
	});
}
function colsRange(slider: HTMLInputElement) {
	let newClass = "Xrmin" + $(slider).val();
	$("#colsRangeLabel").text("."+newClass);
	$("div", "#colsRangeTest").each(function() {
		let box = $(this);
		box.removeClass().addClass("R " + newClass + " " + box.data("color"));
	});
}