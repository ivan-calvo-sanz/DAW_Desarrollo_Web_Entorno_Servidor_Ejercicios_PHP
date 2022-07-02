<?php

include("db.php");

if(isset($_POST['crear'])){

    $nombre=$_POST['nombre'];
    $nombre_corto=$_POST['nombre_corto'];
    $precio=$_POST['precio'];
    $descripcion=$_POST['descripcion'];
    $familia=$_POST['familia'];

    //$query="INSERT INTO productos(id,nombre,nombre_corto,descripcion,pvp,familia) VALUES ('$count','$nombre','$nombre_corto','$descripcion','$precio','CONSOL')";
    $query="INSERT INTO productos(id,nombre,nombre_corto,descripcion,pvp,familia) VALUES ('$count','$nombre','$nombre_corto','$descripcion','$precio','$familia')";
    $resultado=$bbdd->query($query);
    if(!$resultado){
        die("Insercción ha fallado");
    }

    header("Location: crear.php");

}

?>