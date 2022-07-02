<?php

//FUNCION DE CONEXION A LA BBDD
function conecta_bd(){
    $link=mysqli_connect('localhost','root','','practicaunidad5');
    if(!$link){
        echo 'Error: No se pudo conectar a MySQL. <br>';
        exit;
    }
    return $link;
}

?>