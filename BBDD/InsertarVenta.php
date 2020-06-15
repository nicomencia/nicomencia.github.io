<?php
            //conecto a la base de datos agenda con el usuario pepito:password2017
                
            $db = new mysqli('localhost', 'pepito', 'password2017', 'fotografos');

            if($db->connect_error) {
                echo "<p>ERROR de conexión:".$db->connect_error."</p>";
                exit();
            } else {echo "<p>Conexión establecida.</p>";}

            
            $consultaPre = $db->prepare("INSERT INTO venta (nombre_usuario, idcam, idtienda, numventa, precio) VALUES (?,?,?,?,?)");   
        
            $consultaPre->bind_param('sssss', 
                    $_POST["nombre_usuario"],$_POST["idcam"],$_POST["idtienda"],$_POST["numventa"],$_POST["precio"]);    

            $consultaPre->execute();


            echo "<p>Filas agregadas: ".$consultaPre->affected_rows."</p>";
            $consultaPre->close();
            
            $db->close();
            
?>
