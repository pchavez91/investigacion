<?php
include_once("../../../config/conex.php");
$link = Conexion();

header("Content-Type: application/json");


$input = json_decode(file_get_contents("php://input"), true);
//$user_rut = trim($input['username'] ?? '');
//$contrasena = ($input['password'] ?? '');

if ($user_rut === '' || $contrasena === '') {
    echo json_encode(['success' => false, 'message' => 'Debes ingresar usuario y contraseña.']);
    exit;
}

$sql = "SELECT user_rut, user_contrasena_nueva 
        FROM seguridad.dbo.usuario 
        WHERE user_rut = ? AND user_contrasena_nueva = ?";

$params = array($user_rut, $contrasena);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    echo json_encode(['success' => false, 'message' => 'Error en la consulta.']);
    exit;
}

if (sqlsrv_has_rows($stmt)) {
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Usuario o contraseña incorrectos.']);
}
?>