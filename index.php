<?php

require_once( "constants.php" );
require_once( "model/Catalogo.php" );

// instanciamos un objeto de la clase catalogo 

$oCatalogo = new Catalogo();

$aSexo          = $oCatalogo->GetCatSexo();
$aEstadoCivil   = $oCatalogo->GetCatEstadoCivil();
$aTipoSangre    = $oCatalogo->GetCatTipoSangre();
$aComplexion    = $oCatalogo->GetCatComplexion();
$aDiscapacidad  = $oCatalogo->GetCatDiscapacidad();
$aPais          = $oCatalogo->GetCatPais();
$aGradoEstudio  = $oCatalogo->GetCatGradoEstudio();

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Examen - Isaí Madueño</title>

        <!-- Bootstrap -->
        <link href="<?php echo CSSDIR; ?>bootstrap.min.css" rel="stylesheet">
        <!-- Select2 -->
        <link href="<?php echo CSSDIR; ?>select2.min.css" rel="stylesheet">
        <!-- air date picker -->
        <link href="<?php echo CSSDIR; ?>datepicker.min.css" rel="stylesheet">
        <!-- site files --> 
        <link href="<?php echo CSSDIR; ?>empleado/style.css" rel="stylesheet">
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
                        <li><a href="#contact">Ver empleados</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">

            <h2>Formulario de registro de empleado</h2><br><br>

            <!-- formulario de registro de empleado -->

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12 shadow-box form-main">
                    
                    <div class="body-form form-container">

                        <!---- vormulario horizontal ---> 

                        <form class="form-horizontal" id="formulario_empleado">

                            <div class="sub-title">
                                Datos generales
                            </div>

                            <div class="form-group">
                                <label for="ApellidoPaterno" class="col-sm-4 control-label">Apellido paterno<span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="ApellidoPaterno" name="ApellidoPaterno" placeholder="Madueño" required="true">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="ApellidoMaterno" class="col-sm-4 control-label">Apellido materno<span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="ApellidoMaterno" name="ApellidoMaterno" placeholder="Guerrero" required="true">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Nombre" class="col-sm-4 control-label">Nombre<span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Isaí" required="true">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Sexo" class="col-sm-4 control-label">Sexo<span class="text-danger">*</span></label>
                                <div class="col-sm-8">

                                    <select class="form-control" id="Sexo" name="Sexo" placeholder="Masculino" required="true">
                                        <option selected="true" disabled="true">Seleccione...</option>
                                        <?php foreach( $aSexo as $index ): ?>
                                        <option value="<?php echo $index['Id']; ?>"><?php echo $index['Descripcion']; ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="FechaNacimiento" class="col-sm-4 control-label">Fecha de nacimiento<span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="FechaNacimiento" name="FechaNacimiento" placeholder="" required="true">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="NumeroEmpleado" class="col-sm-4 control-label">Número de empleado<span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="NumeroEmpleado" name="NumeroEmpleado" placeholder="" required="true">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="NumeroPension" class="col-sm-4 control-label">Número de pensión</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="NumeroPension" name="NumeroPension" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Fotografia" class="col-sm-4 control-label">Fotografia</label>
                                <div class="col-sm-8">
                                    <input type="file" class="" id="Fotografia" name="Fotografia" placeholder="">
                                </div>
                            </div>

                            <!--- ================================ SECCION DATOS ADICIONALES ================================-->
                            <!--- ================================ SECCION DATOS ADICIONALES ================================-->

                            <div class="sub-title">
                                Datos adicionales
                            </div>

                            <div class="form-group">
                                <label for="CURP" class="col-sm-4 control-label">CURP<span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="CURP" name="CURP" placeholder="" required="true" style="text-transform: uppercase;">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="RFC" class="col-sm-4 control-label">RFC<span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="RFC" name="RFC" placeholder="" required="true" style="text-transform: uppercase;">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="EstadoCivil" class="col-sm-4 control-label">Estado civil<span class="text-danger">*</span></label>
                                <div class="col-sm-8">

                                    <select class="form-control" id="EstadoCivil" name="EstadoCivil" required="true">
                                        <option selected="true" disabled="true">Seleccione...</option>
                                        <?php foreach( $aEstadoCivil as $index ): ?>
                                        <option value="<?php echo $index['Id']; ?>"><?php echo $index['Descripcion']; ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="TipoSangre" class="col-sm-4 control-label">Tipo de sangre<span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    
                                    <select class="form-control" id="TipoSangre" name="TipoSangre" required="true">
                                        <option selected="true" disabled="true">Seleccione...</option>
                                        <?php foreach( $aTipoSangre as $index ): ?>
                                        <option value="<?php echo $index['Id']; ?>"><?php echo $index['Descripcion']; ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Estatura" class="col-sm-4 control-label">Estatura<span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="Estatura" name="Estatura" placeholder="180 Centimetros" required="true" min="50" max="300">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Peso" class="col-sm-4 control-label">Peso<span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="Peso" name="Peso" placeholder="95 Kilogramos" required="true" min="1" max="500">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Complexion" class="col-sm-4 control-label">Complexión<span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                        
                                    <select class="form-control" id="Complexion" name="Complexion" required="true">
                                        <option selected="true" disabled="true">Seleccione...</option>
                                        <?php foreach( $aComplexion as $index ): ?>
                                        <option value="<?php echo $index['Id']; ?>"><?php echo $index['Descripcion']; ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Discapacidad" class="col-sm-4 control-label">Discapacidad</label>
                                <div class="col-sm-8">
                                    
                                    <select class="form-control" id="Discapacidad" name="Discapacidad">
                                        <option selected="true">Seleccione...</option>
                                        <?php foreach( $aDiscapacidad as $index ): ?>
                                        <option value="<?php echo $index['Id']; ?>"><?php echo $index['Descripcion']; ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                            </div>

                            <!--- ================================ SECCION DOMICILIO ================================-->
                            <!--- ================================ SECCION DOMICILIO ================================-->

                            <div class="sub-title">
                                Domicilio
                            </div>

                            <div class="form-group">
                                <label for="Pais" class="col-sm-4 control-label">País<span class="text-danger">*</span></label>
                                <div class="col-sm-8">

                                    <select class="form-control" id="Pais" name="Pais" required="true">
                                        <option selected="true" disabled="true">Seleccione...</option>
                                        <?php foreach( $aPais as $index ): ?>
                                        <option value="<?php echo $index['Id']; ?>"><?php echo $index['Descripcion']; ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Estado" class="col-sm-4 control-label">Estado<span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <!-- llenado dinamico por ajax -->
                                    <select  class="form-control" id="Estado" name="Estado" required="true">
                                        <option selected="true" disabled="true">Seleccione...</option>
                                    
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Municipio" class="col-sm-4 control-label">Municipio<span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <!-- llenado dinamico -->
                                    <select class="form-control" id="Municipio" name="Municipio" required="true">
                                        <option selected="true" disabled="true">Seleccione...</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Localidad" class="col-sm-4 control-label">Localidad<span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <!-- llenado dinamico -->
                                    <select class="form-control" id="Localidad" name="Localidad" required="true">
                                        <option selected="true" disabled="true">Seleccione...</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Colonia" class="col-sm-4 control-label">Colonia<span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <!-- llenado dinamico -->
                                    <select class="form-control" id="Colonia" name="Colonia" required="true">
                                        <option selected="true" disabled="true">Seleccione...</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="CodigoPostal" class="col-sm-4 control-label">Código postal<span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="CodigoPostal" name="CodigoPostal" placeholder="" required="true">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="TipoVialidad" class="col-sm-4 control-label">Tipo de vialidad<span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="TipoVialidad" name="TipoVialidad" placeholder="" required="true">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="NombreVialidad" class="col-sm-4 control-label">Nombre de vialidad<span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="NombreVialidad" name="NombreVialidad" placeholder="" required="true">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="NumeroExterior" class="col-sm-4 control-label">Numero exterior<span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="NumeroExterior" name="NumeroExterior" placeholder="" required="true">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="NumeroInterior" class="col-sm-4 control-label">Numero interior</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="NumeroInterior" name="NumeroInterior" placeholder="">
                                </div>
                            </div>

                            <!--- ================================ SECCION ESTUDIOS ================================-->
                            <!--- ================================ SECCION ESTUDIOS ================================-->

                            <div class="sub-title">
                                Estudios
                            </div>

                            <div class="form-group">
                                <label for="Escuela" class="col-sm-4 control-label">Escuela<span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="Escuela" name="Escuela" placeholder="" required="true">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="GradoEstudio" class="col-sm-4 control-label">Grado de estudio<span class="text-danger">*</span></label>
                                <div class="col-sm-8">

                                    <select class="form-control" id="GradoEstudio" name="GradoEstudio" required="true">
                                        <option selected="true" disabled="true">Seleccione...</option>
                                        <?php foreach( $aGradoEstudio as $index ): ?>
                                        <option value="<?php echo $index['Id']; ?>"><?php echo $index['Descripcion']; ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="FechaInicio" class="col-sm-4 control-label">Fecha Inicio<span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="FechaInicio" name="FechaInicio" placeholder="" required="true">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="FechaFin" class="col-sm-4 control-label">Fecha Fin<span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="FechaFin" name="FechaFin" placeholder="" required="true">
                                </div>
                            </div>

                            <!-- botones finales del formulario -->
                            <div class="form-buttons">
                                <button type="button" id="limpiar" class="btn">Limpiar</button>
                                <button type="submit" class="btn btn-success">Registrar empleado</button>
                            </div>
                            

                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- /container -->

        <!-- footer -->
        <div class="footer-creator">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <p><strong>Componentes requeridos</strong></p>
                        <ul>
                            <li>Bootstrap v3.3.7</li>
                            <li>jQuery 3.3.1</li>
                            <li>jQuery Mask</li>
                            <li>Select2</li>
                            <li>PHP 7.0</li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <p><strong>Librerías adicionales</strong></p>
                        <ul>
                            <li>Air Datepiker</li>
                            <li>SweetAlert</li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <p>Desarrollado por <strong>Isaí Madueño G.</strong></p>
                        <!-- <ul>
                            <li>Air Datepiker</li>
                            <li>SweetAlert</li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </div>





        <!-- Jquery & Bootstrap --->
        <script src="<?php echo JSDIR; ?>jquery-3.3.1.js"></script>
        <script src="<?php echo JSDIR; ?>bootstrap.min.js"></script>
        <!-- JQuery Mask -->
        <script src="<?php echo JSDIR; ?>jquery.mask.min.js"></script>
        <!-- Select2 -->
        <script src="<?php echo JSDIR; ?>select2.min.js"></script>
        <!-- air date picker -->
        <script src="<?php echo JSDIR; ?>datepicker.min.js"></script>
        <script src="<?php echo JSDIR; ?>datepicker.es.js"></script>
        <!-- archivos del sistema -->
        <script>
            // declaramos la variable base_url que usará "ajax.server.js"
            const base_url = '<?php echo DOCUMENT_ROOT;?>';
        </script>
        <script src="<?php echo JSDIR; ?>ajax.server.js"></script>
        <script src="<?php echo JSDIR; ?>empleado/empleado.js"></script>

    </body>

</html>