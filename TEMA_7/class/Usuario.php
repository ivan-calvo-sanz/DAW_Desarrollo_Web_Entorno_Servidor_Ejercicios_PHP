<?php

include("Conexion.php"); 

    //CLASE USUARIO
    class Usuario{
        //ATRIBUTOS
        private $usuario;
        private $contrasena;
        
        //CONSTRUCTOR
        function __construct($usuario,$contrasena){
            $this->usuario=$usuario;
            $this->contrasena=$contrasena;
        }

        //METODO ESTATICO determina si el usuario que se pasa por parámetro es correcto
        public static function validar($usuario){
            $devuelve=false;
            $link=conecta_bd();
            //SELECT * FROM alumnos WHERE dni='11111111A';
            $sql="SELECT * FROM usuarios";
            if($resultado=mysqli_query($link,$sql)){
                while($fila=mysqli_fetch_row($resultado)){
                    if($fila[1]==$usuario->getUsuario()&&$fila[2]==$usuario->getContrasena()){
                        $devuelve=true;
                    }
                }
            }
            return $devuelve;
        }

        //METODO DEVUELVE id del usuario a partir del nombre
        public static function devuelveId($usuario){
            $link=conecta_bd();
            $sql="SELECT * FROM usuarios WHERE usuario='".$usuario."'";
            if($resultado=mysqli_query($link,$sql)){
                if($fila=mysqli_fetch_row($resultado)){
                    $devuelve=$fila[0];
                }
            }
            return $devuelve;
        }

        //METODOS GETTER Y SETTER
        public function getUsuario(){
                return $this->usuario;
        }
        public function setUsuario($usuario){
                $this->usuario = $usuario;
                return $this;
        }
        public function getContrasena(){
                return $this->contrasena;
        }
        public function setContrasena($contrasena){
                $this->contrasena = $contrasena;
                return $this;
        }
    }

?>