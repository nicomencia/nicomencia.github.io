<!DOCTYPE html>
<html lang="es">
<head>
    <title>501px - Crear base</title>
    <meta charset="utf-8"/>
    
    <meta name="author" content="UO250721" />
    <link rel="stylesheet" type="text/css" href="bbdd.css" />

</head>
    
<body>
    
    <div><h1>501px</h1></div>
        
    <section>
        <h2>Resultado interpretado</h2>
        <p>Se crea la base de datos 'fotografos'</p> 

        <?php
           

            $db = new mysqli('localhost','pepito','password2017');
                         
            if($db->connect_error) {
                echo "<p>ERROR de conexión:".$db->connect_error.". Revisar usuario y contraseña</p>";
                exit();
            }

            $cadenaSQL = "CREATE DATABASE IF NOT EXISTS fotografos COLLATE utf8_spanish_ci";
            if($db->query($cadenaSQL) === TRUE){
                echo "<p>Base de datos FOTOGRAFOS creada con éxito (o ya existe)</p>";
            } else { 
                echo "<p>ERROR en la creación de la Base de Datos FOTOGRAFOS</p>";
                exit();
            }

        $db->close();    
        ?> 
    </section>

</body>
</html>