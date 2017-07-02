<?php 

   function insertarAmbiente($conexion,$idFacultad,$idTipoAmbiente,$nombreAmbiente,$direccionAmbiente,$idUsuario, $capacidadAmbiente){

   $insert = "INSERT INTO ambiente(IDFACULTAD,IDTIPOAMBIENTE,NOMBREAMBIENTE,DIRECCIONAMBIENTE,IDUSUARIO,CAPACIDAD)
                    VALUES ($idFacultad,'$idTipoAmbiente','$nombreAmbiente','$direccionAmbiente',$idUsuario,$capacidadAmbiente)";
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

  function mostrarOptAmbientes($conexion){
    $filas = array();

    $seleccionar="SELECT IDAMBIENTE, NOMBREAMBIENTE FROM ambiente";
    $resultado=mysqli_query($conexion,$seleccionar);

    while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
        $filas[] = $fila;
    }

    return $filas;
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

  function obtenerAmbientes($conexion, $idAmbientes){
    $filas = array();
    foreach ($idAmbientes as $id) {
      $seleccionar="SELECT IDAMBIENTE, NOMBREAMBIENTE
                    FROM ambiente
                    WHERE IDAMBIENTE=$id";
      $resultado=mysqli_query($conexion,$seleccionar);
      $filas[] = $resultado->fetch_array(MYSQLI_ASSOC);
    }

    return $filas;
  }

  function obtenerCapacidadAmbiente($conexion,$capacidadAmbiente)
  {
      $consulta="SELECT NOMBREAMBIENTE FROM ambiente WHERE CAPACIDAD>=$capacidadAmbiente";
      $resultado=mysqli_query($conexion,$consulta);
      $resultado->fetch_array(MYSQLI_ASSOC);
      return $resultado;
  }

 ?>