<?php

include("Conexion.php");

    //CLASE JUGADOR
    class Jugador{
        //private $id;
        private $nombre;
        private $apellidos;
        private $dorsal;
        private $posicion;
        private $barcode;
        
        //CONSTRUCTOR
        function __construct($nombre,$apellidos,$dorsal,$posicion,$barcode){
            //$this->id=$id;
            $this->nombre=$nombre;
            $this->apellidos=$apellidos;
            $this->dorsal=$dorsal;
            $this->posicion=$posicion;
            $this->barcode=$barcode;
        }
        
        //FUNCION muestra por pantalla los datos del objeto
        public function imprime(){
            return 'NOMBRE: '.$this->nombre.' APELLIDOS: '.$this->apellidos.' DORSAL: '.$this->dorsal.' POSICION: '.$this->posicion.' BARCODE: '.$this->barcode;
        }

        //FUNCION STATIC verifica que el código pasado por parámetro NO existe en la BBDD
        public static function verificaBarcode($barcode){
            $link=conecta_bd();
            $consulta='SELECT * FROM JUGADORES';
            $resultado=mysqli_query($link,$consulta);
            while($fila=mysqli_fetch_row($resultado)){
                if($fila[5]==$barcode){
                    echo 'El barcode: '.$barcode.' ya existe!!! ';
                    return false;
                }
            }
            echo 'El barcode: '.$barcode.' NO existe!!! ';
            return true;
        }

        //FUNCION STATIC verifica si existe o no el dorsal que se pasa por parametro en la BBDD
        public static function verificarDorsal($dorsal){
            $link=conecta_bd();
            $consulta='SELECT * FROM JUGADORES';
            $resultado=mysqli_query($link,$consulta);
            while($fila=mysqli_fetch_row($resultado)){
                if($fila[3]==$dorsal){
                    echo 'El dorsal: '.$dorsal.' ya existe!!! ';
                    return false;
                }
            }
            echo 'El dorsal: '.$dorsal.' NO existe!!! ';
            return true;
        }

        //FUNCION STATIC devuelve un array con objetos tipo Jugador con todos los Jugadores existentes en la BBDD
        public static function devuelveJugadores(){
            $devuelve=array();
            $link=conecta_bd();
            $consulta='SELECT * FROM JUGADORES';
            $resultado=mysqli_query($link,$consulta);
            while($fila=mysqli_fetch_row($resultado)){
                $jugador=new Jugador($fila[1],$fila[2],$fila[3],$fila[4],$fila[5]);
                array_push($devuelve,$jugador);
            }
            return $devuelve;
        }

        //FUNCION inserta en la BBDD un objeto de tipo Jugador
        public function insertaJugador(){
            $link=conecta_bd();
            $consulta='INSERT INTO JUGADORES (NOMBRE,APELLIDOS,DORSAL,POSICION,BARCODE) VALUES ("'.$this->nombre.'","'.$this->apellidos.'",'.$this->dorsal.',"'.$this->posicion.'",'.$this->barcode.')';
            if(mysqli_query($link,$consulta)){
                return true;
            }else{
                echo "Error: ".$consulta."".mysqli_error($link);
            }
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
        public function getApellidos(){
                return $this->apellidos;
        }
        public function setApellidos($apellidos){
                $this->apellidos = $apellidos;
                return $this;
        }
        public function getDorsal(){
                return $this->dorsal;
        }
        public function setDorsal($dorsal){
                $this->dorsal = $dorsal;
                return $this;
        }
        public function getPosicion(){
                return $this->posicion;
        }
        public function setPosicion($posicion){
                $this->posicion = $posicion;
                return $this;
        }
        public function getBarcode(){
                return $this->barcode;
        }
        public function setBarcode($barcode){
                $this->barcode = $barcode;
                return $this;
        }

    }

    //COMPROBAR METODO DEVUELVE JUGADORES
    //$array=Jugador::devuelveJugadores();
    //var_dump($array);

    //COMPROBAR JUGADOR FUNCIONES ESTATICAS
    //$jugador=new Jugador();
    //Jugador::verificaBarcode("0952945303398");
    //Jugador::verificarDorsal(5);

    //COMPROBAR INSERTAR JUGADOR EN TABLA
    //insert into jugadores(nombre, apellidos, dorsal, posicion, barcode) values('Maria','Ruano Perez', 4, 2, '9745708466710');
    //$jugador2=new Jugador(6,"Maria","Ruano Perez", 6, 2,"0745708466710");
    //$jugador2->insertaJugador();

?>