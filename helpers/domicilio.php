<?php
/*
 * helper para manejar las peticiones ajax desde empleados.js
 * Archivo que nos ayudará a controlar las peticiones AJAX
 * al cambio de los input.select relacionados con el domicilio
 * 
 */

 /*// pais --> estado --> municipio --> localidad --> colonia
// $aEstado        = $oCatalogo->GetCatEstado();
// $aMunicipio     = $oCatalogo->GetCatMunicipio();
// $aLocalidad     = $oCatalogo->GetCatLocalidad();
// $aColonia       = $oCatalogo->GetCatColonia();

// guardamos en variables los arreglos para desplegar en la vista*/

if(isset($_POST['catalogo']) && !empty($_POST['catalogo'])) {

    $catalogo = $_POST['catalogo'];
    echo json_encode( GetCatalogo( $catalogo ) );

}


// función principal que busca el catalogo y lo retorna
function GetCatalogo( $catalogo ){

    require_once( "../model/Catalogo.php" );

    $oCatalogo = new Catalogo();

    $catalogoHijos = array(
        'pais'      => 'estado',
        'estado'    => 'municipio',
        'municipio' => 'localidad',
        'localidad' => 'colonia'
    );

    $catActual     = strtolower( $catalogo );               // pais
    $catLlave      = 'IdCat'.ucfirst( $catActual );         // IdCatPais
    $catReturn     = $catalogoHijos[ $catActual ];          // estado
    $nuevoCatalogo = 'GetCat'.ucfirst( $catReturn );        // GetCatEStado

    $catalogoHijo  = $oCatalogo->$nuevoCatalogo();

    $respuesta = array(
        'catalogo'  => $catalogoHijo,
        'filtro'    => $catLlave
    );

    return $respuesta;
}

?>