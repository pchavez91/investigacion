<?php

header("Content-Type: text/html;charset=utf-8");
include_once("../../../config/conex.php");
$link = Conexion();

$accion   = $_REQUEST['accion'];
$continua = true;

$hora = (date ("His"));
$fecha=date('Ymd');
$fecha_hora=$fecha.'-'.$hora;



if($accion=='consulta_uno')
{
		$sql ="SELECT *
			  FROM [seguimiento].[dbo].[informe]";

	  $respuesta = CreaJSon($sql,$link,1);
		echo '['.$respuesta.']';
		
}

if($accion == "consulta_dos"){

    $sql = "select
            (rtrim(B.user_nombre)+' '+B.user_paterno+' '+B.user_materno)as nombre, B.user_rut, 
            CASE B.user_vigente WHEN 'S' THEN 'SI' ELSE 'NO' END user_vigente,
            B.user_correo, A.cargo_nombre, C.area_nombre
            FROM [Seguridad].[dbo].[usuario] as B
            inner join Seguridad.dbo.cargo as A on B.cargo_codigo=a.cargo_codigo
            inner join Seguridad.dbo.areas AS C ON A.area_codigo=C.area_codigo
            WHERE B.user_vigente='S' AND B.id_empresa='1';";

            $respuesta = CreaJSon($sql, $link, 1);
            $arreglo = '{"data":['.$respuesta.']}';

            echo $arreglo;

}

if ($accion == "carga_patricio") {
    $sql = "SELECT A.user_nombre, A.user_paterno, A.user_materno, B.cargo_nombre, C.area_nombre
            FROM Seguridad.dbo.usuario AS A
            INNER JOIN Seguridad.dbo.cargo AS B ON A.cargo_codigo = B.cargo_codigo
            INNER JOIN Seguridad.dbo.areas AS C ON B.area_codigo = C.area_codigo
            WHERE A.user_nombre = 'Patricio'";

    // Ejecutar la consulta
    $resultado = mssql_query($sql, $link);

    if ($resultado) {
        // Ciclo while correcto
        while ($row = mssql_fetch_array($resultado)) {
            echo $row['user_nombre'] . " " . 
                 $row['user_paterno'] . " " . 
                 $row['user_materno'] . " - " . 
                 $row['cargo_nombre'] . " - " . 
                 $row['area_nombre'] . "<br>";
        }
    } else {
        echo "Error al ejecutar la consulta.";
    }


    //echo '[{"nombre":"paricio","area":"ti"},{"nombre":"marco","area":"ti"}]';
}

if ($accion == "patricio") {

    $sql = "SELECT A.user_nombre, A.user_paterno, A.user_materno, B.cargo_nombre, C.area_nombre
            FROM Seguridad.dbo.usuario AS A
            INNER JOIN Seguridad.dbo.cargo AS B ON A.cargo_codigo = B.cargo_codigo
            INNER JOIN Seguridad.dbo.areas AS C ON B.area_codigo = C.area_codigo
            WHERE A.user_nombre = 'Patricio'";

    $resultado = mssql_query($sql, $link);

    if ($resultado) {
        $datos = []; 

        while ($row = mssql_fetch_array($resultado)) {
            $datos[] = [ 
                'nombre'       => $row['user_nombre'],
                'paterno'      => $row['user_paterno'],
                'materno'      => $row['user_materno'],
                'cargo'        => $row['cargo_nombre'],
                'area'         => $row['area_nombre']
            ];
        }

        echo json_encode($datos);
    } else {
        echo json_encode(['error' => 'Error al ejecutar la consulta.']);
    }
}


?>