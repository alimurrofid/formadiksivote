$(".summernote").summernote({
    tabsize: 2,
    height: 500,
    toolbar: [
        ["style", ["style"]],
        ["fontsize", ["fontsize"]],
        ["font", ["bold", "italic", "underline", "clear"]],
        ["fontname", ["fontname"]],
        ["color", ["color"]],
        ["para", ["ul", "ol", "paragraph"]],
        ["height", ["height"]],
        ["view", ["codeview", "help"]],
    ],
    fontSizes: [
        "8",
        "9",
        "10",
        "11",
        "12",
        "14",
        "18",
        "24",
        "36",
        "48",
        "64",
        "82",
        "150",
    ],
    callbacks: {
        // callback for pasting text only (no formatting)
        onPaste: function (e) {
            var bufferText = (
                (e.originalEvent || e).clipboardData || window.clipboardData
            ).getData("Text");
            e.preventDefault();
            bufferText = bufferText.replace(/\r?\n/g, "<br>");
            document.execCommand("insertHtml", false, bufferText);
        },
    },
});