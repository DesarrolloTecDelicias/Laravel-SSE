const array_excludes = [
    "ID",
    "Usuario",
    "Contestada",
    "Actualizada",
    "Dirección",
    "Software",
    "Correo electrónico",
    "Celular",
    "Teléfono",
    "Nombre(s)",
    "Apellido Paterno",
    "Apellido Materno",
    "CURP",
    "Fecha Nacimiento",
    "Fecha nacimiento",
    "Número de control",
    "Número de Control",
    "Razón Social",
    "Razón social",
    "Colonia",
    "Código postal",
    "Código Postal",
    "Mencionar cursos",
    "Posgrado",
    "Mencionar organismos",
    "Mencionar organizaciones",
    "Mencionar asociación",
    "Domicilio",
    "Fax",
    "Jefe inmediato",
    "Página Web",
    "Giro o actividad principal de la empresa u organismo",
    "Especialidad"
];

$(function () {
    $("#table-filter thead tr")
        .clone(true)
        .addClass("filters")
        .appendTo("#table-filter thead");

    var table = $("#table-filter")
        .DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            buttons: ["copy", "csv", "excel", "colvis"],
            initComplete: function () {
                var api = this.api();

                // For each column
                api.columns()
                    .eq(0)
                    .each(function (colIdx) {
                        // Set the header cell to contain the input element
                        var cell = $(".filters th").eq(
                            $(api.column(colIdx).header()).index()
                        );
                        var title = $(cell).text();
                        $(cell).html(
                            '<input type="text" placeholder="' + title + '" />'
                        );

                        // On every keypress in this input
                        $(
                            "input",
                            $(".filters th").eq(
                                $(api.column(colIdx).header()).index()
                            )
                        )
                            .off("keyup change")
                            .on("keyup change", function (e) {
                                e.stopPropagation();

                                // Get the search value
                                $(this).attr("title", $(this).val());
                                var regexr = "({search})"; //$(this).parents('th').find('select').val();

                                var cursorPosition = this.selectionStart;
                                // Search the column for that value
                                api.column(colIdx)
                                    .search(
                                        this.value != ""
                                            ? regexr.replace(
                                                  "{search}",
                                                  "(((" + this.value + ")))"
                                              )
                                            : "",
                                        this.value != "",
                                        this.value == ""
                                    )
                                    .draw();

                                $(this)
                                    .focus()[0]
                                    .setSelectionRange(
                                        cursorPosition,
                                        cursorPosition
                                    );
                            });
                    });
            },
        })
        .buttons()
        .container()
        .appendTo("#table-filter_wrapper .col-md-6:eq(0)");
});

$(function () {
    function cbDropdown(column) {
        return $("<ul>", {
            class: "cb-dropdown",
        }).appendTo(
            $("<div>", {
                class: "cb-dropdown-wrap",
            }).appendTo(column)
        );
    }

    $("#table-filter-two")
        .DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            buttons: ["copy", "csv", "excel", "colvis"],
            initComplete: function () {
                this.api()
                    .columns()
                    .every(function () {
                        var column = this;
                        if (
                            !array_excludes.includes($(column.header()).html())
                        ) {
                            var ddmenu = cbDropdown($(column.header())).on(
                                "change",
                                ":checkbox",
                                function () {
                                    var active;
                                    var vals = $(":checked", ddmenu)
                                        .map(function (index, element) {
                                            active = true;
                                            return $.fn.dataTable.util.escapeRegex(
                                                $(element).val()
                                            );
                                        })
                                        .toArray()
                                        .join("|");

                                    column
                                        .search(
                                            vals.length > 0
                                                ? "^(" + vals + ")$"
                                                : "",
                                            true,
                                            false
                                        )
                                        .draw();

                                    // Highlight the current item if selected.
                                    if (this.checked) {
                                        $(this)
                                            .closest("li")
                                            .addClass("active");
                                    } else {
                                        $(this)
                                            .closest("li")
                                            .removeClass("active");
                                    }

                                    // Highlight the current filter if selected.
                                    var active2 = ddmenu.parent().is(".active");
                                    if (active && !active2) {
                                        ddmenu.parent().addClass("active");
                                    } else if (!active && active2) {
                                        ddmenu.parent().removeClass("active");
                                    }
                                }
                            );

                            column
                                .data()
                                .unique()
                                .sort()
                                .each(function (d, j) {
                                    var // wrapped
                                        $label = $("<label>"),
                                        $text = $("<span>", {
                                            text: d,
                                        }),
                                        $cb = $("<input>", {
                                            type: "checkbox",
                                            value: d,
                                        });

                                    $text.appendTo($label);
                                    $cb.appendTo($label);

                                    ddmenu.append($("<li>").append($label));
                                });
                        }
                    });
            },
        })
        .buttons()
        .container()
        .appendTo("#table-filter-two_wrapper .col-md-6:eq(0)");
});


$(function () {
    $("#table-simple")
        .DataTable({
            responsive: true,
            lengthChange: true,
            autoWidth: true,
            buttons: ["copy", "csv", "excel", "colvis"],
        })
        .buttons()
        .container()
        .appendTo("#table-simple_wrapper .col-md-6:eq(0)");
});