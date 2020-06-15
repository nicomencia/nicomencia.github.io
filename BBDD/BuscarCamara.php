<?php
            //conecto a la base de datos agenda con el usuario pepito:password2017
                
            $db = new mysqli('localhost', 'pepito', 'password2017', 'fotografos');

            if($db->connect_error) {
                echo "<p>ERROR de conexión:".$db->connect_error."</p>";
                exit();
            } 

            
            $consultaPre = $db->prepare("SELECT * FROM camara WHERE idcam = ?");   
        
            $consultaPre->bind_param('s', $_GET["busqueda_camara"]);    

            $consultaPre->execute();
            $resultado = $consultaPre->get_result();

            if ($resultado) {
                // Mostrar los datos en un lista
                echo "<p>Datos de la cámara con id: ". $_GET["busqueda_camara"] . "</p>";
                while($row = $resultado->fetch_assoc()) {
                    echo "<p>Marca: ". $row['marca']." - Modelo ". $row['modelo']." - Tipo: ". $row['tipo']." - Formato: ". $row['formato']."</p>"; 
                }
                
            } else {
                echo "Sin resultados";
            }
           

            $consultaPre->close();
            
            $db->close();
            
?>
