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
  $selecionar="SELECT IDRESERVA, TITULORESERVA, FECHAINICIO, FECHAFIN, HORAINICIO, HORAFIN, IDUSUARIO
               FROM reserva
               WHERE (FECHAINICIO BETWEEN '$fechaInicio' AND '$fechaFin')
               OR (FECHAFIN BETWEEN '$fechaInicio' AND '$fechaFin')
               OR ('$fechaInicio' BETWEEN FECHAINICIO AND FECHAFIN)
               OR ('$fechaFin' BETWEEN FECHAINICIO AND FECHAFIN)";
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

function consultaChoqueHoras($conexion,$fechaInicio, $fechaFin, $horaInicio, $horaFin, $idReserva = 0)
{
  $preguntar = "SELECT COUNT(*) AS CONTEO
                FROM reserva
                WHERE IDRESERVA != $idReserva
                AND (FECHAINICIO BETWEEN  '$fechaInicio' AND '$fechaFin'
                OR FECHAFIN BETWEEN '$fechaInicio' AND '$fechaFin')
                AND HORAINICIO < '$horaFin'
                AND HORAFIN > '$horaInicio'
                AND (HORAINICIO BETWEEN '$horaInicio' AND '$horaFin'
                OR HORAFIN BETWEEN '$horaInicio' AND '$horaFin')";
  $resultado = mysqli_query($conexion,$preguntar);
  $fila = $resultado->fetch_array(MYSQLI_ASSOC);
  return $fila;
}

function consultaAmbLibre($conexion, $fecha)
{

  $consulta ="SELECT  NOMBREAMBIENTE FROM ambiente WHERE NOMBREAMBIENTE NOT IN(SELECT ambiente.NOMBREAMBIENTE FROM reserva, ambiente WHERE reserva.IDAMBIENTE = ambiente.IDAMBIENTE AND reserva.FECHAINICIO = $fecha )";
  $resultado = mysqli_query($conexion,$consulta);
  $fila = $resultado->fetch_array(MYSQLI_ASSOC);
  return $fila;
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

?>