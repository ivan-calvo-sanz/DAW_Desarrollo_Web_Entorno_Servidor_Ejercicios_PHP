<?php include("db.php")  ?>

<?php include("includes/header.php")  ?>

    <!-- contenedor de BOOTSTRAP con pading de 4 (p-4)-->
    <div class="container p-3">
        <h1>Crear Producto</h1>
    </div>


    <div class="container p-1">
        <form action="save.php" method="POST">
        <div class="form-group">
            Nombre<input type="text" name="nombre" class="form-control" placeholder="Nombre" autofocus>
        </div>
        <div class="form-group">
            Nombre corto<input type="text" name="nombre_corto" class="form-control" placeholder="Nombre corto">
        </div>
        <div class="form-group">
            Precio (€)<input type="text" name="precio" class="form-control" placeholder="Precio (€)">
        </div>

        <div class="form-group">
        <!--se rellena el desplegable-->
            Familia
            <select name="familia" class="form-control">
                <?php
                    $sql = "SELECT cod, nombre FROM familias";
                    $result=$bbdd->query($sql);
                    if($result){
                        $row=$result->fetch();
                        while($row!=null){
                            echo "<option value='".htmlentities($row['cod'])."'>".htmlentities($row['nombre'])."</option>";
                            $row = $result->fetch();
                        }
                    }
                ?>
            </select>
        </div>

        <div class="form-group">
            Descripcion<textarea name="descripcion" rows="8" class="form-control" placeholder=""></textarea>
        </div>

        <div class="container p-3">
            <input type="submit" class="btn btn-primary btn-block" name="crear" value="CREAR">
            <input type="reset" class="btn btn-success btn-block" name="limpiar" value="Limpiar">
            <a href="listado.php" class="navbar-brand"><input type="button" class="btn btn-secondary btn-block" name="volver" value="Volver"></a>   
        </div>

        </form>
        
    </div>


<?php include("includes/footer.php") ?>