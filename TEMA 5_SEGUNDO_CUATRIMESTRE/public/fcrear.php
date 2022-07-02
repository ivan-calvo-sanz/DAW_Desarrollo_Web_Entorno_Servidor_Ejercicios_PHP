<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Jugador</title>
</head>
<body>

<h1>Crear Jugador</h1>
<br>

<?php

    //muestro la cookie donde he ido guardando posibles errores por datos introducidos incorrectamente 
    if(isset($_COOKIE['alerta'])){
        echo $_COOKIE['alerta'].'<br>';
    }

    //formulario en la que se indican los datos necesarios del Jugador
    echo '<form action="crearJugador.php" method="post"><br>';
    echo 'Nombre:<input type="text" name="nombre" value="Nombre"><br>';
    echo 'Apellidos:<input type="text" name="apellidos" value="Apellidos"><br>';
    echo 'Dorsal:<input type="text" name="dorsal" value="Dorsal"><br>';

    echo 'Posición:<select name="posicion">';
    echo '<option value="portero">Portero</option>';
    echo '<option value="defensa">Defensa</option>';
    echo '<option value="lateralIzquierdo">Lateral Izquierdo</option>';
    echo '<option value="lateralDerecho">Lateral Derecho</option>';
    echo '<option value="central">Central</option>';
    echo '<option value="delantero">Delantero</option>';
    echo '</select><br>';

    //echo 'Código de Barras:<input type="text" name="codigoBarras" value="codigoBarras" readonly><br>';
    echo 'Código de Barras:<input type="text" name="codigoBarras" value="';
    if(isset($_COOKIE['barCode'])){
        echo $_COOKIE['barCode'];
    }else{
        echo 'Codigo de Barras';
    }
    echo '" readonly><br>';
    
    echo '<input type="submit" name="crear" value="Crear">';
    echo '<input type="reset" name="limpiar" value="Limpiar">';
    echo '</form>';

    echo '<a href="jugadores.php"><button name="volver">Volver</button></a>';

    //botón para generar el BarCode
    echo '<a href="generarCode.php"><button name="generarBarcode">Generar Barcode</button></a>';

    setcookie('alerta',"",time()+365*24*60*60);

?>
    
</body>
</html>