<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimun-scale=1.0">
        
        <title>Agenda</title>
    </head>

    <body style="background: gainsboro">
        <h3 style="color:red; font-size:20px; text-align:center">Agenda</h3>
        <?php
            //***aquí viene mi duda (intento cambiar valor de la variable que paso por get)***
            //session_start();
            if(!empty($_GET['limpiar'])){
                echo "AGENDA BORRADA!!!";
                $_GET['limpiar']=0;
            }
            
            //compruebo si se ha pulsado submit, si se ha hecho procesamos los datos, 
            //si no, unicamente declaro el array y muestro el formulario
            if(!empty($_POST['personasHidden'])){
                //proceso los datos ocultos enviado por el método POST
                //introduzo al array los datos que he enviado mediante post vienen separados por ,
                $array=explode(",",$_POST['personasHidden']);
            }else{
                //si no hay datos creo el array
                $array=array();
            }

            //Si se envia nombre y telefono
            if(!empty($_POST['nombre'])&&!empty($_POST['telefono'])){
                //declaro las variables y guardo los datos enviados por POST
                $nom=$_POST['nombre'];
                $telefono=$_POST['telefono'];
                //Si el nombre NO existe en la agenda
                //Se comprueba mediante la función existe()
                if(!existe($nom,$array)){
                    $array[count($array)]=$nom;
                    $array[count($array)]=$telefono;
                //Si el nombre SI existe en la agenda
                //se busca en que posición ocupa el nombre mediante la funcion buscaPosicion()
                }else{
                    $pos=buscaPosicion($nom,$array);
                    //la siguiente posición del array guarda el telefono por lo que cambió el telefono por el nuevo
                    $array[$pos+1]=$telefono;
                    echo $nom." ya existe en la agenda, se ha actualizado su teléfono";
                }
            }

            //Si enviamos nombre y NO telefono
            if(!empty($_POST['nombre'])&&empty($_POST['telefono'])){
                $nom=$_POST['nombre'];
                //Si el nombre ya existe
                //Se comprueba mediante la función existe()
                if(existe($nom,$array)){
                    $pos=buscaPosicion($nom,$array);
                    //Se elimina tanto el nombre como el telefono
                    unset($array[$pos]);
                    unset($array[$pos+1]);
                    $array=array_values($array);
                    echo $nom." se ha eliminado de la agenda";
                }
                //Si NO existe el nombre no lo introduce a la Agenda
            }
            
            //Si enviamos NO nombre y SI telefono
            elseif(empty($_POST['nombre'])&&!empty($_POST['telefono'])){
                echo "ES OBLIGATORIO NOMBRE!!!";
            }

            //si hay elementos en el array los muestro
            if(count($array)>0){                
                echo "<fieldset style='width:40%; margin:auto'>";
                echo "<legend style='font-weight: bold'>Datos Agenda</legend>";
                echo "<table align='left'>";
                //hay que recorrer el array de 2 en 2
                for($i=0;$i<count($array);$i+=2){
                        echo "<tr><td>".$array[$i]."</td><td>".$array[$i+1]."</td></tr>";
                }
                echo "</table>";
                echo "</fieldset>";
            }


            // *****************
            // *** FUNCIONES ***
            // *****************

            //Comprueba si el nombre ya existe o no en la agenda (true o false)
            function existe($nom,$array){
                //global $nom,$array;
                if(in_array($nom,$array)){
                    return true;
                } else{
                    return false;
                }                
            }

            //devuelve la posición dentro del array en el que se encuntra el nombre
            function buscaPosicion($nom,$array){
                //global $nom,$array;
                for($i=0;$i<count($array);$i+=2){
                    if($array[$i]==$nom){
                        //echo " se ha modificado su telefono";
                        return $i;
                    }
                }
            }

        ?>


        <fieldset style="width:40%; margin:auto">
            <legend style="font-weight: bold">Nuevo contacto</legend>
            <form name="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <p>Nombre:&nbsp<input type="text" name="nombre" placeholder="Nombre" /></p>
                <p>Teléfono:&nbsp<input type="text" name="telefono" placeholder="Teléfono" /></p>
                <!-- Creo un campo oculto, para que no se vea que estamos enviando los datos anteriores -->
                <input name="personasHidden" type="hidden" value="<?php if(isset($array)) echo implode(",",$array) ?>" >
                <div style="text-align:center; margin-top:5px">
                    <input type="submit" value="Añadir contacto" />
                    <!-- Con reset se limpian los campos del formulario -->
                    <input type="reset" value="Limpiar campos" />
                </div>
            </form>
        </fieldset>

        <?php
            //si hay elementos en el array saca por pantalla nuevo formulario
            if(count($array)>0){
                echo "<fieldset style='width:40%; margin:auto'>";
                echo "<legend style='font-weight: bold'>Vaciar Agenda</legend>";
                echo "<form name='form' action='calvo_sanz_ivan_DWES02_Tarea.php' method='get'>";
                echo "<div style='text-align:center; margin-top:5px'>";
                echo "<input type='hidden' name='limpiar' value=1>";
                echo "<input type='submit' value='Vaciar'>";
                echo "</div>";
                echo "</form>";
            }
        ?>

    </body>

</html>   