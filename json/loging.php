<?php
include_once("../../../config/conex.php");
$link = Conexion();

header("Content-Type: application/json");

// Consulta con parámetros seguros
$sql = "SELECT user_rut 
        FROM seguridad.dbo.usuario 
        WHERE user_rut = '".$_POST['username']."' AND user_contrasena_nueva = '".$_POST['password']."' ";

        $res = mssql_query($sql, $link);
    if ($fila = mssql_fetch_assoc($res)) {
         echo json_encode(['success' => true]);
    } else {
         echo json_encode(['success' => false, 'message' => 'Usuario o contraseña incorrectos.']);
    }


?>
