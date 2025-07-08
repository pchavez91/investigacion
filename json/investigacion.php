<?php

header("Content-Type: text/html;charset=utf-8");
include_once("../../../config/conex.php");
$link = Conexion();

$accion   = $_REQUEST['accion'];
$continua = true;

$hora = (date ("His"));
$fecha=date('Ymd');
$fecha_hora=$fecha.'-'.$hora;


if ($accion == "datos_personales") {

    $nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : '';
    $rut = isset($_REQUEST['rut']) ? $_REQUEST['rut'] : '';
    $correo = isset($_REQUEST['correo']) ? $_REQUEST['correo'] : '';    
    $vigente = isset($_REQUEST['vigente']) ? $_REQUEST['vigente'] : '';
    $cargo = isset($_REQUEST['cargo']) ? $_REQUEST['cargo'] : '';
    $area = isset($_REQUEST['area']) ? $_REQUEST['area'] : '';


    $sql = "SELECT 
        B.user_nombre,
        (rtrim(B.user_nombre)+' '+B.user_paterno+' '+B.user_materno)as nombre, B.user_rut,
        CASE B.user_vigente WHEN 'S' THEN 'SI' ELSE 'NO' END AS user_vigente,
        B.user_correo,
        A.cargo_nombre,
        C.area_nombre
        FROM Seguridad.dbo.usuario AS B
        INNER JOIN Seguridad.dbo.cargo AS A ON B.cargo_codigo = A.cargo_codigo
        INNER JOIN Seguridad.dbo.areas AS C ON A.area_codigo = C.area_codigo
        WHERE 1=1";

    if ($nombre != '') {
        $nombre = str_replace("'", "''", $nombre);
        $sql .= " AND (B.user_nombre LIKE '%$nombre%' OR B.user_paterno LIKE '%$nombre%' OR B.user_materno LIKE '%$nombre%')";
    }
    if ($rut != '') {
        $rut = str_replace("'", "''", $rut);
        $sql .= " AND B.user_rut LIKE '%$rut%'";
    }
    if ($correo != '') {
        $correo = str_replace("'", "''", $correo);
        $sql .= " AND B.user_correo LIKE '%$correo%'";
    }
    if ($vigente != '') {
        $sql .= " AND B.user_vigente = '$vigente'";
    }
    if ($cargo != '') {
        $cargo = str_replace("'", "''", $cargo);
        $sql .= " AND A.cargo_nombre LIKE '%$cargo%'";
    }
    if ($area != '') {
        $area = str_replace("'", "''", $area);
        $sql .= " AND C.area_nombre LIKE '%$area%'";
    }

   

            $respuesta = CreaJSon($sql, $link, 1);
            $arreglo = '{"data":['.$respuesta.']}';

            echo $arreglo;
}
