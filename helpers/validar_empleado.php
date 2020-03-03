<?php

/*
 * En este archivo PHP Instanciamos el modelo Empleado recibimos los datos del formulario
 * para realizar las validaciones y realizar el guardado del empleado
 */

 echo $_FILES;
/* if(isset( $_POST['empleado'] )){

    require_once( "../clases/Empleado.php" );
    $nuevoEmpleado = new Empleado();

    // asignamos los valores
    $nuevoEmpleado->setApellidoPaterno($_POST['empleado']['ApellidoPaterno']);
    $nuevoEmpleado->setApellidoMaterno($_POST['empleado']['ApellidoMaterno']);
    $nuevoEmpleado->setNombre($_POST['empleado']['Nombre']);
    $nuevoEmpleado->setSexo($_POST['empleado']['Sexo']);
    $nuevoEmpleado->setFechaNacimiento($_POST['empleado']['FechaNacimiento']);
    $nuevoEmpleado->setNumeroEmpleado($_POST['empleado']['NumeroEmpleado']);
    $nuevoEmpleado->setNumeroPension($_POST['empleado']['NumeroPension']);
    $nuevoEmpleado->setFotografia($_FILES['empleado']['Fotografia']);
    $nuevoEmpleado->setCURP($_POST['empleado']['CURP']);
    $nuevoEmpleado->setRFC($_POST['empleado']['RFC']);
    $nuevoEmpleado->setEstadoCivil($_POST['empleado']['EstadoCivil']);
    $nuevoEmpleado->setTipoSangre($_POST['empleado']['TipoSangre']);
    $nuevoEmpleado->setEstatura($_POST['empleado']['Estatura']);
    $nuevoEmpleado->setPeso($_POST['empleado']['Peso']);
    $nuevoEmpleado->setComplexion($_POST['empleado']['Complexion']);
    $nuevoEmpleado->setDiscapacidad($_POST['empleado']['Discapacidad']);
    $nuevoEmpleado->setPais($_POST['empleado']['Pais']);
    $nuevoEmpleado->setEstado($_POST['empleado']['Estado']);
    $nuevoEmpleado->setMunicipio($_POST['empleado']['Municipio']);
    $nuevoEmpleado->setLocalidad($_POST['empleado']['Localidad']);
    $nuevoEmpleado->setColonia($_POST['empleado']['Colonia']);
    $nuevoEmpleado->setCodigoPostal($_POST['empleado']['CodigoPostal']);
    $nuevoEmpleado->setTipoVialidad($_POST['empleado']['TipoVialidad']);
    $nuevoEmpleado->setNombreVialidad($_POST['empleado']['NombreVialidad']);
    $nuevoEmpleado->setNumeroExterior($_POST['empleado']['NumeroExterior']);
    $nuevoEmpleado->setNumeroInterior($_POST['empleado']['NumeroInterior']);

                
    $informacionEmpleado = array(
        'generales' => array(
            'ApellidoPaterno' => $nuevoEmpleado->getApellidoPaterno(),
            'ApellidoMaterno' => $nuevoEmpleado->getApellidoMaterno(),
            'Nombre' => $nuevoEmpleado->getNombre(),
            'Sexo' => $nuevoEmpleado->getSexo(),
            'FechaNacimiento' => $nuevoEmpleado->getFechaNacimiento(),
            'NumeroEmpleado' => $nuevoEmpleado->getNumeroEmpleado(),
            'NumeroPension' => $nuevoEmpleado->getNumeroPension(),
            'Fotografia' => $nuevoEmpleado->getFotografia()
        ),
        'adicionales' => array(
            'CURP' => $nuevoEmpleado->getCURP(),
            'RFC' => $nuevoEmpleado->getRFC(),
            'EstadoCivil' => $nuevoEmpleado->getEstadoCivil(),
            'TipoSangre' => $nuevoEmpleado->getTipoSangre(),
            'Estatura' => $nuevoEmpleado->getEstatura(),
            'Peso' => $nuevoEmpleado->getPeso(),
            'Complexion' => $nuevoEmpleado->getComplexion(),
            'Discapacidad' => $nuevoEmpleado->getDiscapacidad(),
        ),
        'domicilio' => array(
            'Pais' => $nuevoEmpleado->getPais(),
            'Estado' => $nuevoEmpleado->getEstado(),
            'Municipio' => $nuevoEmpleado->getMunicipio(),
            'Localidad' => $nuevoEmpleado->getLocalidad(),
            'Colonia' => $nuevoEmpleado->getColonia(),
            'CodigoPostal' => $nuevoEmpleado->getCodigoPostal(),
            'TipoVialidad' => $nuevoEmpleado->getTipoVialidad(),
            'NombreVialidad' => $nuevoEmpleado->getNombreVialidad(),
            'NumeroExterior' => $nuevoEmpleado->getNumeroExterior(),
            'NumeroInterior' => $nuevoEmpleado->getNumeroInterior()
        ),
        'estudios' => $_POST['estudios']
    );


    $nombreExpediente = crearTxtEmpleado( $informacionEmpleado );

    $respuesta = array(
        'error' => FALSE,
        'mensaje' => 'Se generó registro',
        'NumeroExpediente' => $nombreExpediente.'.txt',
        'NombreArchivo' => $nombreExpediente
    );

    echo json_encode( $respuesta );

}


function crearTxtEmpleado( $informacionEmpleado ){

    $informacionEmpleado = json_encode( $informacionEmpleado );

    $nombreArchivo = rand( 100, 500 );
    $fp = fopen("../registros/".$nombreArchivo.".txt", "w");
    fputs($fp, $informacionEmpleado);
    fclose($fp);

    return $nombreArchivo;
} */

?>