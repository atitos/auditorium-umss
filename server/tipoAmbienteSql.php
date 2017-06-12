<?php 

  function insertarTipoAmbiente($conexion,$tipoAmbiente){

    $insert = "INSERT INTO tipoambiente (TIPOAMBIENTE) VALUES('$tipoAmbiente')";
    $resultado = mysqli_query($conexion, $insert);

  }

 ?>