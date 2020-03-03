<?php

class Estudio {

    private $Escuela;
	private $GradoEstudio;
	private $FechaInicio;
    private $FechaFin;


    public function validaEstudio(){

        $errors = [];
        $error = FALSE;

        if( $this->Escuela == '' ){
            $error = TRUE;
            array_push( $errors, array(
                'campo'   => 'Escuela',
                'mensaje' => 'El campo "Escuela" está vacio.'
            ) );
        }
        if( !$this->validarFecha( $this->FechaInicio ) ){
            $error = TRUE;
            array_push( $errors, array(
                'campo'   => 'FechaInicio',
                'mensaje' => 'La fecha inicio es incorrecta o está incompleta'
            ) );
        }
        if( !$this->validarFecha( $this->FechaFin ) ){
            $error = TRUE;
            array_push( $errors, array(
                'campo'   => 'FechaFin',
                'mensaje' => 'La fecha fin es incorrecta o está incompleta'
            ) );
        }
        if( !$this->validarGradoEstudio( $this->GradoEstudio ) ){
            $error = TRUE;
            array_push( $errors, array(
                'campo'   => 'GradoEstudio',
                'mensaje' => 'El valor para Grado de Estudio es incorrecto o no se proporcionó'
            ) );
        }
        if( !$error ){
            // sí pasamos la validación
            return TRUE;
        }else{
            // no pasamos la validacion
            return $errors;
        }
    }

    function validarFecha( $fecha ){

        if( $fecha != '' ){
            // formato = dd/mm/aaaa
            $fechaArray = explode( "/", $fecha );
            // checkdate recibe = mm/dd/aaa
            return checkdate( $fechaArray[1], $fechaArray[0], $fechaArray[2] );
        }else{
            return false;
        }
    }

    function validarGradoEstudio( $grado ){
        return is_numeric( $grado );
    }

    public function getEscuela(){
        return $this->Escuela;
    }

    public function setEscuela($Escuela){
        $this->Escuela = $Escuela;
    }

    public function getGradoEstudio(){
        return $this->GradoEstudio;
    }

    public function setGradoEstudio($GradoEstudio){
        $this->GradoEstudio = $GradoEstudio;
    }

    public function getFechaInicio(){
        return $this->FechaInicio;
    }

    public function setFechaInicio($FechaInicio){
        $this->FechaInicio = $FechaInicio;
    }

    public function getFechaFin(){
        return $this->FechaFin;
    }

    public function setFechaFin($FechaFin){
        $this->FechaFin = $FechaFin;
    }
}