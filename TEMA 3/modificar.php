<?php

include("db.php");

if(isset($_POST['mod'])){

    if(isset($_GET['id'])){
        $id=$_GET['id'];
        echo $id;
    }

    $nombre=$_POST['nombre'];
    $nombre_corto=$_POST['nombre_corto'];
    $precio=$_POST['precio'];
    $descripcion=$_POST['descripcion'];
    $familia=$_POST['familia'];
    

    $query = "UPDATE productos SET nombre='$nombre',nombre_corto='$nombre_corto',descripcion='$descripcion',pvp='$precio',familia='$familia' WHERE id='$id'";

    //$query="INSERT INTO productos(id,nombre,nombre_corto,descripcion,pvp,familia) VALUES ('$count','$nombre','$nombre_corto','$descripcion','$precio','CONSOL')";
    //$query="INSERT INTO productos(id,nombre,nombre_corto,descripcion,pvp,familia) VALUES ('$count','$nombre','$nombre_corto','$descripcion','$precio','$familia')";
    $resultado=$bbdd->query($query);
    if(!$resultado){
        die("Error al actualizar la tabla");
    }

    header("Location: listado.php");


}

?>