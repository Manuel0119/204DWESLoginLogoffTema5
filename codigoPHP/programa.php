<?php
session_start();
if (is_null($_SESSION['usuarioDAW204LoginLogoffTema5'])) {
    header('Location: login.php');
    exit;
}
if (isset($_REQUEST['Salir'])) {
    $_SESSION['usuarioDAW201AppLoginLogoff']=null;
    header('Location: login.php');
    session_destroy();
    exit;
}
if (isset($_REQUEST['Detalle'])) {
    header('Location: detalle.php');
    die;
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
            table, td, th {
                border: none;
            }
            .encabezado {
                justify-content: center;
            }
            .codigophp {
                left: 45%;
            }
            .volver{
                height: 35px;
                width: 35px;
            }
        </style>
    </head>
    <body>
        <div class="encabezado">
            <h2>Programa</h2>
        </div>
        <div class="codigophp">
            <table>
                <?php
                echo "Bienvenido " . $_SESSION['usuarioDAW204LoginLogoffTema5']->T01_DescUsuario . "<br/>";
                echo "Esta es la " . $_SESSION['usuarioDAW204LoginLogoffTema5']->T01_NumConexiones . " vez que te conectas" . "<br/>";
                if (($_SESSION['usuarioDAW204LoginLogoffTema5']->T01_NumConexiones) > 1) {
                    echo "Usted se conectó por última vez " . $_SESSION['usuarioDAW204LoginLogoffTema5']->T01_FechaHoraUltimaConexion;
                } else {
                    
                }
                ?>
            </table>
            <form name="ejercicio21" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <table class="formulario">
                    <tr>
                        <td colspan="2"><input type="submit" id="Detalle" value="Detalle" name="Detalle"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" id="Salir" value="Salir" name="Salir"></td>
                    </tr>
                </table>
            </form>
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
