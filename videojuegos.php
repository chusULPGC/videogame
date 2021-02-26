
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/estilos.css" media="screen" />    

        <title>            
        </title>

    </head>
    <script src="Jquery/jquery-1.6.3.min.js" type="text/javascript"></script>
    
    <script>            
            
    
    
    </script>
    <body>
        <?php
        //carga la plantilla con la header y el footer
        require_once('Layouts/layout.php');


        $user = "root";
        $db = new PDO('mysql:host=127.0.0.1;dbname=videojuegos', $user);
        $db->exec('PRAGMA foreign_keys = ON;');
        $res = $db->prepare("SELECT * FROM juegos");
        $res->execute(array());
        $res->setFetchMode(PDO::FETCH_NAMED);
        $datos = $res->fetchAll();
        ?>
        <br>
        <div id="table">
            <table>
                <tr>
                    <th>nombre</th>
                    <th>tipo</th>
                    <th>plataforma</th>
                    <th>compañia</th>                
                </tr>
                <?php
                $count = 0;
                foreach ($datos as $juegos) {
                    if ($count % 2 == 0) {
                        echo "<tr>";
                    } else {
                        echo "<tr style='background-color: #E0E0E0;'>";
                    }
                    echo "<td>" . $juegos['nombre'] . "</td>";
                    echo "<td>" . $juegos['tipo'] . "</td>";
                    echo "<td>" . $juegos['plataforma'] . "</td>";
                    echo "<td>" . $juegos['company'] . "</td>";
                    echo "</tr>";
                    $count = $count + 1;
                }
                ?>

            </table>            
        </div>



    </body>
</html>
