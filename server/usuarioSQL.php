<?php 

  function insertarUsuario($conexion,$idRol,$ciUsuario,$nombreUsuario,$primerApellido,$segundoApellido,$password)
  {
    $insert = "INSERT INTO usuario(IDROL,CIUSUARIO,NOMBREUSUARIO,PRIMERAPELLIDO,SEGUNDOAPELLIDO,PASSWORD)
              VALUES($idRol,$ciUsuario,'$nombreUsuario','$primerApellido','$segundoApellido','$password')";
    $resultado = mysqli_query($conexion, $insert);
  }


  function eliminarUsuario($conexion,$idUsuario)
  {
    $delete = "DELETE FROM usuario
              WHERE IDUSUARIO = $idUsuario";
    $resultado = mysqli_query($conexion, $delete);
  }


  function actualizarUsuario($conexion,$idUsuario,$idRol,$nombreUsuario,$primerApellido,$segundoApellido,$password)
  {
    $update = "UPDATE usuario 
               SET IDROL=$idRol,
                   CIUSUARIO=$ciUsuario,
                   NOMBREUSUARIO=$nombreUsuario,
                   PRIMERAPELLIDO=$primerApellido,
                   SEGUNDOAPELLIDO=$segundoApellido,
                   PASSWORD=$password
               WHERE IDUSUARIO=$idUsuario";
    $resultado = mysqli_query($conexion, $update);
  }

  function mostrarDatosUsuario($conexion,$idUsuario){

    $filas = array();
    $seleccionar="SELECT CONCAT(u.NOMBREUSUARIO,' ',u.PRIMERAPELLIDO,' ',u.SEGUNDOAPELLIDO) AS NOMBRE, r.TIPOROL AS ROL
                  FROM usuario u, rol r
                  WHERE u.IDUSUARIO=$idUsuario
                    AND u.IDROL=r.IDROL";


    $resultado=mysqli_query($conexion,$seleccionar);

    while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
        $filas[] = $fila;
    }

    return $filas;
  }

  function mostrarOptRoles($conexion){

    $filas = array();
    $seleccionar="SELECT IDROL, TIPOROL
                  FROM rol";


    $resultado=mysqli_query($conexion,$seleccionar);

    while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
        $filas[] = $fila;
    }

    return $filas;
  }

  function validarUsuario($conexion, $ciUsuario, $password){
    $consulta = "SELECT IDUSUARIO, NOMBREUSUARIO, PRIMERAPELLIDO, SEGUNDOAPELLIDO
                 FROM usuario
                 WHERE CIUSUARIO = '$ciUsuario'
                 AND PASSWORD = '$password'";

    $resultado=mysqli_query($conexion, $consulta);
    $usrRes = $resultado->fetch_array(MYSQLI_ASSOC);
    $conteo = count($usrRes);

    if ($conteo > 0) {
      $fila['esValido'] = true;
      $fila['usrId'] = $usrRes['IDUSUARIO'];
      $fila['usrNombre'] = $usrRes['NOMBREUSUARIO'];
      $fila['usrApellido1'] = $usrRes['PRIMERAPELLIDO'];
      $fila['usrApellido2'] = $usrRes['SEGUNDOAPELLIDO'];
    }
    else {
      $fila['esValido'] = false;
    }

    return $fila;
  }

  function validarCiUsuario($conexion, $ciUsuario)
  {

    $consulta ="SELECT COUNT(CIUSUARIO) AS CANTIDAD FROM usuario WHERE CIUSUARIO=$ciUsuario";
    $resultado=mysqli_query($conexion,$consulta);
    $res = $resultado->fetch_array(MYSQLI_ASSOC);

    $esValido = true;

    if ($res['CANTIDAD'] > 0) {
      $esValido = false;
    }

    return $esValido;
  }

 ?>