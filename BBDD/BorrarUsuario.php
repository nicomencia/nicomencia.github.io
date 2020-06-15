<?php
            //conecto a la base de datos agenda con el usuario pepito:password2017
                
            $db = new mysqli('localhost', 'pepito', 'password2017', 'fotografos');

            if($db->connect_error) {
                echo "<p>ERROR de conexión:".$db->connect_error."</p>";
                exit();
            }

            
            $consultaPre = $db->prepare("SELECT * FROM usuario WHERE nombre_usuario = ?");   
        
            $consultaPre->bind_param('s', $_GET["borrar_usuario"]);    

            $consultaPre->execute();
            $resultado = $consultaPre->get_result();

            if ($resultado) {
                
                echo "<p>Los datos del usuario borrado son: </p> ";
                while($row = $resultado->fetch_assoc()) {
                    echo "<p> Nombre de usuario: ".$row['nombre_usuario']." - Nombre: ". $row['nombre']." ". $row['apellidos']." - Ciudad: ". $row['ciudad']." - Modalidad: ". $row['modalidad']."</p>"; 
                }
                
            } else {
                echo "Sin resultados";
            }

        
            $consultaPre = $db->prepare("DELETE FROM venta WHERE nombre_usuario = ?");   
        
            $consultaPre->bind_param('s', $_GET["borrar_usuario"]);    

            $consultaPre->execute();


            $consultaPre = $db->prepare("DELETE FROM usuario WHERE nombre_usuario = ?");   
        
            $consultaPre->bind_param('s', $_GET["borrar_usuario"]);    

            $consultaPre->execute();
            


            $consultaPre->close();
            
            $db->close();
            
?>
