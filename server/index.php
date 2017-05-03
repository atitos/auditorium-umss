<?php
    include 'conexion.php';

    header('Content-Type: application/json');

    $sqlCon = conexion()
    $aResult = array();

    if( !isset($_POST['accion']) ) {
        $aResult['error'] = 'Servicio no encontrado!';
      }

    if( !isset($aResult['error']) ) {

        switch($_POST['accion']) {
            case 'registrarUsuario':
              if( !is_array($_POST['parametros']) || (count($_POST['parametros']) < 1) ) {
                  $aResult['error'] = 'Error en Parametros!';
              }
              else {
                $aResult['respuesta'] = "Request Arrived!!! Usuario Registrado";
                // adicionar codigo para llamar a las funciones SQL
              }
              break;
            case 'registrarEvento':
              if( !is_array($_POST['parametros']) || (count($_POST['parametros']) < 1) ) {
                  $aResult['error'] = 'Error en Parametros!';
              }
              else {
                $aResult['respuesta'] = "Request Arrived!!! Evento Registrado";
                // adicionar codigo para llamar a las funciones SQL
              }
              break;
            case 'registrarFacultad':
              if( !is_array($_POST['parametros']) || (count($_POST['parametros']) < 1) ) {
                  $aResult['error'] = 'Error en Parametros!';
              }
              else {
                $aResult['respuesta'] = "Request Arrived!!! Facultad Registrado";
                // adicionar codigo para llamar a las funciones SQL
              }
              break;
            case 'registrarAmbiente':
              if( !is_array($_POST['parametros']) || (count($_POST['parametros']) < 1) ) {
                  $aResult['error'] = 'Error en Parametros!';
              }
              else {
                $aResult['respuesta'] = "Request Arrived!!! Ambiene Registrado";
                // adicionar codigo para llamar a las funciones SQL
              }
              break;

            default:
               $aResult['error'] = 'La accion "'.$_POST['accion'].'" no existe!';
               break;
        }

    }

    echo json_encode($aResult);
?>