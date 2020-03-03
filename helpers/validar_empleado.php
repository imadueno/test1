<?php

/*
 * En este archivo PHP Instanciamos el modelo Empleado recibimos los datos del formulario
 * para realizar las validaciones y realizar el guardado del empleado
 */

if(isset( $_POST )){

    require_once( "../clases/Empleado.php" );
    $nuevoEmpleado = new Empleado();

    // asignamos los valores
    $nuevoEmpleado->setApellidoPaterno($_POST['ApellidoPaterno']);
    $nuevoEmpleado->setApellidoMaterno($_POST['ApellidoMaterno']);
    $nuevoEmpleado->setNombre($_POST['Nombre']);
    $nuevoEmpleado->setSexo($_POST['Sexo']);
    $nuevoEmpleado->setFechaNacimiento($_POST['FechaNacimiento']);
    $nuevoEmpleado->setNumeroEmpleado($_POST['NumeroEmpleado']);
    $nuevoEmpleado->setNumeroPension($_POST['NumeroPension']);
    $nuevoEmpleado->setFotografia(1);
    $nuevoEmpleado->setCURP($_POST['CURP']);
    $nuevoEmpleado->setRFC($_POST['RFC']);
    $nuevoEmpleado->setEstadoCivil($_POST['EstadoCivil']);
    $nuevoEmpleado->setTipoSangre($_POST['TipoSangre']);
    $nuevoEmpleado->setEstatura($_POST['Estatura']);
    $nuevoEmpleado->setPeso($_POST['Peso']);
    $nuevoEmpleado->setComplexion($_POST['Complexion']);
    $nuevoEmpleado->setDiscapacidad($_POST['Discapacidad']);
    $nuevoEmpleado->setPais($_POST['Pais']);
    $nuevoEmpleado->setEstado($_POST['Estado']);
    $nuevoEmpleado->setMunicipio($_POST['Municipio']);
    $nuevoEmpleado->setLocalidad($_POST['Localidad']);
    $nuevoEmpleado->setColonia($_POST['Colonia']);
    $nuevoEmpleado->setCodigoPostal($_POST['CodigoPostal']);
    $nuevoEmpleado->setTipoVialidad($_POST['TipoVialidad']);
    $nuevoEmpleado->setNombreVialidad($_POST['NombreVialidad']);
    $nuevoEmpleado->setNumeroExterior($_POST['NumeroExterior']);
    $nuevoEmpleado->setNumeroInterior($_POST['NumeroInterior']);

                
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
        'estudios' => 'pendiente'
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
}

?>