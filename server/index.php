<?php
include 'conexion.php';
include 'usuarioSQL.php';
include 'reservaSql.php';
include 'facultadSql.php';
include 'ambienteSql.php';

header('Content-Type: application/json');

$sqlCon = conexion();
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

            insertarUsuario($sqlCon, $_POST['parametros'][0], $_POST['parametros'][1],
                                    $_POST['parametros'][2], $_POST['parametros'][3],
                                    $_POST['parametros'][4], $_POST['parametros'][5]);
            $aResult['respuesta'] = 'Usuario Registrado';
          }
          break;

        case 'registrarEvento':
          if( !is_array($_POST['parametros']) || (count($_POST['parametros']) < 1) ) {
              $aResult['error'] = 'Error en Parametros!';
          }
          else {
            insertarReserva($sqlCon, $_POST['parametros'][0], $_POST['parametros'][1],
                                    $_POST['parametros'][2], $_POST['parametros'][3],
                                    $_POST['parametros'][4], $_POST['parametros'][5],
                                    $_POST['parametros'][6], $_POST['parametros'][7],
                                    $_POST['parametros'][8]);
            $aResult['respuesta'] = "Evento Registrado";
          }
          break;

        case 'registrarFacultad':
          if( !is_array($_POST['parametros']) || (count($_POST['parametros']) < 1) ) {
              $aResult['error'] = 'Error en Parametros!';
          }
          else {
            insertarFacultad($sqlCon, $_POST['parametros'][0],
                                      $_POST['parametros'][1],
                                      $_POST['parametros'][2]);
            $aResult['respuesta'] = "Facultad Registrada";
          }
          break;

        case 'registrarAmbiente':
          if( !is_array($_POST['parametros']) || (count($_POST['parametros']) < 1) ) {
              $aResult['error'] = 'Error en Parametros!';
          }
          else {
            insertarAmbiente($sqlCon, $_POST['parametros'][0], $_POST['parametros'][1],
                                      $_POST['parametros'][2], $_POST['parametros'][3]);
            $aResult['respuesta'] = "Ambiene Registrado";
          }
          break;

        default:
           $aResult['error'] = 'La accion "'.$_POST['accion'].'" no existe!';
           break;
    }

}

echo json_encode($aResult);

?>