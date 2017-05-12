<?php 

   include 'conexion.php';
   $con=conexion();

   $ci = $_POST['ci'];
   $nombre = $_POST['nombre'];
   $apellido1 = $_POST['apellidoPaterno'];
   $apellido2= $_POST['apellidoMaterno'];
   $cargo= $_POST['demo-category'];
   $contrasena = $_POST['password'];
   $email = $_POST['email'];

   $insert="INSERT INTO usuario VALUES($ci,'$nombre','$apellido1','$apellido2','$cargo','$contrasena','$email')";
   $resultado=mysqli_query($con,$insert);
   if(!$resultado){
   	echo "no se inserto";
   }else echo "se inserto correctamente";
   mysqli_close($con);


 ?>