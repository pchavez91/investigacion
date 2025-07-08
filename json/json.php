<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
include_once("../../../config/conex.php");
$link = Conexion();

if(isset($_SESSION['nick'])){}else{header('Location: ../../../index.php'); exit();}

$accion   = $_REQUEST['accion'];
$continua = true;

$hora = (date ("His"));
$fecha=date('Ymd');
$fecha_hora=$fecha.'-'.$hora;




if($accion=='datos_partes_lesionadas')
{
	$id_informe = $_REQUEST['id_informe'];

		$sql ="SELECT nombre_parte from [seguimiento].[dbo].[partes_lesionadas]";
		$RES = mssql_query($sql, $link);
	      WHILE ($row=  mssql_fetch_array($RES))
			{	

				$nombre_parte=utf8_encode($row['nombre_parte']); 

				$sql_in="SELECT parte_cuerpo_lesiona from [seguimiento].[dbo].[informe]
				where id_informe='$id_informe' and parte_cuerpo_lesiona like'%".$nombre_parte."%'";
				$RES2 = mssql_query($sql_in, $link);
				 if ($row=  mssql_fetch_array($RES2))
				{

					 echo '<option selected value="'.$nombre_parte.'" data-badge="">'.$nombre_parte.'</option>';

				}else{
					 echo '<option value="'.$nombre_parte.'" data-badge="">'.$nombre_parte.'</option>';
				}
		

			     

			}

		
}



if($accion=='consulta_para_imprimir')
{
	$id_informe = $_REQUEST['id_informe'];

		$sql ="SELECT [id_informe]
			      ,[fecha_firma_revision]
			      ,[fecha_firma_autorizacion]
			      ,[fecha_firma_elaborador]
			  FROM [seguimiento].[dbo].[informe]
			  WHERE [id_informe]='".$id_informe."'";

	  $respuesta = CreaJSon($sql,$link,1);
		echo '['.$respuesta.']';

		
}


if($accion=='elimina_req_sistema'){

	$id_informe = $_REQUEST['id_informe'];
	$id_req_sistema = $_REQUEST['id_req_sistema'];


	 $sql="DELETE [seguimiento].[dbo].[req_sistema_informe]
			WHERE [id_informe]='$id_informe' AND [id_req_sistema]='$id_req_sistema'";
			 mssql_query($sql, $link);

			 echo '[{"mensaje":"Eliminado Correctamente"}]';
		
}


if($accion=='elimina_causa_basica'){

	$id_informe = $_REQUEST['id_informe'];
	$id_causas_basicas = $_REQUEST['id_causas_basicas'];


	 $sql="DELETE [seguimiento].[dbo].[causas_basicas_informe]
			WHERE [id_informe]='$id_informe' AND [id_causas_basicas]='$id_causas_basicas'";
			 mssql_query($sql, $link);

			 echo '[{"mensaje":"Eliminado Correctamente"}]';
		
}



if($accion=='elimina_causa_inmediata'){

	$id_informe = $_REQUEST['id_informe'];
	$id_causas_inmediatas = $_REQUEST['id_causas_inmediatas'];


	 $sql="DELETE [seguimiento].[dbo].[causas_inmediatas_informe]
			WHERE [id_informe]='$id_informe' AND [id_causas_inmediatas]='$id_causas_inmediatas'";
			 mssql_query($sql, $link);

			 echo '[{"mensaje":"Eliminado Correctamente"}]';
		
}


if($accion=='nuevo_tipo_accidente'){

	$tipo_accidente = utf8_decode($_REQUEST['nuevo_tipo_accidente']);

	$sql ="SELECT  max([id_tipo_accidente])+1 as numero
 		FROM [seguimiento].[dbo].[tipo_accidente]";
 		$RES = mssql_query($sql, $link);
			if ($row=  mssql_fetch_array($RES))
			{	

				$id_tipo_accidente=$row['numero']; 

				$sql_insert="INSERT INTO [seguimiento].[dbo].[tipo_accidente]
			           ([id_tipo_accidente]
			           ,[tipo_accidente]
			           ,[vigente])
			     VALUES
			           ('$id_tipo_accidente'
			           ,'$tipo_accidente'
			           ,'SI')";
			 		mssql_query($sql_insert, $link);

			 echo '[{"mensaje":"Insertado Correctamente"}]';

			}

		
}



if($accion=='nueva_parte_lesionada'){

	$nueva_parte_lesionada = utf8_decode($_REQUEST['nueva_parte_lesionada']);




				$sql_insert="INSERT INTO [seguimiento].[dbo].[partes_lesionadas]
					           ([nombre_parte])
					     VALUES
					           ('$nueva_parte_lesionada')";
			 		mssql_query($sql_insert, $link);

			 echo '[{"mensaje":"Insertado Correctamente"}]';

			

		
}


if($accion=='agregar_req_del_sistema'){

	$id_informe = $_REQUEST['id_informe'];
	$id_danio = $_REQUEST['id_danio'];
	$id_incidente = $_REQUEST['id_incidente'];
	$id_causa_inmediata = $_REQUEST['id_causa_inmediata'];
	$id_causa_basica = $_REQUEST['id_causa_basica'];
	$nuevo_req_sistema = utf8_decode($_REQUEST['nuevo_incidente']);

	 $sql="INSERT INTO [seguimiento].[dbo].[req_sistema_informe]
		           ([req_sistema]
		           ,[id_danio]
		           ,[id_incidente]
		           ,[id_causas_inmediatas]
		           ,[id_causas_basicas]
		           ,[id_informe])
		     VALUES
		           ('$nuevo_req_sistema'
		           ,'$id_danio'
		           ,'$id_incidente'
		           ,'$id_causa_inmediata'
		           ,'$id_causa_basica'
		           ,'$id_informe')";
 		mssql_query($sql, $link);

			 echo '[{"mensaje":"Insertado Correctamente"}]';
		
}





if($accion=='agregar_causa_basicas'){

	$id_informe = $_REQUEST['id_informe'];
	$id_danio = $_REQUEST['id_danio'];
	$id_incidente = $_REQUEST['id_incidente'];
	$id_causa_inmediata = $_REQUEST['id_causa_inmediata'];
	$nuevo_causas_basicas = utf8_decode($_REQUEST['nuevo_incidente']);

	 $sql="INSERT INTO [seguimiento].[dbo].[causas_basicas_informe]
		           ([causas_basicas]
		           ,[id_danio]
		           ,[id_incidente]
		           ,[id_causas_inmediatas]
		           ,[id_informe])
		     VALUES
		           ('$nuevo_causas_basicas'
		           ,'$id_danio'
		           ,'$id_incidente'
		           ,'$id_causa_inmediata'
		           ,'$id_informe')";
 		mssql_query($sql, $link);

			 echo '[{"mensaje":"Insertado Correctamente"}]';
		
}


if($accion=='agregar_causa_inmediata'){

	$id_informe = $_REQUEST['id_informe'];
	$id_danio = $_REQUEST['id_danio'];
	$id_incidente = $_REQUEST['id_incidente'];
	$nuevo_incidente = utf8_decode($_REQUEST['nuevo_incidente']);

	 $sql="INSERT INTO [seguimiento].[dbo].[causas_inmediatas_informe]
			           ([causas_inmediatas]
			           ,[id_danio]
			           ,[id_incidente]
			           ,[id_informe])
			     VALUES
			           ('$nuevo_incidente'
			           ,'$id_danio'
			           ,'$id_incidente '
			           ,'$id_informe')";
 		mssql_query($sql, $link);

			 echo '[{"mensaje":"Insertado Correctamente"}]';
		
}


if($accion=='agregar_incidente'){

	$id_informe = $_REQUEST['id_informe'];
	$id_danio = $_REQUEST['id_danio'];
	$nuevo_incidente = utf8_decode($_REQUEST['nuevo_incidente']);

	 $sql="INSERT INTO [seguimiento].[dbo].[incidente_informe]
		           ([incidente]
		           ,[id_danio]
		           ,[id_informe])
		     VALUES
		           ('$nuevo_incidente'
		           ,'$id_danio'
		           ,'$id_informe')";
 		mssql_query($sql, $link);

			 echo '[{"mensaje":"Insertado Correctamente"}]';
		
}


if($accion=='elimina_incidente'){

	$id_informe = $_REQUEST['id_informe'];
	$id_incidente = $_REQUEST['id_incidente'];


	 $sql="DELETE [seguimiento].[dbo].[incidente_informe]
			WHERE [id_informe]='$id_informe' AND [id_incidente]='$id_incidente'";
			 mssql_query($sql, $link);


			 echo '[{"mensaje":"Eliminado Correctamente Correctamente"}]';
		
}



if($accion=='elimina_danio'){

	$id_informe = $_REQUEST['id_informe'];
	$id_danio = $_REQUEST['id_danio'];


	 $sql="DELETE [seguimiento].[dbo].[danio_informe]
			WHERE [id_informe]='$id_informe' AND [id_danio]='$id_danio'";
			 mssql_query($sql, $link);


			 echo '[{"mensaje":"Eliminado Correctamente Correctamente"}]';
		
}


if($accion=='agrega_danio'){

	$id_informe = $_REQUEST['id_informe'];
	$danio = utf8_decode($_REQUEST['danio']);

	 $sql="INSERT INTO [seguimiento].[dbo].[danio_informe]
				           ([danio]
				           ,[id_informe])
				     VALUES
				           ('$danio'
				           ,'$id_informe')";
			 mssql_query($sql, $link);


			 echo '[{"mensaje":"Insertado Correctamente"}]';
		
}


