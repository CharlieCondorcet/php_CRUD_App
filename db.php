<?php
//iniciar sesion en la app
session_start();



$connectionDB=mysqli_connect(
    'localhost',  //direccion server
    'root',  //usuario, por defecto en este caso soy root
    '',  //contrseña del usuario
    'php_crud_mysql'  //nombre de la base de datos que quiero consultar
);

/*
if(isset($connectionDB)){
    echo"existe la conexcion";
}else{
    echo"NO existe conexion"; 
}
*/




?>