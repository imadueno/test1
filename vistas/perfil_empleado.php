<?php

/*
 * Por medio de este archivo recibimos el parametro IdEmpleado=###
 * cargaremos dicho archivo y será desplegado en la tabla
 */
require_once( "../constants.php" );

// validamos la URL el parametro IdEmpleado
$UrlIsValid = FALSE;
$IsValidId  = TRUE;
$FileExists = FALSE;
$fContenido = '';

if( isset($_GET['IdEmpleado']) ){
    $UrlIsValid = TRUE;
    if( is_numeric( $_GET['IdEmpleado'] ) ){
        $IsValidId = TRUE;
        $ruta = "../registros/".$_GET['IdEmpleado'].".txt";
        if( file_exists( $ruta ) ){
            $FileExists = TRUE;
            $fContenido = file_get_contents( $ruta );
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de empleado</title>

    <!-- Bootstrap -->
    <link href="<?php echo CSSDIR; ?>bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo CSSDIR; ?>empleado/perfil_empleado.css" rel="stylesheet">
</head>
<body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                    
                <a class="navbar-brand" href="#">Registro de empleados</a>
            </div>

            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#about">Alta de empleado</a></li>
                    <li><a id="ver_empleado" href="#">Ver empleados</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="jsonfile">
        <?php echo $fContenido; ?>
    </div>

    <div class="body-perfil container">
        <div class="row">
            
            <?php if( !$UrlIsValid ){ ?>
                <div class="col-xs-12">
                    <div class="alert alert-danger" role="alert">La URL no es valida ( parametro <strong>IdEmpleado</strong> no encontrado )</div>
                </div>
            <?php }else if( !$IsValidId ){ ?>
                <div class="col-xs-12">
                    <div class="alert alert-danger" role="alert">El ID proporcionado es erroneo ( valor <strong>numerico</strong> esperado )</div>
                </div>
            <?php }else if( !$FileExists ){ ?>
                <div class="col-xs-12">
                    <div class="alert alert-warning" role="alert">El archivo que busca, no existe.</div>
                </div>
            <?php }else{ ?>
                <div class="col-xs-12">
                    <div class="alert alert-success" role="alert">Archivo encontrado <br>De momento solo se muestra el contenido literal del archivo JSON</div>
                </div>
                <div class="col-xs-12">

                    <h3>Resultado de la busqueda - Desplegando información</h3>
                    <div id="generales">
                        <h4>Datos Generales</h4>
                    </div>
                    <div id="adicionales">
                        <h4>Datos Adicionales</h4>
                    </div>
                    <div id="domicilio">
                        <h4>Domicilio</h4>
                    </div>
                    <h4>Estudios</h4>
                    <table id="estudios" class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="40">Nombre escuela</th>
                                <th width="20">Grado</th>
                                <th width="20">Fecha inicio</th>
                                <th width="20">Fecha fin</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>

                </div>
            <?php } ?>

        </div>
    </div>
    

    <!-- Jquery & Bootstrap --->
    <script src="<?php echo JSDIR; ?>jquery-3.3.1.js"></script>
    <script src="<?php echo JSDIR; ?>bootstrap.min.js"></script>
    <script src="<?php echo JSDIR; ?>empleado/perfil_empleado.js"></script>
</body>
</html>