if($accion=='carga_incidentes'){

	$id_informe	=$_REQUEST['id_informe'];
	$id_danio	=$_REQUEST['id_danio'];

	   	$sql ="SELECT [id_incidente]
			      ,[incidente]
			      ,[id_danio]
			      ,[id_informe]
			  FROM [seguimiento].[dbo].[incidente_informe]
			  where [id_informe]='$id_informe' and [id_danio]='$id_danio'";
					      
		$arreglo=CreaJson($sql,$link);
		echo '['.$arreglo.']'; 
		
}

if($accion=='carga_analisis_causal_danios'){

	$id_informe	=$_REQUEST['id_informe'];
	$tabla_danio='';
	$encabezado_tabla_principal="";
	$tabla_inicio_principal='<table border="1" width="100%" >'.$encabezado_tabla_principal.'<tbody>';
	$tabla_inicio='<table border="1" width="100%" ><tbody>';
	$tabla_fin='</tbody></table>';
	$tabla_icausas_inmediatas='';
	$tabla_causas_basicas='';
	$tabla_incidente='';
	


	   	$sql_danio ="SELECT [id_danio]
			      ,[danio]
			      ,[id_informe]
			  FROM [seguimiento].[dbo].[danio_informe]
			  WHERE [id_informe]='$id_informe'";
			 $RES1 = mssql_query($sql_danio, $link);
			while ($row1=  mssql_fetch_array($RES1))
			{	
				$accion='ingresar_incidente';
				$id_danio=$row1['id_danio'];
				$danio=$row1['danio'];
			   	$tabla_danio=$tabla_danio.'<tr><td style="text-align:center">'.utf8_encode($row1['danio']).'<br></button><button type="button" class="btn btn-danger btn-sm glyphicon glyphicon-remove btn-md pull-left" onclick="elimina_danio('.$id_danio.','.$id_informe.')" title="Elimina Daño"></button><button type="button" class="btn btn-success btn-sm glyphicon glyphicon-chevron-right btn-md pull-left" onclick="abre_ventana_agregar_incidente('.$id_danio.',0,0,0,\''.$danio.'\',\''.$accion.'\')" title="Agregar un incidentes"></button></td>';
			   	

			   	$tabla_incidente='';


			   	$sql_incidente ="SELECT [id_incidente]
					      ,[incidente]
					      ,[id_danio]
					      ,[id_informe]
					  FROM [seguimiento].[dbo].[incidente_informe]
					  where [id_informe]='$id_informe' and [id_danio]='$id_danio'";
						 $RES2 = mssql_query($sql_incidente, $link);
						while ($row2=  mssql_fetch_array($RES2))
						{
							$accion='ingresar_causas_inmediatas';
							$id_incidente=$row2['id_incidente'];
							$incidente=$row2['incidente'];
							$tabla_incidente=$tabla_incidente.'<tr><td>'.utf8_encode($row2['incidente']).'<br></button></button><button type="button" class="btn btn-danger btn-sm glyphicon glyphicon-remove btn-md pull-left" onclick="elimina_incidente('.$id_incidente.','.$id_informe.')" title="Elimina Incidente"></button><button type="button" class="btn btn-success btn-sm glyphicon glyphicon-chevron-right btn-md pull-left" onclick="abre_ventana_agregar_incidente('.$id_danio.','.$id_incidente.',0,0,\''.$incidente.'\',\''.$accion.'\')" title="Agregar una causa inmediata"></button></td>';
							


							$tabla_icausas_inmediatas='';
								

								 $sql_causas_inmed ="SELECT [id_causas_inmediatas]
										      ,[causas_inmediatas]
										      ,[id_danio]
										      ,[id_incidente]
										      ,[id_informe]
										  FROM [seguimiento].[dbo].[causas_inmediatas_informe]
										  where [id_danio] ='$id_danio' and [id_incidente]='$id_incidente' and [id_informe]='$id_informe'";
									 $RES3 = mssql_query($sql_causas_inmed, $link);
									while ($row3=  mssql_fetch_array($RES3))
									{


										$accion='ingresar_causas_basicas';
										$id_causas_inmediatas=$row3['id_causas_inmediatas'];
										$causas_inmediatas=$row3['causas_inmediatas'];
										$tabla_icausas_inmediatas=$tabla_icausas_inmediatas.'<tr><td>'.utf8_encode($row3['causas_inmediatas']).'<br></button></button><button type="button" class="btn btn-danger btn-sm glyphicon glyphicon-remove btn-md pull-left" onclick="elimina_causa_inmediata('.$id_causas_inmediatas.','.$id_informe.')" title="Elimina Causa Inmediata"></button><button type="button" class="btn btn-success btn-sm glyphicon glyphicon-chevron-right btn-md pull-left" onclick="abre_ventana_agregar_incidente('.$id_danio.','.$id_incidente.','.$id_causas_inmediatas.',0,\''.$causas_inmediatas.'\',\''.$accion.'\')" title="Agregar una causa básica"></button></td>';
										

										$tabla_causas_basicas='';




											$sql_causas_basicas ="SELECT [id_causas_basicas]
													      ,[causas_basicas]
													      ,[id_danio]
													      ,[id_incidente]
													      ,[id_causas_inmediatas]
													      ,[id_informe]
													  FROM [seguimiento].[dbo].[causas_basicas_informe]
													  where [id_danio]='$id_danio' and [id_incidente]='$id_incidente' 
													  and [id_causas_inmediatas]='$id_causas_inmediatas' and [id_informe]='$id_informe'";
												 $RES4 = mssql_query($sql_causas_basicas, $link);
												while ($row4=  mssql_fetch_array($RES4))
												{


													$id_causas_basicas=$row4['id_causas_basicas'];
													$accion='ingresar_req_del_sistema';
													$causas_basicas=$row4['causas_basicas'];
													$tabla_causas_basicas=$tabla_causas_basicas.'<tr><td>'.utf8_encode($row4['causas_basicas']).'<br><button type="button" class="btn btn-danger btn-sm glyphicon glyphicon-remove btn-md pull-left" onclick="elimina_causa_basica('.$id_causas_basicas.','.$id_informe.')" title="Elimina Causa Básica"></button></button><button type="button" class="btn btn-success btn-sm glyphicon glyphicon-chevron-right btn-md pull-left" onclick="abre_ventana_agregar_incidente('.$id_danio.','.$id_incidente.','.$id_causas_inmediatas.','.$id_causas_basicas.',\''.$causas_basicas.'\',\''.$accion.'\')" title="Agregar un req. del sistema"></button></td>';
													

													$tabla_req_sistema='';


																	$sql_req_sistema ="SELECT [id_req_sistema]
																	      ,[req_sistema]
																	      ,[id_danio]
																	      ,[id_incidente]
																	      ,[id_causas_inmediatas]
																	      ,[id_causas_basicas]
																	      ,[id_informe]
																	  FROM [seguimiento].[dbo].[req_sistema_informe]
																	  where [id_danio]='$id_danio' and [id_incidente]='$id_incidente' 
																	  and [id_causas_inmediatas]='$id_causas_inmediatas' 
																	  and [id_causas_basicas]='$id_causas_basicas' and [id_informe]='$id_informe'";
																 $RES5 = mssql_query($sql_req_sistema, $link);
																while ($row5=  mssql_fetch_array($RES5))
																{


																	$id_req_sistema=$row5['id_req_sistema'];
																	$tabla_req_sistema=$tabla_req_sistema.'<tr><td>'.utf8_encode($row5['req_sistema']).'<br><button type="button" class="btn btn-danger btn-sm glyphicon glyphicon-remove btn-md pull-left" onclick="elimina_req_sistema('.$id_req_sistema.','.$id_informe.')" title="Elimina Req. del Sistema"></button></td></tr>';
																	





																}

																if($tabla_req_sistema!=''){
																	$tabla_req_sistema='<td>'.$tabla_inicio.$tabla_req_sistema.$tabla_fin.'</td>';
																	$tabla_causas_basicas=$tabla_causas_basicas.$tabla_req_sistema;
																}






												}

												if($tabla_causas_basicas!=''){
													$tabla_causas_basicas='<td>'.$tabla_inicio.$tabla_causas_basicas.$tabla_fin.'</td>';
													$tabla_icausas_inmediatas=$tabla_icausas_inmediatas.$tabla_causas_basicas;
												}







									}

									if($tabla_icausas_inmediatas!=''){
										$tabla_icausas_inmediatas='<td>'.$tabla_inicio.$tabla_icausas_inmediatas.$tabla_fin.'</td>';
										$tabla_incidente=$tabla_incidente.$tabla_icausas_inmediatas;
									}

									

						}

						if($tabla_incidente!=''){
							$tabla_incidente='<td>'.$tabla_inicio.$tabla_incidente.$tabla_fin.'</td>';
							$tabla_danio=$tabla_danio.$tabla_incidente;
						}

				$tabla_danio=$tabla_danio.'</tr>';
			}

	echo $tabla_inicio_principal.$tabla_danio.$tabla_fin;
					      
		
}



if($accion=='eliminar_adjunto'){

	$id_informe	=$_REQUEST['id_informe'];
	$id_ruta	=$_REQUEST['id_ruta'];

	   	$sql =" DELETE FROM [seguimiento].[dbo].[ruta_documentos_informe]
      		  where [id_informe]='$id_informe' and [id_ruta]='$id_ruta'";
					      
		
			 mssql_query($sql, $link);


			 echo '[{"mensaje":"Eliminado correctamente"}]';

		
}



if($accion=='carga_galeria_adjuntos'){

	$id_informe	=$_REQUEST['id_informe'];

	   	$sql ="SELECT [id_ruta]
			      ,[ruta_documento]
			      ,[tipo_adjunto]
			      ,[id_informe]
			      ,[nick_usuario]
			      ,[fecha]
			  FROM [seguimiento].[dbo].[ruta_documentos_informe]
			  where [id_informe]='$id_informe'";
					      
		$arreglo=CreaJson($sql,$link);
		echo '['.$arreglo.']'; 
		
}


