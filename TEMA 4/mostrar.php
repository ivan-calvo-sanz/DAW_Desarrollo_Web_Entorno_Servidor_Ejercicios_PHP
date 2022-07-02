<?php include("includes/header.php")  ?>


<?php
    //CODIGO 
    session_start();

    if(isset($_SESSION['preferencias'])){
        $idioma=$_SESSION['preferencias']['idioma'];
        $perfil=$_SESSION['preferencias']['perfil'];
        $zona=$_SESSION['preferencias']['zona'];
        $textoNoEstablecido=null;
    }

    if((isset($_POST['borrar']))&&($idioma==null)){
        $texto="Debes fijar primero las preferencias.";
    }elseif((isset($_POST['borrar']))&&($idioma!=null)){
        $idioma=null;
        $perfil=null;
        $zona=null;
        $_SESSION['preferencias']['idioma']=$idioma;
        $_SESSION['preferencias']['perfil']=$perfil;
        $_SESSION['preferencias']['zona']=$zona;
        $texto="Preferencias Borradas.";
        $textoNoEstablecido="No Establecido";
    }

?>

    <h2>Preferencias</h2>
    <div class="contenido">
    <?php


        //zona de texto de informacion
        if(isset($texto)){
            echo "<span class='alert-warning'>".$texto."</span><br>";
        }

        //Idioma
        echo "<h5>Idioma</h5>";
        echo "<p class='form-control'>";
        if($textoNoEstablecido!=null){
            echo $textoNoEstablecido;
        }else{
            echo $idioma;
        }
        "</p>";
       
        //Perfil Publico
        echo "<h5>Perfil Público</h5>";
        echo "<p class='form-control'>";
        if($textoNoEstablecido!=null){
            echo $textoNoEstablecido;
        }else{
            echo $perfil;
        }
        "</p>";

        //Zona horaria
        echo "<h5>Zona horaria</h5>";
        echo "<p class='form-control'>";
        if($textoNoEstablecido!=null){
            echo $textoNoEstablecido;
        }else{
            echo $zona;
        }
        "</p>";

    ?>

        <div class="container p-3">
            <form id="formulario" action="preferencias.php" method="post">
                <input type="submit" name="establecer2" value="Establecer" class="btn btn-primary btn-block">
            </form>
            <form id="formulario" action="" method="post">
                <input type="submit" name="borrar" value="Borrar" class="btn btn-danger btn-block">
            </form>
        </div>
    </div>

<?php include("includes/footer.php")  ?>