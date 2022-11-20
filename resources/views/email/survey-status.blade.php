<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aviso Estado de Encuestas</title>
</head>

<body>
    <p>Hola egresado <b>{{ $data['name'] }}</b> nos comunicamos contigo del departamento de vinculación del <b>{{ $data['school'] }}</b>, este correo es para
    informarle que en la plataforma de seguimiento de egresados no cuenta con registros en las siguientes encuestas:
    </p>
    <ul>
        @foreach ($data['surveys'] as $key => $value)
            <li>{{ $data['surveyDescription'][$key] }}</li>
        @endforeach
    </ul>
    <p>Te invitamos a contestar esta encuesta(s), estos datos son muy importantes para el <b>{{ $data['school'] }}</b>. Esto se puedes realizar mediante el siguiente
    enlace: <a href="{{ $data['url'] }}">{{ $data['url'] }}</a></p>
    <p>A continuación te indicaremos los pasos para que puedas darte de alta en el SSE en caso de no estarlo:</p>
        <ol>
            <li>Ingresar al siguiente enlace: <a href="{{ $data['url'] }}">{{ $data['url'] }}</a></li>
            <li>En la pantalla principal, seleccionar la opción <b>"Registro Egresado"</b>.</li>
            <li>Llenar sus datos para llenar el registro y dar click en <b>REGISTRARSE</b>.</li>
            <li>Contestar las 7 encuestas, lo cual no tomará más de 10 minutos.</li>
        </ol>
    <p>Si tienes alguna duda o comentario, no dudes en contactarnos.</p>
    <p>Gracias por tu atención. Departamento de Gestión y Vinculación.</p>
</body>

</html>