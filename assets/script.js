function itemsRange(slider) {
    argumentsRange(slider, "Ximin", "#itemsRangeLabel", "#itemsRangeTest");
}
function percentsRange(slider) {
    argumentsRange(slider, "Xpmin", "#percentsRangeLabel", "#percentsRangeTest");
}
function colsRange(slider) {
    argumentsRange(slider, "Xrmin", "#colsRangeLabel", "#colsRangeTest");
}
function argumentsRange(slider, prefix, labelSelector, testDivSelector) {
    let newClass = prefix + slider.value;
    $(labelSelector).text("." + newClass);
    $("div", testDivSelector).each(function () {
        let box = $(this);
        box.removeClass().addClass("R " + newClass + " " + box.data("color"));
    });
}
//# sourceMappingURL=script.js.map