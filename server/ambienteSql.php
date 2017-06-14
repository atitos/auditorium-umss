<?php 

   function insertarAmbiente($conexion,$idFacultad,$idTipoAmbiente,$nombreAmbiente,$direccionAmbiente){

   $insert = "INSERT INTO ambiente(IDFACULTAD,IDTIPOAMBIENTE,NOMBREAMBIENTE,DIRECCIONAMBIENTE) VALUES($idFacultad,'$idTipoAmbiente','$nombreAmbiente','$direccionAmbiente')";
   $resultado = mysqli_query($conexion, $insert);

   }


    function eliminarAmbiente($conexion,$idAmbiente){

   $delete = "DELETE FROM  ambiente WHERE IDAMBIENTE = $idAmbiente";
   $resultado = mysqli_query($conexion, $delete);

  }


    function actualizarAmbiente($conexion,$idAmbiente,$idFacultad,$idTipoAmbiente,$nombreAmbiente,$direccionAmbiente){

   $update = "UPDATE ambiente SET IDFACULTAD=$idFacultad, IDTIPOAMBIENTE=$idTipoAmbiente, NOMBREAMBIENTE=$nombreAmbiente, DIRECCIONAMBIENTE=$direccionAmbiente WHERE IDAMBIENTE=$idAmbiente";
   $resultado = mysqli_query($conexion, $update);

  }

  function mostrarAmbiente($conexion){

    $seleccionar="SELECT IDAMBIENTE, NOMBREAMBIENTE FROM ambiente";
    $resultado=mysqli_query($conexion,$seleccionar);
  }

  function mostrarOptTiposAmbiente($conexion){

    $filas = array();
    $seleccionar="SELECT IDTIPOAMBIENTE, TIPOAMBIENTE
                 FROM tipoambiente";

    $resultado=mysqli_query($conexion,$seleccionar);

    while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
        $filas[] = $fila;
    }

    return $filas;
  }

 ?>