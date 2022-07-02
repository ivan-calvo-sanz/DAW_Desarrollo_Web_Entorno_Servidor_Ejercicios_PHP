<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREAR JUGADOR</title>
</head>
<body>

<?php

    //AUTOCARGA DE LAS CLASES
    spl_autoload_register(function ($class) {
        require "../class/" . $class . ".php";
    });

    //genero BARCODE
    if(isset($_GET['opcion'])){
        if($_GET['opcion']==1){
            //echo 'generando barcode';
            header('Location: ./fcrear.php');
        }
    }

    //COMPRUEBO DATOS INTRODUCIDOS SI SON CORRECTOS INSERTO JUGADOR EN TABLA
    if(isset($_POST['crear'])){
        $devuelve="";
        
        if(Jugador::verificaBarcode($_POST['codigoBarras'])){
            if(Jugador::verificarDorsal($_POST['dorsal'])){
                if($_POST['nombre']<>""&&$_POST['apellidos']<>""){
                    $jugador=new Jugador($_POST['nombre'],$_POST['apellidos'],$_POST['dorsal'], $_POST['posicion'], $_POST['codigoBarras']);
                    //echo $jugador->imprime();
                    if($jugador->insertaJugador()){
                        $devuelve.=" JUGADOR INSERTADO CORRECTAMENTE ";
                    }else{
                        $devuelve.=" SE HA PRODUCIDO UN ERROR AL INSERTAR EL JUGADOR EN TABLA ";
                    }
                }else{
                    $devuelve.=" NOMBRE Y APELLIDOS NO PUEDEN ESTAR VACIOS ";
                }
            }else{
                $devuelve.=" DORSAL REPETIDO ";
            }
        }else{
            $devuelve.=" CODIGO DE BARRAS NO VALIDO ";
        }
        
        setcookie('alerta',$devuelve,time()+365*24*60*60);
        header('Location: ./fcrear.php');

    }

?>
    
</body>
</html>