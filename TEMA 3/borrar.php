<?php include("db.php")  ?>

<?php include("includes/header.php")  ?>

<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }
    
    $query="DELETE FROM productos WHERE id=$id";
    $resultado=$bbdd->query($query);

?>

    <!-- contenedor de BOOTSTRAP con pading de 4 (p-4)-->
    <div class="container p-3">
        <h1>Borrar Producto</h1>
    </div>


    <div class="container p-1">
        
        <?php
            if($resultado){
                echo "<p>Producto ".$id." borrado correctamente.</p>";
            }else{
                echo "<p>Producto ".$id." NO se ha podido borrar.</p>";
            }
        ?>

        <a href="listado.php" class="navbar-brand"><input type="button" class="btn btn-secondary btn-block" name="volver" value="Volver"></a>   

    </div>

<?php include("includes/footer.php") ?>