<?php    
   
function insertarReserva($con,$idusuario,$idambiente,$titulo,$descripcion,$fechainicio,$fechafin,$horainicio,$horafin,$solicitante)
{
	mysqli_query($con, "INSERT INTO reserva
                                   (IDUSUARIO,IDAMBIENTE,TITULORESERVA,DESCRIPCIONRESERVA,FECHAINICIO, FECHAFIN,HORAINICIO,HORAFIN,SOLICITANTE)
                        VALUES ($idusuario,$idambiente,'$titulo','$descripcion','$fechainicio','$fechafin','$horainicio','$horafin','$solicitante')");
}

function insertarEventoCronograma($con,$idFacultad,$fecha,$actividad)
{
    mysqli_query($con, "INSERT INTO calendario (IDFACULTAD,FECHACALENDARIO,ACTIVIDAD)
                        VALUES ($idFacultad,'$fecha','$actividad')");
}

function actualizarReserva($con,$idreserva,$titulo,$descripcion,$fechainicio,$fechafin,$horainicio,$horafin,$solicitante)
{
	mysqli_query($con, "UPDATE reserva
			SET TITULORESERVA='$titulo',
				DESCRIPCIONRESERVA='$descripcion',
				FECHAINICIO='$fechainicio',
				FECHAFIN='$fechafin',
				HORAINICIO ='$horainicio',
				HORAFIN ='$horafin',
				SOLICITANTE='$solicitante'
			WHERE IDRESERVA='$idreserva'");
}

function mostrarReservas($conexion,$fechaInicio,$fechaFin)
{
	$filas = array();
  $selecionar="SELECT res.IDRESERVA, res.TITULORESERVA, res.FECHAINICIO, res.FECHAFIN, res.HORAINICIO, res.HORAFIN, res.IDUSUARIO,
                      usr.NOMBREUSUARIO, amb.NOMBREAMBIENTE
               FROM reserva res, usuario usr, ambiente amb 
               WHERE res.IDUSUARIO = usr.IDUSUARIO
               AND res.IDAMBIENTE = amb.IDAMBIENTE
               AND ((res.FECHAINICIO BETWEEN '$fechaInicio' AND '$fechaFin')
               OR (res.FECHAFIN BETWEEN '$fechaInicio' AND '$fechaFin')
               OR ('$fechaInicio' BETWEEN res.FECHAINICIO AND res.FECHAFIN)
               OR ('$fechaFin' BETWEEN res.FECHAINICIO AND res.FECHAFIN))";
  $resultado=mysqli_query($conexion,$selecionar);
  while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
      $filas[] = $fila;
  }
  return $filas;
}

function mostrarReserva($conexion,$idReserva)
{
    $filas = array();
    $selecionar="SELECT SOLICITANTE, DESCRIPCIONRESERVA, TITULORESERVA, FECHAINICIO, FECHAFIN, HORAINICIO, HORAFIN
                 FROM reserva
                 WHERE IDRESERVA=$idReserva";
    $resultado=mysqli_query($conexion,$selecionar);
    while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
        $filas[] = $fila;
    }
    return $filas;
}

function consultaChoqueFechas($conexion, $fechaInicio, $fechaFin)
{
  $preguntar = "SELECT COUNT(*) AS CONTEO
                FROM reserva
                WHERE FECHAINICIO BETWEEN  $fechaInicio AND $fechaFin
                OR FECHAFIN BETWEEN $fechaInicio AND $fechaFin";
  $resultado = mysqli_query($conexion,$preguntar);
  $fila = $resultado->fetch_array(MYSQLI_ASSOC);
  return $fila;

}

function consultaChoqueHoras($conexion,$fechaInicio, $fechaFin, $horaInicio, $horaFin, $idAmbiente, $idReserva = 0)
{
  $preguntar = "SELECT COUNT(*) AS CONTEO
                FROM reserva
                WHERE IDRESERVA != $idReserva
                AND IDAMBIENTE = $idAmbiente
                AND ((FECHAINICIO BETWEEN  '$fechaInicio' AND '$fechaFin'
                OR FECHAFIN BETWEEN '$fechaInicio' AND '$fechaFin'
                OR '$fechaInicio' BETWEEN FECHAINICIO AND FECHAFIN
                OR '$fechaFin' BETWEEN FECHAINICIO AND FECHAFIN)
                AND HORAINICIO != '$horaFin'
                AND HORAFIN != '$horaInicio'
                AND (HORAINICIO BETWEEN '$horaInicio' AND '$horaFin'
                OR HORAFIN BETWEEN '$horaInicio' AND '$horaFin'
                OR '$horaInicio' BETWEEN HORAINICIO AND HORAFIN
                OR '$horaFin' BETWEEN HORAINICIO AND HORAFIN))";
  $resultado = mysqli_query($conexion,$preguntar);
  $fila = $resultado->fetch_array(MYSQLI_ASSOC);
  return $fila;
}

function consultaAmbLibre($conexion, $fechaInicio, $fechaFin, $horaInicio, $horaFin, $soloIds)
{

  $consulta ="SELECT  IDAMBIENTE, NOMBREAMBIENTE
              FROM ambiente
              WHERE IDAMBIENTE NOT IN(SELECT IDAMBIENTE
                                      FROM reserva
                                      WHERE ((FECHAINICIO BETWEEN  '$fechaInicio' AND '$fechaFin'
                                      OR FECHAFIN BETWEEN '$fechaInicio' AND '$fechaFin'
                                      OR '$fechaInicio' BETWEEN FECHAINICIO AND FECHAFIN
                                      OR '$fechaFin' BETWEEN FECHAINICIO AND FECHAFIN)
                                      AND HORAINICIO != '$horaFin'
                                      AND HORAFIN != '$horaInicio'
                                      AND (HORAINICIO BETWEEN '$horaInicio' AND '$horaFin'
                                      OR HORAFIN BETWEEN '$horaInicio' AND '$horaFin'
                                      OR '$horaInicio' BETWEEN HORAINICIO AND HORAFIN
                                      OR '$horaFin' BETWEEN HORAINICIO AND HORAFIN)))";
  $resultado = mysqli_query($conexion,$consulta);
  while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
    if ($soloIds) {
      $filas[] = $fila['IDAMBIENTE'];
    }
    else {
      $filas[] = $fila;
    }
  }
  return $filas;
}

function eliminarCalendarioFacultad($conexion, $idFacultad)
{
  $consulta = "DELETE FROM calendario WHERE IDFACULTAD = $idFacultad";
  $resultado = mysqli_query($conexion,$consulta);
}

function eliminarReserva($conexion, $idReserva)
{
  $consulta = "DELETE FROM reserva WHERE IDRESERVA = $idReserva";
  $resultado = mysqli_query($conexion,$consulta);
}


function mostrarCalendario($conexion)
{

   $consulta = "SELECT IDCALENDARIO, FECHACALENDARIO, ACTIVIDAD FROM calendario";
   $resultado = mysqli_query($conexion,$consulta);
   $resultado->fetch_array(MYSQLI_ASSOC);
   return $resultado;

}

function mostrarReservPorAmbiente($conexion,$idambiente)
{
  $consulta="SELECT TITULORESERVA FROM reserva WHERE IDAMBIENTE = $idambiente";
  $resultado=mysqli_query($conexion,$consulta);
  $resultado->fetch_array(MYSQLI_ASSOC);
  return $resultado;
}



?>