<?php

header("Content-Type: text/html;charset=utf-8");
include_once("../../../config/conex.php");
require_once("fpdf.php");
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

if ($accion == "exportar_pdf") {
    require_once("fpdf.php");
    include_once("../../../config/conex.php"); 
    $link = Conexion(); 

    $nombre = isset($_REQUEST['nombre']) ? str_replace("'", "''", $_REQUEST['nombre']) : '';
    $rut = isset($_REQUEST['rut']) ? str_replace("'", "''", $_REQUEST['rut']) : '';
    $correo = isset($_REQUEST['correo']) ? str_replace("'", "''", $_REQUEST['correo']) : '';    
    $vigente = isset($_REQUEST['vigente']) ? $_REQUEST['vigente'] : '';
    $cargo = isset($_REQUEST['cargo']) ? str_replace("'", "''", $_REQUEST['cargo']) : '';
    $area = isset($_REQUEST['area']) ? str_replace("'", "''", $_REQUEST['area']) : '';

    $sql = "SELECT 
        (rtrim(B.user_nombre)+' '+B.user_paterno+' '+B.user_materno) AS nombre,
        B.user_rut,
        CASE B.user_vigente WHEN 'S' THEN 'SI' ELSE 'NO' END AS user_vigente,
        B.user_correo,
        A.cargo_nombre,
        C.area_nombre
    FROM Seguridad.dbo.usuario AS B
    INNER JOIN Seguridad.dbo.cargo AS A ON B.cargo_codigo = A.cargo_codigo
    INNER JOIN Seguridad.dbo.areas AS C ON A.area_codigo = C.area_codigo
    WHERE 1=1";

    if ($nombre != '') {
        $sql .= " AND (B.user_nombre LIKE '%$nombre%' OR B.user_paterno LIKE '%$nombre%' OR B.user_materno LIKE '%$nombre%')";
    }
    if ($rut != '') {
        $sql .= " AND B.user_rut LIKE '%$rut%'";
    }
    if ($correo != '') {
        $sql .= " AND B.user_correo LIKE '%$correo%'";
    }
    if ($vigente != '') {
        $sql .= " AND B.user_vigente = '$vigente'";
    }
    if ($cargo != '') {
        $sql .= " AND A.cargo_nombre LIKE '%$cargo%'";
    }
    if ($area != '') {
        $sql .= " AND C.area_nombre LIKE '%$area%'";
    }

    $stmt = mssql_query($sql, $link);

    if (!$stmt) {
        die(json_encode(["success" => false, "error" => mssql_get_last_message()]));
    }

    $pdf = new FPDF('L', 'mm', 'A3'); // horizontal
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 18);
    $pdf->Cell(0, 10, 'Resultados de la Busqueda', 0, 1, 'C');
    $pdf->Ln(5);
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->SetFillColor(200, 220, 255);

    // Encabezado
    $pdf->Cell(80, 10, 'Nombre', 1, 0, 'C', true);
    $pdf->Cell(28, 10, 'RUT', 1, 0, 'C', true);
    $pdf->Cell(20, 10, 'Vigente', 1, 0, 'C', true);
    $pdf->Cell(80, 10, 'Correo', 1, 0, 'C', true);
    $pdf->Cell(100, 10, 'Cargo', 1, 0, 'C', true);
    $pdf->Cell(100, 10, 'Area', 1, 1, 'C', true);

    $pdf->SetFont('Arial', '', 11);

    while ($row = mssql_fetch_assoc($stmt)) {
        $pdf->Cell(80, 10, utf8_decode($row['nombre']), 1);
        $pdf->Cell(28, 10, $row['user_rut'], 1);
        $pdf->Cell(20, 10, $row['user_vigente'], 1);
        $pdf->Cell(80, 10, utf8_decode($row['user_correo']), 1);
        $pdf->Cell(100, 10, utf8_decode($row['cargo_nombre']), 1);
        $pdf->Cell(100, 10, utf8_decode($row['area_nombre']), 1);
        $pdf->Ln();
    }

    $nombreArchivo = 'resultados_busqueda_' . time() . '.pdf';
    $rutaArchivo = 'pdf_exportados/' . $nombreArchivo;
    $pdf->Output('F', $rutaArchivo);

    echo json_encode([
        "success" => true,
        "url" => "/COMASA/SISTEMAS/investigacion/json/" . $rutaArchivo
    ]);
}
