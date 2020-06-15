<?php
            //conecto a la base de datos agenda con el usuario pepito:password2017
                
            $db = new mysqli('localhost', 'pepito', 'password2017', 'fotografos');

            if($db->connect_error) {
                echo "<p>ERROR de conexión:".$db->connect_error."</p>";
                exit();
            }

            
            $consultaPre = $db->prepare("SELECT * FROM camara WHERE idcam = ?");   
        
            $consultaPre->bind_param('s', $_GET["borrar_camara"]);    

            $consultaPre->execute();
            $resultado = $consultaPre->get_result();

            if ($resultado) {
                
                echo "<p>Los datos de la cámara borrada son: </p> ";
                while($row = $resultado->fetch_assoc()) {
                    echo "<p> Id cámara: ".$row['idcam']." - Marca: ". $row['marca']." - Modelo ". $row['modelo']." - Tipo: ". $row['tipo']." - Formato: ". $row['formato']."</p>"; 
                }
                
            } else {
                echo "Sin resultados";
            }

        
            $consultaPre = $db->prepare("DELETE FROM venta WHERE idcam = ?");   
        
            $consultaPre->bind_param('s', $_GET["borrar_camara"]);    

            $consultaPre->execute();


            $consultaPre = $db->prepare("DELETE FROM distribucion WHERE idcam = ?");   
        
            $consultaPre->bind_param('s', $_GET["borrar_camara"]);    

            $consultaPre->execute();


            $consultaPre = $db->prepare("DELETE FROM camara WHERE idcam = ?");   
        
            $consultaPre->bind_param('s', $_GET["borrar_camara"]);    

            $consultaPre->execute();
            


            $consultaPre->close();
            
            $db->close();
            
?>
