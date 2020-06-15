<?php
            //conecto a la base de datos agenda con el usuario pepito:password2017
                
            $db = new mysqli('localhost', 'pepito', 'password2017', 'fotografos');

            if($db->connect_error) {
                echo "<p>ERROR de conexión:".$db->connect_error."</p>";
                exit();
            }

            
            $consultaPre = $db->prepare("SELECT * FROM usuario WHERE nombre_usuario = ?");   
        
            $consultaPre->bind_param('s', $_GET["busqueda_usuario"]);    

            $consultaPre->execute();
            $resultado = $consultaPre->get_result();

            if ($resultado) {
                // Mostrar los datos en un lista
                echo "<p>Datos del usuario con nombre de usuario: ". $_GET["busqueda_usuario"] . "</p>";
                while($row = $resultado->fetch_assoc()) {
                    echo "<p> Nombre: ". $row['nombre']." ".$row['apellidos']." - Ciudad: ". $row['ciudad'] ." - Modalidad: ". $row['modalidad'] ."</p>"; 
                }
                
            } else {
                echo "Sin resultados";
            }
           

            $consultaPre->close();
            
            $db->close();
            
?>
