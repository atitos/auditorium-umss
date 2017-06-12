<?php 

  function insertarRol($conexion,$tipoRol){

    $insert = "INSERT INTO rol (TIPOROL) VALUES('$tipoRol')";
    $resultado = mysqli_query($conexion, $insert);

  }

 ?>