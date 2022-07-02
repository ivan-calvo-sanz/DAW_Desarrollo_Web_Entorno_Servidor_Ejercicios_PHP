<?php include("includes/header.php")  ?>

<?php
    //CODIGO 
    session_start();

    $idiomas=Array("Español","Ingles");
    $perfiles=Array("SI","NO");
    $zonas=Array("GMT-2","GMT-1","GMT","GMT+1","GMT+2");

    if(isset($_POST['establecer'])){
        $texto="Preferencias de usuario guardadas";
        $_SESSION['preferencias']['idioma']=$_POST['idioma'];
        $_SESSION['preferencias']['perfil']=$_POST['perfil'];
        $_SESSION['preferencias']['zona']=$_POST['zona'];

        $idioma=$_POST['idioma'];
        $perfil=$_POST['perfil'];
        $zona=$_POST['zona'];
    }else{
        $idioma=null;
        $perfil=null;
        $zona=null;
    }

?>

<form class="col-12" action="" method="post">
    <h2>Preferencias Usuario</h2>
    <?php
        //zona de texto de informacion
        if(isset($texto)){
            echo "<span class='alert-warning'>".$texto."</span><br>";
        }

        //Idioma
        echo "<div class='form-group'>";
        echo "<label>Idioma:</label><br>";
        echo "<select name='idioma' class='form-control'>";
        for($i=0;$i<count($idiomas);$i++){
            echo "<option value='".$idiomas[$i]."'";
            if($idiomas[$i]==$idioma){
                echo "selected";
            }
            echo ">".$idiomas[$i]."</option>";
        }
        echo "</select><br>";
        echo "</div>";

        //Perfil Publico
        echo "<label>Perfil Público:</label><br>";
        echo "<select name='perfil' class='form-control'>";
        for($i=0;$i<count($perfiles);$i++){
            echo "<option value='".$perfiles[$i]."'";
            if($perfiles[$i]==$perfil){
                echo "selected";
            }
            echo ">".$perfiles[$i]."</option>";
        }
        echo "</select><br>";

        //Zona horaria
        echo "<label>Zona horaria:</label><br>";
        echo "<select name='zona' class='form-control'>";
        for($i=0;$i<count($zonas);$i++){
            echo "<option value='".$zonas[$i]."'";
            if($zonas[$i]==$zona){
                echo "selected";
            }
            echo ">".$zonas[$i]."</option>";
        }
        echo "</select>";
    ?>
    
    <div class="container p-3">
        <a href="mostrar.php" class="navbar-brand"><input type="button" class="btn btn-primary btn-block" name="mostrar" value="Mostrar preferencias"></a>
        <input type="submit" class="btn btn-success btn-block" name="establecer" value="Establecer">
    </div>
</form>

<?php include("includes/footer.php")  ?>