<!DOCTYPE html>
<html lang="es">
<head>
    <title>501px - Crear tablas</title>
    <meta charset="utf-8"/>
    
    <meta name="author" content="UO250721" /> 
    <link rel="stylesheet" type="text/css" href="bbdd.css" />
</head>
    
<body>
    
    <div><h1>501px</h1></div>
        
    <section>
        <h2>Resultado interpretado</h2>
        <p>Se crea la tabla USUARIO</p> 
        <ul>
            <li>Usuario (nombre_usuario, nombre, apellidos, ciudad, modalidad)</li>
        </ul>
        <p>Se crea la tabla VENTAS</p> 
        <ul>
            <li>Venta (nombre_usuario, idcam, idtienda, numventa, precio)</li>
        </ul>
        <p>Se crea la tabla TIENDA</p> 
        <ul>
            <li>Tienda (idtienda, nombret, ciudadt)</li>
        </ul>
        <p>Se crea la tabla CAMARA</p> 
        <ul>
            <li>Camara (idcam, marca, modelo, tipo, formato)</li>
        </ul>
        <p>Se crea la tabla DISTRIBUCION</p> 
        <ul>
            <li>Distribucion (idcam, idtienda)</li>
        </ul>
        <?php
           

            $db = new mysqli('localhost','pepito','password2017');

            if($db->connect_error) {
                echo "<p>ERROR de conexión:".$db->connect_error.". Revisar usuario y contraseña</p>";
                exit();
            }


            $db->select_db("fotografos");

            $crearTabla = "CREATE TABLE IF NOT EXISTS usuario (nombre_usuario VARCHAR(30) NOT NULL, 
                        nombre VARCHAR(255) NOT NULL,
                        apellidos VARCHAR(255) NOT NULL,
                        ciudad VARCHAR(255) NOT NULL,
                        modalidad VARCHAR(30),
                        PRIMARY KEY (nombre_usuario))";

            if($db->query($crearTabla) === TRUE){
                echo "<p>Tabla USUARIO creada con éxito (o ya existe)</p>";
            } else { 
                echo "<p>ERROR en la creación de la tabla USUARIO</p>";
                exit();
            }



            $crearTabla = "CREATE TABLE IF NOT EXISTS tienda (idtienda INT NOT NULL AUTO_INCREMENT, 
                        nombret VARCHAR(255) NOT NULL,
                        ciudadt VARCHAR(255) NOT NULL, 
                        PRIMARY KEY (idtienda))";

            if($db->query($crearTabla) === TRUE){
                echo "<p>Tabla TIENDA creada con éxito (o ya existe)</p>";
            } else { 
                echo "<p>ERROR en la creación de la tabla TIENDA</p>";
                exit();
            }



            $crearTabla = "CREATE TABLE IF NOT EXISTS camara (idcam INT NOT NULL AUTO_INCREMENT, 
                        marca VARCHAR(255) NOT NULL,
                        modelo VARCHAR(255) NOT NULL,
                        tipo VARCHAR(255) NOT NULL, 
                        formato VARCHAR(255) NOT NULL, 
                        PRIMARY KEY (idcam))";

            if($db->query($crearTabla) === TRUE){
                echo "<p>Tabla CAMARA creada con éxito (o ya existe)</p>";
            } else { 
                echo "<p>ERROR en la creación de la tabla CAMARA</p>";
                exit();
            }
        
        
        
            $crearTabla = "CREATE TABLE IF NOT EXISTS distribucion (idcam INT NOT NULL, 
                        idtienda INT NOT NULL,
                        PRIMARY KEY (idcam,idtienda),
                        FOREIGN KEY (idcam) REFERENCES camara(idcam),
                        FOREIGN KEY (idtienda) REFERENCES tienda(idtienda))";

            if($db->query($crearTabla) === TRUE){
                echo "<p>Tabla DISTRIBUCION creada con éxito (o ya existe)</p>";
            } else { 
                echo "<p>ERROR en la creación de la tabla DISTRIBUCION</p>";
                exit();
            }
        
        
        
            $crearTabla = "CREATE TABLE IF NOT EXISTS venta (nombre_usuario VARCHAR(30) NOT NULL, 
                        idcam INT NOT NULL,
                        idtienda INT NOT NULL,
                        numventa INT NOT NULL,
                        precio INT NOT NULL,
                        PRIMARY KEY (nombre_usuario,idcam,idtienda),
                        FOREIGN KEY (nombre_usuario) REFERENCES usuario(nombre_usuario),
                        FOREIGN KEY (idcam,idtienda) REFERENCES distribucion(idcam,idtienda))";

            if($db->query($crearTabla) === TRUE){
                echo "<p>Tabla VENTA creada con éxito (o ya existe)</p>";
            } else { 
                echo "<p>ERROR en la creación de la tabla VENTA</p>";
                exit();
            }
        
        //cerrar la conexión
        $db->close();    
        ?> 
    </section>

</body>
</html>