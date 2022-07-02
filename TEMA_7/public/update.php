<?php

require '../class/Producto.php';
require '../class/Usuario.php';
require '../class/Voto.php';
//require '../class/Conexion.php';
require '../vendor/autoload.php';

	if(isset($_POST["valor"])){
		$idUsu=$_POST["idUsu"];
		$valoracion=$_POST['voto'];
		$id_producto=$_POST['id_producto'];
		$data=array();

		if(Voto::verificaVotacion($idUsu,$id_producto)){
            $voto=new Voto($valoracion,$id_producto,$idUsu);
            Voto::insertar($voto);

			$numValoraciones=Voto::numeroValoraciones($id_producto);
			$media=Voto::valoracionMedia($id_producto);

			$data['id_producto']=$id_producto;
			$data['status']='ok';
			$data['numValoraciones']=$numValoraciones;
			$data['media']=$media;
        }else{
			$data['id_producto']=$id_producto;
			$data['status']='err';
			$data['numValoraciones']='';
			$data['media']='';
        }

		//returns data as JSON format
		echo json_encode($data);
	}

?>