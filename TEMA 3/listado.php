<?php include("db.php")  ?>

<?php include("includes/header.php")  ?>

    <!-- contenedor de BOOTSTRAP con pading de 4 (p-4)-->
    <div class="container p-3">
        <a href="crear.php" class="btn btn-success btn-block">Crear</a>
    </div>

    <div class="container p-1">
                    <table class="table table-bordered">
                        <thead>
                            <tr><th>Detalle</th><th>Codigo</th><th>Nombre</th><th>Acciones</th></tr>
                        </thead>    
                        <tbody>
                            <?php 
                                //mediante NO PDO
                                //$query="SELECT * FROM productos";
                                //$result_tasks=mysqli_query($conn,$query);
                                $query="SELECT * FROM productos";
                                $resultado=$bbdd->query($query);

                                if($resultado){
                                    $row=$resultado->fetch();
                                    while($row!=null){ ?>
                                        <tr>
                                            <td><a href="detalle.php?id=<?php echo $row['id']?>" class="btn btn-secondary">Detalle</a></td>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['nombre_corto'] ?></td>
                                            <td>
                                                <a href="update.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                                    <i class="fas fa-marker"></i>
                                                </a>
                                                <a href="borrar.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>


                                    <?php    
                                        $row=$resultado->fetch();
                                        } ?>   
                                    </tbody>
                                </table>

                                <?php    } 
                    ?>
</div>
    

<?php include("includes/footer.php")  ?>