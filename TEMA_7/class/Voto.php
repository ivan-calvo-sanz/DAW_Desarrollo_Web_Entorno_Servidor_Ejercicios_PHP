<?php

//include("Conexion.php");   

    //CLASE VOTO
    class Voto{
        //ATRIBUTOS
        //private $id;
        private $cantidad;
        private $idPr;
        private $idUs;
        
        //CONSTRUCTOR
        function __construct($cantidad,$idPr,$idUs){
            //$this->id=$id;
            $this->cantidad=$cantidad;
            $this->idPr=$idPr;
            $this->idUs=$idUs;
        }

        //METODO ESTATICO devuelve valoracion media de un Producto
        //pasandole como parametros id del Producto (idPr)
        public static function valoracionMedia($idPr){
            $cont=Voto::numeroValoraciones($idPr);
            $sumaVotos=0;
            $link=conecta_bd();
            $sql="SELECT * FROM votos WHERE idPr =$idPr";
            if($resultado=mysqli_query($link,$sql)){
                while($fila=mysqli_fetch_row($resultado)){
                    $voto=new Voto($fila[1],$fila[2],$fila[3]);
                    $sumaVotos+=$voto->getCantidad();
                }
            }
            if($cont>0){
                $media=$sumaVotos/$cont;
            }else{
                $media=0;
            }
            return round($media, 1);;
        }

        //METODO ESTATICO devuelve numero de veces valorado un Producto
        //pasandole como parametros id del Producto (idPr)
        public static function numeroValoraciones($idPr){
            $devuelve=0;
            $link=conecta_bd();
            $sql="SELECT COUNT(*) FROM votos WHERE idPr = ".$idPr;
            $resultado=mysqli_query($link,$sql);
            if($fila=mysqli_fetch_row($resultado)){
                $devuelve=$fila[0];
            }
            return $devuelve;
        }

        //METODO INSERTA un objeto de la Clase Voto (pasado por parametro) a la bbdd
        public static function insertar($voto){
            $link=conecta_bd();

            $sql="SELECT COUNT(*) FROM votos";
            $resultado=mysqli_query($link,$sql);
            if($fila=mysqli_fetch_row($resultado)){
                $cont=$fila[0];
            }
            $cont+=1;
            $sql="INSERT INTO votos VALUES(".$cont.",".$voto->getCantidad().",".$voto->getIdPr().",".$voto->getIdUs().")";
            mysqli_query($link,$sql);
        }

        //METODO ESTATICO verifica si es posible introducir una votacion
        //Comprueba que ese usuario no ha votado ese articulo
        public static function verificaVotacion($idUsuario,$idProducto){
            $devuelve=false;
            $link=conecta_bd();
            $cont=0;
            //SELECT COUNT(*) FROM votos WHERE idPr=1 AND idUs=1;
            $sql="SELECT COUNT(*) FROM votos WHERE idPr=".$idProducto." AND idUs=".$idUsuario;
            $resultado=mysqli_query($link,$sql);
            if($fila=mysqli_fetch_row($resultado)){
                $cont=$fila[0];
            }
            if($cont<1){
                $devuelve=true;
            }
            return $devuelve;
        }
 
        //METODOS GETTER Y SETTER 
        public function getCantidad(){
                return $this->cantidad;
        }
        public function setCantidad($cantidad){
                $this->cantidad = $cantidad;
                return $this;
        }
        public function getIdPr(){
                return $this->idPr;
        }
        public function setIdPr($idPr){
                $this->idPr = $idPr;
                return $this;
        }
        public function getIdUs(){
                return $this->idUs;
        }
        public function setIdUs($idUs){
                $this->idUs = $idUs;
                return $this;
        }
    }

    /*
    //COMPRUEBA METODOS
    echo Voto::numeroValoraciones(2);
    echo '<br>';
    echo Voto::valoracionMedia(2);
    */
    
?>