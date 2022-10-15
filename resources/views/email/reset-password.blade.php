<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recuperar Contraseña</title>
</head>
<body>

    <p>Hola egresado te enviamos este correo del SSE para actualizar tu contraseña: tu nueva contraseña es:&nbsp;
        <b>{{ $password }}</b>
    </p>
    <p>Si deseas cambiar la contraseña por una personal aquí te adjuntamos la lista de procedimientos para actualizarla: </p>
    <ol>
        <li>Ingresar a: <a href="{{ env('PROJECT_URL') }}">Sistema de Seguimiento de Egresados</a></li>
        <li>Dar click sobre la opción: "INICIAR SESIÓN"</li>
        <li>Ingresar con tu correo y la contraseña adjunta</li>
        <li>Una vez en el sistema, en las opciones laterales, selecciona la opción "Perfil"</li>
        <li>En la opción "Perfil" en la parte inferior podrás actualizar tu contraseña</li>
    </ol>
</body>
</html>