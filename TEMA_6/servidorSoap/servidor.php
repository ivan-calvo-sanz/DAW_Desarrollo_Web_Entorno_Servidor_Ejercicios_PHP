<?php

    //phpinfo();
    //Creo las funciones
    function conectaBD(){
        if(!$link=mysqli_connect('localhost','root','','tarea6')){
            echo "Error al conectar con la base de datos";
            exit (1);
        }
        return $link;
    }

    function getPVP($codProducto){
        $link=conectaBD();

        $resultado=mysqli_query($link, 'SELECT pvp FROM PRODUCTOS WHERE nombre_corto="'.$codProducto.'"');
        //SELECT pvp FROM PRODUCTOS WHERE nombre_corto="3DSNG";
        $fila=mysqli_fetch_row($resultado);

        return $fila[0];
    }

    function getStock($codProducto,$codTienda){
        $link=conectaBD();

        $resultado=mysqli_query($link, 'SELECT unidades FROM stocks WHERE producto='.$codProducto.' AND tienda='.$codTienda);
        $fila=mysqli_fetch_row($resultado);

        return $fila[0];
    }

    function getFamilias(){
        $link=conectaBD();
        $devuelve=array();

        //CONSULTA A LA BBDD
        $consulta="SELECT cod FROM familias";
        $resultado=mysqli_query($link,$consulta);

        //DEVOLUCION DE DATOS
        while($fila=mysqli_fetch_row($resultado)){
            array_push($devuelve, $fila[0]);
        }

        return $devuelve;
    }

    function getProductosFamilia($codFamilia){
        $link=conectaBD();
        $devuelve=array();

        //CONSULTA A LA BBDD
        $consulta="SELECT P.ID 
                    FROM PRODUCTOS P JOIN FAMILIAS F
                    ON P.FAMILIA=F.COD
                    WHERE F.COD='".$codFamilia."'";
        $resultado=mysqli_query($link,$consulta);

        //DEVOLUCION DE DATOS
        while($fila=mysqli_fetch_row($resultado)){
            array_push($devuelve, $fila[0]);
        }

        return $devuelve;
    }
    

    //var_dump(getProductosFamilia("CAMARA"));

    
try{
    if(!extension_loaded('soap')){
        dl("php_soap.dll");
    }

    ini_set("soap.wsdl_cache_enabled","0");   //Desactivamos la cache
    $server=new SoapServer('servicio.wsdl');   //Declaramos un nuevo servidor SOAP
    //usando el (.wsdl) previamente configurado

    //Añadimos las funciones al servidor SOAP
    $server->addFunction("getPVP");
    $server->addFunction("getStock");
    $server->addFunction("getFamilias");
    $server->addFunction("getProductosFamilia");
    //si introducimos un echo en el servidor da fallo

    $server->handle();   //Procesa las acciones realizadas sobre el servidor SOAP
    //es decir, pone a trabajar las funciones añadidas

}catch(SoapFault $e){
    var_dump($e);
}


?>