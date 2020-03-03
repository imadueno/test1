<?php

/*
 * Archivo que nos ayudará a validar sí el registro de estudio es valido
 * Desde empleado.js se manda la petición
 * 
*/

if( isset( $_POST['parametros'] ) ){

    if( validarCampos( $_POST['parametros'] ) ){

        //validarCampos = true
    }else{

        // validar campos = error array
    }

}


function validarCampos( $oParams ){

    require_once( "../clases/Estudio.php" );
    $oEstudio = new Estudio();

    $oEstudio->setEscuela( $oParams['Escuela'] );
    $oEstudio->setGradoEstudio( $oParams['GradoEstudio'] );
    $oEstudio->setFechaInicio( $oParams['FechaInicio'] );
    $oEstudio->setFechaFin( $oParams['FechaFin'] );

    if( $oEstudio->validaEstudio() === TRUE ){

        // si pasa la validación
        $respuesta = array(
            'error' => FALSE,
            'mensaje' => 'Agregado'
        );

    }else{
        
        // si falla manda los errores
        $respuesta = array(
            'error' => TRUE,
            'mensaje' => 'Hay errores en los datos',
            'errores' => $oEstudio->validaEstudio()
        );
    }

    echo json_encode( $respuesta );
}

