

<HEAD>

		   
<div class="panel panel-info">
 
    <div class="panel box-shadow-none content-header margin-topbar">
        <div class="form-group col-xs-12 col-lg-12" style="background-color: #39b3d7; border: 1px solid; border-color:#269abc; padding: 10px 3px 10px 5px; line-height: 15px; top:-15px;">
            <!--colocar al estilo-->
            <b><font size=3 color="white"><center>OTRO</center></font></b>
        </div>
    </div>
</div>                             

</HEAD>

<body>

    <!-- nueva tabla -->
        <div class="container">
            <div class="row">
                <div class="col-md-11">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">Nueva Tabla de Información</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="select_area"><h4>Trabajadores</h4></label>
                                <select class="form-control" id="select_area" name="select_area" onchange="setea_area()" required>
                                    <option value="">Seleccione un área</option>
                                </select>
                            </div>
                            <table class="table table-bordered table-striped" style="border:2px solid #269abc;">
                                <thead>
                                    <tr>
                                        <th style="border:2px solid #269abc;">Nombre</th>
                                        <th style="border:2px solid #269abc;">RUT</th>
                                        <th style="border:2px solid #269abc;">Cargo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="border:2px solid #269abc;">Dato 1</td>
                                        <td style="border:2px solid #269abc;">Dato 2</td>
                                        <td style="border:2px solid #269abc;">Dato 3</td>                                      
                                    </tr>
                                    <tr>
                                        <td style="border:2px solid #269abc;">Dato 1</td>
                                        <td style="border:2px solid #269abc;">Dato 2</td>
                                        <td style="border:2px solid #269abc;">Dato 3</td>
                                    </tr>
                                    <tr>
                                        <td style="border:2px solid #269abc;">Dato 1</td>
                                        <td style="border:2px solid #269abc;">Dato 2</td>
                                        <td style="border:2px solid #269abc;">Dato 3</td>                                      
                                    </tr>
                                    <tr>
                                        <td style="border:2px solid #269abc;">Dato 1</td>
                                        <td style="border:2px solid #269abc;">Dato 2</td>
                                        <td style="border:2px solid #269abc;">Dato 3</td>                                      
                                    </tr>
                                    <tr>
                                        <td style="border:2px solid #269abc;">Dato 1</td>
                                        <td style="border:2px solid #269abc;">Dato 2</td>
                                        <td style="border:2px solid #269abc;">Dato 3</td>                                      
                                    </tr>
                                    <tr>
                                        <td style="border:2px solid #269abc;">Dato 1</td>
                                        <td style="border:2px solid #269abc;">Dato 2</td>
                                        <td style="border:2px solid #269abc;">Dato 3</td>                                      
                                    </tr>
                                    <tr>
                                        <td style="border:2px solid #269abc;">Dato 1</td>
                                        <td style="border:2px solid #269abc;">Dato 2</td>
                                        <td style="border:2px solid #269abc;">Dato 3</td>                                      
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    

    <div id="trabajador" class="container">
        <div class="row">
            <div class="col-md-11">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Registrar Accidente Laboral</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="formulario_accidentado" enctype="multipart/form-data">
                            <!-- Información del trabajador -->                         
                            <div class="row">
	                            <div class="form-group col-xs-8 col-lg-8">
	                                <label >Nombre Accidentado</label>
		                            <select class="form-control" name="seleccion_usuario"  id="seleccion_usuario" onchange="setea_rut()" required="required">
		                            <option value="">seleccione accidentado</option>
		                            </select>
	                            </div>
	                        <div class="form-group col-xs-4 col-lg-4">
	                            <label >Rut Accidentado</label>
		                        <input class="form-control" name="rut_usuario"  id="rut_usuario" required="required" readonly>
                            </div>
	                        <div class="form-group col-xs-8 col-lg-8">
	                            <label >Cargo</label>
		                        <input class="form-control" name="cargo_accidentado"  id="cargo_accidentado" required="required" readonly>
                            </div>
	                        <div class="form-group col-xs-4 col-lg-4">
	                            <label >Area</label>
    	                        <input class="form-control" name="area_accidentado"  id="area_accidentado" required="required" readonly>
	                        </div>
	                        <div class="form-group col-xs-8 col-lg-8">
	                            <label >Gerencia</label>
		                        <input class="form-control" name="gerencia_accidentado"  id="gerencia_accidentado" required="required" readonly>
	                        </div>
	                        <div class="form-group col-xs-4 col-lg-4">
	                            <label >Jefe Directo</label>
		                        <input class="form-control" name="jefe_directo"  id="jefe_directo" required="required" readonly>
                            </div>
                            <div class="form-group col-xs-2 col-lg-2">
		                        <label >FECHA DE NAC.</label>
		                        <input type="text" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" required="required" onchange="calcularEdad()" placeholder="Ej: 15/05/1990">
	                        </div>
	                        <div class="form-group col-xs-2 col-lg-2">
		                        <label >EDAD</label>
		                        <input type="text" class="form-control" name="edad_accidentado" id="edad_accidentado" required="required">
	                        </div>
	                        <div class="form-group col-xs-4 col-lg-4">
		                        <label >ANTIGUEDAD EMPRESA</label>
		                        <input type="text" class="form-control" name="antiguadad_accidentado" id="antiguadad_accidentado" required="required">
	                        </div>
	                        <div class="form-group col-xs-4 col-lg-4">
		                        <label >ANTIGUEDAD CARGO</label>
		                        <input type="text" class="form-control" name="antiguedad_cargo" id="antiguedad_cargo" required="required">
	                        </div>
	                        <div class="form-group col-xs-4 col-lg-4">
		                        <label >Cant. horas trabajadas</label>
		                        <input type="text" class="form-control" name="horas_trabajadas" id="horas_trabajadas" required="required">
	                        </div>
	                        <div class="form-group col-xs-4 col-lg-4">
		                        <label >Jornada</label>
		                        <input type="text" class="form-control" name="jornada" id="jornada" required="required">
	                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <!--formulario 2 accidente -->
    <div id="accidente" class="container">
        <!--panel para registrar accidente -->
        <div class="row">
            <div class="col-md-11">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Detalles del Accidente</h3>
                    </div>
                <div class="panel-body">
                    <form method="POST" action="formulario_accidente" enctype="multipart/form-data">
                        <div class="row">
                            <!-- Fecha del accidente -->
                            <div class="form-group col-xs-2 col-lg-2">
                                <label for="fecha_accidente">Fecha del Accidente:</label>
                               <input type="date" name="fecha_accidente" id="fecha_accidente" class="form-control" required> 
                            </div>
                            <!-- Hora del accidente -->     
                            <div class="form-group col-xs-4 col-lg-2">
                                <label for="hora_accidente">Hora del Accidente:</label>
                                <input type="time" name="hora_accidente" id="hora_accidente" class="form-control" required>
                            </div>
                            <!-- Lugar del accidente -->
                            <div class="form-group col-xs-2 col-lg-4">
                                <label for="lugar_accidente">Lugar del Accidente:</label>
                                <input type="text" name="lugar_accidente" id="lugar_accidente" class="form-control" required> 
                            </div>
                            <!-- Tipo de accidente -->
                            <div class="form-group col-xs-4 col-lg-4">
                                <label for="tipo_accidente">Tipo de Accidente:</label>
                                <div class="radio">
                                    <label><input type="radio" name="tipo_accidente" value="Leve" required> Leve</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="tipo_accidente" value="Grave"> Grave</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="tipo_accidente" value="Fatal"> Fatal</label>
                                </div>
                            </div>                    
                            <!-- Descripción del accidente -->
                            <div class="form-group col-md-12">
                                <label for="descripcion">Descripción del Accidente:</label>
                                <textarea name="descripcion" id="descripcion" class="form-control" rows="4" required></textarea>    
                            </div>
                        </div>
                        <div class="row">
                            <!-- Testigos del accidente-->
                            <div class="form-group col-md-8">
			                    <label>Testigo del accidente</leable>
			                    <select class="form-control" name="seleccionar_usuario_patricio" id="seleccionar_usuario_patricio" onchange="setea_rut_patricio()"required="required">
			                        <option value="">seleccionar testigo</option>
			                    </select>
	                        </div>
                            <!-- cargo testigo -->
                            <div class="form-group col-xs-8 col-lg-8">
	                            <label >Cargo</label>
		                        <input type="text" class="form-control" name="cargo_testigo"  id="cargo_testigo" required="required" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Causa del accidente -->      
                            <div class="form-group col-md-6">
                                <label for="causa_accidente">Causa del Accidente:</label>
                                <textarea name="causa_accidente" id="causa_accidente" class="form-control" rows="4" required></textarea> 
                            </div>
                            <!-- Consecuencias del accidente -->
                            <div class="form-group col-md-6">
                                <label for="consecuencias">Consecuencias del Accidente:</label>
                                <textarea name="consecuencias" id="consecuencias" class="form-control" rows="4" required></textarea>  
                            </div>
                        </div>
                        <!-- Medidas correctivas debajo -->
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="medidas_correctivas">Medidas Correctivas:</label>
                                <textarea name="medidas_correctivas" id="medidas_correctivas" class="form-control" rows="4" required></textarea>  
                            </div>
                        </div>
                        <!-- Fecha de la investigación -->
                        <div class="form-group col-xs-2 col-lg-2">
                            <label for="fecha_investigacion">Fecha de la Investigación:</label>
                            <input type="date" name="fecha_investigacion" id="fecha_investigacion" class="form-control" required>   
                        </div>
                        <div class="row">
                            <!-- Encargado de la investigación -->
		                    <div class="form-group col-md-6">
			                    <label>Encargado de la investigacion</leable>
			                    <select class="form-control" name="seleccionar_usuario" id="encargado_investigacion" onchange="setea_rut_patricio()"required="required">
			                        <option value="">seleccionar encargado</option>
			                    </select>
	                        </div>
                            <!-- Cargo del encargado -->
                            <div class="form-group col-md-6">
                                <label for="cargo_encargado">Cargo del Encargado:</label>
                                <input type="text" name="cargo_encargado" id="cargo_encargado" class="form-control" required>   
                            </div>
                        </div>
                        <!-- Evidencia del accidente -->
                        <div class="form-group">
                            <label for="evidencia">Evidencia (fotos, documentos):</label>
                            <input type="file" name="evidencia[]" id="evidencia" class="form-control" multiple>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Guardar</button> 
                        </div>
                    </form>
                </div>
            </div>  
        </div>
    </div>

    <div class="row">
            <div class="col-xs-12 col-lg-12">
                <table id="tabla_investigaciones" class="display nowrap" width="100%">
                    <thead>
                        <tr>
						    <th>Nro Informe</th>
						    <th></th>
						    <th>Estado</th>
						    <th>Fecha Informe</th>
                            <th>Accidentado</th>
                            <th>Rut</th>
							<th>Cargo</th>
							<th>Area</th>
							<th>Registrado por</th>
     
                        </tr>
                    </thead>
                </table>
            </div>
    </div>



    <div id="ventana_informe" class="modal fade">
    <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <center><h4 class="modal-title">INFORME DE INVESTIGACION DE ACCIDENTE</h4></center>
				<strong id="numero_informe"></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<strong id="codigo_informe">CODIGO:</strong>

         		<input type="hidden" id="id_informe">
      </div>
      <div class="modal-body"> 
			<div class="row">
				<div class="form-group col-xs-6 col-lg-6">
	                <strong >ACCIDENTADO : </strong><label id="nombre_accidentado"></label><br>
	                <strong >RUT : </strong><label id="rut_accidentado"></label><br>
	                <strong >EDAD : </strong><label id="edad_accidentado_acc"></label><br>	
	                <strong >FECHA DE NAC. : </strong><label id="fecha_nacimiento_acc"></label><br>					
	                <strong >CARGO : </strong><label id="cargo_accidentado_label"></label><br>			
	                <strong >AREA : </strong><label id="area_accidentado_label"></label>	<br>

				</div>
				<div class="form-group col-xs-6 col-lg-6">	
					<strong >ANTIGUEDAD EMPRESA : </strong><label id="antiguedad_empresa_acc"></label><br>
					<strong >ANTIGUEDAD CARGO : </strong><label id="antiguedad_cargo_acc"></label><br>
					<strong >HORAS TRABAJADAS : </strong><label id="horas_trabajadas_acc"></label><br>
					<strong >JORNADA : </strong><label id="jornada_acc"></label><br>
	                <strong >GERENCIA : </strong><label id="gerencia_accidentado_label"></label><br>
	                <strong >JEFE DIRECTO : </strong><label id="jefe_directo_accidentado_label"></label><br>
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

	                 <button type="button" class="btn btn-success glyphicon glyphicon-print"  title="Exportar PDF" onclick="exportar_pdf()"></button>
				</div>
				
			</div>
			<div class="row">
					<ul class="nav nav-tabs">
					  <li class="active"><a class="a" data-toggle="tab" href="#tab_descipcion">DESCRIPCIÓN</a></li>
					  <li ><a data-toggle="tab" class="a" href="#relato_accidente">RELATO</a></li>
					  <li ><a data-toggle="tab" class="a" href="#medidas_control">MED DE CONTROL</a></li>
					  <li ><a data-toggle="tab" class="a" href="#analisis_causal">ANALISIS CAUSAL</a></li>
					  <li ><a data-toggle="tab" class="a" onclick="carga_fecha()" href="#medidas_preventivas">MED PREVENTIVAS</a></li>
					  <li ><a data-toggle="tab" class="a" href="#documentos_anexos">ADJUNTOS</a></li>
					  <li ><a data-toggle="tab" class="a" href="#firmas">FIRMA</a></li>
					</ul>
					<div class="tab-content">
                    <!-- INICIO TAB -->	
					    <div class="tab-pane active" id="tab_descipcion">
					    	<br>
							<form>
							<div class="form-group col-xs-4 col-lg-4">
									<strong for="">FECHA ACCIDENTE</strong>
									<div class='input-group date'>
											<input id="fecha_accidente" class="form-control bvtxt cambio_fecha calendario" type="text" onchange="actualiza_permiso()" readonly="true">
											<span  class="input-group-addon" style="cursor:pointer">
											<span class="glyphicon glyphicon-calendar fa fa-calendar"></span>
											</span>
									</div>
							</div>
							<div class="form-group col-xs-2 col-lg-2">
								<strong for="">HORA</strong>
								<input maxlength="5" id="hora_accidente"  placeholder="hh:mm" class="form-control" type="text" onkeyup="mask(this.id)" onBlur="actualiza_permiso()">
							</div>

							<div class="form-group col-xs-6 col-lg-6">
				                <strong >TIPO</strong>
										<select class="form-control" name="accidente_tipo"  id="accidente_tipo" required="required" onchange="actualiza_permiso()" >

								</select>
						   </div>
								
					


							<div class="form-group col-xs-12 col-lg-12">
								<strong for="">PERDIDA DEL INCIDENTE</strong>
								<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="check_equipo" onchange="actualiza_permiso()">
								 <label class="form-check-label" for="flexCheckDefault">Equipo</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								 <input class="form-check-input" type="checkbox" value="" id="check_material" onchange="actualiza_permiso()">
								 <label class="form-check-label" for="flexCheckDefault">Material</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								 <input class="form-check-input" type="checkbox" value="" id="check_ambiente" onchange="actualiza_permiso()">
								 <label class="form-check-label" for="flexCheckDefault">Ambiente</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								 <input class="form-check-input" type="checkbox" value="" id="check_personas" onchange="actualiza_permiso()">
								 <label class="form-check-label" for="flexCheckDefault">Personas</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								 <input class="form-check-input" type="checkbox" value="" id="check_otros" onchange="actualiza_permiso()">
								 <label class="form-check-label" for="flexCheckDefault">Otros</label>
								 </div>

							</div>

							<div class="form-group col-xs-6 col-lg-6">
								<strong >Especificar otros</strong>
								<input type="text" class="form-control" name="especificacion_otros" id="especificacion_otros" required="required" onblur="actualiza_permiso()">
							</div>
							<div class="form-group col-xs-6 col-lg-6">
								<strong >Equipo Involucrado</strong>
								<input type="text" class="form-control" name="equipo_involucrado" id="equipo_involucrado" required="required" onblur="actualiza_permiso()">
							</div>

							<div class="form-group col-xs-6 col-lg-6">
								<strong >ACTIVIDAD QUE REALIZABA DEL ACCIDENTE</strong>
								<input type="text" class="form-control" name="actividad_que_realizaba" id="actividad_que_realizaba" required="required" onblur="actualiza_permiso()">
							</div>

							<div class="form-group col-xs-6 col-lg-6">
								<strong for="">ACTIVIDAD</strong>
								<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="check_rutinaria" onchange="actualiza_permiso()">
								 <label class="form-check-label" for="flexCheckDefault">Rutinaria</label>&nbsp;&nbsp;&nbsp;&nbsp;
								 <input class="form-check-input" type="checkbox" value="" id="check_planificada" onchange="actualiza_permiso()">
								 <label class="form-check-label" for="flexCheckDefault">Planificada</label>&nbsp;&nbsp;&nbsp;&nbsp;
								 <input class="form-check-input" type="checkbox" value="" id="check_no_planificada" onchange="actualiza_permiso()">
								 <label class="form-check-label" for="flexCheckDefault">No Planificada</label>
								</div>
							</div>
							<div class="form-group col-xs-12 col-lg-12">
								<label><strong>TIPO DE ACCIDENTE</strong></label>
								<div class="form-check" id="tipo_accidente_aux">
  									<input class="form-check-input" type="radio" name="tipo_accidente_aux" value="leve" id="check_leve" onchange="actualiza_permiso()">
  									<label class="form-check-label" for="check_leve">LEVE</label>&nbsp;&nbsp;&nbsp;&nbsp;
 									<input class="form-check-input" type="radio" name="tipo_accidente_aux" value="grave" id="check_grave" onchange="actualiza_permiso()">
  									<label class="form-check-label" for="check_grave">GRAVE</label>&nbsp;&nbsp;&nbsp;&nbsp;
									<input class="form-check-input" type="radio" name="tipo_accidente_aux" value="fatal" id="check_fatal" onchange="actualiza_permiso()">
  									<label class="form-check-label" for="check_fatal">FATAL</label>
								</div>
							</div>

							</form>
						</div>
					<!-- FIN PRIMER TAB -->		
						<div class="tab-pane" id="relato_accidente"><br>
						<form>

						 <div class="form-group col-xs-12 col-lg-12">
						    <strong>RELATO : </strong>
						    <textarea class="form-control" id="relato" rows="7" onblur="actualiza_permiso()"></textarea>
						  </div>


						  <div class="form-group col-xs-6 col-lg-6">
				                <strong >Parte del cuerpo lesionada</strong>
							  
							        <select class="js-select2" multiple="multiple" name="parte_lesionada" id="parte_lesionada" onchange="actualiza_permiso()">

							        </select>

						   </div>
						   <div class="form-group col-xs-1 col-lg-1">
				                <br>
								<button type="button" class="btn btn-success glyphicon glyphicon-plus btn-md pull-left" onclick="abre_parte_lesionada()" title="Agregar nueva parte lesionada"></button>
						   </div>

						   <div class="form-group col-xs-4 col-lg-4">
				                <strong >Tipo Accidente</strong>
										<select class="form-control" name="tipo_accidente"  id="tipo_accidente" required="required" onchange="actualiza_permiso()">
								</select>
						   </div>
						   <div class="form-group col-xs-1 col-lg-1">
				                <br>
								<button type="button" class="btn btn-info glyphicon glyphicon-plus btn-md pull-left" onclick="abre_tipo_accidente()" title="Agregar nuevo tipo de accidente"></button>
						   </div>

						   <div class="form-group col-xs-7 col-lg-7">
								<strong >Elemento que provoca la lesión (Agente)</strong>
								<input type="text" class="form-control" name="elemento_provoca_lesion" id="elemento_provoca_lesion" required="required" onblur="actualiza_permiso()">
							</div>
							<div class="form-group col-xs-5 col-lg-5">
									<strong >Fuente</strong>
									<input type="text" class="form-control" name="fuente" id="fuente" required="required" onblur="actualiza_permiso()">
								</div>
								<div class="form-group col-xs-12 col-lg-12">
									<strong >Lugar exacto del accidente</strong>
									<input type="text" class="form-control" name="lugar_del_accidente" id="lugar_del_accidente" required="required" onblur="actualiza_permiso()">
								</div>
						<div class="tab-pane"><br>
							<div class="form-group col-xs-12 col-lg-12">
						    <strong>RELATO TESTIGO: </strong>
						    <textarea id="relato_testigo" class="form-control" id="relato" rows="7" onblur="actualiza_permiso()"></textarea>
							</div>
						</div>
						</div>
						<!-- FIN SEGUNDO TAB -->			

						<div class="tab-pane" id="medidas_control">
							<br>
					
							<div class="form-group col-xs-7 col-lg-7">
								<strong >Acción inmdiata tomadas por el supervisor</strong>
								<input type="text" class="form-control" name="accion_inmediata_por_supervisor" id="accion_inmediata_por_supervisor" required="required">
							</div>
							<div class="form-group col-xs-4 col-lg-4">
									<strong >Responsable</strong>
									<input type="text" class="form-control" name="responsable_accion_inmediata" id="responsable_accion_inmediata" required="required">
							</div>
							<div class="form-group col-xs-1 col-lg-1">
				                <br>
								<button type="button" class="btn btn-success glyphicon glyphicon-plus btn-md pull-left" onclick="agrega_nuava_accion_inmediata()" title="Agregar nueva acción inmediata"></button>
						   </div>
						   <br><br><br><br>
						    <div class="col-xs-12 col-lg-12">
				                <table class="table table-bordered"  width="100%">
				                    <thead>
				                        <tr><th width="5%"></th>
											<th width="65%">ACCIÓN INMEDIATA</th>
											<th width="25%">RESPONSABLE</th>
											<th width="5%"></th>
				     
				                        </tr>
				                    </thead>
				                    <tbody id="grid_lista_medidas_control"> </tbody>
				                </table>
				                
				            </div>



				
						</div>
						<!-- FIN SEGUNDO TAB -->

						<div class="tab-pane" id="analisis_causal">
						<!--				
							<div class=" form-group col-xs-10 col-lg-10"><br>
								<label class="a">ESCRIBA EL DAÑO</label>
								<input type="text" class="form-control" name="danio" id="danio" required="required">
							</div>
							<div class="row form-group col-xs-2 col-lg-2">
								<br><br>
								<button type="button" class="btn btn-success btn-md pull-left" onclick="agrega_danio()">AGREGAR DAÑO</button>
							</div>
							<br>
							<br>
							<table class="table table-bordered"  width="100%">
				                    <thead>
				                        <tr><th >DAÑO</th>
											<th >INCIDENTE</th>
											<th >CAUSAS INMEDIATAS</th>
											<th >CAUSAS BÁSICAS</th>
											<th >REQ DEL SISTEMA</th>
				     
				                        </tr>
				                    </thead>

				                </table>
				                <div id="grid_analisia_causal"></div>
						-->	
						<div class="col-lg-12"><br>
					    <center><strong>CAUSAS INMEDIATAS</strong></center>
						</div>
						<div class="col-lg-6"><br>
					    <center><strong>ACCIÓN SUBESTANDAR</strong></center>
						</div>
						<div class="col-lg-6"><br>
					    <center><strong>CONDICIÓN SUBESTANDAR</strong></center>
						</div>						     	

						<div class="form-group col-lg-6">

							<div class="panel-group" >
										<div class="panel panel-warning">
										 <div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse" href="#collapseOneOne">
										  <label>Equipos de mantenimiento en funcionamiento</label>
										  </a>  
											</div>
											<div id="collapseOneOne" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													<input class="form-check-input col-lg-1" type="checkbox" value="" id="check_1" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Rellenar, empacar,etc., con equipo bajo presión.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_2" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Limpiar, engrasar, ajustar, reparar equipo en funcionamiento.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_3" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Soldar o reparar tanques o recipientes sin purgar.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_4" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Trabajar en equipo eléctrico.</label>

													 </div>
												
												
												</div> 
											</div>
										</div>
										<div class="panel panel-warning">
										 <div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse" href="#collapseOneTWO">
										  <label>+ No advertir o asegurar</label>
										  </a>  
											</div>
											<div id="collapseOneTWO" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													<input class="form-check-input col-lg-1" type="checkbox" value="" id="check_5" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">No cerrar con llave, bloquear o asegurar contra movimiento inesperado.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_6" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">No apagar equipos que no están en uso.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_7" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">No poner señales de advertencia, etiquetas o letreros.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_8" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Soltar o mover cargas sin advertir adecuadamente.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_9" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Arrancar o detener vehículos sin advertir adecuadamente.</label>

													 </div>
												
												
												</div> 
											</div>
										</div>
										<div class="panel panel-warning">
										 <div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse" href="#collapseOneTREE">
										  <label>+ Hacer inoperante los dispositivos de seguridad</label>
										  </a>  
											</div>
											<div id="collapseOneTREE" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													<input class="form-check-input col-lg-1" type="checkbox" value="" id="check_10" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Bloquear, tapar o ligar dispositivos de seguridad.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_11" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Desconectar o quitar dispositivos de seguridad.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_12" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Ajustar dispositivos de seguridad inadecuadamente.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_13" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Reemplazar un dispositivo de seguridad con otro de capacidad impropia.</label>
													 </div>
												
												
												</div> 
											</div>
										</div>

										<div class="panel panel-warning">
										 <div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse" href="#collapseOneCUATRO">
										  <label>+ Operar o trabajar a una velocidad impropia</label>
										  </a>  
											</div>
											<div id="collapseOneCUATRO" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_14" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Alimentando o abasteciendo materiales demasiado rápido.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_15" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Saltar desde elevaciones.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_16" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Correr.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_17" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Tirar materiales en lugar de pasarlo o llevarlos.</label>
													 </div>
												
												
												</div> 
											</div>
										</div>

										<div class="panel panel-warning">
										 <div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse" href="#collapseOnecinco">
										  <label>+ Posición o postura impropia para la tarea</label>
										  </a>  
											</div>
											<div id="collapseOnecinco" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_18" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Entrar a espacios encerrados sin el margen apropiado.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_19" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Montar en posiciones inseguras.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_20" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Mover bajos las cargas suspendidas.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_21" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Exposición a cargas oscilantes.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_22" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Exposición innecesaria a materiales o equipo en movimiento.</label>
													 </div>
												
												
												</div> 
											</div>
										</div>

										<div class="panel panel-warning">
										 <div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse" href="#collapseOneseis">
										  <label>+ Colocar, mezclar o combinar en forma impropia</label>
										  </a>  
											</div>
											<div id="collapseOneseis" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_23" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Inyectar, mezclar, o combinar sustancias.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_24" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Crea una explosión, incendio u otro peligro.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_25" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Posicionamiento impropio de vehículos o equipo de manejo de materiales para cargar o descargar.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_26" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Colocación impropia de materiales que crean peligros como tropezar o chocar.</label>

													 </div>
												
												
												</div> 
											</div>
										</div>

										<div class="panel panel-warning">
										 <div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse" href="#collapseOnesiete">
										  <label>+ Uso impropio del equipo</label>
										  </a>  
											</div>
											<div id="collapseOnesiete" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_27" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Usar equipo etiquetado o evidentemente defectuoso .</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_28" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Usar equipo o material de una manera para lo que no fue pensado.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_29" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Cargar excesivamente equipo o estructuras.</label>

													 </div>
												
												
												</div> 
											</div>
										</div>


										<div class="panel panel-warning">
										 <div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse" href="#collapseOneocho">
										  <label>+ Uso impropio de manos o partes del cuerpo</label>
										  </a>  
											</div>
											<div id="collapseOneocho" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_30" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Asir objetos en forma insegura.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_31" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Agarrar objetos inadecuadamente.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_32" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Usar las manos en lugar de las herramientas.</label>

													 </div>
												
												
												</div> 
											</div>
										</div>

										<div class="panel panel-warning">
										 <div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse" href="#collapseOnenueve">
										  <label>+ Otras prácticas subestándares</label>
										  </a>  
											</div>
											<div id="collapseOnenueve" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_33" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Falta de atención al equilibrio o el ambiente.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_34" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">No usar vestimenta personal segura.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_35" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">No usar equipo de protección personal disponible.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_36" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Uso impropio del equipo de protección personal .</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_37" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Bromas.</label>

													 </div>
												
												
												</div> 
											</div>
										</div>

										<div class="panel panel-warning">
										 <div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse" href="#collapseOnediez">
										  <label>+ Métodos o procedimientos peligrosos</label>
										  </a>  
											</div>
											<div id="collapseOnediez" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_38" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Uso de materiales/equipos inherentes peligrosas.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_39" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Uso de método / procedimientos inherentes peligrosas.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_40" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Uso de equipo inadecuado e impropio.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_41" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Ayuda inadecuada para el levantamiento de cosas pesadas.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_42" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Asignación impropia de personal.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_43" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Otros métodos o procedimientos peligrosos.</label>

													 </div>
												
												
												</div> 
											</div>
										</div>

										<div class="panel panel-warning">
										 <div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse" href="#collapseOneonce">
										  <label>+ Otro</label>
										  </a>  
											</div>
											<div id="collapseOneonce" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_44" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Trabajador adopta postura inadecuado de arrastre o traslado de piezas.</label>

													 </div>
												
												
												</div> 
											</div>
										</div>


								<!-- termina primer acordeon de la izquierda-->		

							</div>
																
						</div>

						<div class="form-group col-lg-6" >
						

							<div class="panel-group" >
										<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseDOSuno">
										  <label >+ Defecto de herramientas o equipo</label>
										  </a>  
											</div>
											<div id="collapseDOSuno" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_45" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Diseñado inadecuadamente.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_46" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Compuesto de materiales impropios.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_47" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Inadecuadamente compuesto o armado.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_48" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Desafilado.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_49" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Asignación impropia de personal.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_50" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Áspero.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_51" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Resbaladizo.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_52" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Desgastado.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_53" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Raído.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_54" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Rasgado.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_55" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Roto.</label>

													 </div>
												

												</div> 
											</div>
										</div>

							
										<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseDOSdos">
										  <label >+ Peligros de la vestimenta</label>
										  </a>  
											</div>
											<div id="collapseDOSdos" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_56" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Falta de equipo protector adecuado.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_57" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Ropa impropia o inadecuada .</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_58" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Otros peligros de la vestimenta.</label>

													 </div>
												

												</div> 
											</div>
										</div>

							
										<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseDOStres">
										  <label >+ Peligros del medio ambiente</label>
										  </a>  
											</div>
											<div id="collapseDOStres" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_59" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Ruido excesivo.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_60" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Espacio inadecuado en pasillos.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_61" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Salidas inadecuadas.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_62" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Margen inadecuado (congestión o restricción).</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_63" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Control inadecuado de tráficos.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_64" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Ventilación inadecuada.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_65" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Espacio de trabajo insuficiente.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_66" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Iluminación impropia (insuficiencia o exceso).</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_67" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Contaminación del aire.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_68" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Exposiciones a radiación.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_69" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Peligros de incendio y explosión.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_70" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Limpieza insuficiente; lugar de trabajo desordenado.</label>


													 </div>
												

												</div> 
											</div>
										</div>

							
										<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseDOScuatro">
										  <label >+ Riesgos de la colocación</label>
										  </a>  
											</div>
											<div id="collapseDOScuatro" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_71" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Inadecuadamente apilado.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_72" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Inadecuadamente colocado.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_73" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Inadecuadamente asegurado contra movimiento indeseado.</label>

													 </div>
												

												</div> 
											</div>
										</div>

										<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseDOScinco">
										  <label >+ Riesgos de dispositivos de protección inadecuados</label>
										  </a>  
											</div>
											<div id="collapseDOScinco" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_74" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Peligros mecánicos o físicos sin protección.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_75" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Peligros mecánicos o físicos con protección inadecuada.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_76" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Falta de puntales o soportes, o puntales o soportes inadecuados.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_77" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Corriente eléctrica sin tierra.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_78" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Corriente eléctrica sin aislamiento.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_79" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Radiación inadecuadamente protegida.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_80" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Radiación sin protección.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_81" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Radiación inadecuadamente protegida.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_82" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Materiales sin etiquetar o inadecuadamente etiquetados.</label>

													 </div>
												

												</div> 
											</div>
										</div>

										<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseDOSseis">
										  <label >+ Peligros fuera del ambiente de trabajo de la organización</label>
										  </a>  
											</div>
											<div id="collapseDOSseis" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_83" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Artículos defectuosos de otros.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_84" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Otros peligros asociados con la propiedad de otros.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_85" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Otros peligros asociados con la actividad de otros.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_86" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Peligros naturales: el tiempo, terreno, animales, etc..</label>

													 </div>
												

												</div> 
											</div>
										</div>

										<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseDOSsiete">
										  <label >+ Peligros públicos</label>
										  </a>  
											</div>
											<div id="collapseDOSsiete" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_87" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Peligros del transporte publico.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_88" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Peligros del trafico.</label>

													 </div>
												

												</div> 
											</div>
										</div>

										<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseDOSocho">
										  <label >+ Otro</label>
										  </a>  
											</div>
											<div id="collapseDOSocho" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_89" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Condiciones propias del entorno, trabajo repetitivo.</label>

													 </div>
												

												</div> 
											</div>
										</div>

							</div>


						</div>

						<div class="col-lg-12">
					    <center><strong>CAUSAS BÁSICAS</strong></center>
						</div>
						<div class="col-lg-6"><br>
					    <center><strong>FACTORES PERSONALES</strong></center>
						</div>
						<div class="col-lg-6"><br>
					    <center><strong>FACTORES DEL TRABAJO</strong></center>
						</div>	



						<div class="form-group col-lg-6" >
							<div class="panel-group" >
										<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseCUATROuno">
										  <label >+ Capacidad física / fisiológica inadecuada</label>
										  </a>  
											</div>
											<div id="collapseCUATROuno" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_90" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Altura, peso, talla fuerza, alcance, etc., inadecuados.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_91" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Capacidad limitada de movimiento corporal.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_92" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Capacidad   limitada para mantenerse es determinadas posiciones corporales.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_93" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Sensibilidad o alergias a ciertas sustancias.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_94" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Asignación impropia de personal.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_95" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Sensibilidad a determinados extremos sensoriales (temperatura, sonidos, etc.).</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_96" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Visión defectuosa.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_97" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Audición defectuosa.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_98" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Otras deficiencias sensoriales (tacto, gusto, olfato, equilibrio).</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_99" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Incapacidad respiratoria.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_100" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Otras incapacidades físicas permanentes.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_101" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Incapacidades temporales.</label>

													 </div>
												

												</div> 
											</div>
										</div>
										<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseCUATROdos">
										  <label >+ Capacidad mental/ sicológica inadecuada</label>
										  </a>  
											</div>
											<div id="collapseCUATROdos" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_102" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Miedos y fobias.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_103" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Perturbación emocional.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_104" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Nivel de inteligencia.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_105" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Incapacidad de comprensión.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_106" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Falta de juicio.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_107" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Escasa coordinación.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_108" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Tiempo lento de reacción.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_109" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Aptitud mecánica deficiente.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_110" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Baja aptitud de aprendizaje.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_111" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Problemas de memorias.</label>

													 </div>
												

												</div> 
											</div>
										</div>
										<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseCUATROtres">
										  <label >+ Estrés mental o sicológicos</label>
										  </a>  
											</div>
											<div id="collapseCUATROtres" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_112" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Sobrecarga emocional.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_113" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Fatiga debida a la carga o las limitaciones de tiempo de la tarea mental.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_114" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Obligaciones que exigen un juicio toma de decisiones extremas.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_115" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Rutina, monotonía, exigencias para un cargo sin transcendencia.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_116" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Exigencia de una concentración/ percepción profunda.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_117" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Ordenes confusas.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_118" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Solicitudes conflictivas.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_119" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Preocupación debidos a problemas.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_120" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Frustraciones.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_121" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Enfermedad mental.</label>

													 </div>
												

												</div> 
											</div>
										</div>
										<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseCUATROcuatro">
										  <label >+ Falta de conocimiento</label>
										  </a>  
											</div>
											<div id="collapseCUATROcuatro" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_122" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Falta de experiencia.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_123" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Orientación deficiente.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_124" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Entrenamiento inicial inadecuado.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_125" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Ordenes mal interpretadas.</label>

													 </div>
												

												</div> 
											</div>
										</div>
										<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseCUATROcinco">
										  <label >+ Falta de habilidad</label>
										  </a>  
											</div>
											<div id="collapseCUATROcinco" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_126" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Instrucción inicial inadecuada.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_127" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Practica inadecuada.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_128" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Operación esporádica.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_129" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Falta de preparación.</label>

													 </div>
												

												</div> 
											</div>
										</div>
										<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseCUATROseis">
										  <label >+ Motivación deficiente</label>
										  </a>  
											</div>
											<div id="collapseCUATROseis" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_130" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">El desempeño subestándar es más gratificante.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_131" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">El desempeño estándar causa desagrado.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_132" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Falta de incentivos .</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_133" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Demasiadas frustraciones.</label>
													  <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_134" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Agresión inadecuada.</label>
													  <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_135" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">No existe interés para evitar la incomodidad.</label>
													  <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_136" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Sin interés por sobresalir.</label>
													  <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_137" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Ejemplos deficientes por parte de la supervisión.</label>
													  <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_138" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Retroalimentación inadecuada del desempeño.</label>
													  <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_139" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Falta de refuerzo positivo para el comportamiento correcto.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_140" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Falta de incentivos de producción.</label>

													 </div>
												

												</div> 
											</div>
										</div>
										<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseCUATROsiete">
										  <label >+ Otro</label>
										  </a>  
											</div>
											<div id="collapseCUATROsiete" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_141" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Postura inadecuada.</label>

													 </div>
												

												</div> 
											</div>
										</div>

						   </div>
						</div>

						<div class="form-group col-lg-6" >
							<div class="panel-group" >
								<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseTRESuno">
										  <label >+ Supervisión y/o liderazgo deficiente</label>
										  </a>  
											</div>
											<div id="collapseTRESuno" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_142" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Relaciones jerárquicas poco claras o conflictivas.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_143" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Asignación de responsabilidades poco claras o conflictivas.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_144" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Delegación   insuficiente o inadecuada.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_145" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Formulación de objetivos, metas o estándares que conflictúan.</label>
													  <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_146" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Instrucción, orientación y/ o entrenamiento insuficiente.</label>
													  <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_147" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Entrega insuficiente de documentos de consulta, de instrucciones y de publicaciones guías.</label>
													  <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_148" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Identificación y evaluación deficiente de exposiciones a pérdidas.</label>
													  <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_149" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Falta de conocimiento en el trabajo, de supervisión/ administración.</label>
													  <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_150" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Ubicación inadecuada del trabajador, de acuerdo a sus cualidades y a las exigencias que demanda la tarea.</label>
													  <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_151" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Medición y evaluación deficiente del desempeño.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_152" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Retroalimentación del desempeño deficiente o incorrecto.</label>

													 </div>
												

												</div> 
											</div>
										</div>

										<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseTRESdos">
										  <label >+ Ingeniería Inadecuada</label>
										  </a>  
											</div>
											<div id="collapseTRESdos" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_153" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Evaluación inadecuada de las exposiciones a pérdidas.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_154" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Preocupación deficiente en cuanto a los factores humanos/ ergonómicos.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_155" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Estándares, especificaciones y/ o criterios de diseño inadecuados.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_156" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Controles inadecuados de las construcciones .</label>
													  <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_157" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Evaluación deficiente de la condición conveniente para operar.</label>
													  <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_158" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Evaluación deficiente para el comienzo de una operación.</label>
													  <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_159" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Evaluación insuficiente respecto al cambio que se produzcan.</label>

													 </div>
												

												</div> 
											</div>
										</div>
									<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseTREScuatro">
										  <label >+ Deficiente en las adquisiciones</label>
										  </a>  
											</div>
											<div id="collapseTREScuatro" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_160" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Especificaciones deficientes en cuanto a los pedidos.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_167" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Investigación insuficiente en cuanto a los materiales y equipos.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_168" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Especificaciones deficientes para los vendedores.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_169" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Modalidad o ruta de embarque inadecuada.</label>
													  <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_170" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Comunicación inadecuada de información de seguridad y salud.</label>
													  <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_171" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Manejo inadecuado de los materiales.</label>
													  <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_172" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Almacenamientos inadecuados de los materiales.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_173" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Transportes inadecuados de los materiales.</label>
													  <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_174" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Identificación deficiente de artículos peligrosos.</label>
													  <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_161" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Sistemas deficientes de recuperación o eliminación de desechos.</label>

													 </div>
												

												</div> 
											</div>
										</div>

										<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseTREScinco">
										  <label >+ Mantenimiento deficiente</label>
										  </a>  
											</div>
											<div id="collapseTREScinco" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_175" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Prevención inadecuada de Evaluación de necesidades.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_176" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Prevención inadecuada de Lubricación y servicio.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_177" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Prevención inadecuada de Limpieza o pulimento.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_178" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Corrección inadecuada de Comunicación de necesidades.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_179" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Corrección inadecuada de Programación del trabajo.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_180" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Corrección inadecuada de Revisión de las piezas.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_181" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Corrección inadecuada de Reemplazo de partes.</label>
													 </div>
												

												</div> 
											</div>
										</div>

										<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseTRESseis">
										  <label >+ Estándares deficientes de trabajo</label>
										  </a>  
											</div>
											<div id="collapseTRESseis" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_182" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Desarrollo inadecuado de estándares.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_183" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Comunicación inadecuada de estándares.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_184" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Mantenimiento inadecuado de estándares.</label>
													 </div>
												

												</div> 
											</div>
										</div>

										<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseTRESsiete">
										  <label >+ Uso y desgaste</label>
										  </a>  
											</div>
											<div id="collapseTRESsiete" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_185" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Planificación inadecuada del uso.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_186" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Prolongación excesiva de la vida útil del elemento.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_187" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Inspección y/o control deficiente.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_188" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Sobrecarga o uso excesivo.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_189" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Mantenimiento deficiente.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_190" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Utilizado por personas no calificadas o sin entrenamiento.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_191" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Empleo inadecuado para otros propósitos.</label>
													 </div>
												

												</div> 
											</div>
										</div>
										<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseTRESocho">
										  <label >+ Abuso o maltrato</label>
										  </a>  
											</div>
											<div id="collapseTRESocho" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_192" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Permitido por la supervisión Intencional.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_193" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Permitido por la supervisión No intencional.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_194" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">No permitidos por la supervisión Intencional.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_195" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">No permitidos por la supervisión No intencional.</label>
													 </div>
												

												</div> 
											</div>
										</div>



							</div>
						  </div>

						<div class="col-lg-12">
					    <center><strong>FALTA/FALLA DE CONTROL ADMINISTRATIVO/OPERATIVO QUE PUEDA FALTAR <br> EN LA ORGANIZACIÓN O QUE SEA DEFICIENTE</strong></center>
						</div>

						<div class="form-group col-lg-6" >
							<div class="panel-group" >

								<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseCINCOuno">
										  <label >+ Liderazgo y administración</label>
										  </a>  
											</div>
											<div id="collapseCINCOuno" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_196" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Política Integrada de HSE.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_197" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Coordinación de los programas HSE.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_198" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Participación de la gerencia supervisor y mandos medios.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_199" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Estándares establecidos para el desempeño.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_200" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Participación de la administración.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_201" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Presencia en reuniones administrativas de HSE.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_202" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Manual de referencias de control operacional.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_203" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Auditorías internas realizadas.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_204" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Establecimiento de objetivos anuales de HSE.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_205" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Comité Paritarios de Higiene y Seguridad.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_206" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Negativa a trabajar debido a peligros .</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_207" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Comunicaciones externas.</label>
													 </div>
												

												</div> 
											</div>
								</div>
								<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseCINCOdos">
										  <label >+ Entrenamiento de la administración</label>
										  </a>  
											</div>
											<div id="collapseCINCOdos" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_208" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Análisis de necesidades de entrenamiento.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_209" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Orientación / Introducción inicial a controles operacionales .</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_210" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Entrenamiento inicial de contratación de HSE .</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_211" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Entrenamiento inicial de contratación por jefatura.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_212" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Entrenamiento periódico de controles operacionales.</label>
													 </div>
												

												</div> 
											</div>
								</div>
								<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseCINCOtres">
										  <label >+ Inspecciones Planeadas</label>
										  </a>  
											</div>
											<div id="collapseCINCOtres" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_213" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Inspecciones generales planeadas.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_214" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Procedimiento de seguimientos.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_215" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Análisis de informes de inspección.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_216" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Mantenimiento preventivo.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_217" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Sistema de inspecciones especiales.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_218" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Inspecciones de pre-uso de equipos.</label>
													 </div>
												

												</div> 
											</div>
								</div>
								<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseCINCOcuatro">
										  <label >+ Entrenamiento de conocimiento y habilidades</label>
										  </a>  
											</div>
											<div id="collapseCINCOcuatro" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_219" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Análisis de necesidades de entrenamiento.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_220" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Programa de entrenamiento o capacitación para los trabajadores.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_221" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Evaluación del programa de entrenamiento.</label>
													 </div>
												

												</div> 
											</div>
								</div>
								<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseCINCOcinco">
										  <label >+ Equipos de Protección Personal</label>
										  </a>  
											</div>
											<div id="collapseCINCOcinco" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_222" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Identificación de necesidades específicos de equipos de protección personal.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_223" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Control de entrega de equipo de protección personal.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_224" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Cumplimiento de las normas.</label>
													 </div>
												

												</div> 
											</div>
								</div>
								<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseCINCOseis">
										  <label >+ Sistema de evaluación de los Programas HSE</label>
										  </a>  
											</div>
											<div id="collapseCINCOseis" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_225" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Evaluación de los requisitos de los estándares HSE.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_226" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Evaluación cumplimiento de los estándares HSE.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_227" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Evaluación permanente del sistema integrado.</label>
													 </div>
												

												</div> 
											</div>
								</div>
								<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseCINCOsiete">
										  <label >+ Comunicación con Grupos</label>
										  </a>  
											</div>
											<div id="collapseCINCOsiete" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_228" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Reuniones periódicas con grupos.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_229" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Participación de la administración.</label>
													 </div>
												

												</div> 
											</div>
								</div>
								<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseCINCOocho">
										  <label >+ Contratación y colocación</label>
										  </a>  
											</div>
											<div id="collapseCINCOocho" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_230" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Requisitos de capacidad.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_231" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Exámenes médicos.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_232" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Revisión de la calificación de Pre-empleo.</label>
													 </div>
												

												</div> 
											</div>
								</div>
								<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseCINCOnueve">
										  <label >+ Seguridad fuera del trabajo</label>
										  </a>  
											</div>
											<div id="collapseCINCOnueve" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_233" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Identificación y análisis del problema.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_234" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Educación de seguridad fuera del trabajo.</label>
													 </div>
												

												</div> 
											</div>
								</div>
								

							</div>
						</div>

						<div class="form-group col-lg-6" >
							<div class="panel-group" >
								<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseSEISuno">
										  <label >+ Análisis y procedimientos de tareas</label>
										  </a>  
											</div>
											<div id="collapseSEISuno" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_235" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Matriz de identificación de peligro y evaluación de riesgos.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_236" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Determinación de controles operacionales.</label>
													 </div>
												

												</div> 
											</div>
								</div>

								<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseSEISdos">
										  <label >+ Investigación de incidentes</label>
										  </a>  
											</div>
											<div id="collapseSEISdos" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_237" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Seguimiento de medidas correctivas de investigaciones de incidentes anteriores.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_238" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Investigación de incidentes graves y de alto potencial.</label>
													 </div>
												

												</div> 
											</div>
								</div>

								<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseSEIStres">
										  <label >+ Observación de tareas</label>
										  </a>  
											</div>
											<div id="collapseSEIStres" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_239" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Directiva de la administración.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_240" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Programa de observaciones de trabajo.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_241" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Observación del trabajo.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_242" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Sistema de seguimiento de observaciones.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_243" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Análisis de observaciones realizadas.</label>
													 </div>
												

												</div> 
											</div>
								</div>
								<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseSEIScuatro">
										  <label >+ Preparación para emergencias</label>
										  </a>  
											</div>
											<div id="collapseSEIScuatro" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_244" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Plan de emergencia.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_245" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Análisis de posibles emergencias.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_246" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Entrenamiento de medidas de control en caso de emergencia.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_247" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Equipos de rescate de emergencia.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_248" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Equipos o accesorios de emergencia.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_249" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Comunicación en caso de emergencia.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_250" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Comunicación al público en general.</label>
													 </div>
												

												</div> 
											</div>
								</div>
								<div class="panel panel-warning">
											<div class="panel-heading">
										   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseSEIScinco">
										  <label >+ Control de salud e higiene industrial</label>
										  </a>  
											</div>
											<div id="collapseSEIScinco" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-check">
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_251" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Identificación y evaluación de riesgos a la salud.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_252" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Control de riesgos a la salud.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_253" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Control de salud ocupacional e higiene industrial.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_254" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Información y entrenamiento.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_255" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Monitoreo de higiene industrial.</label>
													 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_256" onchange="actualiza_permiso()">
													 <label class="form-check-label col-lg-11" for="flexCheckDefault">Comunicaciones.</label>
													 </div>
												

												</div> 
											</div>
								</div>
								<div class="panel panel-warning">
										<div class="panel-heading">
									   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseSEISseis">
									  <label >+ Control de Ingeniería</label>
									  </a>  
										</div>
										<div id="collapseSEISseis" class="panel-collapse collapse">
											<div class="panel-body">

												<div class="form-check">
												 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_257" onchange="actualiza_permiso()">
												 <label class="form-check-label col-lg-11" for="flexCheckDefault">Consideración sobre ingeniería de diseño.</label>
												 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_258" onchange="actualiza_permiso()">
												 <label class="form-check-label col-lg-11" for="flexCheckDefault">Revisión de proyectos y administración del cambio.</label>

												 </div>
											

											</div> 
										</div>
								</div>
								<div class="panel panel-warning">
										<div class="panel-heading">
									   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseSEISsiete">
									  <label >+ Promoción general</label>
									  </a>  
										</div>
										<div id="collapseSEISsiete" class="panel-collapse collapse">
											<div class="panel-body">

												<div class="form-check">
												 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_259" onchange="actualiza_permiso()">
												 <label class="form-check-label col-lg-11" for="flexCheckDefault">Difusión de controles operacionales en diarios murales o sectores públicos.</label>
												 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_260" onchange="actualiza_permiso()">
												 <label class="form-check-label col-lg-11" for="flexCheckDefault">Uso de estadísticas de incidentes.</label>
												 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_261" onchange="actualiza_permiso()">
												 <label class="form-check-label col-lg-11" for="flexCheckDefault">Promoción de temas críticos.</label>
												 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_262" onchange="actualiza_permiso()">
												 <label class="form-check-label col-lg-11" for="flexCheckDefault">Premios y reconocimiento a individuo o al grupo.</label>

												 </div>
											

											</div> 
										</div>
								</div>
								<div class="panel panel-warning">
										<div class="panel-heading">
									   <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapseSEISocho">
									  <label >+ Control de las adquisiciones, administración y servicios</label>
									  </a>  
										</div>
										<div id="collapseSEISocho" class="panel-collapse collapse">
											<div class="panel-body">

												<div class="form-check">
												 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_263" onchange="actualiza_permiso()">
												 <label class="form-check-label col-lg-11" for="flexCheckDefault">Compras de mercancías.</label>
												 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_264" onchange="actualiza_permiso()">
												 <label class="form-check-label col-lg-11" for="flexCheckDefault">Selección del contratista.</label>
												 <input class="form-check-input col-lg-1" type="checkbox" value="" id="check_265" onchange="actualiza_permiso()">
												 <label class="form-check-label col-lg-11" for="flexCheckDefault">Administración del contratista.</label>

												 </div>
											

											</div> 
										</div>
								</div>






							</div>
						</div>



						</div>
						<!-- FIN TERCERO TAB -->


						<!-- MEDIDAS PREVENTIVAS -->
						<div class="tab-pane" id="medidas_preventivas">
							<br>
							<div class="form-group col-xs-12 col-lg-12">
								<strong >PLAN DE ACCION</strong>
								<input type="text" class="form-control" name="plan_accion" id="plan_accion" required="required">
							</div>
							<div class="form-group col-xs-4 col-lg-4">
								<strong >RESPONSABLE</strong>
								<input type="text" class="form-control" name="responsable_plan_accion" id="responsable_plan_accion" required="required">
							</div>
							<div class="form-group col-xs-3 col-lg-3">
								<strong >CARGO</strong>
								<input type="text" class="form-control" name="cargo_responsable_plan" id="cargo_responsable_plan" required="required">
							</div>
							<div class="form-group col-xs-4 col-lg-4">
									<strong for="">FECHA PLAZO</strong>
									<div class='input-group date'>
											<input id="fecha_plazo_plan_accion" class="form-control bvtxt cambio_fecha calendario" type="text" onchange="" readonly="true">
											<span  class="input-group-addon" style="cursor:pointer">
											<span class="glyphicon glyphicon-calendar fa fa-calendar"></span>
											</span>
									</div>
							</div>
							<div class="form-group col-xs-1 col-lg-1">
								<br>
								<button type="button" class="btn btn-success glyphicon glyphicon-plus btn-md pull-left" onclick="agrega_nuavo_plan_de_accion()" title="Agregar nuevo medida preventiva"></button>
						   </div>

							   <br><br><br><br><br><br><br><br><br>
							    <div class="col-xs-12 col-lg-12">
					                <table class="table table-bordered"  width="100%">
					                    <thead>
					                        <tr><th width="5%"></th>
												<th width="45%">PLAN DE ACCIÓN</th>
												<th width="25%">RESPONSABLE</th>
												<th width="10%">CARGO</th>
												<th width="10%">PLAZO/FECHA</th>
												<th width="5%"></th>
					     
					                        </tr>
					                    </thead>
					                     <tbody id="grid_lista_plan_de_accion">
									  </tbody>
					                </table>
					            </div>



						</div>
						<!-- FIN CUARTO TAB -->	


						<!-- DOCUMENTOS ANEXOS -->
						<div class="tab-pane" id="documentos_anexos">
							<br>


						   <form class="col-lg-4" style="display:none;">
									<div class="form-group input-group col-xs-12 col-lg-12 val_error"><span class="input-group-addon">Tipo Adjunto:</span>
										<select class="form-control" id="adj_tipo_adjunto" >
											<option value="Adjunto">Adjunto</option>
											 </select>
									  </div>
                               </form>
							   
								
								<div class="form-group col-lg-3" style="display:none;">
								<label>doc_adjunto:</label>
								<input required type="text" class="form-control" id="doc_adjunto" >	
								</div>

								<form class="col-lg-12">
										    <div id="respuesta" class="alert" style="display:none;"></div>
											<div class="row">

												<div class=" form-group  col-lg-6 ">
													<input class="form-control" type="file" name="archivo" id="archivo" multiple/>
												</div>  


												<div class="col-lg-3">
												
												      <button type="button" id="boton_subir" class="btn btn-warning">Subir Documentos
															  <span class="glyphicon glyphicon-cloud-upload"></span>
													  </button>
									 
												</div>
											</div>
										   
										   </br>
										  <div id="archivos_subidos"></div>									
								</form>

							<div class="col-xs-12 col-lg-12"><br>
				                <table class="table table-bordered"  width="100%">
				                	<head>
				                    	<th style='text-align:center'>VER</th>
				                    	<th style='text-align:center'>DESCRIPCIÓN</th>
				                    	<th style='text-align:center'></th>
				                    </head>
				                     <tbody id="galeria_adjuntos">

								  </tbody>
				                </table>
				            </div>

						</div>
						<!-- FIN CUARTO TAB -->	


						<!-- DOCUMENTOS firmas -->
						<div class="tab-pane" id="firmas">
							<br>

							<div class="col-xs-12 col-lg-12">
				                <table class="table table-bordered"  width="100%">
				                    <thead>
				                        <tr><th width="33%"  style='text-align:center'>ELABORADO POR</th>
											<th width="34%"  style='text-align:center'>REVISADO POR</th>
											<th width="33%"  style='text-align:center'>APROBADO POR</th>
				     
				                        </tr>
				                    </thead>
				                     <tbody  id="grid_firmas_del_informe">
				                     		
				                     </tbody>

				                </table>
				            </div>

						</div>
						<!-- FIN CUARTO TAB -->	


					  </div>
					</div>
		</div>		
	 
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


 <div class="modal fade" id="modal_galeria_fotos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            &times;
                        </span>
                    </button>
                    <b><font size=3 color="white"><center><label>GALERIA</label></center></font></b>
                </div>
                <div class="modal-body">
		
					 <div class="row">
						  <div class="col-md-12">
						    <div id="mdb-lightbox-ui"></div>
						    <div class="mdb-lightbox no-margin" id="div_galeria">
						 

						    </div>

						  </div>
						</div>
                </div>
				<div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>

            </div>
        </div>
    </div>



