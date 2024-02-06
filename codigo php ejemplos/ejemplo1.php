<?php
$server="localhost";
$db="M07";
$user="root";
$pass="";
$conexion =mysqli_connect($server, $user, $pass, $db) or die ("Error");
$consulta = "SELECT * FROM comentarios";
$resultado = mysqli_query($conexion, $consulta) or die ("Error");
if(isset($_POST['Aceptar'])){
    $sentencia = "INSERT INTO comentarios (comentario) 
        VALUES ('".$_POST['coment']."')";
        if(mysqli_query($conexion, $sentencia)){
            echo ''<h3>Registro insertado correctamente'</h3>';
        }else{
            echo '<h3>Error al insertar .'.mysqli_error($conexion).'</h3>';
        }}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ILERNA ONLINE</title>
</head>
<body>
    <div id="list_coments" >
        <?php
        while($columna = mysqli_fetch_array($resultado)){
            echo "<p>".$extract['comentario']."</p><br>";
        }?>
    </div>
    <h2>Comentarios</h2>
    <form action="prueba.php" method="POST">
        <textarea name="coment" id="" cols="50" rows="4"></textarea>
    </form>
</body>
</html>