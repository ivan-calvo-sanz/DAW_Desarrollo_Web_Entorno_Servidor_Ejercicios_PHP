<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugadores</title>
</head>
<body>

<h1>Jugadores</h1>

<?php

    //AUTOCARGA DE LAS CLASES
    spl_autoload_register(function ($class) {
        require "../class/" . $class . ".php";
    });
        
    include_once "../barcode/php-barcode-generator-0.4.0/src/BarcodeGenerator.php";
    include_once "../barcode/php-barcode-generator-0.4.0/src/BarcodeGeneratorHTML.php";
    
    use Picqer\Barcode\BarcodeGeneratorHTML;

    echo '<a href="fcrear.php"><button name="nuevo">Nuevo Jugador</button></a>';

    //genero array con los Jugadores existentes en la Tabla JUGADORES
    $jugadores=Jugador::devuelveJugadores();
    //var_dump($jugadores);

    //Muestro en tabla los datos de los Jugadores
    echo '<table border="1">';
    echo '<th>Nombre Completo</th><th>Posicion</th><th>Dorsal</th><th>Codigo de Barras</th>';
    
    for($i=0;$i<count($jugadores);$i++){
        echo '<tr>';
        $jugador=$jugadores[$i];

        echo '<td>'.$jugador->getNombre()." ".$jugador->getApellidos().'</td>';
        echo '<td>'.$jugador->getPosicion().'</td>';
        $dorsal=$jugador->getDorsal();
        if($dorsal==null){
            echo '<td>Sin asignar</td>';
        }else{
            echo '<td>'.$dorsal.'</td>';
        }

        //codifico el BarCode
        $barCode=$jugador->getBarcode();
        $barCodeHTML=new BarcodeGeneratorHTML();
        //$barCodeHTML->getBarcode($barCode,$barHTML::TYPE_EAN_13);
        echo '<td>'.$barCodeHTML->getBarcode($barCode,$barCodeHTML::TYPE_EAN_13,1.5,20).'</td>';

        echo '</tr>';

    }

    echo '</table>';

?>

    
</body>
</html>