<?php

// Se abre la base de datos y se capturan los posibles errores
try {
    $bbdd = new PDO("mysql:host=localhost;dbname=proyecto", "root", "");
    $bbdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e) {
    $error = $e->getCode();
    $mensaje = $e->getMessage();
}

if(isset($error)){
    echo $error.$mensaje;
}else{
    //echo'BBDD conectada';
}

?>