if($accion=='ver_archivo'){

	$id_informe	=$_REQUEST['id_informe'];
	$id_ruta	=$_REQUEST['id_ruta'];

	   	$sql ="SELECT [id_ruta]
			      ,[ruta_documento]
			      ,[tipo_adjunto]
			      ,[id_informe]
			      ,[nick_usuario]
			      ,[fecha]
			  FROM [seguimiento].[dbo].[ruta_documentos_informe]
			  where [id_informe]='$id_informe' and [id_ruta]='$id_ruta'";
					      
		$arreglo=CreaJson($sql,$link);
		echo '{"data":['.$arreglo.']}'; 
		
}


if($accion=='guardar_adjunto'){

	$ruta=$_POST['ruta'];
	$id_informe=$_POST['id_informe'];
	$tipo_adjunto=$_POST['adj_tipo_adjunto'];
	$doc_adjunto=$ruta;


	$nombreDelArchivo = $ruta;
	$extension = pathinfo($nombreDelArchivo, PATHINFO_EXTENSION);
	if($extension=='jpg' || $extension=='jpeg' || $extension=='png'){
		$tipo_adjunto='imagen';
	}else if($extension=='mp4'){
		$tipo_adjunto='video';
	}


	$sql ="INSERT INTO [seguimiento].[dbo].[ruta_documentos_informe]
	           ([ruta_documento]
	           ,[tipo_adjunto]
	           ,[id_informe]
	           ,[nick_usuario]
	           ,[fecha])
	     VALUES
	           ('$ruta'
	           ,'$tipo_adjunto'
	           ,'$id_informe'
	           ,'".$_SESSION['nick']."'
	           ,getdate())";

	mssql_query($sql,$link,1);

	if($doc_adjunto != ''){

		$sql_id="SELECT MAX(id_ruta) AS id FROM [seguimiento].[dbo].[ruta_documentos_informe]";
		$res_id=mssql_query($sql_id,$link);
		while($fila_id=mssql_fetch_array($res_id)){
			$id=$fila_id['id'];
		}

		$nuevo_nombre= $id.'_'.utf8_decode($doc_adjunto);

		$sql_update ="UPDATE [seguimiento].[dbo].[ruta_documentos_informe] SET ruta_documento='".$nuevo_nombre."'
		WHERE id_ruta = '".$id."' ";

		mssql_query($sql_update,$link);
	}

	rename("../../investigacion/upload/archivos_subidos/$doc_adjunto", "../../investigacion/adjuntos/$nuevo_nombre");


	echo '[{"success":"true","mensaje":"Ingresado Correctamente"}]'; 

}


if($accion=='correo_creacion'){

	$id_informe = $_REQUEST['id_informe'];

  	$respuesta = correo_investigacion($id_informe,'CREADA','Existe una nueva investigación de accidentes ingresada, con ');
    echo $respuesta;

}





if($accion=='firmar_informe'){

	$id_informe = $_REQUEST['id_informe'];
	$firmador = $_REQUEST['firmador'];

	$tipo ='';

	if($firmador=='elaborador'){

		$sql_firma="UPDATE [seguimiento].[dbo].[informe]
			   SET [fecha_firma_elaborador] =getdate()
			 WHERE id_informe='$id_informe'";

			 	 $tipo ='REVISIÓN';

	}
	if($firmador=='revisor'){
		$sql_firma="UPDATE [seguimiento].[dbo].[informe]
			   SET [firma_revision] = '".$_SESSION['nick']."'
			       ,[cargo_revisor] = '".$_SESSION['cargo']."'
			      ,[fecha_firma_revision] = getdate()
			 WHERE id_informe='$id_informe'";

			  $tipo ='AUTORIZACIÓN';

	}
	if($firmador=='aprobador'){
		$sql_firma="UPDATE [seguimiento].[dbo].[informe]
			   SET [firma_autorizacion] = '".$_SESSION['nick']."'
			      ,[cargo_autorizador] = '".$_SESSION['cargo']."'
			      ,[fecha_firma_autorizacion] =getdate()
			 WHERE id_informe='$id_informe'";

	}


			 mssql_query($sql_firma, $link);


		  $respuesta = correo_investigacion($id_informe,$tipo,'La investigación de accidente');
    echo $respuesta;

}



if($accion=='busca_firmas_informe')
{
	$id_informe = $_REQUEST['id_informe'];

		$sql ="SELECT [nick_registro]
			      ,[firma_revision]
			      ,[cargo_revisor]
			      ,[firma_autorizacion]
			      ,[cargo_autorizador]
				 , FORMAT([fecha_firma_revision],'d', 'en-gb' ) as fecha_firma_revision
				 , FORMAT([fecha_firma_autorizacion],'d', 'en-gb' ) as fecha_firma_autorizacion
				 , FORMAT([fecha_firma_elaborador],'d', 'en-gb' ) as fecha_firma_elaborador
				  ,B.cargo_nombre
			  FROM [seguimiento].[dbo].[informe] AS A
			  INNER JOIN Seguridad.dbo.cargo AS B ON A.id_cargo_eleborador=B.cargo_codigo
			  WHERE id_informe='$id_informe'";

	  $respuesta = CreaJSon($sql,$link,1);
		echo '['.$respuesta.']';


}


if($accion=='eliminar_plan_de_accion'){

	$id_informe = $_REQUEST['id_informe'];
	$id_medida_preventiva = $_REQUEST['id_plan_de_accion'];

	 $sql_elimina="DELETE FROM [seguimiento].[dbo].[medida_preventivas]
     				 WHERE id_medida_preventiva='$id_medida_preventiva' and id_informe='$id_informe'";
			 mssql_query($sql_elimina, $link);


			 echo '[{"mensaje":"Eliminado correctamente"}]';

}



if($accion=='agregar_plan_de_accion'){

	$id_informe = $_REQUEST['id_informe'];
	$plan_accion = utf8_decode($_REQUEST['plan_accion']);
	$responsable_plan_accion = utf8_decode($_REQUEST['responsable_plan_accion']);
	$cargo_responsable_plan = utf8_decode($_REQUEST['cargo_responsable_plan']);
	$fecha_plazo = utf8_decode($_REQUEST['fecha_plazo']);
	$numero='1';


	 $sql ="SELECT  max([id_medida_preventiva])+1 as numero
 		FROM [seguimiento].[dbo].[medida_preventivas]";
 		$RES = mssql_query($sql, $link);
			if ($row=  mssql_fetch_array($RES))
			{	

				$numero=$row['numero']; 

			}

				if($numero=='0'){
					$numero=1;
				}


	 $sql_actualiza="INSERT INTO [seguimiento].[dbo].[medida_preventivas]
			           ([id_medida_preventiva]
			           ,[plan_de_accion]
			           ,[responsable_plan]
			           ,[cargo_responsable]
			           ,[fecha_plazo]
			           ,[id_informe])
			     VALUES
			           ('$numero'
			           ,'$plan_accion'
			           ,'$responsable_plan_accion'
			           ,'$cargo_responsable_plan'
			           ,'$fecha_plazo'
			           ,'$id_informe')";
			 mssql_query($sql_actualiza, $link);


			 echo '[{"mensaje":"insertado correctamente"}]';

}



if($accion=='listado_plan_de_accion')
{
	$id_informe = $_REQUEST['id_informe'];

		$sql ="SELECT [id_medida_preventiva]
			      ,[plan_de_accion]
			      ,[responsable_plan]
			      ,[cargo_responsable]
			      ,CAST([fecha_plazo] AS DATE) AS fecha_plazo
			      ,[id_informe]
			  FROM [seguimiento].[dbo].[medida_preventivas]
			  where [id_informe]='$id_informe'
			  ORDER BY [id_medida_preventiva]";

	  $respuesta = CreaJSon($sql,$link,1);
		echo '['.$respuesta.']';
		
}


if($accion=='eliminar_medida_de_control'){

	$id_informe = $_REQUEST['id_informe'];
	$id_medida_control = $_REQUEST['id_medida_control'];

	 $sql_elimina="DELETE FROM [seguimiento].[dbo].[medida_control]
     				 WHERE id_medida_control='$id_medida_control' and id_informe='$id_informe'";
			 mssql_query($sql_elimina, $link);


			 echo '[{"mensaje":"Eliminado correctamente"}]';

}




if($accion=='listado_medidas_de_control')
{
	$id_informe = $_REQUEST['id_informe'];

		$sql ="SELECT [id_medida_control]
			      ,[medida_control]
			      ,[responsable]
			      ,[id_informe]
			  FROM [seguimiento].[dbo].[medida_control]
			  where id_informe='$id_informe'
			  ORDER BY [id_medida_control]";

	  $respuesta = CreaJSon($sql,$link,1);
		echo '['.$respuesta.']';

		
}



if($accion=='agregar_medida_de_control'){

	$id_informe = $_REQUEST['id_informe'];
	$accion_inmediata_por_supervisor = utf8_decode($_REQUEST['accion_inmediata_por_supervisor']);
	$responsable_accion_inmediata = utf8_decode($_REQUEST['responsable_accion_inmediata']);
	$numero='1';


	 $sql ="SELECT  max([id_medida_control])+1 as numero
 		FROM [seguimiento].[dbo].[medida_control]";
 		$RES = mssql_query($sql, $link);
			if ($row=  mssql_fetch_array($RES))
			{	

				$numero=$row['numero']; 

			}

	if($numero=='0'){
					$numero=1;
				}


	 $sql_actualiza="INSERT INTO [seguimiento].[dbo].[medida_control]
		           ([id_medida_control]
		           ,[medida_control]
		           ,[responsable]
		           ,[id_informe])
		     VALUES
		           ('$numero'
		           ,'$accion_inmediata_por_supervisor'
		           ,'$responsable_accion_inmediata'
		           ,'$id_informe')";
			 mssql_query($sql_actualiza, $link);


			 echo '[{"mensaje":"insertado correctamente"}]';

}




