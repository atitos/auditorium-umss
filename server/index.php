<?php
include 'conexion.php';
include 'usuarioSQL.php';
include 'reservaSql.php';
include 'facultadSql.php';
include 'ambienteSql.php';
include 'rolSql.php';
include 'tipoAmbienteSql.php';
include 'excel_reader/PHPExcel.php';

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
      $sqlResults = mostrarReservas($sqlCon, $get['start'], $get['end']);
      foreach ($sqlResults as $sqlResult) {
        $fila['id'] = $sqlResult['IDRESERVA'];
        $fila['title'] = $sqlResult['TITULORESERVA'];
        $fila['start'] = $sqlResult['FECHAINICIO'].'T'.$sqlResult['HORAINICIO'];
        $fila['end'] = $sqlResult['FECHAFIN'].'T'.$sqlResult['HORAFIN'];
        $fila['idUsuario'] = $sqlResult['IDUSUARIO'];

        $result[] = $fila;
      }
      break;
    
    case 'getReserva':
      $sqlResults = mostrarReserva($sqlCon, $get['idReserva']);
      foreach ($sqlResults as $sqlResult) {
        $fila['usuario'] = $sqlResult['SOLICITANTE'];
        $fila['titulo'] = $sqlResult['TITULORESERVA'];
        $fila['descripcion'] = $sqlResult['DESCRIPCIONRESERVA'];
        $fila['fechaInicio'] = $sqlResult['FECHAINICIO'];
        $fila['fechaFin'] = $sqlResult['FECHAFIN'];
        $fila['horaInicio'] = $sqlResult['HORAINICIO'];
        $fila['horaFin']=$sqlResult['HORAFIN'];

        $result = $fila;
      }
      break;

    case 'getOptAmbientes':
      $sqlResults = mostrarOptAmbientes($sqlCon);
      foreach ($sqlResults as $sqlResult) {
        $fila['value'] = $sqlResult['IDAMBIENTE'];
        $fila['text'] = $sqlResult['NOMBREAMBIENTE'];

        $result[] = $fila;
      }
      break;

    case 'getOptTiposAmbiente':
      $sqlResults = mostrarOptTiposAmbiente($sqlCon);
      foreach ($sqlResults as $sqlResult) {
        $fila['value'] = $sqlResult['IDTIPOAMBIENTE'];
        $fila['text'] = $sqlResult['TIPOAMBIENTE'];

        $result[] = $fila;
      }
      break;

    case 'getOptFacultades':
      $sqlResults = mostrarOptFacultades($sqlCon);
      foreach ($sqlResults as $sqlResult) {
        $fila['value'] = $sqlResult['IDFACULTAD'];
        $fila['text'] = $sqlResult['NOMBREFACULTAD'];

        $result[] = $fila;
      }
      break;

    case 'getOptRoles':
      $sqlResults = mostrarOptRoles($sqlCon);
      foreach ($sqlResults as $sqlResult) {
        $fila['value'] = $sqlResult['IDROL'];
        $fila['text'] = $sqlResult['TIPOROL'];

        $result[] = $fila;
      }
      break;

    case 'obtenerDatosUsuario':
      $sqlResults = mostrarDatosUsuario($sqlCon, $get['id']);
      foreach ($sqlResults as $sqlResult) {
        $fila['nombre'] = $sqlResult['NOMBRE'];
        $fila['rol'] = $sqlResult['ROL'];

        $result = $fila;
      }
      break;

    case 'filtrarPorFechas':
      $sqlResults = array();
      if (isset($get['fechas'])) {
        foreach ($get['fechas'] as $fecha) {
          if (count($sqlResults) > 0){
            $tmpResult = consultaAmbLibre($sqlCon,
                                           $fecha,
                                           $fecha,
                                           $get['horaInicio'],
                                           $get['horaFin'],
                                           true);
            $sqlResults = array_intersect($tmpResult, $sqlResults);
          }
          else {
            $sqlResults = consultaAmbLibre($sqlCon,
                                           $fecha,
                                           $fecha,
                                           $get['horaInicio'],
                                           $get['horaFin'],
                                           true);
          }

          if (count($sqlResults) == 0) {
            $result['error'] = 'La secuencia tiene conflictos con otras reservas.';
            break;
          }
        }

        if (count($sqlResults) > 0) {
          $sqlResults = obtenerAmbientes($sqlCon, $sqlResults);
        }
      }
      else {
        $sqlResults = consultaAmbLibre($sqlCon,
                                       $get['fechaInicio'],
                                       $get['fechaFin'],
                                       $get['horaInicio'],
                                       $get['horaFin'],
                                       false);

        if (count($sqlResults) == 0) {
          $result['error'] = 'La secuencia tiene conflictos con otras reservas.';
        }
      }

      if (!(isset($result['error']))) {
        foreach ($sqlResults as $sqlResult) {
          $fila['value'] = $sqlResult['IDAMBIENTE'];
          $fila['text'] = $sqlResult['NOMBREAMBIENTE'];

          $result[] = $fila;
        }
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
                                  $post['parametros'][4], md5($post['parametros'][5]));

          $resp = validarUsuario($sqlCon, $post['parametros'][1], md5($post['parametros'][5]));
          $result = $resp;

          $result['respuesta'] = 'Usuario Registrado';
        }
        break;

      case 'registrarEvento':
        if( !is_array($post['parametros']) || (count($post['parametros']) < 1) ) {
            $result['error'] = 'Error en Parametros!';
        }
        else {
          $conteo = consultaChoqueHoras($sqlCon, $post['parametros'][4], $post['parametros'][5],
                              $post['parametros'][6], $post['parametros'][7], $post['parametros'][1]);
          if ($conteo['CONTEO'] > 0) {
            $result['error'] = 'Existen reservas en conflicto. No fue posible guardar su reserva.';
          }
          else {
            insertarReserva($sqlCon, $post['parametros'][0], $post['parametros'][1],
                            $post['parametros'][2], $post['parametros'][3],
                            $post['parametros'][4], $post['parametros'][5],
                            $post['parametros'][6], $post['parametros'][7],
                            $post['parametros'][8]);
            $result['respuesta'] = "Evento Registrado";
          }
        }
        break;

      case 'actualizarEvento':
        if( !is_array($post['parametros']) || (count($post['parametros']) < 1) ) {
            $result['error'] = 'Error en Parametros!';
        }
        else {
          $conteo = consultaChoqueHoras($sqlCon, $post['parametros'][3], $post['parametros'][4],
                              $post['parametros'][5], $post['parametros'][6], $post['parametros'][8], $post['parametros'][0]);
          if ($conteo['CONTEO'] > 0) {
            $result['error'] = 'Existen reservas en conflicto. No fue posible guardar su reserva.';
          }
          else {
            actualizarReserva($sqlCon, $post['parametros'][0],
                            $post['parametros'][1], $post['parametros'][2],
                            $post['parametros'][3], $post['parametros'][4],
                            $post['parametros'][5], $post['parametros'][6],
                            $post['parametros'][7]);
            $result['respuesta'] = "Evento Actualizado!";
          }
        }
        break;

      case 'eliminarEvento':
        if( !is_array($post['parametros']) || (count($post['parametros']) < 1) ) {
            $result['error'] = 'Error en Parametros!';
        }
        else {
          eliminarReserva($sqlCon, $post['parametros'][0]);
          $result['respuesta'] = "Evento Eliminado!";
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
                                    $post['parametros'][2], $post['parametros'][3],$post['parametros'][4]);
          $result['respuesta'] = "Ambiene Registrado";
        }
        break;

      case 'registrarTipoAmbiente':
        if( !is_array($post['parametros']) || (count($post['parametros']) < 1) ) {
            $result['error'] = 'Error en Parametros!';
        }
        else {
          insertarTipoAmbiente($sqlCon, $post['parametros'][0]);
          $result['respuesta'] = "Tipo Ambiene Registrado";
        }
        break;

      case 'registrarRol':
        if( !is_array($post['parametros']) || (count($post['parametros']) < 1) ) {
            $result['error'] = 'Error en Parametros!';
        }
        else {
          insertarRol($sqlCon, $post['parametros'][0]);
          $result['respuesta'] = "Rol Registrado";
        }
        break;

      case 'subirCronograma':
        if (!empty($_FILES)) {
          $archivo = $_FILES['archivo'];
          $nombre = $archivo['name'];
          $idFacultad = $post['idFacultad'];
          $directorio = 'cronograma/';
          if (file_exists($directorio . $nombre)) {
            $token = date('mdY_his');
            rename($directorio.$nombre, $directorio.$nombre.'.'.$token);
          }

          $success = move_uploaded_file($archivo["tmp_name"], $directorio.$nombre);

          if ($success) {
            procesarCronograma($sqlCon,$idFacultad, $directorio, $nombre);
          }

          $result['respuesta'] = 'Calendario Cargado!';
        }
        break;

      case 'conectarUsuario':
        $resp = validarUsuario($sqlCon, $post['ci'], md5($post['pass']));
        if ($resp['esValido']) {
          $result = $resp;
        }
        else
        {
          $result['error'] = 'Usuario/Password no valido.';
        }
        break;

      default:
         $result['error'] = 'La accion "'.$post['accion'].'" no existe!';
         break;
  }

  return $result;
}