<script src="script/adm_investigacion.js"></script>	
<script src="../investigacion/upload/js/upload.js"></script>
<script src="../investigacion/upload/js/upload_multiple.js"></script>


<script type="text/javascript">




$(".js-select2").select2({
    closeOnSelect: false,
    placeholder: "Placeholder",
    allowHtml: true,
    allowClear: true,
    tags: true
});


	function subirArchivos() {



                                
                if($("#adj_tipo_adjunto").val() == '' || $("#adj_tipo_adjunto").val()  == null) { 
                   
                }
                
                var fileInput = document.getElementById("archivo");
                var files = fileInput.files;
                var file;
                var cont =0;
                
             
                
                if(files.length == 0) { 
                   
                 document.getElementById("respuesta").style.display = "block";
                 $("#respuesta").addClass('alert-danger').html('Debe Seleccionar Archivo Adjunto');
                    
                }
                
                    for (var i = 0; i < files.length; i++) {
                    
                    
                    
                          file = files[i];
                          //alert(i);
                          //alert(file.name);
                    
                            $('#archivo').upload_multiple('upload/subir_archivo.php?accion=adjuntos',
                            {
                                

                                //nombre_archivo: $("#nombre_archivo").val()
                            },
                            function(respuesta,documento) {
                                //Subida finalizada.
                                if (respuesta != 0) {
                                
                                    //mostrarRespuesta('El archivo ha sido subido correctamente.', true);
                                    //$("#nombre_archivo, #archivo").val('');
                                     //mostrarArchivos(respuesta,'ingresar');
                                    
                                    cont = cont+1;

                                     document.getElementById("doc_adjunto").value=respuesta;    
                                     guardar_adjunto(respuesta,cont,files.length);
                                     
                                } else {
                                    //mostrarRespuesta('El archivo NO se ha podido subir.', false);
                                }
                               
                            }, function(progreso, valor) {
                                //Barra de progreso.
                               //$("#barra_de_progreso").val(valor);
                            },i);

                    }                           
               
            }



