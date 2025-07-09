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
    ob_clean();
    // Cabecera correcta para PDF
    header("Content-Type: application/pdf");

    require_once(__DIR__ . "/../tcpdf/tcpdf.php");
    include_once("../../../config/conex.php");
    $link = Conexion();

    // Capturar filtros
    $nombre  = isset($_REQUEST['nombre']) ? str_replace("'", "''", $_REQUEST['nombre']) : '';
    $rut     = isset($_REQUEST['rut']) ? str_replace("'", "''", $_REQUEST['rut']) : '';
    $correo  = isset($_REQUEST['correo']) ? str_replace("'", "''", $_REQUEST['correo']) : '';
    $vigente = isset($_REQUEST['vigente']) ? $_REQUEST['vigente'] : '';
    $cargo   = isset($_REQUEST['cargo']) ? str_replace("'", "''", $_REQUEST['cargo']) : '';
    $area    = isset($_REQUEST['area']) ? str_replace("'", "''", $_REQUEST['area']) : '';

    // SQL
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

    if ($nombre != '')  $sql .= " AND (B.user_nombre LIKE '%$nombre%' OR B.user_paterno LIKE '%$nombre%' OR B.user_materno LIKE '%$nombre%')";
    if ($rut != '')     $sql .= " AND B.user_rut LIKE '%$rut%'";
    if ($correo != '')  $sql .= " AND B.user_correo LIKE '%$correo%'";
    if ($vigente != '') $sql .= " AND B.user_vigente = '$vigente'";
    if ($cargo != '')   $sql .= " AND A.cargo_nombre LIKE '%$cargo%'";
    if ($area != '')    $sql .= " AND C.area_nombre LIKE '%$area%'";

    $stmt = mssql_query($sql, $link);

    if (!$stmt) {
        die("Error SQL: " . mssql_get_last_message());
    }

    $pdf = new TCPDF('L', 'mm', 'A3', true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('COMASA');
    $pdf->SetTitle('Resultados de la Búsqueda');
    $pdf->SetMargins(10, 10, 10);
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->AddPage();
    $pdf->SetFont('helvetica', 'B', 16);
    $pdf->Cell(0, 10, 'Resultados de la Búsqueda', 0, 1, 'C');
    $pdf->Ln(5);

    $pdf->SetFont('helvetica', '', 10);
    $html = '
    <table border="1" cellpadding="4">
        <thead style="background-color:#f2f2f2;">
            <tr>
                <th><b>Nombre</b></th>
                <th><b>RUT</b></th>
                <th><b>Vigente</b></th>
                <th><b>Correo</b></th>
                <th><b>Cargo</b></th>
                <th><b>Área</b></th>
            </tr>
        </thead>
        <tbody>
    ';

    while ($row = mssql_fetch_assoc($stmt)) {
        $html .= '<tr>
            <td>' . htmlentities($row['nombre']) . '</td>
            <td>' . htmlentities($row['user_rut']) . '</td>
            <td>' . htmlentities($row['user_vigente']) . '</td>
            <td>' . htmlentities($row['user_correo']) . '</td>
            <td>' . htmlentities($row['cargo_nombre']) . '</td>
            <td>' . htmlentities($row['area_nombre']) . '</td>
        </tr>';
    }

    $html .= '</tbody></table>';
    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Output('resultados_busqueda.pdf', 'I');
    exit;
}




if ($accion == "exportar_excel") {
    header("Content-Type: application/vnd.ms-excel; charset=utf-8");
    header("Content-Disposition: attachment; filename=resultado_busqueda_" . date("Ymd_His") . ".xls");
    header("Pragma: no-cache");
    header("Expires: 0");

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

    echo "<table border='1'>";
    echo "<tr>
        <th>Nombre</th>
        <th>RUT</th>
        <th>Vigente</th>
        <th>Correo</th>
        <th>Cargo</th>
        <th>Área</th>
    </tr>";

    while ($row = mssql_fetch_assoc($stmt)) {
        echo "<tr>";
        echo "<td>" . utf8_decode($row['nombre']) . "</td>";
        echo "<td>" . $row['user_rut'] . "</td>";
        echo "<td>" . $row['user_vigente'] . "</td>";
        echo "<td>" . utf8_decode($row['user_correo']) . "</td>";
        echo "<td>" . utf8_decode($row['cargo_nombre']) . "</td>";
        echo "<td>" . utf8_decode($row['area_nombre']) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    exit;
}