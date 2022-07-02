<?php

    try{
        //Declaro un objeto SoapCliente con parámetro la URL donde se encuentra el archivo de definición del Servicio (.wsdl)
        $cliente=new SoapClient('http://localhost/practicas_php/PRACTICAS_IVAN/TEMA_6/servidorSoap/servicio.wsdl');

        //este objeto tiene las funciones que hemos generado en el servidor
        echo '<br>PRUEBA FUNCION: getPVP() <br>';
        echo 'El PVP del código "3DSNG" son: '.$cliente->getPVP("3DSNG")."€ <br>";


        echo '<br>PRUEBA FUNCION: getStock() <br>';
        echo 'El stock del producto 1->"3DSNG" en la tienda 2 son: '.$cliente->getStock(1,2)." unidades <br>";


        echo '<br>PRUEBA FUNCION: getFamilias() <br>';
        echo 'Códigos de familias: ';
        $array=$cliente->getFamilias();
        //var_dump($array);

        foreach($array as $indice => $valor){
            echo $indice.$valor."<br>";
        }



        echo '<br><br>PRUEBA FUNCION: getProductosFamilia() <br>';
        echo 'Códigos de productos de la familia "CAMARA": ';
        $array=$cliente->getProductosFamilia("CAMARA");
        var_dump($array);

    }catch(SoapFault $e){
        var_dump($e);
    }

?>