if($accion=='actualiza_permiso'){

		$id_informe = $_REQUEST['id_informe'];
		//$relato = utf8_decode($_REQUEST['relato']);
		$relato=str_replace("\n","<br>",str_replace(array( "\r", "\n\r", "\t",'"',"'"), " ",utf8_decode($_REQUEST['relato'])));
		$parte_lesionada = utf8_decode($_REQUEST['parte_lesionada']);
		$elemento_provoca_lesion = utf8_decode($_REQUEST['elemento_provoca_lesion']);
		$fuente = utf8_decode($_REQUEST['fuente']);
		$lugar_del_accidente = utf8_decode($_REQUEST['lugar_del_accidente']);
		$check_equipo = utf8_decode($_REQUEST['check_equipo']);
		$check_material = utf8_decode($_REQUEST['check_material']);
		$check_ambiente = utf8_decode($_REQUEST['check_ambiente']);
		$check_personas = $_REQUEST['check_personas'];
		$check_otros = $_REQUEST['check_otros'];
		$check_rutinaria = $_REQUEST['check_rutinaria'];
		$check_planificada = $_REQUEST['check_planificada'];
		$check_no_planificada = $_REQUEST['check_no_planificada'];
		$fecha_accidente = $_REQUEST['fecha_accidente'];
		$hora_accidente = $_REQUEST['hora_accidente'];
		$especificacion_otros = utf8_decode($_REQUEST['especificacion_otros']);
		$equipo_involucrado = utf8_decode($_REQUEST['equipo_involucrado']);
		$actividad_que_realizaba = utf8_decode($_REQUEST['actividad_que_realizaba']);
		$id_tipo_accidente = $_REQUEST['tipo_accidente'];
		$tipo_de_accidente = utf8_decode($_REQUEST['tipo_de_accidente']);
		$tipo = utf8_decode($_REQUEST['tipo']);
		$check_1=$_REQUEST['check_1'];
		$check_2=$_REQUEST['check_2'];
		$check_3=$_REQUEST['check_3'];
		$check_4=$_REQUEST['check_4'];
		$check_5=$_REQUEST['check_5'];
		$check_6=$_REQUEST['check_6'];
		$check_7=$_REQUEST['check_7'];
		$check_8=$_REQUEST['check_8'];
		$check_9=$_REQUEST['check_9'];
		$check_10=$_REQUEST['check_10'];
		$check_11=$_REQUEST['check_11'];
		$check_12=$_REQUEST['check_12'];
		$check_13=$_REQUEST['check_13'];
		$check_14=$_REQUEST['check_14'];
		$check_15=$_REQUEST['check_15'];
		$check_16=$_REQUEST['check_16'];
		$check_17=$_REQUEST['check_17'];
		$check_18=$_REQUEST['check_18'];
		$check_19=$_REQUEST['check_19'];
		$check_20=$_REQUEST['check_20'];
		$check_21=$_REQUEST['check_21'];
		$check_22=$_REQUEST['check_22'];
		$check_23=$_REQUEST['check_23'];
		$check_24=$_REQUEST['check_24'];
		$check_25=$_REQUEST['check_25'];
		$check_26=$_REQUEST['check_26'];
		$check_27=$_REQUEST['check_27'];
		$check_28=$_REQUEST['check_28'];
		$check_29=$_REQUEST['check_29'];
		$check_30=$_REQUEST['check_30'];
		$check_31=$_REQUEST['check_31'];
		$check_32=$_REQUEST['check_32'];
		$check_33=$_REQUEST['check_33'];
		$check_34=$_REQUEST['check_34'];
		$check_35=$_REQUEST['check_35'];
		$check_36=$_REQUEST['check_36'];
		$check_37=$_REQUEST['check_37'];
		$check_38=$_REQUEST['check_38'];
		$check_39=$_REQUEST['check_39'];
		$check_40=$_REQUEST['check_40'];
		$check_41=$_REQUEST['check_41'];
		$check_42=$_REQUEST['check_42'];
		$check_43=$_REQUEST['check_43'];
		$check_44=$_REQUEST['check_44'];
		$check_45=$_REQUEST['check_45'];
		$check_46=$_REQUEST['check_46'];
		$check_47=$_REQUEST['check_47'];
		$check_48=$_REQUEST['check_48'];
		$check_49=$_REQUEST['check_49'];
		$check_50=$_REQUEST['check_50'];
		$check_51=$_REQUEST['check_51'];
		$check_52=$_REQUEST['check_52'];
		$check_53=$_REQUEST['check_53'];
		$check_54=$_REQUEST['check_54'];
		$check_55=$_REQUEST['check_55'];
		$check_56=$_REQUEST['check_56'];
		$check_57=$_REQUEST['check_57'];
		$check_58=$_REQUEST['check_58'];
		$check_59=$_REQUEST['check_59'];
		$check_60=$_REQUEST['check_60'];
		$check_61=$_REQUEST['check_61'];
		$check_62=$_REQUEST['check_62'];
		$check_63=$_REQUEST['check_63'];
		$check_64=$_REQUEST['check_64'];
		$check_65=$_REQUEST['check_65'];
		$check_66=$_REQUEST['check_66'];
		$check_67=$_REQUEST['check_67'];
		$check_68=$_REQUEST['check_68'];
		$check_69=$_REQUEST['check_69'];
		$check_70=$_REQUEST['check_70'];
		$check_71=$_REQUEST['check_71'];
		$check_72=$_REQUEST['check_72'];
		$check_73=$_REQUEST['check_73'];
		$check_74=$_REQUEST['check_74'];
		$check_75=$_REQUEST['check_75'];
		$check_76=$_REQUEST['check_76'];
		$check_77=$_REQUEST['check_77'];
		$check_78=$_REQUEST['check_78'];
		$check_79=$_REQUEST['check_79'];
		$check_80=$_REQUEST['check_80'];
		$check_81=$_REQUEST['check_81'];
		$check_82=$_REQUEST['check_82'];
		$check_83=$_REQUEST['check_83'];
		$check_84=$_REQUEST['check_84'];
		$check_85=$_REQUEST['check_85'];
		$check_86=$_REQUEST['check_86'];
		$check_87=$_REQUEST['check_87'];
		$check_88=$_REQUEST['check_88'];
		$check_89=$_REQUEST['check_89'];
		$check_90=$_REQUEST['check_90'];
		$check_91=$_REQUEST['check_91'];
		$check_92=$_REQUEST['check_92'];
		$check_93=$_REQUEST['check_93'];
		$check_94=$_REQUEST['check_94'];
		$check_95=$_REQUEST['check_95'];
		$check_96=$_REQUEST['check_96'];
		$check_97=$_REQUEST['check_97'];
		$check_98=$_REQUEST['check_98'];
		$check_99=$_REQUEST['check_99'];
		$check_100=$_REQUEST['check_100'];
		$check_101=$_REQUEST['check_101'];
		$check_102=$_REQUEST['check_102'];
		$check_103=$_REQUEST['check_103'];
		$check_104=$_REQUEST['check_104'];
		$check_105=$_REQUEST['check_105'];
		$check_106=$_REQUEST['check_106'];
		$check_107=$_REQUEST['check_107'];
		$check_108=$_REQUEST['check_108'];
		$check_109=$_REQUEST['check_109'];
		$check_110=$_REQUEST['check_110'];
		$check_111=$_REQUEST['check_111'];
		$check_112=$_REQUEST['check_112'];
		$check_113=$_REQUEST['check_113'];
		$check_114=$_REQUEST['check_114'];
		$check_115=$_REQUEST['check_115'];
		$check_116=$_REQUEST['check_116'];
		$check_117=$_REQUEST['check_117'];
		$check_118=$_REQUEST['check_118'];
		$check_119=$_REQUEST['check_119'];
		$check_120=$_REQUEST['check_120'];
		$check_121=$_REQUEST['check_121'];
		$check_122=$_REQUEST['check_122'];
		$check_123=$_REQUEST['check_123'];
		$check_124=$_REQUEST['check_124'];
		$check_125=$_REQUEST['check_125'];
		$check_126=$_REQUEST['check_126'];
		$check_127=$_REQUEST['check_127'];
		$check_128=$_REQUEST['check_128'];
		$check_129=$_REQUEST['check_129'];
		$check_130=$_REQUEST['check_130'];
		$check_131=$_REQUEST['check_131'];
		$check_132=$_REQUEST['check_132'];
		$check_133=$_REQUEST['check_133'];
		$check_134=$_REQUEST['check_134'];
		$check_135=$_REQUEST['check_135'];
		$check_136=$_REQUEST['check_136'];
		$check_137=$_REQUEST['check_137'];
		$check_138=$_REQUEST['check_138'];
		$check_139=$_REQUEST['check_139'];
		$check_140=$_REQUEST['check_140'];
		$check_141=$_REQUEST['check_141'];
		$check_142=$_REQUEST['check_142'];
		$check_143=$_REQUEST['check_143'];
		$check_144=$_REQUEST['check_144'];
		$check_145=$_REQUEST['check_145'];
		$check_146=$_REQUEST['check_146'];
		$check_147=$_REQUEST['check_147'];
		$check_148=$_REQUEST['check_148'];
		$check_149=$_REQUEST['check_149'];
		$check_150=$_REQUEST['check_150'];
		$check_151=$_REQUEST['check_151'];
		$check_152=$_REQUEST['check_152'];
		$check_153=$_REQUEST['check_153'];
		$check_154=$_REQUEST['check_154'];
		$check_155=$_REQUEST['check_155'];
		$check_156=$_REQUEST['check_156'];
		$check_157=$_REQUEST['check_157'];
		$check_158=$_REQUEST['check_158'];
		$check_159=$_REQUEST['check_159'];
		$check_160=$_REQUEST['check_160'];
		$check_161=$_REQUEST['check_161'];
		$check_167=$_REQUEST['check_167'];
		$check_168=$_REQUEST['check_168'];
		$check_169=$_REQUEST['check_169'];
		$check_170=$_REQUEST['check_170'];
		$check_171=$_REQUEST['check_171'];
		$check_172=$_REQUEST['check_172'];
		$check_173=$_REQUEST['check_173'];
		$check_174=$_REQUEST['check_174'];
		$check_175=$_REQUEST['check_175'];
		$check_176=$_REQUEST['check_176'];
		$check_177=$_REQUEST['check_177'];
		$check_178=$_REQUEST['check_178'];
		$check_179=$_REQUEST['check_179'];
		$check_180=$_REQUEST['check_180'];
		$check_181=$_REQUEST['check_181'];
		$check_182=$_REQUEST['check_182'];
		$check_183=$_REQUEST['check_183'];
		$check_184=$_REQUEST['check_184'];
		$check_185=$_REQUEST['check_185'];
		$check_186=$_REQUEST['check_186'];
		$check_187=$_REQUEST['check_187'];
		$check_188=$_REQUEST['check_188'];
		$check_189=$_REQUEST['check_189'];
		$check_190=$_REQUEST['check_190'];
		$check_191=$_REQUEST['check_191'];
		$check_192=$_REQUEST['check_192'];
		$check_193=$_REQUEST['check_193'];
		$check_194=$_REQUEST['check_194'];
		$check_195=$_REQUEST['check_195'];
		$check_196=$_REQUEST['check_196'];
		$check_197=$_REQUEST['check_197'];
		$check_198=$_REQUEST['check_198'];
		$check_199=$_REQUEST['check_199'];
		$check_200=$_REQUEST['check_200'];
		$check_201=$_REQUEST['check_201'];
		$check_202=$_REQUEST['check_202'];
		$check_203=$_REQUEST['check_203'];
		$check_204=$_REQUEST['check_204'];
		$check_205=$_REQUEST['check_205'];
		$check_206=$_REQUEST['check_206'];
		$check_207=$_REQUEST['check_207'];
		$check_208=$_REQUEST['check_208'];
		$check_209=$_REQUEST['check_209'];
		$check_210=$_REQUEST['check_210'];
		$check_211=$_REQUEST['check_211'];
		$check_212=$_REQUEST['check_212'];
		$check_213=$_REQUEST['check_213'];
		$check_214=$_REQUEST['check_214'];
		$check_215=$_REQUEST['check_215'];
		$check_216=$_REQUEST['check_216'];
		$check_217=$_REQUEST['check_217'];
		$check_218=$_REQUEST['check_218'];
		$check_219=$_REQUEST['check_219'];
		$check_220=$_REQUEST['check_220'];
		$check_221=$_REQUEST['check_221'];
		$check_222=$_REQUEST['check_222'];
		$check_223=$_REQUEST['check_223'];
		$check_224=$_REQUEST['check_224'];
		$check_225=$_REQUEST['check_225'];
		$check_226=$_REQUEST['check_226'];
		$check_227=$_REQUEST['check_227'];
		$check_228=$_REQUEST['check_228'];
		$check_229=$_REQUEST['check_229'];
		$check_230=$_REQUEST['check_230'];
		$check_231=$_REQUEST['check_231'];
		$check_232=$_REQUEST['check_232'];
		$check_233=$_REQUEST['check_233'];
		$check_234=$_REQUEST['check_234'];
		$check_235=$_REQUEST['check_235'];
		$check_236=$_REQUEST['check_236'];
		$check_237=$_REQUEST['check_237'];
		$check_238=$_REQUEST['check_238'];
		$check_239=$_REQUEST['check_239'];
		$check_240=$_REQUEST['check_240'];
		$check_241=$_REQUEST['check_241'];
		$check_242=$_REQUEST['check_242'];
		$check_243=$_REQUEST['check_243'];
		$check_244=$_REQUEST['check_244'];
		$check_245=$_REQUEST['check_245'];
		$check_246=$_REQUEST['check_246'];
		$check_247=$_REQUEST['check_247'];
		$check_248=$_REQUEST['check_248'];
		$check_249=$_REQUEST['check_249'];
		$check_250=$_REQUEST['check_250'];
		$check_251=$_REQUEST['check_251'];
		$check_252=$_REQUEST['check_252'];
		$check_253=$_REQUEST['check_253'];
		$check_254=$_REQUEST['check_254'];
		$check_255=$_REQUEST['check_255'];
		$check_256=$_REQUEST['check_256'];
		$check_257=$_REQUEST['check_257'];
		$check_258=$_REQUEST['check_258'];
		$check_259=$_REQUEST['check_259'];
		$check_260=$_REQUEST['check_260'];
		$check_261=$_REQUEST['check_261'];
		$check_262=$_REQUEST['check_262'];
		$check_263=$_REQUEST['check_263'];
		$check_264=$_REQUEST['check_264'];
		$check_265=$_REQUEST['check_265'];




			$sql ="SELECT [id_informe]
		      ,[fecha_firma_elaborador]
		  FROM [seguimiento].[dbo].[informe]
		  where id_informe='$id_informe' ";
 		$RES = mssql_query($sql, $link);
			if ($row=  mssql_fetch_array($RES))
			{	
				$fecha_firma_elaborador=$row['fecha_firma_elaborador']; 
				if($fecha_firma_elaborador==''){
					$sql_actualiza="UPDATE [seguimiento].[dbo].[informe]
					   SET [fecha_accidente] = '$fecha_accidente'
					      ,[hora_accidente] = '$hora_accidente'
					      ,[danio_equipo] = '$check_equipo'
					      ,[danio_material] = '$check_material'
					      ,[danio_ambiente] = '$check_ambiente'
					      ,[danio_personas] = '$check_personas'
					      ,[otros_danios] = '$check_otros'
					      ,[especifica_otros_danios] = '$especificacion_otros'
					      ,[especifica_otro_equipo] = '$equipo_involucrado'
					      ,[actividad_realizada] = '$actividad_que_realizaba'
					      ,[actividad_rutinaria] = '$check_rutinaria'
					      ,[actividad_planificada] = '$check_planificada'
					      ,[actividad_no_planificada] = '$check_no_planificada'
					      ,[relato_accidente] = '$relato'
					      ,[id_tipo_accidente] = '$id_tipo_accidente'
					      ,[tipo_accidente] = '$tipo_de_accidente'
					      ,[parte_cuerpo_lesiona] = '$parte_lesionada'
					      ,[elemento_provoca_lesion] = '$elemento_provoca_lesion'
					      ,[fuente] = '$fuente'
					      ,[lugar_exacto_accidente] = '$lugar_del_accidente'
					      ,[tipo] = '$tipo'
					      ,[check_1] = '$check_1'
						,[check_2] = '$check_2'
						,[check_3] = '$check_3'
						,[check_4] = '$check_4'
						,[check_5] = '$check_5'
						,[check_6] = '$check_6'
						,[check_7] = '$check_7'
						,[check_8] = '$check_8'
						,[check_9] = '$check_9'
						,[check_10] = '$check_10'
						,[check_11] = '$check_11'
						,[check_12] = '$check_12'
						,[check_13] = '$check_13'
						,[check_14] = '$check_14'
						,[check_15] = '$check_15'
						,[check_16] = '$check_16'
						,[check_17] = '$check_17'
						,[check_18] = '$check_18'
						,[check_19] = '$check_19'
						,[check_20] = '$check_20'
						,[check_21] = '$check_21'
						,[check_22] = '$check_22'
						,[check_23] = '$check_23'
						,[check_24] = '$check_24'
						,[check_25] = '$check_25'
						,[check_26] = '$check_26'
						,[check_27] = '$check_27'
						,[check_28] = '$check_28'
						,[check_29] = '$check_29'
						,[check_30] = '$check_30'
						,[check_31] = '$check_31'
						,[check_32] = '$check_32'
						,[check_33] = '$check_33'
						,[check_34] = '$check_34'
						,[check_35] = '$check_35'
						,[check_36] = '$check_36'
						,[check_37] = '$check_37'
						,[check_38] = '$check_38'
						,[check_39] = '$check_39'
						,[check_40] = '$check_40'
						,[check_41] = '$check_41'
						,[check_42] = '$check_42'
						,[check_43] = '$check_43'
						,[check_44] = '$check_44'
						,[check_45] = '$check_45'
						,[check_46] = '$check_46'
						,[check_47] = '$check_47'
						,[check_48] = '$check_48'
						,[check_49] = '$check_49'
						,[check_50] = '$check_50'
						,[check_51] = '$check_51'
						,[check_52] = '$check_52'
						,[check_53] = '$check_53'
						,[check_54] = '$check_54'
						,[check_55] = '$check_55'
						,[check_56] = '$check_56'
						,[check_57] = '$check_57'
						,[check_58] = '$check_58'
						,[check_59] = '$check_59'
						,[check_60] = '$check_60'
						,[check_61] = '$check_61'
						,[check_62] = '$check_62'
						,[check_63] = '$check_63'
						,[check_64] = '$check_64'
						,[check_65] = '$check_65'
						,[check_66] = '$check_66'
						,[check_67] = '$check_67'
						,[check_68] = '$check_68'
						,[check_69] = '$check_69'
						,[check_70] = '$check_70'
						,[check_71] = '$check_71'
						,[check_72] = '$check_72'
						,[check_73] = '$check_73'
						,[check_74] = '$check_74'
						,[check_75] = '$check_75'
						,[check_76] = '$check_76'
						,[check_77] = '$check_77'
						,[check_78] = '$check_78'
						,[check_79] = '$check_79'
						,[check_80] = '$check_80'
						,[check_81] = '$check_81'
						,[check_82] = '$check_82'
						,[check_83] = '$check_83'
						,[check_84] = '$check_84'
						,[check_85] = '$check_85'
						,[check_86] = '$check_86'
						,[check_87] = '$check_87'
						,[check_88] = '$check_88'
						,[check_89] = '$check_89'
						,[check_90] = '$check_90'
						,[check_91] = '$check_91'
						,[check_92] = '$check_92'
						,[check_93] = '$check_93'
						,[check_94] = '$check_94'
						,[check_95] = '$check_95'
						,[check_96] = '$check_96'
						,[check_97] = '$check_97'
						,[check_98] = '$check_98'
						,[check_99] = '$check_99'
						,[check_100] = '$check_100'
						,[check_101] = '$check_101'
						,[check_102] = '$check_102'
						,[check_103] = '$check_103'
						,[check_104] = '$check_104'
						,[check_105] = '$check_105'
						,[check_106] = '$check_106'
						,[check_107] = '$check_107'
						,[check_108] = '$check_108'
						,[check_109] = '$check_109'
						,[check_110] = '$check_110'
						,[check_111] = '$check_111'
						,[check_112] = '$check_112'
						,[check_113] = '$check_113'
						,[check_114] = '$check_114'
						,[check_115] = '$check_115'
						,[check_116] = '$check_116'
						,[check_117] = '$check_117'
						,[check_118] = '$check_118'
						,[check_119] = '$check_119'
						,[check_120] = '$check_120'
						,[check_121] = '$check_121'
						,[check_122] = '$check_122'
						,[check_123] = '$check_123'
						,[check_124] = '$check_124'
						,[check_125] = '$check_125'
						,[check_126] = '$check_126'
						,[check_127] = '$check_127'
						,[check_128] = '$check_128'
						,[check_129] = '$check_129'
						,[check_130] = '$check_130'
						,[check_131] = '$check_131'
						,[check_132] = '$check_132'
						,[check_133] = '$check_133'
						,[check_134] = '$check_134'
						,[check_135] = '$check_135'
						,[check_136] = '$check_136'
						,[check_137] = '$check_137'
						,[check_138] = '$check_138'
						,[check_139] = '$check_139'
						,[check_140] = '$check_140'
						,[check_141] = '$check_141'
						,[check_142] = '$check_142'
						,[check_143] = '$check_143'
						,[check_144] = '$check_144'
						,[check_145] = '$check_145'
						,[check_146] = '$check_146'
						,[check_147] = '$check_147'
						,[check_148] = '$check_148'
						,[check_149] = '$check_149'
						,[check_150] = '$check_150'
						,[check_151] = '$check_151'
						,[check_152] = '$check_152'
						,[check_153] = '$check_153'
						,[check_154] = '$check_154'
						,[check_155] = '$check_155'
						,[check_156] = '$check_156'
						,[check_157] = '$check_157'
						,[check_158] = '$check_158'
						,[check_159] = '$check_159'
						,[check_160] = '$check_160'
						,[check_161] = '$check_161'
						,[check_167] = '$check_167'
						,[check_168] = '$check_168'
						,[check_169] = '$check_169'
						,[check_170] = '$check_170'
						,[check_171] = '$check_171'
						,[check_172] = '$check_172'
						,[check_173] = '$check_173'
						,[check_174] = '$check_174'
						,[check_175] = '$check_175'
						,[check_176] = '$check_176'
						,[check_177] = '$check_177'
						,[check_178] = '$check_178'
						,[check_179] = '$check_179'
						,[check_180] = '$check_180'
						,[check_181] = '$check_181'
						,[check_182] = '$check_182'
						,[check_183] = '$check_183'
						,[check_184] = '$check_184'
						,[check_185] = '$check_185'
						,[check_186] = '$check_186'
						,[check_187] = '$check_187'
						,[check_188] = '$check_188'
						,[check_189] = '$check_189'
						,[check_190] = '$check_190'
						,[check_191] = '$check_191'
						,[check_192] = '$check_192'
						,[check_193] = '$check_193'
						,[check_194] = '$check_194'
						,[check_195] = '$check_195'
						,[check_196] = '$check_196'
						,[check_197] = '$check_197'
						,[check_198] = '$check_198'
						,[check_199] = '$check_199'
						,[check_200] = '$check_200'
						,[check_201] = '$check_201'
						,[check_202] = '$check_202'
						,[check_203] = '$check_203'
						,[check_204] = '$check_204'
						,[check_205] = '$check_205'
						,[check_206] = '$check_206'
						,[check_207] = '$check_207'
						,[check_208] = '$check_208'
						,[check_209] = '$check_209'
						,[check_210] = '$check_210'
						,[check_211] = '$check_211'
						,[check_212] = '$check_212'
						,[check_213] = '$check_213'
						,[check_214] = '$check_214'
						,[check_215] = '$check_215'
						,[check_216] = '$check_216'
						,[check_217] = '$check_217'
						,[check_218] = '$check_218'
						,[check_219] = '$check_219'
						,[check_220] = '$check_220'
						,[check_221] = '$check_221'
						,[check_222] = '$check_222'
						,[check_223] = '$check_223'
						,[check_224] = '$check_224'
						,[check_225] = '$check_225'
						,[check_226] = '$check_226'
						,[check_227] = '$check_227'
						,[check_228] = '$check_228'
						,[check_229] = '$check_229'
						,[check_230] = '$check_230'
						,[check_231] = '$check_231'
						,[check_232] = '$check_232'
						,[check_233] = '$check_233'
						,[check_234] = '$check_234'
						,[check_235] = '$check_235'
						,[check_236] = '$check_236'
						,[check_237] = '$check_237'
						,[check_238] = '$check_238'
						,[check_239] = '$check_239'
						,[check_240] = '$check_240'
						,[check_241] = '$check_241'
						,[check_242] = '$check_242'
						,[check_243] = '$check_243'
						,[check_244] = '$check_244'
						,[check_245] = '$check_245'
						,[check_246] = '$check_246'
						,[check_247] = '$check_247'
						,[check_248] = '$check_248'
						,[check_249] = '$check_249'
						,[check_250] = '$check_250'
						,[check_251] = '$check_251'
						,[check_252] = '$check_252'
						,[check_253] = '$check_253'
						,[check_254] = '$check_254'
						,[check_255] = '$check_255'
						,[check_256] = '$check_256'
						,[check_257] = '$check_257'
						,[check_258] = '$check_258'
						,[check_259] = '$check_259'
						,[check_260] = '$check_260'
						,[check_261] = '$check_261'
						,[check_262] = '$check_262'
						,[check_263] = '$check_263'
						,[check_264] = '$check_264'
						,[check_265] = '$check_265'

					 WHERE [id_informe]='$id_informe'";
					 mssql_query($sql_actualiza, $link);

				}else{
					echo '{"mensaje":"no se puede actualizar, esta firmado por el elaborador","success":"false"}';
				}

				

			}

}


