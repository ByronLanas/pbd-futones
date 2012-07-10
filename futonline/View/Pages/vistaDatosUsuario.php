<?php
session_start();


if (!isset($_SESSION["usuario"])) {
    ?><body>
        <script type="text/javascript">
            window.location="/futonline/View/Pages/vistaInicio.php";
        </script>
    </body><?php
}
$usuario = $_SESSION["usuario"];
?>
<?php
header('Content-Type: text/html;charset=utf-8');

$datos = $_SESSION["datos"];
?>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<body style="background-color:#0A8A9A; font: Helvetica 12pt;">



<?php
if ($_SESSION["nivelPermiso"] == 1) {
    ?>
        <form name="datos" action="../Controller/controladorDatosUsuario.php" method="POST">
            <table border="0">
                <thead>
                    <tr>
                        <th>Datos Usuario</th>
                        <th><?php echo $_SESSION["usuario"]; ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th><br></th>
                    </tr>
                    <tr>

                        <td>Nombre: </td>
                        <td><input type="text" size="50" name="nombre" value="<?php echo $datos["CLI_NOM"] ?>" /></td>
                    </tr>
                    <tr>
                        <td>Direccion: </td>
                        <td><input type="hiden" size="50" name="direccion" value="<?php echo $datos["CLI_DIR"] ?>" /></td>
                    </tr>
                    <tr>
                        <td>Teléfono: </td>
                        <td><input type="hiden" size="50" name="telefono" value="<?php echo $datos["CLI_TEL"] ?>" /></td>
                    </tr>
                    <tr>
                        <td>Mail: </td>
                        <td><input type="hiden" size="50" name="mail" value="<?php echo $datos["CLI_MAIL"] ?>" /></td>
                    </tr>
                    <tr>
                        <td>Contraseña: </td>
                        <td><input type="password" size="50" name="pass" value="<?php echo $datos["CLI_PASS"] ?>" /></td>
                    </tr>
                    <tr>
                        <td>Repetir Contraseña: </td>
                        <td><input type="password" size="50" name="rep_pass" value="<?php echo $datos["CLI_PASS"] ?>" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="center"><input type="submit" value="modificar" name="accion" /></td>
                    </tr>
                </tbody>
            </table>


        </form>


    <?php
} else if ($_SESSION["nivelPermiso"] == 2) {
    ?>
        <form name="datos" action="../Controller/controladorDatosUsuario.php" method="POST">
            <table border="0">
                <thead>
                    <tr>
                        <th>Datos Usuario</th>
                        <th><?php echo $_SESSION["usuario"]; ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th><br></th>
                    </tr>
                    <tr>
                        <td>Contraseña: </td>
                        <td><input type="password" size="50" name="pass" value="<?php echo $datos["PASS_EMP"] ?>" /></td>
                    </tr>
                    <tr>
                        <td>Repetir Contraseña: </td>
                        <td><input type="password" size="50" name="rep_pass" value="<?php echo $datos["PASS_EMP"] ?>" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="center"><input type="submit" value="modificar" name="accion" /></td>
                    </tr>
                </tbody>
            </table>


        </form>


    <?php
} else if ($_SESSION["nivelPermiso"] == 3) {
    ?>
        <form name="datos" action="../Controller/controladorDatosUsuario.php" method="POST">
            <table border="0">
                <thead>
                    <tr>
                        <th>Datos Usuario</th>
                        <th><?php echo $_SESSION["usuario"]; ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th><br></th>
                    </tr>
                    <tr>
                        <td>Tipo de Empleado: </td>
                        <td><select name="tipo">
                                <option>administrador</option>
                                <option>empleado</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Contraseña: </td>
                        <td><input type="password" size="50" name="pass" value="<?php echo $datos["PASS_EMP"] ?>" /></td>
                    </tr>
                    <tr>
                        <td>Repetir Contraseña: </td>
                        <td><input type="password" size="50" name="rep_pass" value="<?php echo $datos["PASS_EMP"] ?>" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="center"><input type="submit" value="modificar" name="accion" /></td>
                    </tr>
                </tbody>
            </table>


        </form>


    <?php
}