<?php

include_once("../../../config/conex.php");
$link = Conexion();

require '../../../PHPMailer/src/Exception.php';
require '../../../PHPMailer/src/PHPMailer.php';
require '../../../PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$continua = true;

function correo_investigacion($id_informe,$asunto,$enunciado){

$link = Conexion();
$accidentado ='';
$departamento_accidentado='';
$numero_informe='';

$sql ="SELECT REPLACE([nick_registro],'_',' ') AS registra, REPLACE(user_nick,'_',' ') AS accidentado, A.departamento, A.numero_informe
		FROM [seguimiento].[dbo].[informe] AS A
		INNER JOIN Seguridad.dbo.usuario AS B ON A.rut_accidentado=B.user_rut
		WHERE id_informe='2'";
		$RES = mssql_query($sql, $link);
		if ($row=  mssql_fetch_array($RES))
		{	

			$accidentado=$row['accidentado']; 
			$departamento_accidentado=$row['departamento']; 
			$numero_informe=$row['numero_informe']; 

		}



$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth=true;
$mail->CharSet = "UTF-8";
$mail->Port = 587;
$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure ="tls";
$mail->Username  = "comasa.info@gmail.com";
$mail->Password = "gqjopyktbcbxqwln";

/* $mail->Host = "smtp.office365.com";
$mail->SMTPSecure ="STARTTLS";
$mail->Username  = "compras@comasageneracion.cl";
$mail->Password = "o365.2019"; */

$adicional=' se encuentra lista para ';
$para='para ';

if($asunto=='CREADA'){
	$para='';
}


$mail->SetFrom  ('noresponder@comasageneracion.cl', 'Info Comasa'); //('tu_correo@gmail.com', 'Administrador');
$mail->Subject = ("Investigación de accidentes ".$para.$asunto);


if($asunto=='CREADA'){
	$adicional='';
	$asunto='';
}

// -----  detalle 
$mail->MsgHTML("
<p> Estimados/as</p>
<p> ".$enunciado." N° ".$numero_informe.", de don <strong>".$accidentado."</strong> ".$adicional." <strong>".$asunto."</strong>.</p>
<p> ".utf8_encode('Para mas detalles por favor ingrese a INTRANET.')." </p>
<p> <br>".utf8_encode('<strong>NOTA:<strong> No responder este email.')." </p>");

$mail->Timeout=30;

// ------- indico destinatario
$mail->AddAddress('fmadariaga@comasageneracion.cl','');
$mail->AddAddress('jlebrom@comasageneracion.cl','');
$mail->AddAddress('vruiz@comasageneracion.cl','');
$mail->AddAddress('rizquierdo@comasageneracion.cl','');

if($asunto=='CREADA'){
	$mail->AddAddress('croa@comasageneracion.cl','');
	$mail->AddAddress('mantinao@comasageneracion.cl','');
}

$exito = $mail->Send();

$intentos=1; 
  while ((!$exito) && ($intentos < 5)) {
    sleep(5);
        //echo $mail->ErrorInfo;
        $exito = $mail->Send();
        $intentos=$intentos+1;  
    
   }


if(!$exito) {
    //echo "Error al enviar: " . $mail->ErrorInfo;
    echo '[{"mensaje":"Error en el envio","intentos":"'.$intentos.'","success":"false"}]'; 

} else {
    //echo "Mensaje enviado";
    echo '[{"mensaje":"Correo enviado con Exito","intentos":"'.$intentos.'","success":"true"}]'; 
}


}


?>