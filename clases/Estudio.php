<?php

class Estudio {

    private $Escuela;
	private $GradoEstudio;
	private $FechaInicio;
    private $FechaFin;


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