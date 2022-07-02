<?php include("db.php")  ?>

<?php include("includes/header.php")  ?>

<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql = "SELECT * FROM productos WHERE id='$id'";
        $resultado=$bbdd->query($sql);
    }else{
        header("Location: listado.php");
    }
    
    if($resultado){
        $row=$resultado->fetch();
        //echo $row['id'].$row['nombre'];
    }

?>

    <!-- contenedor de BOOTSTRAP con pading de 4 (p-4)-->
    <div class="container p-3">
        <h1>Detalle Producto</h1>
    </div>
  
    <div class="container p-3">
        <?php
            
            echo "<div><h3>".$row['nombre']."</h3></div>";
            echo "<div><h6>Código".$row['id']."</h6>";
            echo "<p>Nombre: ".$row['nombre']."</p>";
            echo "<p>Nombre Corto: ".$row['nombre_corto']."</p>";
            echo "<p>Código familia: ".$row['familia']."</p>";
            echo "<p>PVP (€): ".$row['pvp']."</p>";
            echo "<p>Descripción: ".$row['descripcion']."</p>";

        ?>

        <div class="container p-3">
            <a href="listado.php" class="navbar-brand"><input type="button" class="btn btn-secondary btn-block" name="volver" value="Volver"></a>   
        </div>

    </div>


<?php include("includes/footer.php")  ?>