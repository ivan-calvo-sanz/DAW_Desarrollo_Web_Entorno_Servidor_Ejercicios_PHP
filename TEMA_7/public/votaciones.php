<html>
	<head>
		<title>Votacion Productos</title>
	</head>
	<body>

    </body>
</html>

<?php
    require '../class/Producto.php';
    require '../class/Usuario.php';
    require '../class/Voto.php';
    //require '../class/Conexion.php';
    require '../vendor/autoload.php';

    session_start();
    echo "Usuario: ";
    echo $_SESSION['usuario'];

    $idUsu=Usuario::devuelveId($_SESSION['usuario']);
    echo '<br>id: '.$idUsu;
?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on("click",".votar", function(e){
            console.log(e)
			// La variable valor la cargo con 'update'
			var valor = "insertar";
			// Identifico las variables a enviar al PHP
            var id_producto = e.currentTarget.value
            var voto = jQuery('#voto_'+id_producto).val();
            var idUsu = "<?php echo $idUsu ?>";
			// Parametros para comunicarse por AJAX con el fichero php
			$.ajax({
				url:"update.php",
				type:"POST",
				data:{valor:valor,voto:voto,id_producto:id_producto,idUsu:idUsu},
				success:function(data){
                    data=JSON.parse(data);
					if (data.status=='ok') {
                        var numValoraciones = data.numValoraciones;
                        var media = data.media;
						jQuery('#actualizacion').html('<p>El Usuario: '+idUsu+' ha valorado con un: '+voto+' el producto: '+id_producto+'</p>');
                        $('#sinValoracion_'+id_producto).html('');
                        $('#valoracion_'+id_producto).html('Valoraciones: '+numValoraciones);
                        $('#media_'+id_producto).html('Valoracion media: '+media);
					}else{
                        jQuery('#actualizacion').html('<p>El Usuario: '+idUsu+' ya ha valorado anteriormente el producto: '+id_producto+' <br>NO puede volver a valorarlo.</p>');
					}
                }
			});
		});
	});
</script>


<?php

    echo '<br><a href="login.php?salir=value1"><button name="salir">Desconectar Usuario</button></a><br>';

    //Recopilo todos los productos existentes en la bbdd
    $productos=Producto::listar();

    echo "<h1>Productos onLine</h1>";
    echo '<div id="actualizacion"></div>';

    echo '<table border="1">';
    echo '<th>Código</th><th>Nombre</th><th>Valoracion</th><th>Valorar</th>';
    foreach ($productos as $key => $producto) {
        echo '<tr>';
            echo '<td>'.$producto->getId().'</td>';
            echo '<td>'.$producto->getNombre().'</td>';

            echo '<td>';
                $numValoraciones=Voto::numeroValoraciones($producto->getId());
                if($numValoraciones>0){
                    echo '<div id="valoracion_'.$producto->getId().'">Valoraciones: '.$numValoraciones.'</div>';
                    echo '<div id="media_'.$producto->getId().'">Valoracion media: '.Voto::valoracionMedia($producto->getId()).'</div>';
                }else{
                    echo '<div id="sinValoracion_'.$producto->getId().'">Sin Valoraciones</div>';'Sin Valoraciones';
                    echo '<div id="valoracion_'.$producto->getId().'"></div>';
                    echo '<div id="media_'.$producto->getId().'"></div>';
                }
                
            echo '</td>';

            echo '<td>';
                echo '<select name="voto" id="voto_'.$producto->getId().'">';
                    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
                    echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                echo '</select>';
                echo '<button name="votar" value="'.$producto->getId().'" class="votar">Votar</button>';
            echo '</td>';
        echo '</tr>';
       
    }
    echo '</table>';

?>