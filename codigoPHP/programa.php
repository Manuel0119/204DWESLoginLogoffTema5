<?php
session_start();
//Comprobación de si ha pasado por el login
if (is_null($_SESSION['user204DWESLoginLogoffTema5'])) {
    header('Location: login.php');
    exit;
}
//Comprobar si se ha pulsado el botón de salir
if (isset($_REQUEST['Salir'])) {
    $_SESSION['user204DWESLoginLogoffTema5'] = null;
    $_SESSION['fechaHoraUltimaConexionAnterior'] = null;
    header('Location: login.php');
    session_destroy();
    exit;
}
//Comprobar si se ha pulsado el botón de detalle
if (isset($_REQUEST['Detalle'])) {
    header('Location: detalle.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
    <!--
        Autor: Manuel Martín Alonso.
        Utilidad: Este programa consiste en crear un login.
        Fecha-última-revisión: 11-12-2022.
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
                left: 40%;
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
                <tr>
                    <td>
                        <?php
                        //Damos la bienvenida al usuario
                        switch ($_COOKIE['idioma']) {
                            case "es":
                                echo"Bienvenido " . $_SESSION['user204DWESLoginLogoffTema5']->T01_DescUsuario."<br>";
                                echo "Esta es la " . $_SESSION['user204DWESLoginLogoffTema5']->T01_NumConexiones . " vez que te conectas" . "<br/>";
                                if (($_SESSION['user204DWESLoginLogoffTema5']->T01_NumConexiones) > 1) {
                                    echo "Usted se conectó por última vez " . $_SESSION['fechaHoraUltimaConexionAnterior']."<br>";
                                } else {
                                    
                                }
                                break;
                            case "pt":
                                echo"Bem-vido " . $_SESSION['user204DWESLoginLogoffTema5']->T01_DescUsuario."<br>";
                                echo "Esta é a " . $_SESSION['user204DWESLoginLogoffTema5']->T01_NumConexiones . " vez que você se conecta" . "<br/>";
                                if (($_SESSION['user204DWESLoginLogoffTema5']->T01_NumConexiones) > 1) {
                                    echo "Você se conectou pela última vez " . $_SESSION['fechaHoraUltimaConexionAnterior']."<br>";
                                } else {
                                    
                                }
                                break;
                            case "gb":
                                echo"Welcome " . $_SESSION['user204DWESLoginLogoffTema5']->T01_DescUsuario."<br>";
                                echo "This is the " . $_SESSION['user204DWESLoginLogoffTema5']->T01_NumConexiones . " time you connect" . "<br/>";
                                if (($_SESSION['user204DWESLoginLogoffTema5']->T01_NumConexiones) > 1) {
                                    echo "You were last online on " . $_SESSION['fechaHoraUltimaConexionAnterior']."<br>";
                                } else {
                                    
                                }
                                break;
                            default:
                                echo"Bienvenido " . $_SESSION['user204DWESLoginLogoffTema5']->T01_DescUsuario;
                                echo "Esta es la " . $_SESSION['user204DWESLoginLogoffTema5']->T01_NumConexiones . " vez que te conectas" . "<br/>";
                                if (($_SESSION['user204DWESLoginLogoffTema5']->T01_NumConexiones) > 1) {
                                    echo "Usted se conectó por última vez " . $_SESSION['fechaHoraUltimaConexionAnterior']."<br>";
                                } else {
                                    
                                }
                                break;
                        }
                        ?>
                    </td>
                </tr>
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
