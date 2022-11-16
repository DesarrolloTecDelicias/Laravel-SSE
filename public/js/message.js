$(document).on("click", "#helpAdmin", function (e) {
    Swal.fire({
        title: "<strong>Asistente S.S.E</strong>",
        icon: "info",
        html:
            '<p class="text-justify">Hola administrador este es el asistente para apoyarte en este sistema. ' +
            "En los apartados de configuración podrás encontrar los datos para que los manipules, como son son los egresados " +
            "empresas, carreras, etc. En el apartado de reportes podrás revisar las respuestas de las encuestas tanto de empleadores como de egresados, " +
            "en el apartado de estadístcias podrás revisar todas las respuestas graficadas con forma de pastel.</p>",
        showCloseButton: true,
        showCancelButton: false,
        focusConfirm: false,
        confirmButtonText:
            '<i class="fa fa-thumbs-up"></i> Me sirve la información!',
        confirmButtonAriaLabel: "Thumbs up, great!",
    });
});

$(document).on("click", "#helpGraduate", function (e) {
    Swal.fire({
        title: "<strong>Asistente S.S.E</strong>",
        icon: "info",
        html: `<p class="text-justify">Hola egresado este es el asistente para apoyarte en este sistema.
                        Comencemos con lo importante, lo que para el tecnológico es conocer los datos del egresado,
                        conocer las necesidades de los egresados al momento de buscar un empleo con lo aprendido en la institución.
                        Para comenzar con este puedes dirigirte en la opción: <b>Tablero</b>. En este
                        tablero visual la forma en que podrás desplazarte es por medio de tu ratón, dando un click y podrás deslizarte a
                        través de las encuesta, si es muy complicado para ti manejarte de esta forma, podrás encontrar las encuestas en los
                        menús superior y lateral.</p>
                        <p class="text-justify">Una vez que se haya cumplido con las encuestas se puede ir al apartardo de perfil para
                        que puedas modificar datos de tu tu perfil como puede ser el cambiar tu contraseña o fotografía en la siguiente opción: <b>Perfil</b>.</p>`,
        showCloseButton: true,
        showCancelButton: false,
        focusConfirm: false,
        confirmButtonText:
            '<i class="fa fa-thumbs-up"></i> Me sirve la información!',
        confirmButtonAriaLabel: "Thumbs up, great!",
    });
});


$(document).on("click", "#helpCompany", function (e) {
    Swal.fire({
        title: "<strong>Asistente S.S.E</strong>",
        icon: "info",
        html: `<p class="text-justify">Hola empleador este es el asistente para apoyarte en este sistema.
                        Comencemos con lo importante, lo que para el tecnológico es conocer los datos del empleador,
                        conocer las necesidades de los empleadores al momento de contratar un egresado en sus filas.
                        Para comenzar con este puedes dirigirte en la opción: <b>Tablero</b>. En este
                        tablero visual la forma en que podrás desplazarte es por medio de tu ratón, dando un click y podrás deslizarte a
                        través de las encuesta, si es muy complicado para ti manejarte de esta forma, podrás encontrar las encuestas en los
                        menús superior y lateral.</p>
                        <p class="text-justify">Una vez que se haya cumplido con las encuestas se puede ir al apartardo de perfil para
                        que puedas modificar datos de tu tu perfil como puede ser el cambiar tu contraseña en la siguiente opción: <b>Perfil</b>.</p>`,
        showCloseButton: true,
        showCancelButton: false,
        focusConfirm: false,
        confirmButtonText:
            '<i class="fa fa-thumbs-up"></i> Me sirve la información!',
        confirmButtonAriaLabel: "Thumbs up, great!",
    });
});