if($accion=='confirma_nuevao_informe')
{

	$rut_usuario = $_REQUEST['rut_usuario'];
	$gerencia_accidentado = utf8_decode($_REQUEST['gerencia_accidentado']);
	$jefe_directo = utf8_decode($_REQUEST['jefe_directo']);
	$cargo_accidentado = utf8_decode($_REQUEST['cargo_accidentado']);
	$area_accidentado = utf8_decode($_REQUEST['area_accidentado']);
	$edad_accidentado = utf8_decode($_REQUEST['edad_accidentado']);
	$antiguadad_accidentado = utf8_decode($_REQUEST['antiguadad_accidentado']);
	$antiguedad_cargo = utf8_decode($_REQUEST['antiguedad_cargo']);
	$fecha_nacimiento = utf8_decode($_REQUEST['fecha_nacimiento']);
	$horas_trabajadas = utf8_decode($_REQUEST['horas_trabajadas']);
	$jornada = utf8_decode($_REQUEST['jornada']);

	$numero=0;
	$numero_doc='';
	$codigo_documento='';
	$numero_CODIGO='';



	
		 $sql ="SELECT  CASE WHEN (max([id_informe])+1) IS NULL THEN '1' ELSE max([id_informe])+1 END as numero
 					 FROM [seguimiento].[dbo].[informe]";
 		$RES = mssql_query($sql, $link);
			if ($row=  mssql_fetch_array($RES))
			{	

				$numero=$row['numero']; 

			}


		$sql2 ="SELECT  CASE WHEN (max([id_informe])+1) IS NULL THEN '1' ELSE max([id_informe])+1 END as numero
 					 FROM [seguimiento].[dbo].[informe]
					 WHERE YEAR(fecha_informe)=YEAR(GETDATE())";
 		$RES2 = mssql_query($sql2, $link);
			if ($row2=  mssql_fetch_array($RES2))
			{	

				$numero_CODIGO=$row2['numero']; 

			}

		$ceros='';
		$nuevo=0;

		$contar = strlen($numero);
		$cantidad= 6-$contar;
		while ($cantidad > 0){		
			$ceros=$ceros.$nuevo;
			$cantidad=$cantidad-1;
		}

		$numero_doc=$ceros.$numero;


	// CREA CODIGO POR ANIO*************
		$contar = strlen($numero_CODIGO);
		$ceros='';
		$nuevo=0;
		$cantidad= 4-$contar;
		while ($cantidad > 0){		
			$ceros=$ceros.$nuevo;
			$cantidad=$cantidad-1;
		}
		$codigo_documento='INF-IA-PREV-AD-'.date('y').$ceros.$numero_CODIGO;

	//*****************




	 $insert ="INSERT INTO [seguimiento].[dbo].[informe]
           ([id_informe]
           ,[numero_informe]
           ,[fecha_informe]
           ,[gerencia]
           ,[departamento]
           ,[rut_accidentado]
           ,[fecha_registro]
           ,[nick_registro]
           ,[vigente]
           ,[jefe_directo]
           ,[edad_accidentado]
           ,[antiguedad_accidentado]
           ,[antiguedad_en_cargo]
           ,[id_cargo_eleborador]
           ,[codigo_documento]
           ,[fecha_nacimiento]
           ,[horas_trabajadas]
           ,[jornada]
           ,[check_1],[check_2],[check_3],[check_4],[check_5],[check_6],[check_7],[check_8],[check_9],[check_10],[check_11],[check_12],[check_13],[check_14],[check_15],[check_16],[check_17],[check_18],[check_19],[check_20],[check_21],[check_22]
           ,[check_23],[check_24],[check_25],[check_26],[check_27],[check_28],[check_29],[check_30],[check_31],[check_32],[check_33],[check_34],[check_35],[check_36],[check_37],[check_38],[check_39],[check_40],[check_41],[check_42],[check_43]
           ,[check_44],[check_45],[check_46],[check_47],[check_48],[check_49],[check_50],[check_51],[check_52],[check_53],[check_54],[check_55],[check_56],[check_57],[check_58],[check_59],[check_60],[check_61],[check_62],[check_63],[check_64]
           ,[check_65],[check_66],[check_67],[check_68],[check_69],[check_70],[check_71],[check_72],[check_73],[check_74],[check_75],[check_76],[check_77],[check_78],[check_79],[check_80],[check_81],[check_82],[check_83],[check_84],[check_85]
           ,[check_86],[check_87],[check_88],[check_89],[check_90],[check_91],[check_92],[check_93],[check_94],[check_95],[check_96],[check_97],[check_98],[check_99],[check_100],[check_101],[check_102],[check_103],[check_104],[check_105]
           ,[check_106],[check_107],[check_108],[check_109],[check_110],[check_111],[check_112],[check_113],[check_114],[check_115],[check_116],[check_117],[check_118],[check_119],[check_120],[check_121],[check_122],[check_123],[check_124]
           ,[check_125],[check_126],[check_127],[check_128],[check_129],[check_130],[check_131],[check_132],[check_133],[check_134],[check_135],[check_136],[check_137],[check_138],[check_139],[check_140],[check_141],[check_142],[check_143]
           ,[check_144],[check_145],[check_146],[check_147],[check_148],[check_149],[check_150],[check_151],[check_152],[check_153],[check_154],[check_155],[check_156],[check_157],[check_158],[check_159],[check_160],[check_161],
           ,[check_167],[check_168],[check_169],[check_170],[check_171],[check_172],[check_173],[check_174],[check_175],[check_176],[check_177],[check_178],[check_179],[check_180],[check_181]
           ,[check_182],[check_183],[check_184],[check_185],[check_186],[check_187],[check_188],[check_189],[check_190],[check_191],[check_192],[check_193],[check_194],[check_195],[check_196],[check_197],[check_198],[check_199],[check_200]
           ,[check_201],[check_202],[check_203],[check_204],[check_205],[check_206],[check_207],[check_208],[check_209],[check_210],[check_211],[check_212],[check_213],[check_214],[check_215],[check_216],[check_217],[check_218],[check_219]
           ,[check_220],[check_221],[check_222],[check_223],[check_224],[check_225],[check_226],[check_227],[check_228],[check_229],[check_230],[check_231],[check_232],[check_233],[check_234],[check_235],[check_236],[check_237],[check_238]
           ,[check_239],[check_240],[check_241],[check_242],[check_243],[check_244],[check_245],[check_246],[check_247],[check_248],[check_249],[check_250],[check_251],[check_252],[check_253],[check_254],[check_255],[check_256],[check_257]
           ,[check_258],[check_259],[check_260],[check_261],[check_262],[check_263],[check_264],[check_265])
     VALUES
           ('".$numero."'
           ,'".$numero_doc."'
           ,getdate()
           ,'".$gerencia_accidentado."'
           ,'".$area_accidentado."'
           ,'".$rut_usuario."'
           ,getdate()
           ,'".$_SESSION['nick']."'
           ,'SI'
           ,'".$jefe_directo."'
       	,'".$edad_accidentado."'
   		,'".$antiguadad_accidentado."'
		,'".$antiguedad_cargo."'
		,'".$_SESSION['cod_cargo']."'
		,'".$codigo_documento."'
		,'".$fecha_nacimiento."'
		,'".$horas_trabajadas."'
		,'".$jornada."'
		,'false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false'
		,'false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false'
		,'false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false'
		,'false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false'
		,'false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false'
		,'false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false'
		,'false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false'
		,'false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false'
		,'false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false'
		,'false','false','false','false')";
				
			mssql_query($insert, $link);
			
			echo '{"mensaje":"insertado correctamente","id_informe":"'.$numero.'","numero":"'.$numero_doc.'"}';


}


