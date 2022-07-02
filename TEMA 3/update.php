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
        $familia=$row['familia'];
    }

?>
    <!-- contenedor de BOOTSTRAP con pading de 4 (p-4)-->
    <div class="container p-3">
        <h1>Modificar Producto</h1>
    </div>


    <div class="container p-1">
        <form action="modificar.php?id=<?php echo $id ?>" method="POST">
        <div class="form-group">
            Nombre<input type="text" name="nombre" class="form-control" value="<?php echo $row['nombre'] ?>" autofocus>
        </div>
        <div class="form-group">
            Nombre corto<input type="text" name="nombre_corto" class="form-control" value="<?php echo $row['nombre_corto'] ?>">
        </div>
        <div class="form-group">
            Precio (€)<input type="text" name="precio" class="form-control" value="<?php echo $row['pvp'] ?>">
        </div>

        <div class="form-group">
        <!--se rellena el desplegable-->
            Familia
            <select name="familia" class="form-control">
                <?php
                    $sqlFamilia = "SELECT cod, nombre FROM familias";
                    $resultFamilia=$bbdd->query($sqlFamilia);
                    if($resultFamilia){
                        $rowFamilia=$resultFamilia->fetch();
                        while($rowFamilia!=null){
                            if($familia == $rowFamilia['cod']){
                                echo "<option selected value='".htmlentities($rowFamilia['cod'])."'>".htmlentities($rowFamilia['nombre'])."</option>";
                            }else{
                                echo "<option value='".htmlentities($rowFamilia['cod'])."'>".htmlentities($rowFamilia['nombre'])."</option>";
                            }
                            $rowFamilia = $resultFamilia->fetch();
                        }
                    }
                ?>
            </select>
        </div>

        <div class="form-group">
            Descripcion<textarea name="descripcion" rows="8" class="form-control"><?php echo $row['descripcion'] ?></textarea>
        </div>

        <div class="container p-3">
            <input type="submit" class="btn btn-primary btn-block" name="mod" value="MODIFICAR">
            <a href="listado.php" class="navbar-brand"><input type="button" class="btn btn-secondary btn-block" name="volver" value="Volver"></a>   
        </div>

        </form>
        
    </div>

<?php include("includes/footer.php") ?>