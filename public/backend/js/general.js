      
$('form').submit(function(){
    $('input[type=submit]', this).attr('disabled', 'disabled');
    setTimeout(() => { $('input[type=submit]', this).removeAttr('disabled'); }, 2000);
});   
   
$(document).on('click', '#help_zipcode', function(e){
    Swal.fire({
    title: '<strong>Código postal</strong>',
    icon: 'info',
    html:
    `<p style="text-align:justify;">Al escribir tu código postal si esperas unos segundos los campos 
        de ciudad, municipio, estado se llenarán automáticamente, además de habilitar opciones para que puedas elegir tu colonia correctamente, en caso que la base de datos no exista el código no se llenará nada y tendrás que llenarlo manualmente.</p>`,
    showCloseButton: true,
    showCancelButton: false,
    focusConfirm: false,
    confirmButtonText:
    '<i class="fa fa-thumbs-up"></i> Me sirve la información!',
    confirmButtonAriaLabel: 'Thumbs up, great!',
    })
});

$(document).on('click', '#help_zipcode', function (e) {
    Swal.fire({
        title: '<strong>Código postal</strong>',
        icon: 'info',
        html: `<p style="text-align:justify;">Al escribir tu código postal si esperas unos segundos los campos 
                de ciudad, municipio, estado se llenarán automáticamente, además de habilitar opciones para que puedas elegir tu colonia correctamente, en caso que la base de datos no exista el código no se llenará nada y tendrás que llenarlo manualmente.</p>`,
        showCloseButton: true,
        showCancelButton: false,
        focusConfirm: false,
        confirmButtonText: '<i class="fa fa-thumbs-up"></i> Me sirve la información!',
        confirmButtonAriaLabel: 'Thumbs up, great!',
    })
});

$(document).on('click', '#help_curp', function (e) {
    Swal.fire({
        title: '<strong>Código postal</strong>',
        icon: 'warning',
        html: `<p style="text-align:justify;">Alerta, una vez que ingreses tu curp ya no podrás actualizar esta información cuando desees revisitar y editar esta encuesta.</p>`,
        showCloseButton: true,
        showCancelButton: false,
        focusConfirm: false,
        confirmButtonText: '<i class="fa fa-thumbs-up"></i> Me sirve la información!',
        confirmButtonAriaLabel: 'Thumbs up, great!',
    })
});

$(document).on('click', '#help_curp', function (e) {
    Swal.fire({
        title: '<strong>CURP</strong>',
        icon: 'warning',
        html: `<p style="text-align:justify;">Alerta, una vez que ingreses tu curp ya no podrás actualizar esta información cuando desees revisitar y editar esta encuesta. Si deseas modificarlo tendrás que acudir con el administrador.</p>`,
        showCloseButton: true,
        showCancelButton: false,
        focusConfirm: false,
        confirmButtonText: '<i class="fa fa-thumbs-up"></i> Me sirve la información!',
        confirmButtonAriaLabel: 'Thumbs up, great!',
    })
});

$(document).on('click', '#help_email', function (e) {
    Swal.fire({
        title: '<strong>Correo Electrónico</strong>',
        icon: 'warning',
        html: `<p style="text-align:justify;">Alerta, una vez que ingreses tu correo ya no podrás actualizar esta información cuando desees revisitar y editar esta encuesta. Si deseas modificarlo tendrás que acudir con el administrador.</p>`,
        showCloseButton: true,
        showCancelButton: false,
        focusConfirm: false,
        confirmButtonText: '<i class="fa fa-thumbs-up"></i> Me sirve la información!',
        confirmButtonAriaLabel: 'Thumbs up, great!',
    })
});