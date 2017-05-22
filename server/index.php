<?php
include 'conexion.php';
include 'usuarioSQL.php';
include 'reservaSql.php';
include 'facultadSql.php';
include 'ambienteSql.php';

header('Content-Type: application/json');

$sqlCon = conexion();
$aResult = array();

if ( isset($_GET['accion']) ) {
    $aResult = runGET($sqlCon, $_GET);
}
elseif ( isset($_POST['accion']) ) {
  $aResult = runPOST($sqlCon, $_POST);
}
else {
  $aResult['error'] = 'Servicio no encontrado!';
}

echo json_encode($aResult);


function runGET ($sqlCon, $get)
{
  $result = array();

  switch ($get['accion']) {
    case 'getReservas':
      $sqlResults = mostrarReserva($sqlCon, $get['start'], $get['end']);
      foreach ($sqlResults as $sqlResult) {
        $fila['id'] = $sqlResult['IDRESERVA'];
        $fila['title'] = $sqlResult['TITULORESERVA'];
        $fila['start'] = $sqlResult['FECHAINICIO'].'T'.$sqlResult['HORAINICIO'];
        $fila['end'] = $sqlResult['FECHAFIN'].'T'.$sqlResult['HORAFIN'];

        $result[] = $fila;
      }
      break;
    
    default:
      $result['error'] = 'La accion "'.$get['accion'].'" no existe!';
      break;
  }

  return $result;
}

function runPOST($sqlCon, $post)
{
  $result = array();

  switch($post['accion']) {
      case 'registrarUsuario':
        if( !is_array($post['parametros']) || (count($post['parametros']) < 1) ) {
            $result['error'] = 'Error en Parametros!';
        }
        else {

          insertarUsuario($sqlCon, $post['parametros'][0], $post['parametros'][1],
                                  $post['parametros'][2], $post['parametros'][3],
                                  $post['parametros'][4], $post['parametros'][5]);
          $result['respuesta'] = 'Usuario Registrado';
        }
        break;

      case 'registrarEvento':
        if( !is_array($post['parametros']) || (count($post['parametros']) < 1) ) {
            $result['error'] = 'Error en Parametros!';
        }
        else {
          insertarReserva($sqlCon, $post['parametros'][0], $post['parametros'][1],
                                  $post['parametros'][2], $post['parametros'][3],
                                  $post['parametros'][4], $post['parametros'][5],
                                  $post['parametros'][6], $post['parametros'][7],
                                  $post['parametros'][8]);
          $result['respuesta'] = "Evento Registrado";
        }
        break;

      case 'registrarFacultad':
        if( !is_array($post['parametros']) || (count($post['parametros']) < 1) ) {
            $result['error'] = 'Error en Parametros!';
        }
        else {
          insertarFacultad($sqlCon, $post['parametros'][0],
                                    $post['parametros'][1],
                                    $post['parametros'][2]);
          $result['respuesta'] = "Facultad Registrada";
        }
        break;

      case 'registrarAmbiente':
        if( !is_array($post['parametros']) || (count($post['parametros']) < 1) ) {
            $result['error'] = 'Error en Parametros!';
        }
        else {
          insertarAmbiente($sqlCon, $post['parametros'][0], $post['parametros'][1],
                                    $post['parametros'][2], $post['parametros'][3]);
          $result['respuesta'] = "Ambiene Registrado";
        }
        break;

      default:
         $result['error'] = 'La accion "'.$post['accion'].'" no existe!';
         break;
  }

  return $result;
}
?>