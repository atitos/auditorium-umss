<?php
    header('Content-Type: application/json');

    $aResult = array();

    if( !isset($_POST['accion']) ) {
        $aResult['error'] = 'Servicio no encontrado!';
      }

    if( !isset($aResult['error']) ) {

        switch($_POST['accion']) {
            case 'registrarUsuario':
              if( !is_array($_POST['parametros']) || (count($_POST['parametros']) < 2) ) {
                  $aResult['error'] = 'Error en Parametros!';
              }
              else {
                $aResult['respuesta'] = "Request Arrived!!! Usuario Registrado";
                //$aResult['result'] = add(floatval($_POST['arguments'][0]), floatval($_POST['arguments'][1]));
              }
              break;
            case 'registrarEvento':
              break;
            case 'registrarfacultad':
              break;
            case 'registrarAmbiente':
              break;

            default:
               $aResult['error'] = 'La accion "'.$_POST['functionname'].'" no existe!';
               break;
        }

    }

    echo json_encode($aResult);
?>