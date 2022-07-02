<?php

//include("Conexion.php");   

    //CLASE PRODUCTO
    class Producto{
        //ATRIBUTOS
        private $id;
        private $nombre;
        private $nombre_corto;
        private $descripcion;
        private $pvp;
        private $familia;
        
        //CONSTRUCTOR
        function __construct($id,$nombre,$nombre_corto,$descripcion,$pvp,$familia){
            $this->id=$id;
            $this->nombre=$nombre;
            $this->nombre_corto=$nombre_corto;
            $this->descripcion=$descripcion;
            $this->pvp=$pvp;
            $this->familia=$familia;
        }

        //METODO ESTATICO devuelve array con elemtos de Clase Producto que contiene la bbdd
        public static function listar(){
            $devuelve=array();
            $link=conecta_bd();
            $sql="SELECT * FROM productos";
            if($resultado=mysqli_query($link,$sql)){
                while($fila=mysqli_fetch_row($resultado)){
                    $producto=new Producto($fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5]);
                    array_push($devuelve,$producto);
                }
            }
            return $devuelve;
        }
 
        //METODOS GETTER Y SETTER
        public function getId(){
                return $this->id;
        }
        public function setId($id){
                $this->id = $id;
                return $this;
        }
        public function getNombre(){
                return $this->nombre;
        }
        public function setNombre($nombre){
                $this->nombre = $nombre;
                return $this;
        }
        public function getNombre_corto(){
                return $this->nombre_corto;
        }
        public function setNombre_corto($nombre_corto){
                $this->nombre_corto = $nombre_corto;
                return $this;
        }
        public function getDescripcion(){
                return $this->descripcion;
        }
        public function setDescripcion($descripcion){
                $this->descripcion = $descripcion;
                return $this;
        }
        public function getPvp(){
                return $this->pvp;
        }
        public function setPvp($pvp){
                $this->pvp = $pvp;
                return $this;
        }
        public function getFamilia(){
                return $this->familia;
        }
        public function setFamilia($familia){
                $this->familia = $familia;
                return $this;
        }
    }

?>