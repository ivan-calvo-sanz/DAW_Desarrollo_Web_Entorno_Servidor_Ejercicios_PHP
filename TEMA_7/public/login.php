<?php
    require '../class/Usuario.php';
    //require '../class/Conexion.php';
    require '../vendor/autoload.php';
    YsJQueryAutoloader::register();

    $error="";

    if(isset($_GET['salir'])){
        if($_GET['salir']=="value1"){
            echo "Usuario Desconectado";
        }
    }

    // Comprobamos si se ha enviado el formulario
    if (isset($_POST['enviar'])) {

        if (empty($_POST['usuario']) || empty($_POST['password'])) 
            $error = "Debes introducir un nombre de usuario y una contraseña";
        else {
            // Comprobamos las credenciales con la base de datos
            $usu=new Usuario($_POST['usuario'],$_POST['password']);
            if (Usuario::validar($usu)) {
                session_start();
                $_SESSION['usuario']=$_POST['usuario'];
                header("Location: votaciones.php");                    
            }
            else {
                // Si las credenciales no son válidas, se vuelven a pedir
                $error = "Usuario o contraseña no válidos!";
            }
        }
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>TAREA 7 Login</title>
  <link href="tienda.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id='login'>
    <form action='login.php' method='post'>
    <fieldset >
        <legend>Login</legend>
        <div><span class='error'><?php echo $error; ?></span></div>
        <div class='campo'>
            <label for='usuario' >Usuario:</label><br/>
            <input type='text' name='usuario' id='usuario' maxlength="50" /><br/>
        </div>
        <div class='campo'>
            <label for='password' >Contraseña:</label><br/>
            <input type='password' name='password' id='password' maxlength="50" /><br/>
        </div>

        <div class='campo' style='text-align: center'>
            <input type='submit' name='enviar' class='boton' value='Conectar' />
        </div>
    </fieldset>
    </form>
    </div>


    <?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in("#enviar")
    ->execute(
        YsJQuery::getJSON(
            "validar.php",
            YsJQuery::toArray()->in('#miForm input'),
            new YsJsFunction('
                    if(msg.errUsu) alert(msg.errUsu);
                    if(msg.errPass) alert(msg.errPass);
                    if(msg.errMail) alert(msg.errMail);', 'msg'
            )
        )
    );
    ?>

</body>
</html>