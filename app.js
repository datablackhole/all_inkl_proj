// script.js

$(document).ready(function () {
    var hideTotals = function (enable) {
        if (enable)
            $('.pvtTotalLabel, .pvtTotal, .pvtGrandTotal').show();
        else
            $('.pvtTotalLabel, .pvtTotal, .pvtGrandTotal').hide();
    };

    var renderers = $.extend(
        $.pivotUtilities.renderers,
        $.pivotUtilities.plotly_renderers,
        $.pivotUtilities.d3_renderers,
        $.pivotUtilities.export_renderers
    );

    var parseAndPivot = function (f) {
        $("#output").html("<p align='center' style='color:grey;'>(processing...)</p>");
        Papa.parse(f, {
            skipEmptyLines: true,
            error: function (e) {
                alert(e);
            },
            complete: function (parsed) {
                var locale = $('#locale').val();

                $("#output").pivotUI(parsed.data, {
                    renderers: renderers,
                    rows: parsed.data[0],
                    hideTotals: true,
                }, true, locale);

                $('#buttons_section').empty();

                [...document.querySelectorAll('.pvtRenderer option')].forEach(function (e) {
                    $('#buttons_section').append(`<button type="button" class="btn btn-outline-success" onclick="$('.pvtRenderer').val('${e.value}').trigger('change')">${e.value}</button>`);
                });

                setTimeout(function () {
                    hideTotals(false);
                }, 150);
            },
        });
    };

    $("#csv").on("change", function (event) {
        parseAndPivot(event.target.files[0]);
    });

    $("#csv_text").on("input change", function () {
        parseAndPivot($("#csv_text").val());
    });

    $('#locale').on("change", function () {
        parseAndPivot($("#csv_text").val());
    });

    var dragging = function (evt) {
        evt.stopPropagation();
        evt.preventDefault();
        evt.originalEvent.dataTransfer.dropEffect = 'copy';
        $("body").removeClass("whiteborder").addClass("greyborder");
    };

    var endDrag = function (evt) {
        evt.stopPropagation();
        evt.preventDefault();
        evt.originalEvent.dataTransfer.dropEffect = 'copy';
        $("body").removeClass("greyborder").addClass("whiteborder");
    };

    var dropped = function (evt) {
        evt.stopPropagation();
        evt.preventDefault();
        $("body").removeClass("greyborder").addClass("whiteborder");
        parseAndPivot(evt.originalEvent.dataTransfer.files[0]);
    };

    $("html")
        .on("dragover", dragging)
        .on("dragend", endDrag)
        .on("dragexit", endDrag)
        .on("dragleave", endDrag)
        .on("drop", dropped);
});

function execSQL() {
    let formArray = $('#inpForm').serializeArray();
    let data = {};

    formArray.forEach(e => {
        data[e['name']] = e['value'];
        localStorage.setItem("form-" + e['name'], e['value']);
    });

    $.post("/api.php", data, function (data, textStatus) {
        if (data.trim().length) {
            $('#csv_text').val(data).trigger('change');
            $('#collapseFormBtn').click();
        } else
            alert("Unable to get data ! ");
    }).fail(function(xhr, status, error) {
        // Error callback
        if (xhr.status == 500) {
            alert("Internal Server Error: Please check your server-side code.");
        } else {
            alert("An error occurred: " + status + " - " + error);
        }
    });;
}

function loadFormData() {
    let formArray = $('#inpForm').serializeArray();

    formArray.forEach(e => {
        try {
            var value = localStorage.getItem("form-" + e['name']);
            $(`[name="${e.name}"]`).val(value);

        } catch (error) {
            $(`[name="${e.name}"]`).val("");
        }
    });
}

loadFormData();
