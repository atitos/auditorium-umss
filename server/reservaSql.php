<?php    
   
function insertarReserva($con,$idusuario,$idambiente,$titulo,$descripcion,$fechainicio,$fechafin,$horainicio,$horafin,$solicitante)
{
	mysqli_query($con, "INSERT INTO reserva
                                   (IDUSUARIO,IDAMBIENTE,TITULORESERVA,DESCRIPCIONRESERVA,FECHAINICIO, FECHAFIN,HORAINICIO,HORAFIN,SOLICITANTE)
                            VALUES ($idusuario,$idambiente,'$titulo','$descripcion','$fechainicio','$fechafin','$horainicio','$horafin','$solicitante')");
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

function mostrarReserva($conexion,$fechaInicio,$fechaFin)
{
	$filas = array();
    $selecionar="SELECT IDRESERVA, TITULORESERVA, FECHAINICIO, FECHAFIN, HORAINICIO, HORAFIN
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

?>