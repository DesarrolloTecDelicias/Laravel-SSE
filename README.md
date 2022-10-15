<p align="center">
<a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a>
</p>

<h1>Descripción del Proyecto</h1>
<p>Este proyecto fue elaborado en el Instituto Tecnológico de Delicias en el período Octubre 2021 - Agosto 2022. Este sistema busca satisfacer la necesidad del departamento de Gestión y Vinculación de obtener indiciadores de los egresados para conocer el impacto que los egresados han generado en el sector productivo además de permitir al Instituto estar en constante mejora para ofrecer mejores servicios alumnos y estos cumplan con las expectativas del sector productivo. </p>

<h2>Herramientas empleadas</h2>
<p>A continuación se hace mención de las herramientas(stack, frameworks, lenguajes) empleados en este proyecto:</p>
<ol>
<li>Laravel: Framework para la elaboración del servidor</li>
<li>Jetstream: Ecosistema de Laravel para autenticación</li>
<li>Sanctum: Ecosistema de Laravel para autenticación de rutas</li>
<li>Livewire: Framework para la elaboración del cliente</li>
<li>MySQL: Base de datos</li>
<li>AdminLTE: Plantilla para la elaboración de la intefaz</li>
</ol>
<span>Este proyecto fue elaborado principalmente con PHP empleando las plantillas Blade, al implementar el framework livewire las vistas se pueden emplear como componentes y acceder a su ciclo de vida más fácilmente.</span>

<h2>Pasos para ejecutar el programa</h2>
<p>A continuación se hace mención de los pasos para poder ejecutar el programa:</p>
<ol>
<li>composer install</li>
<li>npm install</li>
<li>cp .env.example .env<br/>copy .env.example .env</li>
<li>Configurar el archivo .env, definir las variables de entorno</li>
<li>php artisan key:generate</li>
<li>Crear una base de datos con nombre egresados en MySQL</li>
<li>php artisan migrate:refresh --seed</li>
</ol>