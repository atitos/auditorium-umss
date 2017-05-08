<?php    
   
function insertarReserva($con,$idusuario,$idambiente,$titulo,$descripcion,$fechainicio,$fechafin,$horainicio,$horafin,$solicitante)
{
	mysqli_query($con, "INSERT INTO reserva (IDUSUARIO,IDAMBIENTE,TITULORESERVA,DESCRIPCIONRESERVA,FECHAINICIO, FECHAFIN,HORAINICIO,HORAFIN,SOLICITANTE)
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

?>