function procesarCronograma($con,$idFc, $dir, $nom)
{
  $eventos = array();

  eliminarCalendarioFacultad($con, $idFc);

  $archivo = $dir.$nom;
  $objPHPExcel = PHPExcel_IOFactory::load($archivo);

  $sheet = $objPHPExcel->getSheet(0);
  $highestRow = $sheet->getHighestRow();
  $highestColumn = $sheet->getHighestColumn();
  $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
  $setEvento = 0;
  $colFecha = array();
  $colActiv = array();

  for ($row = 0; $row <= $highestRow; ++ $row) {
    $evento = array();
    $fecha = null;
    $actividad = null;
    for ($col = 0; $col < $highestColumnIndex; ++ $col) {
      $cell = $sheet->getCellByColumnAndRow($col, $row);
      $colVal = $cell->getValue();
      if ($setEvento == 0 && $colVal === 'Fecha') {
        $colFecha[] = $col;
      }
      elseif ($setEvento == 0 && $colVal === 'Actividad') {
        $colActiv[] = $col;
      }
      elseif ($setEvento > 0 && ($colVal === 'Fecha' || $colVal === 'Actividad')) {
        # no hacemos nada porque esta celda es una cabecera de columna.
      }
      elseif (count($colFecha) > 0 && $col == $colFecha[$setEvento]) {
        $calcVal = $cell->getCalculatedValue();
        $fecha = PHPExcel_Style_NumberFormat::toFormattedString($calcVal, 'YYYY-MM-DD');
        $evento['fecha'] = $fecha;
      }
      elseif (count($colActiv) > 0 && $col == $colActiv[$setEvento]) {
        $actividad = $cell->getCalculatedValue();
        $evento['actividad'] = $actividad;
      }
    }

    if (isset($evento['actividad']) && $evento['actividad'] != null) {
      $eventos[] = $evento;
    }

    if ($row == $highestRow && $setEvento < count($colFecha)-1) {
      $setEvento = $setEvento + 1;
      $row = -1;
    }
  }

  foreach ($eventos as $evento) {
    insertarEventoCronograma($con, $idFc, $evento['fecha'], $evento['actividad']);
  }
}
?>