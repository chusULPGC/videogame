<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/estilos.css" media="screen" />    

    </head>
    <body>
        <?php
        //carga la plantilla con la header 
        require_once('Layouts/layout.php');
        $user = "root";
        $plataforma = "playstation";
        $db = new PDO('mysql:host=127.0.0.1;dbname=videojuegos', $user);
        $db->exec('PRAGMA foreign_keys = ON;');
        $res = $db->prepare("SELECT * FROM juegos WHERE plataforma=?");
        $res->execute(array($plataforma));
        $res->setFetchMode(PDO::FETCH_NAMED);
        $datos = $res->fetchAll();
        ?>
        <br>
        <table>
            <tr>                
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Plataforma</th>
                <th>Compañia</th>                
            </tr>
            <?php
            foreach ($datos as $juegos) {
                echo "<tr>";
                echo "<td>" . $juegos['nombre'] . "</td>";
                echo "<td>" . $juegos['tipo'] . "</td>";
                echo "<td>" . $juegos['plataforma'] . "</td>";
                echo "<td>" . $juegos['company'] . "</td>";
                echo "</tr>";
            }
            ?>

        </table>



    </body>
</html>