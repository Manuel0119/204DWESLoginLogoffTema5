<?php
require_once '../core/221024ValidacionFormularios.php';
require_once '../conf/confDB.php';
$entradaOk = true;
//Array de respuestas para guardar las respuestas del formulario.
$aErrores = [
    'usuario' => null,
    'password' => null
];
$SQLUsuarioPorCodigo = <<< sq2
    select * from T01_Usuario where T01_CodUsuario=:codUsuario;
sq2;
//$actualizacionConexiones = <<< sq3
//    update T01_Usuario set T01_NumConexiones=T01_NumConexiones+1,T01_FechaHoraUltimaConexion=now() where T01_CodUsuario=:codUsuario;
//sq3;
//Comprobamos si ha pulsado el botón de Iniciar Sesion
try {
    if (isset($_REQUEST['IniciarSesion'])) {
        //VALIDACIÓN DE ENTRADA
        $miDB = new PDO(DSN, USER, PASSWORD);
        $aErrores['usuario'] = validacionFormularios::comprobarAlfabetico($_REQUEST['usuario'], 8, obligatorio: 1);
        $aErrores['password'] = validacionFormularios::comprobarAlfabetico($_REQUEST['password'], 255, obligatorio: 1);
        foreach ($aErrores as $mensajeError) {
            if ($mensajeError != null) {
                $entradaOk = false;
            }
        };
        $queryConsultaPorCodigo = $miDB->prepare($SQLUsuarioPorCodigo);
        $queryConsultaPorCodigo->bindParam(':codUsuario', $_REQUEST['usuario']);
        $queryConsultaPorCodigo->execute();
        $oConsultaPorCodigo = $queryConsultaPorCodigo->fetchObject();
        //Comprobación de contraseña correcta
        if (!$oConsultaPorCodigo || $oConsultaPorCodigo->T01_Password != hash('sha256', ($_REQUEST['usuario'] . $_REQUEST['password']))) {
            $entradaOk = false;
        } else {
            //Actualizacion posterior
        }
//   
    } else {
        $entradaOk = false;
    }
} catch (PDOException $excepcion) {
    echo 'Error: ' . $excepcion->getMessage() . "<br>";
    echo 'Código de error: ' . $excepcion->getCode() . "<br>";
} finally {
    unset($miDB);
}
if ($entradaOk) {
    session_start();
    $_SESSION['usuarioDAW204LoginLogoffTema5'] = $_REQUEST['usuario'];
    header('Location: ./programa.php');
    die();
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <!--
            Autor: Manuel Martín Alonso.
            Utilidad: Este programa consiste en crear un login.
            Fecha-última-revisión: 01-12-2022.
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
                .volver{
                    height: 35px;
                    width: 35px;
                }
            </style>
        </head>
        <body>
            <div class="encabezado">
                <h2>Login</h2>
            </div>
            <div class="codigophp">
                <form name="ejercicio21" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <table class="formulario">
                        <tr>
                            <td><label for="usuario">Usuario:</label></td>
                            <td><input type="text" name="usuario" class="entradadatos" value="<?php echo $_REQUEST['usuario'] ?? ''; ?>"/></td>
                        </tr>
                        <tr>
                            <td><label for="password">Password:</label></td>
                            <td><input type="password" name="password" class="entradadatos" value="<?php echo $_REQUEST['password'] ?? ''; ?>"/></td>
                        </tr>
                        <tr>
                            <td style="text-align: center" colspan="3">
                                <input type="submit" id="IniciarSesion" value="Iniciar Sesion" name="IniciarSesion">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        <?php } ?>
        <footer>
            <div><a href="../../204DWESProyectoDWES/indexProyectoDWES.php"><img style="padding: 0em 1em;" src="../webroot/logo_propio.png" alt="logo" id="logo"></a></div>
            2022-23 Manuel Martín Alonso. ©Todos los derechos reservados.
            <a href="https://github.com/Manuel0119/204DWESLoginLogoffTema5" target="_blank"><img src="../webroot/github-logo.png" alt="github" id="g"></a>
            <a href="doc/CV - Manuel Martín Alonso.pdf" target="_blank"><img src="../webroot/curriculum-logo.png" alt="curriculum" id="curricu"></a>
            <a href="../../204DWESProyectoDWES/indexProyectoDWES.php"><img src="../webroot/volver.png" alt="volver" class="volver"/></a>
        </footer>
    </body>
</html>