if($accion=='consulta_informe'){


	$id_informe = $_REQUEST['id_informe'];

    		  $sql = "SELECT [id_informe]
		      ,[numero_informe]
		      ,FORMAT([fecha_informe],'d', 'en-gb' ) as fecha_informe
			,cast([fecha_accidente] as date) as fecha_accidente
		      ,[hora_accidente]
		      ,REPLACE([gerencia],'GERENTE DE','') AS gerencia
		      ,[departamento]
		      ,[id_departamento]
		      ,[rut_accidentado]
		      ,[edad_accidentado]
		      ,[antiguedad_accidentado]
		      ,[antiguedad_en_cargo]
			,FORMAT([fecha_registro],'d', 'en-gb' ) as fecha_registro
		      ,[nick_registro]
		      ,[vigente]
		      ,[jefe_directo]
		      ,CONVERT(varchar(12),B.fecha_nacimiento,105) as fecha_nacimiento
	           ,[horas_trabajadas]
	           ,[jornada]
	           ,REPLACE([tipo],'_',' ') AS tipo
			  ,(rtrim(B.user_nombre)+' '+B.user_paterno+' '+B.user_materno) AS nombre
			   ,C.cargo_nombre
			   ,D.area_nombre
			   ,CASE WHEN A.accidente_con_danio IS NULL THEN 'false' ELSE A.accidente_con_danio END AS accidente_con_danio
			   ,CASE WHEN A.danio_equipo IS NULL THEN 'false' ELSE A.danio_equipo END AS danio_equipo
			   ,CASE WHEN A.danio_material IS NULL THEN 'false' ELSE A.danio_material END AS danio_material
			   ,CASE WHEN A.danio_ambiente IS NULL THEN 'false' ELSE A.danio_ambiente END AS danio_ambiente
			   ,CASE WHEN A.danio_personas IS NULL THEN 'false' ELSE A.danio_personas END AS danio_personas
			   ,CASE WHEN A.otros_danios IS NULL THEN 'false' ELSE A.otros_danios END AS otros_danios
			   ,CASE WHEN A.actividad_rutinaria IS NULL THEN 'false' ELSE A.actividad_rutinaria END AS actividad_rutinaria
			   ,CASE WHEN A.actividad_planificada IS NULL THEN 'false' ELSE A.actividad_planificada END AS actividad_planificada
			   ,CASE WHEN A.actividad_no_planificada IS NULL THEN 'false' ELSE A.actividad_no_planificada END AS actividad_no_planificada
			   ,A.relato_accidente
			   ,A.especifica_otros_danios
			   ,A.especifica_otro_equipo
			   ,A.actividad_realizada
			   ,A.parte_cuerpo_lesiona
			   ,A.elemento_provoca_lesion
			   ,A.fuente
			   ,A.lugar_exacto_accidente
			   ,A.tipo_accidente
			   ,A.id_tipo_accidente
			   ,A.codigo_documento
			   ,A.fecha_firma_autorizacion
			   ,A.check_1 ,A.check_2 ,A.check_3 ,A.check_4 ,A.check_5 ,A.check_6 ,A.check_7 ,A.check_8 ,A.check_9 ,A.check_10 ,A.check_11 ,A.check_12 ,A.check_13 ,A.check_14 ,A.check_15 ,A.check_16 ,A.check_17 ,A.check_18 ,A.check_19 ,
			   A.check_20 ,A.check_21 ,A.check_22 ,A.check_23 ,A.check_24 ,A.check_25 ,A.check_26 ,A.check_27 ,A.check_28 ,A.check_29 ,A.check_30 ,A.check_31 ,A.check_32 ,A.check_33 ,A.check_34 ,A.check_35 ,A.check_36 ,A.check_37 ,
			   A.check_38 ,A.check_39 ,A.check_40 ,A.check_41 ,A.check_42 ,A.check_43 ,A.check_44 ,A.check_45 ,A.check_46 ,A.check_47 ,A.check_48 ,A.check_49 ,A.check_50 ,A.check_51 ,A.check_52 ,A.check_53 ,A.check_54 ,A.check_55 ,
			   A.check_56 ,A.check_57 ,A.check_58 ,A.check_59 ,A.check_60 ,A.check_61 ,A.check_62 ,A.check_63 ,A.check_64 ,A.check_65 ,A.check_66 ,A.check_67 ,A.check_68 ,A.check_69 ,A.check_70 ,A.check_71 ,A.check_72 ,A.check_73 ,
			   A.check_74 ,A.check_75 ,A.check_76 ,A.check_77 ,A.check_78 ,A.check_79 ,A.check_80 ,A.check_81 ,A.check_82 ,A.check_83 ,A.check_84 ,A.check_85 ,A.check_86 ,A.check_87 ,A.check_88 ,A.check_89 ,A.check_90 ,A.check_91 ,
			   A.check_92 ,A.check_93 ,A.check_94 ,A.check_95 ,A.check_96 ,A.check_97 ,A.check_98 ,A.check_99 ,A.check_100 ,A.check_101 ,A.check_102 ,A.check_103 ,A.check_104 ,A.check_105 ,A.check_106 ,A.check_107 ,A.check_108 ,
			   A.check_109 ,A.check_110 ,A.check_111 ,A.check_112 ,A.check_113 ,A.check_114 ,A.check_115 ,A.check_116 ,A.check_117 ,A.check_118 ,A.check_119 ,A.check_120 ,A.check_121 ,A.check_122 ,A.check_123 ,A.check_124 ,A.check_125 ,
			   A.check_126 ,A.check_127 ,A.check_128 ,A.check_129 ,A.check_130 ,A.check_131 ,A.check_132 ,A.check_133 ,A.check_134 ,A.check_135 ,A.check_136 ,A.check_137 ,A.check_138 ,A.check_139 ,A.check_140 ,A.check_141 ,A.check_142 ,
			   A.check_143 ,A.check_144 ,A.check_145 ,A.check_146 ,A.check_147 ,A.check_148 ,A.check_149 ,A.check_150 ,A.check_151 ,A.check_152 ,A.check_153 ,A.check_154 ,A.check_155 ,A.check_156 ,A.check_157 ,A.check_158 ,A.check_159 ,
			   A.check_160 ,A.check_161 ,A.check_167 ,A.check_168 ,A.check_169 ,A.check_170 ,A.check_171 ,A.check_172 ,A.check_173 ,A.check_174 ,A.check_175 ,A.check_176 ,
			   A.check_177 ,A.check_178 ,A.check_179 ,A.check_180 ,A.check_181 ,A.check_182 ,A.check_183 ,A.check_184 ,A.check_185 ,A.check_186 ,A.check_187 ,A.check_188 ,A.check_189 ,A.check_190 ,A.check_191 ,A.check_192 ,A.check_193 ,
			   A.check_194 ,A.check_195 ,A.check_196 ,A.check_197 ,A.check_198 ,A.check_199 ,A.check_200 ,A.check_201 ,A.check_202 ,A.check_203 ,A.check_204 ,A.check_205 ,A.check_206 ,A.check_207 ,A.check_208 ,A.check_209 ,A.check_210 ,
			   A.check_211 ,A.check_212 ,A.check_213 ,A.check_214 ,A.check_215 ,A.check_216 ,A.check_217 ,A.check_218 ,A.check_219 ,A.check_220 ,A.check_221 ,A.check_222 ,A.check_223 ,A.check_224 ,A.check_225 ,A.check_226 ,A.check_227 ,
			   A.check_228 ,A.check_229 ,A.check_230 ,A.check_231 ,A.check_232 ,A.check_233 ,A.check_234 ,A.check_235 ,A.check_236 ,A.check_237 ,A.check_238 ,A.check_239 ,A.check_240 ,A.check_241 ,A.check_242 ,A.check_243 ,A.check_244 ,
			   A.check_245 ,A.check_246 ,A.check_247 ,A.check_248 ,A.check_249 ,A.check_250 ,A.check_251 ,A.check_252 ,A.check_253 ,A.check_254 ,A.check_255 ,A.check_256 ,A.check_257 ,A.check_258 ,A.check_259 ,A.check_260 ,A.check_261 ,
			   A.check_262 ,A.check_263 ,A.check_264 ,A.check_265 
		  FROM [seguimiento].[dbo].[informe] AS A
		  INNER JOIN Seguridad.dbo.usuario AS B ON A.rut_accidentado=B.user_rut
		  inner join Seguridad.dbo.cargo as C on B.cargo_codigo=C.cargo_codigo
		  INNER JOIN Seguridad.dbo.areas AS D ON D.area_codigo=C.area_codigo
		  where A.vigente='SI' AND A.id_informe='".$id_informe."'";

		$respuesta = CreaJSon($sql,$link,1);
		$arreglo='{"data":['.$respuesta.']}';

		echo $arreglo; 
   			
}


