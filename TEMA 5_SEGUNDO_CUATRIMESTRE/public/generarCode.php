<?php

  //AUTOCARGA DE LAS CLASES
  spl_autoload_register(function ($class) {
    require "../class/" . $class . ".php";
  });

        $barcode;
        //hacer mientras el codigo generado ya exista 
        do{
          $intBarcode=generaAleatorio();
          $intCodigo=generaCodigoControl_ean13 ($intBarcode);
          $stringBarcode = (string)$intBarcode;
          $stringCodigo = (string)$intCodigo;
      
          $stringBarcode.=$stringCodigo;
          $barcode = (int)$stringBarcode;
      
        }while(!Jugador::verificaBarcode($barcode));
        
        setcookie('barCode',$barcode,time()+365*24*60*60);
        header('Location: ./fcrear.php');

//FUNCION GENERA ENTERO ALEATORIO 11 DIGITOS
function generaAleatorio(){
    $min=00000000000;
    $max=99999999999;
    $aleatorio=rand($min, $max);
    return $aleatorio;
}

//FUNCION CALCULA EL CODIGO DE CONTROL EAN13
function generaCodigoControl_ean13 ($message) {
    $checksum = 0;
    foreach (str_split(strrev($message)) as $pos => $val) {
      $checksum += $val * (3 - 2 * ($pos % 2));
    }
    return ((10 - ($checksum % 10)) % 10);
  }

?>