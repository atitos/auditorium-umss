<?php 

   function insertarAmbiente($conexion,$idFacultad,$tipoAmbiente,$nombreAmbiente,$direccionAmbiente){

   $insert = "INSERT INTO ambiente(IDFACULTAD,TIPOAMBIENTE,NOMBREAMBIENTE,DIRECCIONAMBIENTE) VALUES($idFacultad,'$tipoAmbiente','$nombreAmbiente','$direccionAmbiente')";
   $resultado = mysqli_query($conexion, $insert);

   }


    function eliminarAmbiente($conexion,$idAmbiente){

   $delete = "DELETE FROM  ambiente WHERE IDAMBIENTE = $idAmbiente";
   $resultado = mysqli_query($conexion, $delete);

  }


    function actualizarAmbiente($conexion,$idAmbiente,$idFacultad,$tipoAmbiente,$nombreAmbiente,$direccionAmbiente){

   $update = "UPDATE ambiente SET IDFACULTAD=$idFacultad, TIPOAMBIENTE=$tipoAmbiente, NOMBREAMBIENTE=$nombreAmbiente, DIRECCIONAMBIENTE=$direccionAmbiente WHERE IDAMBIENTE=$idAmbiente";
   $resultado = mysqli_query($conexion, $update);

  }

  function mostrarAmbiente($conexion){

    $selecionar="SELECT IDAMBIENTE, NOMBREAMBIENTE FROM ambiente";
    $resultado=mysqli_query($conexion,$selecionar);
  }


 ?>