$(document).ready(function() {


                /*mostrarArchivos();*/
                 $("#archivo").on('click', function() {


                 document.getElementById("respuesta").style.display = "none";

                 //$("#respuesta").removeClass('alert-success').removeClass('alert-danger').html('');
                });
                  $("#boton_subir").on('click', function() {
                    subirArchivos();
                });
                

});
       


	tabla_investigaciones();


	$('#fecha_accidente').daterangepicker({
        "singleDatePicker": true,
        // autoUpdateInput: true,
        locale: {
            format: 'YYYY-MM-DD',
             cancelLabel: 'Cerrar',applyLabel: 'Aplicar', 
       "weekLabel": "S",
        "daysOfWeek": [
            "Do",
            "Lu",
            "Ma",
            "Mi",
            "Ju",
            "Vi",
            "Sa"
        ],
        "monthNames": [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre"
        ],
        }
    });

function carga_fecha(){

$('#fecha_plazo_plan_accion').daterangepicker({
        "singleDatePicker": true,
        // autoUpdateInput: true,
        locale: {
            format: 'YYYY-MM-DD',
             cancelLabel: 'Cerrar',applyLabel: 'Aplicar', 
       "weekLabel": "S",
        "daysOfWeek": [
            "Do",
            "Lu",
            "Ma",
            "Mi",
            "Ju",
            "Vi",
            "Sa"
        ],
        "monthNames": [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre"
        ],
        }
    });


$('#fecha_plazo_plan_accion').val('Seleccione...');

}
	


