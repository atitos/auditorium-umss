<?php 

  function insertarFacultad($conexion,$nombreFacultad,$direccionFacultad,$telefonoFacultad){

    $insert = "INSERT INTO facultad (NOMBREFACULTAD,DIRECCIONFACULTAD,TELEFONOFACULTAD)
              VALUES ('$nombreFacultad','$direccionFacultad',$telefonoFacultad)";
    $resultado = mysqli_query($conexion, $insert);

  }


  function eliminarFacultad($conexion,$idFacultad){

    $delete = "DELETE FROM  facultad WHERE IDFACULTAD = $idFacultad";
    $resultado = mysqli_query($conexion, $delete);

  }


  function actualizarFacultad($conexion,$idFacultad,$nombreFacultad,$direccionFacultad,$telefonoFacultad){

    $update = "UPDATE facultad SET  NOMBREFACULTAD=$nombreFacultad, DIRECCIONFACULTAD=$direccionFacultad, TELEFONOFACULTAD=$telefonoFacultad WHERE IDFACULTAD=$idFacultad";
    $resultado = mysqli_query($conexion, $update);

  }

  function mostrarOptFacultades($conexion){

    $filas = array();
    $seleccionar="SELECT IDFACULTAD, NOMBREFACULTAD
                 FROM facultad";

    $resultado=mysqli_query($conexion,$seleccionar);

    while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
        $filas[] = $fila;
    }

    return $filas;
  }

 ?>