if($accion=='carga_tipo_accidentes')
{

		 $sql ="SELECT [id_tipo_accidente]
		      ,[tipo_accidente]
		  FROM [seguimiento].[dbo].[tipo_accidente]
		  where [vigente]='SI'
		  ORDER BY [tipo_accidente]";

	  $respuesta = CreaJSon($sql,$link,1);
	  $arreglo='{"data":['.$respuesta.']}';
	echo $arreglo; 

}




if($accion=='carga_datos_personales')
{

	$rut = $_REQUEST['rut'];
	
		 $sql ="SELECT B.user_rut
		      ,B.cargo_codigo
		      ,B.user_nombre
		      ,B.user_contrasena
		      ,B.user_vigente
		      ,B.user_nick
		      ,B.user_materno
		      ,B.user_paterno
		      ,B.user_correo
		      ,FORMAT ( B.fecha_nacimiento, 'd', 'en-gb' ) AS fecha_nacimiento
			  ,C.cargo_nombre
			  ,D.area_nombre
			  ,D.nombre_area_padre
			  ,C.nivel2
			  ,E.cargo_nombre as gerencia
			  ,REPLACE(F.user_nick,'_',' ') AS jefe_directo
		  FROM [Seguridad].[dbo].[usuario] AS B
		  inner join Seguridad.dbo.cargo AS C ON B.cargo_codigo=C.cargo_codigo
		  INNER JOIN Seguridad.dbo.areas AS D ON D.area_codigo=C.area_codigo
		  LEFT JOIN Seguridad.dbo.cargo AS E ON C.nivel2=E.cargo_codigo
		  LEFT JOIN Seguridad.dbo.cargo AS G ON C.nivel4=G.cargo_codigo
		  LEFT JOIN [Seguridad].[dbo].[usuario] AS F ON G.cargo_codigo=F.cargo_codigo AND F.user_vigente='S'
		  WHERE B.user_rut='$rut'";

	  $respuesta = CreaJSon($sql,$link,1);
		$arreglo='{"data":['.$respuesta.']}';

		echo $arreglo; 

}



