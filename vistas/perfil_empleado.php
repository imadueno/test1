<?php

/*
 * Por medio de este archivo recibimos el parametro IdEmpleado=###
 * cargaremos dicho archivo y será desplegado en la tabla
 */

 // validamos si tenemos una petición valida

if( isset($_GET['IdEmpleado']) && is_numeric($_GET['IdEmpleado']) ){

    $archivo = imprimirArchivo($_GET['IdEmpleado']);

}else{

    $archivo = "El ID de Empleado proporcionado es erroneo o nulo";
}

echo $archivo;
echo "------------------";
echo gettype( $archivo );
echo "------------------";
$arrayS = json_decode( $archivo, true );
echo "------------------";
echo $arrayS;
echo "------------------";

function imprimirArchivo( $nombreArchivo ){

    $path = '../registros/';
    $file = $path.$nombreArchivo.'.txt';

    // si el archivo existe
   if( file_exists( $file ) ){

        $myfile = fopen( $file, "r") or die("Unable to open file!");
        $contenido = fread($myfile,filesize( $file ));
        fclose($myfile);

        return $contenido;

   }else{

       return "El archivo proporcionado no existe";
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de empleado</title>
</head>
<body>
    
</body>
</html>