<h1 align="center">Trabajo de grado</h1><br>
<h2 align="center">APLICACIÓN WEB PARA GESTIONAR EL INVENTARIO DE PRODUCTOS IMPLEMENTANDO TECNOLOGÍA QR</h2><br>
<h2 align="center">Tutora: Rocio Rodriguez Guerrero</h2><br>
<h2 align="center"><strong>Hecho por: </strong></h2><br>
<h2 align="center"> Stiven Orlando Mendez Vanegas y
Yeferson Reinel Velandia Arias</h2>
<p> 
Este trabajo fue hecho con el Framework de laravel
Para su correcto funcionamiento se requiere tener instalado PHP, <a href="https://getcomposer.org">composer</a>
y <a href="https://nodejs.org/en/">node</a> instalado en el ordenador. Tambien se debe tener instalada
la extension de php (link a tutorial de instalacion) <a href="https://www.youtube.com/watch?v=qZ9_rq6c9uY">Imagick</a> para generar los codigos QR en imagenes png.<br><br>
Para el funcionamiento del proyecto se debe seguir los siguientes paso:<br><br>
1)Clonar el respositorio.<br>
2)Dentro de la carpeta del proyecto ejecutar el comando "composer install" en cualquier terminal de comandos ya sea cmd, la terminal incluida en visual studio o cualquier otra.<br>
3)Renombrar el archivo '.env.example' a '.env'<br>
4)Ejecutar el comando "php artisan  key:generate"<br>
5)Crear una base de datos en su gestor de base de datos de preferencia (En el caso del proyecto se uso Xampp con una base de datos llamada "proyectog")<br>
6)Configurar en el archivo .env la base de datos en las lineas 'DB'. En la linea "DB_DATABASE=" colocar el nombre de la base de datos creada.<br>
7)Ejecutar el comando "php artisan migrate"

para correr el servidor se ejecuta el comando "php artisan serve"

</p>