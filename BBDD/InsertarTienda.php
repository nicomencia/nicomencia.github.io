<?php
            //conecto a la base de datos agenda con el usuario pepito:password2017
                
            $db = new mysqli('localhost', 'pepito', 'password2017', 'fotografos');

            if($db->connect_error) {
                echo "<p>ERROR de conexión:".$db->connect_error."</p>";
                exit();
            } else {echo "<p>Conexión establecida.</p>";}

            
            $consultaPre = $db->prepare("INSERT INTO tienda (nombret, ciudadt) VALUES (?,?)");   
        
            $consultaPre->bind_param('ss', 
                    $_POST["nombret"],$_POST["ciudadt"]);    

            $consultaPre->execute();


            echo "<p>Filas agregadas: ".$consultaPre->affected_rows."</p>";
            $consultaPre->close();
            
            $db->close();
            
?>
