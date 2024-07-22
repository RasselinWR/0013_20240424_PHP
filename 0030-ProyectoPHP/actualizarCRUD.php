<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACTUALIZAR</title>
    <link href="estilosCRUD.css" rel="stylesheet">
</head>
<body>
    <?php
    include ("conexionPHP.php");
    $id=$_GET["id"];
    $conexion=$base->query("SELECT * FROM $BD_tabla WHERE ID=$id");
    $registro=$conexion->fetchAll(PDO::FETCH_OBJ);
    ?>
    <h2 id="titulo"><strong>ACTUALIZACIÓN DATOS</strong></h2>
    <table id="tabla">
        <tr class="cabecera">
        <td class="cajaE"></td><td class="cajaID1">Id</td><td class="cajaE">Nombre</td><td class="cajaE">Apellido</td><td class="cajaE">Direccion</td></tr>
        </tr>
    <?php 
        foreach($registro as $persona):
    ?>
        <tr class="cabecera">
            <td class="cajaE">Datos Cargados: </td>
            <td class="cajaID"><?php $uno=$persona->id; echo($persona->id);?></td>
            <td class="cajaT"><?php $dos=$persona->Nombre; echo($persona->Nombre);?></td>
            <td class="cajaT"><?php $tres=$persona->Apellido; echo($persona->Apellido);?></td>
            <td class="cajaT"><?php $cuatro=$persona->Direccion; echo($persona->Direccion);?></td>
        </tr>
    </table>
    <?php
        endforeach;
    ?>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
        <table id="tabla2">
            <tr class="cabecera">
                <td class="cajaE">Datos Actualizados: </td>
                <td class="cajaID">
                    <input type="text" class="rellenar" name="id" value="<?php echo($uno)?>" disabled="true" style="text-align: center">
                    <!-- SE TIENE QUE BLOQUEAR LA CAJA DEL ID PORQUE ES LA CLAVE PRIMARIA EN LA BBDD SQL-->
                </td>
                <td class="caja">
                    <input type="text" class="rellenar" name="nombre" value="<?php echo($dos)?>" style="text-align: center">
                </td>
                <td class="caja">
                    <input type="text" class="rellenar" name="apellido" value="<?php echo($tres)?>" style="text-align: center">
                </td>
                <td class="caja">
                    <input type="text" class="rellenar" name="direccion" value="<?php echo($cuatro)?>" style="text-align: center">
                </td>
            </tr>
            <tr>
                <td class="cajaB">
                        <input type="submit"  class="botonera" name="actualizar" value="Actualizar">
                </td>
                <td class="cajaB">
                        <input type="submit"  class="botonera" name="volver" value="Volver">
                </td>
            </tr>
        </table>
    </form>
</body>
<?php
    if(isset($_POST["actualizar"]))
    {
        include ("conexionPHP.php");
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $direccion=$_POST["direccion"];
        $conexion=$base->query("UPDATE $BD_tabla SET Nombre='$nombre',Apellido='$apellido',Direccion='$direccion' WHERE ID=$id");
        header("Location:index.php");
    }
    if(isset($_POST["volver"]))
    {
        header("Location:index.php");
    }
?>
</html>
