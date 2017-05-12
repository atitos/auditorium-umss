<?php 

   function insertarUsuario($conexion,$idRol,$ciUsuario,$nombreUsuario,$primerApellido,$segundoAplellido,$password){

   $insert = "INSERT INTO usuario(IDROL,CIUSUARIO,NOMBREUSUARIO,PRIMERAPELLIDO,SEGUNDOAPELLIDO,PASSWORD) VALUES($idRol,$ciUsuario,'$nombreUsuario','$primerApellido','$segundoAplellido','$password')";
   $resultado = mysqli_query($conexion, $insert);

   }


    function eliminarUsuario($conexion,$idUsuario){

   $delete = "DELETE FROM  usuario WHERE IDUSUARIO = $idUsuario";
   $resultado = mysqli_query($conexion, $delete)

   }


    function actualizarUsuario($conexion,$idUsuario,$idRol,$nombreUsuario,$primerApellido,$segundoAplellido,$password){

   $update = "UPDATE usuario SET IDROL=$idRol, CIUSUARIO=$ciUsuario, NOMBREUSUARIO=$nombreUsuario, PRIMERAPELLIDO=$primerApellido, SEGUNDOAPELLIDO=$segundoAplellido, PASSWORD=$password WHERE IDUSUARIO=$idUsuario";
   $resultado = mysqli_query($conexion, $update)

   }


 ?>