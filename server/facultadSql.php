<?php 

   function insertarFacultad($conexion,$idFacultad,$nombreFacultad,$direccionFacultad,$telefonoFacultad){

   $insert = "INSERT INTO facultad(IDFACULTAD,NOMBREFACULTAD,DIRECCIONFACULTAD,TELEFONOFACULTAD) VALUES($idFacultad,'$nombreFacultad','$direccionFacultad',$telefonoFacultad)";
   $resultado = mysqli_query($conexion, $insert);

   }


    function eliminarFacultad($conexion,$idFacultad){

   $delete = "DELETE FROM  facultad WHERE IDFACULTAD = $idFacultad";
   $resultado = mysqli_query($conexion, $delete)

   }


    function actualizarFacultad($conexion,$idFacultad,$nombreFacultad,$direccionFacultad,$telefonoFacultad){

   $update = "UPDATE facultad SET  NOMBREFACULTAD=$nombreFacultad, DIRECCIONFACULTAD=$direccionFacultad, TELEFONOFACULTAD=$telefonoFacultad WHERE IDFACULTAD=$idFacultad";
   $resultado = mysqli_query($conexion, $update)

   }

   function mostrarFacultad($conexion){

    $selecionar="SELECT IDFACULTAD, NOMBREFACULTAD FROM facultad";
    $resultado=mysqli_query($conexion,$selecionar);
   }


 ?>