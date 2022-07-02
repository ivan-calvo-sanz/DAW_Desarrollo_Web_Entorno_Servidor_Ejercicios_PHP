<?php

    //AUTOCARGA DE LAS CLASES
    spl_autoload_register(function ($class) {
        require "../class/" . $class . ".php";
    });    

    //GENERO TANTAS INSTANCIAS DE LA CLASE JUGADOR COMO FILAS QUIERO INTRODUCIR EN LA TABLA INICIALMENTE
    //insert into jugadores(nombre, apellidos, dorsal, posicion, barcode) values('Antonio','Gil Gil', 1, 1,'0952945303398');
    $jugador=new Jugador('Antonio','Gil Gil', 1, 1,'0952945303398');
    $jugador->insertaJugador();
    //insert into jugadores(nombre, apellidos, dorsal, posicion,  barcode) values('Ana','Hernandez Perez', 2, 2,'2406603743234');
    $jugador=new Jugador('Ana','Hernandez Perez', 2, 2,'2406603743234');
    $jugador->insertaJugador();
    //insert into jugadores(nombre, apellidos, dorsal, posicion, barcode) values('Juan','Valdemoro Gil', 3, 2, '2829114057100');
    $jugador=new Jugador('Juan','Valdemoro Gil', 3, 2, '2829114057100');
    $jugador->insertaJugador();
    //insert into jugadores(nombre, apellidos, dorsal, posicion, barcode) values('Maria','Ruano Perez', 4, 2, '9745708466710');
    $jugador=new Jugador('Maria','Ruano Perez', 4, 2, '9745708466710');
    $jugador->insertaJugador();

    header('Location: ./index.php');

?>