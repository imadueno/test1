# Examen - test1
Este proyecto es parte de una prueba para una vacante de trabajo

### Descripción del proyecto
El proyecto tiene como finalidad poder registrar a un empleado, basados en un modelo ( Clase ) y generar un archivo en formato *.txt* el cual contendrá la información de dicho empleado en formato JSON

### Configuración
Localizar archivo **constants.php** dentro del proyecto.
Cambiar el valor a la _constante_ "**DOCUMENT_ROOT**" por la ruta que tendrá el proyecto.
En mi caso tengo dos _constantes_, una para Windows y otra para Ubuntu ( utilizando un virtual host).

Windows = `define("DOCUMENT_ROOT","http://localhost/test1/");`

Ubuntu = `define("DOCUMENT_ROOT","http://test1/");`

### Permisos de escritura en Ubuntu
Si el proyecto está siendo ejecutado en Ubuntu y los archivos de empleado no se guarden, probablemente sea un problema de permisos, para ello otorgaremos permisos a la carpeta del proyecto.
`sudo chmod -R 777 /var/www/test1/*`

