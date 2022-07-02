<?php

include("../class/Conexion.php");

//DETERMINA SI HAY O NO HAY DATOS EN LA TABLA
$link=conecta_bd();
$consulta='SELECT COUNT(*) FROM JUGADORES';
$resultado=mysqli_query($link,$consulta);
$fila=mysqli_fetch_row($resultado);

//echo $fila[0];

//si no hay datos en la TABLA JUGADORES ir a jugadores.php
//sino a instalcion.php 
if($fila[0]>0){
    header('Location: ./jugadores.php');
}else{
    header('Location: ./instalacion.php');
}

?>