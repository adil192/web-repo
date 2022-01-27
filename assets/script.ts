function itemsRange(slider: HTMLInputElement) {
	argumentsRange(slider, "Ximin", "#itemsRangeLabel", "#itemsRangeTest");
}
function percentsRange(slider: HTMLInputElement) {
	argumentsRange(slider, "Xpmin", "#percentsRangeLabel", "#percentsRangeTest");
}
function colsRange(slider: HTMLInputElement) {
	argumentsRange(slider, "Xrmin", "#colsRangeLabel", "#colsRangeTest");
}

function argumentsRange(slider: HTMLInputElement, prefix: string, labelSelector: string, testDivSelector: string) {
	let newClass = prefix + slider.value;
	$(labelSelector).text("." + newClass);
	$("div", testDivSelector).each(function() {
		let box = $(this);
		box.removeClass().addClass("R " + newClass + " " + box.data("color"));
	});
}
