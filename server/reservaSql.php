<?php    
   
     function guardar($con,$idusuario,$idambiente,$titulo,$descripcion,$fechainicio,$fechafin,$horainicio,$horafin,$solicitante){
	   
								  
    
           mysqli_query($con, "INSERT INTO reserva (IDUSUARIO,IDAMBIENTE,TITULORESERVA,DESCRIPCIONRESERVA,FECHAINICIO, FECHAFIN,HORAINICIO,HORAFIN,SOLICITANTE) VALUES ( $idusuario,$idambiente,'$titulo','$descripcion','$fechainicio','$fechafin','$horainicio','$horafin','$solicitante')");
	}

	function actualizar($con,$idreserva,$titulo,$descripcion,$fechainicio,$fechafin,$horainicio,$horafin,$solicitante){
	   
								  
    
          mysqli_query($con, "UPDATE reserva SET TITULORESERVA='$titulo',
										DESCRIPCIONRESERVA='$descripcion',FECHAINICIO='$fechainicio', FECHAFIN='$fechafin',HORAINICIO ='$horainicio' ,HORAFIN ='$horafin',SOLICITANTE='$solicitante'
								WHERE IDRESERVA='$idreserva'");

           
	}

	 function mostrarReserva($conexion){

    $selecionar="SELECT IDRESERVA, TITULORESERVA FROM reserva";
    $resultado=mysqli_query($conexion,$selecionar);
   }
   ?>