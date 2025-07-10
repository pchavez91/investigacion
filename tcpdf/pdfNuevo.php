<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('memory_limit', '256M');
set_time_limit(120);

require_once(__DIR__ . '/tcpdf.php');
include_once(__DIR__ . '/../../../config/conex.php');

if (ob_get_length()) {
    ob_end_clean();
}

$link = Conexion();

$nombre  = isset($_GET['nombre']) ? str_replace("'", "''", $_GET['nombre']) : '';
$rut     = isset($_GET['rut']) ? str_replace("'", "''", $_GET['rut']) : '';
$correo  = isset($_GET['correo']) ? str_replace("'", "''", $_GET['correo']) : '';
$vigente = isset($_GET['vigente']) ? $_GET['vigente'] : '';
$cargo   = isset($_GET['cargo']) ? str_replace("'", "''", $_GET['cargo']) : '';
$area    = isset($_GET['area']) ? str_replace("'", "''", $_GET['area']) : '';

$sql = "SELECT TOP 50
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

$sql .= " ORDER BY B.user_nombre ASC";

$stmt = mssql_query($sql, $link);
if (!$stmt) {
    die("Error SQL: " . mssql_get_last_message());
}

$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('COMASA');
$pdf->SetTitle('Reporte Usuarios COMASA');
$pdf->SetMargins(15, 25, 15);
$pdf->SetAutoPageBreak(TRUE, 20);
$pdf->AddPage();

// Logo 
$logoPath = __DIR__ . '/images/logo.jpg';
if (file_exists($logoPath)) {
    $pdf->Image($logoPath, 15, 25, 45); // X=15, Y=15, ancho=45mm
}

// Título 
$pdf->SetFont('helvetica', 'B', 20);
$pdf->SetXY(100, 25);
$pdf->Cell(0, 10, 'BUSQUEDA DE USUARIOS', 0, 1);


// Fecha 
$pdf->SetFont('helvetica', '', 16);
$pdf->SetXY(250, 14);
$pdf->Cell(0, 7, 'Fecha: ' . date('d/m/Y H:i'), 0, 1, 'R');

// Línea separadora 
$pdf->SetDrawColor(0, 70, 127);
$pdf->SetLineWidth(0.8);
$pdf->Line(15, 45, 280, 45);

$pdf->Ln(20);

// Tabla con estilos
$pdf->SetFont('dejavusans', '', 10);
$html = '
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th {
        background-color: #00467f;
        color: white;
        padding: 8px;
        text-align: center;
        font-weight: bold;
        border: 1px solid #ddd;
    }
    td {
        border: 1px solid #ddd;
        padding: 6px;
        font-size: 9pt;
    }
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
</style>
<table>
    <thead>
        <tr>
            <th width="16.7%">Nombre</th>
            <th width="10%">RUT</th>
            <th width="8%">Vigente</th>
            <th width="25%">Correo</th>
            <th width="17%">Cargo</th>
            <th width="17%">Área</th>
        </tr>
    </thead>
    <tbody>
';

while ($row = mssql_fetch_assoc($stmt)) {
    $html .= '<tr>
        <td>' . htmlentities(utf8_encode($row['nombre'])) . '</td>
        <td>' . htmlentities(utf8_encode($row['user_rut'])) . '</td>
        <td align="center">' . htmlentities(utf8_encode($row['user_vigente'])) . '</td>
        <td>' . htmlentities(utf8_encode($row['user_correo'])) . '</td>
        <td>' . htmlentities(utf8_encode($row['cargo_nombre'])) . '</td>
        <td>' . htmlentities(utf8_encode($row['area_nombre'])) . '</td>
    </tr>';
}

$html .= '</tbody></table>';

$pdf->writeHTML($html, true, false, true, false, '');

// Pie de página con número de página
class MYPDF extends TCPDF {
    public function Footer() {
        $this->SetY(-15);
        $this->SetFont('helvetica', 'I', 8);
        $this->Cell(0, 10, 'Página '.$this->getAliasNumPage().' / '.$this->getAliasNbPages(), 0, false, 'C');
    }
}

$pdf->setFooterFont(Array('helvetica', '', 8));
$pdf->SetFooterMargin(15);
$pdf->setPrintFooter(true);

$pdf->Output('reporte_usuarios.pdf', 'I');
exit;
?>