if($accion=='buscar_nombre')
{
	
		$sql =  "SELECT B.user_codigo, B.user_rut, (rtrim(B.user_nombre)+' '+B.user_paterno+' '+B.user_materno)as nombre, 
						B.user_nombre, B.user_paterno, B.user_materno, B.user_nick,B.user_contrasena, B.cargo_codigo, 
						CASE B.user_vigente WHEN 'S' THEN 'SI' ELSE 'NO' END user_vigente,
						B.user_correo, A.cargo_nombre, C.area_nombre
				 FROM [Seguridad].[dbo].[usuario] as B
				 inner join Seguridad.dbo.cargo as A on B.cargo_codigo=a.cargo_codigo
				 INNER JOIN Seguridad.dbo.areas AS C ON A.area_codigo=C.area_codigo
				 WHERE B.user_vigente='S' AND B.id_empresa='1'
		union 
			     SELECT B.user_codigo, B.user_rut, (rtrim(B.user_nombre)+' '+B.user_paterno+' '+B.user_materno)as nombre, 
					    B.user_nombre, B.user_paterno, B.user_materno, B.user_nick,B.user_contrasena, B.cargo_codigo, 
					    CASE B.user_vigente WHEN 'S' THEN 'SI' ELSE 'NO' END user_vigente,
					    B.user_correo, A.cargo_nombre, C.area_nombre
				 FROM [Seguridad].[dbo].[usuario] as B
				 inner join Seguridad.dbo.cargo as A on B.cargo_codigo=a.cargo_codigo
				 INNER JOIN Seguridad.dbo.areas AS C ON A.area_codigo=C.area_codigo
			     WHERE b.user_codigo='5265'
		order by nombre";

	  $respuesta = CreaJSon($sql,$link,1);
		$arreglo='{"data":['.$respuesta.']}';

		echo $arreglo; 

}


if($accion=='todas_las_investigaciones'){

	    $sql = "SELECT [id_informe]
				      ,[numero_informe]
				      ,FORMAT([fecha_informe],'d', 'en-gb' ) as fecha_informe
					 ,FORMAT([fecha_accidente],'d', 'en-gb' ) as fecha_accidente
				      ,[hora_accidente]
				      ,[gerencia]
				      ,[departamento]
				      ,[id_departamento]
				      ,[rut_accidentado]
				      ,[edad_accidentado]
				      ,[antiguedad_accidentado]
				      ,[antiguedad_en_cargo]
					 ,FORMAT([fecha_registro],'d', 'en-gb' ) as fecha_registro
				      ,REPLACE([nick_registro],'_',' ') AS nick_registro
				      ,[vigente]
					  ,(rtrim(B.user_nombre)+' '+B.user_paterno+' '+B.user_materno) AS nombre,
					   C.cargo_nombre, D.area_nombre, 
					   A.fecha_firma_autorizacion, 
					   A.fecha_firma_elaborador, 
					   A.fecha_firma_revision
			  FROM [seguimiento].[dbo].[informe] AS A
			  INNER JOIN Seguridad.dbo.usuario AS B ON A.rut_accidentado=B.user_rut
			  inner join Seguridad.dbo.cargo as C on B.cargo_codigo=C.cargo_codigo
			  INNER JOIN Seguridad.dbo.areas AS D ON D.area_codigo=C.area_codigo
			  where A.vigente='SI'
			  ORDER BY [id_informe] DESC";

		$respuesta = CreaJSon($sql,$link,1);
		$arreglo='{"data":['.$respuesta.']}';

		echo $arreglo; 
   			
}




?>