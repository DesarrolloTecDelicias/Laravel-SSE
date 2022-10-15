//Assistants

//Admin
$(document).on('click', '#help_admin', function (e) {
    Swal.fire({
        title: '<strong>Asistente S.S.E</strong>',
        icon: 'info',
        html: '<p style="text-align:justify;">Hola administrador este es el asistente para apoyarte en este sistema. ' +
            'En los apartados de configuración podrás encontrar los datos para que los manipules, como son son los egresados ' +
            'empresas, carreras, etc. En el apartado de reportes podrás revisar las respuestas de las encuestas tanto de empleadores como de egresados, ' +
            'en el apartado de estadístcias podrás revisar todas las respuestas graficadas con forma de pastel.</p>',
        showCloseButton: true,
        showCancelButton: false,
        focusConfirm: false,
        confirmButtonText: '<i class="fa fa-thumbs-up"></i> Me sirve la información!',
        confirmButtonAriaLabel: 'Thumbs up, great!',
    })
});

//Graduate
$(document).on('click', '#help_student', function (e) {
    Swal.fire({
        title: '<strong>Asistente S.S.E</strong>',
        icon: 'info',
        html: `<p style="text-align:justify;">Hola egresado este es el asistente para apoyarte en este sistema.
    Comencemos con lo importante, lo que para el tecnológico es conocer los datos del egresado,
    conocer las necesidades de los egresados al momento de buscar un empleo con lo aprendido en la institución.
    Para comenzar con este puedes dirigirte a este enlace: <a href="{{ route('graduate.index') }}">Tablero</a>. En este tablero visual la forma en que podrás desplazarte es por medio de tu ratón, dando un click y podrás deslizarte a través de las encuesta, si es muy complicado para ti manejarte de esta forma, podrás encontrar las encuestas en los menús superior y lateral. </p>
    <p style="text-align:justify;">Una vez que se haya cumplido con las encuestas se puede ir al apartardo de perfil para que puedas
    modificar datos de tu tu perfil como puede ser el cambiar tu contraseña o fotografía en el siguiente enlace: <a href="{{ route('graduate.view') }}">Perfil</a>.</p>
    <p style="text-align:justify;">Ya que sientas que hayas cumplido con estas opciones puedes subir tu currículum para postularte, no puedes postularte si no tienes un currículum, lo podrás ver en el siguiente enlace: <a href="{{ route('graduate.pdf') }}">Currículum</a>.</p>
    <p style="text-align:justify;">Una vez finalizado con esto puedes ver los empleos disponibles en el siguente enlace: <a href="{{ route('jobs.view') }}">Empleos</a>.</p>`,
        showCloseButton: true,
        showCancelButton: false,
        focusConfirm: false,
        confirmButtonText: '<i class="fa fa-thumbs-up"></i> Me sirve la información!',
        confirmButtonAriaLabel: 'Thumbs up, great!',
    })
});

//Company