<?php

    //VIDEOTUTORIAL
    //https://www.youtube.com/watch?v=qLkH0Hu64kU
    include_once "../barcode/php-barcode-generator-0.4.0/src/BarcodeGenerator.php";
    include_once "../barcode/php-barcode-generator-0.4.0/src/BarcodeGeneratorHTML.php";
    
    use Picqer\Barcode\BarcodeGeneratorHTML;
    $barHTML=new BarcodeGeneratorHTML();

    //echo $barHTML->getBarcode("123",$barHTML::TYPE_CODE_128);
    echo $barHTML->getBarcode("2406603743234",$barHTML::TYPE_EAN_13);

?>