function mask(id){
 
serv =document.getElementById(id);
if(serv.value.length == 1){antlen = 2;}
if(serv.value.length == 3){antlen = 4;}
if(serv.value.length == 2 && antlen == 2){serv.value = serv.value + ":"; antlen = 4;}

}


function CheckTime(str,campo){
	hora=str.value;
	if (hora=='') {
		return;
	}
	
	/* if (hora.length>8) {
		alert("Introdujo una cadena mayor a 8 caracteres");
		return;
	}*/
	if (hora.length!=5) {
	    alert('Introducir hh:ss', 'Alerta!');	
        document.getElementById(campo).value='';
        document.getElementById("hora_accidente").focus();
		return;
	} 
	
	a=hora.charAt(0); //<=2
	b=hora.charAt(1); //<4
	c=hora.charAt(2); //:
	d=hora.charAt(3); //<=5
	
	//e=hora.charAt(5); //:
	//f=hora.charAt(6); //<=5
	
	if ((a==2 && b>3) || (a>2)) {
		alert('El valor que introdujo en la Hora no corresponde, introduzca un digito entre 00 y 23', 'Alerta!');	
		document.getElementById(campo).value='';
		document.getElementById("hora_accidente").focus();
		return;
	}

	if (d>5) {
	    alert('El valor que introdujo en los minutos no corresponde, introduzca un digito entre 00 y 59', 'Alerta!');	
		document.getElementById(campo).value='';
		document.getElementById("hora_accidente").focus();
		return;
	}
	
	/* if (f>5) {
		alert("El valor que introdujo en los segundos no corresponde");
		return;
	}
	if (c!=':' || e!=':') {
		alert("Introduzca el caracter ':' para separar la hora, los minutos y los segundos");
		return;
	} */
}


</script>	
                        
                        

</body>
<script src="script/nuevo_formulario.js"></script>	






