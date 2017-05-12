<?php 
function conexion()
{
   // datos de la bse de datos
   $servidor = "localhost";
   $usuario = "root";
   $contraseña = "";
   $nombreBD = "prueba";

   //conexion a la base de datos y al servidor con mysqli_conect()
   $conexion = mysqli_connect($servidor, $usuario, $contraseña, $nombreBD ) or die(" Error de conexion al servidor");

   return $conexion;
   

  }

    	
 ?>