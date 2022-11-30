<?php
if (isset($_REQUEST['Volver'])) {
    header('Location: ./programa.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
    <!--
        Autor: Manuel Martín Alonso.
        Utilidad: Este programa consiste en crear un login.
        Fecha-última-revisión: 29-11-2022.
    -->
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ManuelMartínAlonso</title>
        <link rel="stylesheet" href="../webroot/css/estilos.css">
        <link rel="icon" type="image/ico" sizes="32x32" href="../webroot/favicon.ico">
        <style>
            td {
                text-align: center;
            }
            .encabezado {
                justify-content: center;
                position: initial;
            }
            .codigophp {
                margin-bottom: 4rem;
                margin-left: 30rem;
                margin-top: 0;
                position: initial;
            }
            .volver{
                height: 35px;
                width: 35px;
            }
            input[type="submit"]{
                position: absolute;
                left: 50%;
            }
            form{
                margin-top: 1rem;
            }
        </style>
    </head>
    <body>
        <div class="encabezado">
            <h2>
                Detalle
            </h2>
        </div>
        <div class="codigophp">
            <form name="ejercicio21" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="submit" id="Volver" value="Volver" name="Volver">
            </form>
        </div>
        <!--$_SESSION-->
        <table class="tablaMostrar">
            <?php
            //Comprobación de que la variable no sea null o vacia.
            session_start();
            if (is_null($_SESSION) || empty($_SESSION)) {
                print '<thead><th  style="border:none;color:red;text-align:center;">La variable superglobal $_SESSION está vacía</th></thead>';
            } else {
                //Recorremos la variable imprimiendo la clave y el valor del array.
                echo '<th colspan="2" style="background: #CCC;">$_SESSION';
                foreach ($_SESSION as $clave => $valor) {
                    print("<tr>");
                    printf("<td>%s</td><td>%s</td>", $clave, $valor);
                    print("</tr>");
                }
            }
            echo '</th>';
            ?>
        </table>
        <!--$_COOKIE-->
        <table class="tablaMostrar">
            <?php
            //Comprobación de que la variable no sea null o vacia.
            if (is_null($_COOKIE) || empty($_COOKIE)) {
                print '<thead><th  style="border:none;color:red;text-align:center;">La variable superglobal $_COOKIE está vacía</th></thead>';
            } else {
                //Recorremos la variable imprimiendo la clave y el valor del array.
                echo '<th colspan="2" style="background: #CCC;">$_COOKIE';
                foreach ($_COOKIE as $clave => $valor) {
                    print("<tr>");
                    printf("<td>%s</td><td>%s</td>", $clave, $valor);
                    print("</tr>");
                }
            }
            echo '</th>';
            ?>
        </table>
        <!--$_SERVER-->
        <table class="tablaMostrar">
            <?php
            //Comprobación de que la variable no sea null o vacia.
            if (is_null($_SERVER) || empty($_SERVER)) {
                print '<thead><th  style="border:none;color:red;text-align:center;">La variable superglobal $_SERVER está vacía</th></thead>';
            } else {
                //Recorremos la variable imprimiendo la clave y el valor del array.
                echo '<th colspan="2" style="background: #CCC;">$_SERVER';
                foreach ($_SERVER as $clave => $valor) {
                    print("<tr>");
                    printf("<td>%s</td><td>%s</td>", $clave, $valor);
                    print("</tr>");
                }
            }
            echo '</th>';
            ?>
        </table>
        <!--$GLOBALS-->
        <table class="tablaMostrar">
            <?php
            //Comprobación de que la variable no sea null o vacia.
            if (is_null($GLOBALS) || empty($GLOBALS)) {
                print '<thead><th  style="border:none;color:red;text-align:center;">La variable superglobal $_SERVER está vacía</th></thead>';
            } else {
                //Recorremos la variable imprimiendo la clave y el valor del array.
                echo '<th colspan="2" style="background: #CCC;">$GLOBALS';
                foreach ($GLOBALS as $clave => $valor) {
                    if ($clave == '_SERVER') {
                        print("<tr>");
                        print '<td>';
                        print_r($clave);
                        print '</td>';
                        print '<td>';
                        echo '<table>';
                        foreach ($_SERVER as $claveServer => $valorServer) {
                            echo '<tr>';
                            print '<td>';
                            print_r($claveServer);
                            print '</td>';
                            print '<td>';
                            print_r($valorServer);
                            print '</td>';
                            echo '</tr>';
                        }
                        echo '</table>';
                        print '</td>';
                    } else {
                        print("<tr>");
                        print '<td>';
                        print_r($clave);
                        print '</td>';
                        print '<td>';
                        print_r($valor);
                        print '</td>';
                    }
                    print("</tr>");
                }
            }
            echo '</th>';
            ?>
        </table>
        <!--$_FILES-->
        <table class="tablaMostrar">
            <?php
            //Comprobación de que la variable no sea null o vacia.
            if (is_null($_FILES) || empty($_FILES)) {
                print '<thead><th  style="border:none;color:red;text-align:center;">La variable superglobal $_FILES está vacía</th></thead>';
            } else {
                //Recorremos la variable imprimiendo la clave y el valor del array.
                echo '<th colspan="2" style="background: #CCC;">$_FILES';
                foreach ($_FILES as $clave => $valor) {
                    print("<tr>");
                    printf("<td>%s</td><td>%s</td>", $clave, $valor);
                    print("</tr>");
                }
            }
            echo '</th>';
            ?>
        </table>
        <!--$_POST-->
        <table class="tablaMostrar">
            <?php
            //Comprobación de que la variable no sea null o vacia.
            if (is_null($_POST) || empty($_POST)) {
                print '<thead><th  style="border:none;color:red;text-align:center;">La variable superglobal $_POST está vacía</th></thead>';
            } else {
                //Recorremos la variable imprimiendo la clave y el valor del array.
                echo '<th colspan="2" style="background: #CCC;">$_POST';
                foreach ($_POST as $clave => $valor) {
                    print("<tr>");
                    printf("<td>%s</td><td>%s</td>", $clave, $valor);
                    print("</tr>");
                }
            }
            echo '</th>';
            ?>
        </table>
        <!--$_GET-->
        <table class="tablaMostrar">
            <?php
            //Comprobación de que la variable no sea null o vacia.
            if (is_null($_GET) || empty($_GET)) {
                print '<thead><th  style="border:none;color:red;text-align:center;">La variable superglobal $_GET está vacía</th></thead>';
            } else {
                //Recorremos la variable imprimiendo la clave y el valor del array.
                echo '<th colspan="2" style="background: #CCC;">$_GET';
                foreach ($_GET as $clave => $valor) {
                    print("<tr>");
                    printf("<td>%s</td><td>%s</td>", $clave, $valor);
                    print("</tr>");
                }
            }
            echo '</th>';
            ?>
        </table>
        <!--$_REQUEST-->
        <table class="tablaMostrar">
            <?php
            //Comprobación de que la variable no sea null o vacia.
            if (is_null($_REQUEST) || empty($_REQUEST)) {
                print '<thead><th  style="border:none;color:red;text-align:center;">La variable superglobal $_REQUEST está vacía</th></thead>';
            } else {
                //Recorremos la variable imprimiendo la clave y el valor del array.
                echo '<th colspan="2" style="background: #CCC;">$_REQUEST';
                foreach ($_REQUEST as $clave => $valor) {
                    print("<tr>");
                    printf("<td>%s</td><td>%s</td>", $clave, $valor);
                    print("</tr>");
                }
            }
            echo '</th>';
            ?>
        </table>
        <!--$_ENV-->
        <table class="tablaMostrar">
            <?php
            //Comprobación de que la variable no sea null o vacia.
            if (is_null($_ENV) || empty($_ENV)) {
                print '<thead><th  style="border:none;color:red;text-align:center;">La variable superglobal $_ENV está vacía</th></thead>';
            } else {
                //Recorremos la variable imprimiendo la clave y el valor del array.
                echo '<th colspan="2" style="background: #CCC;">$_ENV';
                foreach ($_ENV as $clave => $valor) {
                    print("<tr>");
                    printf("<td>%s</td><td>%s</td>", $clave, $valor);
                    print("</tr>");
                }
            }
            echo '</th>';
            ?>
        </table>
        <div>
            <?php
            phpinfo();
            ?>
        </div>
        <footer>
            <div><a href="../../204DWESProyectoDWES/indexProyectoDWES.php"><img style="padding: 0em 1em;" src="../webroot/logo_propio.png" alt="logo" id="logo"></a></div>
            2022-23 Manuel Martín Alonso. ©Todos los derechos reservados.
            <a href="https://github.com/Manuel0119/204DWESLoginLogoffTema5" target="_blank"><img src="../webroot/github-logo.png" alt="github" id="g"></a>
            <a href="doc/CV - Manuel Martín Alonso.pdf" target="_blank"><img src="../webroot/curriculum-logo.png" alt="curriculum" id="curricu"></a>
            <a href="../../204DWESProyectoDWES/indexProyectoDWES.php"><img src="../webroot/volver.png" alt="volver" class="volver"/></a>
        </footer>
    </body>
</html>
