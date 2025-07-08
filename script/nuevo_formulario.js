

function calcularEdad(fechaTexto = null) {
    let valor = fechaTexto || $("#fecha_nacimiento").val();

    const partes = valor.split("/"); // ← ahora con "/"
    if (partes.length === 3) {
        // Convertir "dd/mm/aaaa" a "aaaa-mm-dd" (compatible con Date)
        const fechaFormateada = `${partes[2]}-${partes[1]}-${partes[0]}`;
        const hoy = new Date();
        const nacimiento = new Date(fechaFormateada);
        let edad = hoy.getFullYear() - nacimiento.getFullYear();
        const m = hoy.getMonth() - nacimiento.getMonth();

        if (m < 0 || (m === 0 && hoy.getDate() < nacimiento.getDate())) {
            edad--;
        }

        if (!isNaN(edad)) {
            $("#edad_accidentado").val(edad);
        } else {
            $("#edad_accidentado").val("");
        }
    } else {
        $("#edad_accidentado").val("");
    }
}


function setea_rut(){

  $("#rut_usuario").val($("#seleccion_usuario").val());

  carga_datos_personales($("#seleccion_usuario").val());
}

function setea_rut_patricio(){


  var rut_seleccionado = $("#seleccionar_usuario_patricio").val();

  
    if (rut_seleccionado !== "0") {
        $.ajax({
            url: 'json/json.php?accion=carga_datos_personales',
            data: { rut: rut_seleccionado },
            type: 'post',
            dataType: "json",
            success: function (data) {
                if (data.data && data.data.length > 0) {
                    $("#cargo_testigo").val(data.data[0].cargo_nombre);
                } else {
                    $("#cargo_testigo").val("No encontrado");
                }
            },
            error: function () {
                $("#cargo_testigo").val("Error de conexión");
            }
        });
    } else {
        $("#cargo_testigo").val("");
    }

  var encargado_datos = $("#encargado_investigacion").val();
  if (encargado_datos !== "0") {
    $.ajax({
        url: 'json/json.php?accion=carga_datos_personales',
        data: { rut: encargado_datos },
        type: 'post',
        dataType: "json",
        success: function (data) {
            if (data.data && data.data.length > 0) {
                $("#cargo_encargado").val(data.data[0].cargo_nombre);
            } else {
                $("#cargo_encargado").val("No encontrado");
            }
        },
        error: function () {
            $("#cargo_encargado").val("Error de conexión");
        }
    });
  }
}


function carga_datos_personales(rut){

  
        $.ajax({
                url:'json/json.php?accion=carga_datos_personales',
                data: {rut:rut},
                type:'post',
                 dataType: "json", 
                success: function (data)
                {

                  $("#area_accidentado").val(data.data[0].area_nombre);
                  $("#gerencia_accidentado").val(data.data[0].gerencia);
                  $("#jefe_directo").val(data.data[0].jefe_directo);
                  $("#cargo_accidentado").val(data.data[0].cargo_nombre);
                  $("#fecha_nacimiento").val(data.data[0].fecha_nacimiento);

                    if (data.data && data.data.length > 0) {
                    const persona = data.data[0];

                    const fecha = persona.fecha_nacimiento; // en formato dd-mm-aaaa
                    $("#fecha_nacimiento").val(fecha);
                
                    if (fecha) {
                    calcularEdad(fecha); // le pasamos la fecha directamente
                    } else {
                      $("#edad_accidentado").val("");
                      }
                    }

                  

                }
         });

}

$("#fecha_nacimiento").on("input", function () {
    const fecha = $(this).val();
    if (fecha) {
        const edad = calcularEdad(fecha);
        $("#edad_accidentado").val(edad);
    } else {
        $("#edad_accidentado").val("");
    }
});


function carga_lista_sucursal(){

    $("#seleccion_usuario").html('<option value="0">Seleccione un usuario...</option>');
    $("#seleccionar_usuario_patricio").html('<option value="0">Seleccione un usuario nuevo...</option>');
    $("#encargado_investigacion").html('<option value="0">Seleccione un encargado...</option>');
  
        $.ajax({
                url:'json/json.php?accion=buscar_nombre',
                data: {},
                type:'post',
                 dataType: "json", 
                success: function (json_jax)
                {

             for (var i = 0; i < json_jax.data.length; i++) {
                      $('#seleccion_usuario').append('<option value="' +json_jax.data[i].user_rut+ '">'+json_jax.data[i].nombre+'</option>');
                      $('#seleccionar_usuario_patricio').append('<option value="' +json_jax.data[i].user_rut+ '">'+json_jax.data[i].nombre+'</option>');
                      $('#encargado_investigacion').append('<option value="' +json_jax.data[i].user_rut+ '">'+json_jax.data[i].nombre+'</option>');

                    }
                }
    });

}


function obtenerTipoAccidenteSeleccionado() {
    const tipo = document.querySelector('input[name="tipo_accidente"]:checked');
    if (tipo) {
        return tipo.value;  // "Leve", "Grave" o "Fatal"
    } else {
        return null;  // Ninguna opción seleccionada
    }
}

// Detectar cambio en selección del tipo de accidente
document.querySelectorAll('input[name="tipo_accidente"]').forEach(function(radio) {
    radio.addEventListener('change', function () {
        console.log("Tipo de accidente seleccionado:", this.value);
    });
});


carga_lista_sucursal();


function setea_area(){

  $("#area_trabajo").value($("#select_area").value());

  carga_area.value($("#select_area").value());

}

function carga_area(){

  $("#select_area").html('<option value="0">Seleccione un area..</option>');
        
  $.ajax({
                url:'json/json.php?accion=buscar_nombre',
                data: {},
                type:'post',
                 dataType: "json", 
                success: function (json_jax)
                {

             for (var i = 0; i < json_jax.data.length; i++) {
                      $('#select_area').append('<option value="' +json_jax.data[i].area_nombre+ '">'+json_jax.data[i].area_nombre+'</option>');


                    }
                }
    });
}



function tabla_investigaciones(){

  var consulta='json/json.php?accion=todas_las_investigaciones';

  $("#tabla_investigaciones").dataTable().fnDestroy();
            $('#tabla_investigaciones').DataTable({
                 responsive: true,
                 dom: 'Bfrtip',
                 scrollX:true,
                     buttons: [ 'excel'],
                 aLengthMenu: [
                                      [10,25, 50, 100, 200, -1],
                                      [10,25, 50, 100, 200, "Todos"]
                                  ],
                 iDisplayLength: 10,  
                 
                 "ajax":''+consulta+'',
                 "columns": [
                 { "data": "numero_informe" },
                 {data: 'id_informe', "render": function (data, type, row, meta) {
            
                 return '<button type="button" class="btn btn-success glyphicon glyphicon-search btn-md pull-left" title="INFORME DE ACCIDENTE N° '+row.numero_informe+'" onclick="abrir_ventana_editar_informe(\''+row.id_informe+'\',\''+row.numero_informe+'\')" ></button>';                       
            
        
             }},
             {data: 'id_informe', "render": function (data, type, row, meta) {
                                    

                    if(row.fecha_firma_autorizacion!=''){
                        return '<center><label style="color:#04B404";>AUTORIZADO</label></center>'; 
                    }else if(row.fecha_firma_revision!=''){
                        return '<center><label style="color:#FE9A2E;">REVISADO</label></center>'; 
                    }else if(row.fecha_firma_elaborador!=''){
                         return '<center><label style="color:#0080FF;">FIRMADO</label></center>'; 
                    }else{
                       return '<center><label>PENDIENTE</label></center>'; 
                    }   
                
             }},
                 { "data": "fecha_registro"},
                 { "data": "nombre"},
                 { "data": "rut_accidentado" },
                 { "data": "cargo_nombre" },
                 { "data": "area_nombre" },
                 { "data": "nick_registro" },
                 
                      ],
                      "language": {
                        "lengthMenu": "Mostrar _MENU_ Registros por pagina",
                        "zeroRecords": "No se ha encontrado resultados",
                        "info": "Mostrando pagina _PAGE_ de _PAGES_",
                        "infoEmpty": "Sin resultados",
                        "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                        "search": "Buscar",
                     "oPaginate": {
                      "sFirst":    "Primero",
                      "sLast":     "Último",
                      "sNext":     "Siguiente",
                      "sPrevious": "Anterior"
                        },
                      },
                  
                      "order": [], // sin orden de columna

                      "columnDefs": [
                        {
                            //"targets": [ 2],
                            //"visible": false,
                            //"searchable": false
                        }
                    ],
            });

}

tabla_investigaciones();

function abrir_ventana_editar_informe(id_informe,numero){

  trae_datos_informe(id_informe);
  $("#id_informe").val(id_informe);
  $("#ventana_informe").modal('show');
}

function trae_datos_informe(id_informe){


    carga_select_multiple(id_informe);

  
        $.ajax({
                url:'json/json.php?accion=consulta_informe',
                data: {id_informe:id_informe},
                type:'post',
                 dataType: "json", 
                success: function (data)
                {
                  console.log(data.data[0].check_10);


                  $("#nombre_accidentado").html(data.data[0].nombre);
                  $("#rut_accidentado").html(data.data[0].rut_accidentado);
                  $("#cargo_accidentado_label").html(data.data[0].cargo_nombre);
                  $("#area_accidentado_label").html(data.data[0].departamento);
                  $("#gerencia_accidentado_label").html(data.data[0].gerencia);
                  $("#jefe_directo_accidentado_label").html(data.data[0].jefe_directo);
                  $("#edad_accidentado_acc").html(data.data[0].edad_accidentado);
                  $("#antiguedad_empresa_acc").html(data.data[0].antiguedad_accidentado);
                  $("#antiguedad_cargo_acc").html(data.data[0].antiguedad_en_cargo);
                  $("#numero_informe").html('Fecha informe: '+data.data[0].fecha_informe+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Número: '+data.data[0].numero_informe);
                  $("#codigo_informe").html(data.data[0].codigo_documento);
                  $("#fecha_nacimiento_acc").html(data.data[0].fecha_nacimiento);
                  $("#horas_trabajadas_acc").html(data.data[0].horas_trabajadas);
                  $("#jornada_acc").html(data.data[0].jornada);
if(data.data[0].check_1=='false'){document.getElementById('check_1').checked = false;}else{document.getElementById('check_1').checked = true;}
if(data.data[0].check_2=='false'){document.getElementById('check_2').checked = false;}else{document.getElementById('check_2').checked = true;}
if(data.data[0].check_3=='false'){document.getElementById('check_3').checked = false;}else{document.getElementById('check_3').checked = true;}
if(data.data[0].check_4=='false'){document.getElementById('check_4').checked = false;}else{document.getElementById('check_4').checked = true;}
if(data.data[0].check_5=='false'){document.getElementById('check_5').checked = false;}else{document.getElementById('check_5').checked = true;}
if(data.data[0].check_6=='false'){document.getElementById('check_6').checked = false;}else{document.getElementById('check_6').checked = true;}
if(data.data[0].check_7=='false'){document.getElementById('check_7').checked = false;}else{document.getElementById('check_7').checked = true;}
if(data.data[0].check_8=='false'){document.getElementById('check_8').checked = false;}else{document.getElementById('check_8').checked = true;}
if(data.data[0].check_9=='false'){document.getElementById('check_9').checked = false;}else{document.getElementById('check_9').checked = true;}
if(data.data[0].check_10=='false'){document.getElementById('check_10').checked = false;}else{document.getElementById('check_10').checked = true;}
if(data.data[0].check_11=='false'){document.getElementById('check_11').checked = false;}else{document.getElementById('check_11').checked = true;}
if(data.data[0].check_12=='false'){document.getElementById('check_12').checked = false;}else{document.getElementById('check_12').checked = true;}
if(data.data[0].check_13=='false'){document.getElementById('check_13').checked = false;}else{document.getElementById('check_13').checked = true;}
if(data.data[0].check_14=='false'){document.getElementById('check_14').checked = false;}else{document.getElementById('check_14').checked = true;}
if(data.data[0].check_15=='false'){document.getElementById('check_15').checked = false;}else{document.getElementById('check_15').checked = true;}
if(data.data[0].check_16=='false'){document.getElementById('check_16').checked = false;}else{document.getElementById('check_16').checked = true;}
if(data.data[0].check_17=='false'){document.getElementById('check_17').checked = false;}else{document.getElementById('check_17').checked = true;}
if(data.data[0].check_18=='false'){document.getElementById('check_18').checked = false;}else{document.getElementById('check_18').checked = true;}
if(data.data[0].check_19=='false'){document.getElementById('check_19').checked = false;}else{document.getElementById('check_19').checked = true;}
if(data.data[0].check_20=='false'){document.getElementById('check_20').checked = false;}else{document.getElementById('check_20').checked = true;}
if(data.data[0].check_21=='false'){document.getElementById('check_21').checked = false;}else{document.getElementById('check_21').checked = true;}
if(data.data[0].check_22=='false'){document.getElementById('check_22').checked = false;}else{document.getElementById('check_22').checked = true;}
if(data.data[0].check_23=='false'){document.getElementById('check_23').checked = false;}else{document.getElementById('check_23').checked = true;}
if(data.data[0].check_24=='false'){document.getElementById('check_24').checked = false;}else{document.getElementById('check_24').checked = true;}
if(data.data[0].check_25=='false'){document.getElementById('check_25').checked = false;}else{document.getElementById('check_25').checked = true;}
if(data.data[0].check_26=='false'){document.getElementById('check_26').checked = false;}else{document.getElementById('check_26').checked = true;}
if(data.data[0].check_27=='false'){document.getElementById('check_27').checked = false;}else{document.getElementById('check_27').checked = true;}
if(data.data[0].check_28=='false'){document.getElementById('check_28').checked = false;}else{document.getElementById('check_28').checked = true;}
if(data.data[0].check_29=='false'){document.getElementById('check_29').checked = false;}else{document.getElementById('check_29').checked = true;}
if(data.data[0].check_30=='false'){document.getElementById('check_30').checked = false;}else{document.getElementById('check_30').checked = true;}
if(data.data[0].check_31=='false'){document.getElementById('check_31').checked = false;}else{document.getElementById('check_31').checked = true;}
if(data.data[0].check_32=='false'){document.getElementById('check_32').checked = false;}else{document.getElementById('check_32').checked = true;}
if(data.data[0].check_33=='false'){document.getElementById('check_33').checked = false;}else{document.getElementById('check_33').checked = true;}
if(data.data[0].check_34=='false'){document.getElementById('check_34').checked = false;}else{document.getElementById('check_34').checked = true;}
if(data.data[0].check_35=='false'){document.getElementById('check_35').checked = false;}else{document.getElementById('check_35').checked = true;}
if(data.data[0].check_36=='false'){document.getElementById('check_36').checked = false;}else{document.getElementById('check_36').checked = true;}
if(data.data[0].check_37=='false'){document.getElementById('check_37').checked = false;}else{document.getElementById('check_37').checked = true;}
if(data.data[0].check_38=='false'){document.getElementById('check_38').checked = false;}else{document.getElementById('check_38').checked = true;}
if(data.data[0].check_39=='false'){document.getElementById('check_39').checked = false;}else{document.getElementById('check_39').checked = true;}
if(data.data[0].check_40=='false'){document.getElementById('check_40').checked = false;}else{document.getElementById('check_40').checked = true;}
if(data.data[0].check_41=='false'){document.getElementById('check_41').checked = false;}else{document.getElementById('check_41').checked = true;}
if(data.data[0].check_42=='false'){document.getElementById('check_42').checked = false;}else{document.getElementById('check_42').checked = true;}
if(data.data[0].check_43=='false'){document.getElementById('check_43').checked = false;}else{document.getElementById('check_43').checked = true;}
if(data.data[0].check_44=='false'){document.getElementById('check_44').checked = false;}else{document.getElementById('check_44').checked = true;}
if(data.data[0].check_45=='false'){document.getElementById('check_45').checked = false;}else{document.getElementById('check_45').checked = true;}
if(data.data[0].check_46=='false'){document.getElementById('check_46').checked = false;}else{document.getElementById('check_46').checked = true;}
if(data.data[0].check_47=='false'){document.getElementById('check_47').checked = false;}else{document.getElementById('check_47').checked = true;}
if(data.data[0].check_48=='false'){document.getElementById('check_48').checked = false;}else{document.getElementById('check_48').checked = true;}
if(data.data[0].check_49=='false'){document.getElementById('check_49').checked = false;}else{document.getElementById('check_49').checked = true;}
if(data.data[0].check_50=='false'){document.getElementById('check_50').checked = false;}else{document.getElementById('check_50').checked = true;}
if(data.data[0].check_51=='false'){document.getElementById('check_51').checked = false;}else{document.getElementById('check_51').checked = true;}
if(data.data[0].check_52=='false'){document.getElementById('check_52').checked = false;}else{document.getElementById('check_52').checked = true;}
if(data.data[0].check_53=='false'){document.getElementById('check_53').checked = false;}else{document.getElementById('check_53').checked = true;}
if(data.data[0].check_54=='false'){document.getElementById('check_54').checked = false;}else{document.getElementById('check_54').checked = true;}
if(data.data[0].check_55=='false'){document.getElementById('check_55').checked = false;}else{document.getElementById('check_55').checked = true;}
if(data.data[0].check_56=='false'){document.getElementById('check_56').checked = false;}else{document.getElementById('check_56').checked = true;}
if(data.data[0].check_57=='false'){document.getElementById('check_57').checked = false;}else{document.getElementById('check_57').checked = true;}
if(data.data[0].check_58=='false'){document.getElementById('check_58').checked = false;}else{document.getElementById('check_58').checked = true;}
if(data.data[0].check_59=='false'){document.getElementById('check_59').checked = false;}else{document.getElementById('check_59').checked = true;}
if(data.data[0].check_60=='false'){document.getElementById('check_60').checked = false;}else{document.getElementById('check_60').checked = true;}
if(data.data[0].check_61=='false'){document.getElementById('check_61').checked = false;}else{document.getElementById('check_61').checked = true;}
if(data.data[0].check_62=='false'){document.getElementById('check_62').checked = false;}else{document.getElementById('check_62').checked = true;}
if(data.data[0].check_63=='false'){document.getElementById('check_63').checked = false;}else{document.getElementById('check_63').checked = true;}
if(data.data[0].check_64=='false'){document.getElementById('check_64').checked = false;}else{document.getElementById('check_64').checked = true;}
if(data.data[0].check_65=='false'){document.getElementById('check_65').checked = false;}else{document.getElementById('check_65').checked = true;}
if(data.data[0].check_66=='false'){document.getElementById('check_66').checked = false;}else{document.getElementById('check_66').checked = true;}
if(data.data[0].check_67=='false'){document.getElementById('check_67').checked = false;}else{document.getElementById('check_67').checked = true;}
if(data.data[0].check_68=='false'){document.getElementById('check_68').checked = false;}else{document.getElementById('check_68').checked = true;}
if(data.data[0].check_69=='false'){document.getElementById('check_69').checked = false;}else{document.getElementById('check_69').checked = true;}
if(data.data[0].check_70=='false'){document.getElementById('check_70').checked = false;}else{document.getElementById('check_70').checked = true;}
if(data.data[0].check_71=='false'){document.getElementById('check_71').checked = false;}else{document.getElementById('check_71').checked = true;}
if(data.data[0].check_72=='false'){document.getElementById('check_72').checked = false;}else{document.getElementById('check_72').checked = true;}
if(data.data[0].check_73=='false'){document.getElementById('check_73').checked = false;}else{document.getElementById('check_73').checked = true;}
if(data.data[0].check_74=='false'){document.getElementById('check_74').checked = false;}else{document.getElementById('check_74').checked = true;}
if(data.data[0].check_75=='false'){document.getElementById('check_75').checked = false;}else{document.getElementById('check_75').checked = true;}
if(data.data[0].check_76=='false'){document.getElementById('check_76').checked = false;}else{document.getElementById('check_76').checked = true;}
if(data.data[0].check_77=='false'){document.getElementById('check_77').checked = false;}else{document.getElementById('check_77').checked = true;}
if(data.data[0].check_78=='false'){document.getElementById('check_78').checked = false;}else{document.getElementById('check_78').checked = true;}
if(data.data[0].check_79=='false'){document.getElementById('check_79').checked = false;}else{document.getElementById('check_79').checked = true;}
if(data.data[0].check_80=='false'){document.getElementById('check_80').checked = false;}else{document.getElementById('check_80').checked = true;}
if(data.data[0].check_81=='false'){document.getElementById('check_81').checked = false;}else{document.getElementById('check_81').checked = true;}
if(data.data[0].check_82=='false'){document.getElementById('check_82').checked = false;}else{document.getElementById('check_82').checked = true;}
if(data.data[0].check_83=='false'){document.getElementById('check_83').checked = false;}else{document.getElementById('check_83').checked = true;}
if(data.data[0].check_84=='false'){document.getElementById('check_84').checked = false;}else{document.getElementById('check_84').checked = true;}
if(data.data[0].check_85=='false'){document.getElementById('check_85').checked = false;}else{document.getElementById('check_85').checked = true;}
if(data.data[0].check_86=='false'){document.getElementById('check_86').checked = false;}else{document.getElementById('check_86').checked = true;}
if(data.data[0].check_87=='false'){document.getElementById('check_87').checked = false;}else{document.getElementById('check_87').checked = true;}
if(data.data[0].check_88=='false'){document.getElementById('check_88').checked = false;}else{document.getElementById('check_88').checked = true;}
if(data.data[0].check_89=='false'){document.getElementById('check_89').checked = false;}else{document.getElementById('check_89').checked = true;}
if(data.data[0].check_90=='false'){document.getElementById('check_90').checked = false;}else{document.getElementById('check_90').checked = true;}
if(data.data[0].check_91=='false'){document.getElementById('check_91').checked = false;}else{document.getElementById('check_91').checked = true;}
if(data.data[0].check_92=='false'){document.getElementById('check_92').checked = false;}else{document.getElementById('check_92').checked = true;}
if(data.data[0].check_93=='false'){document.getElementById('check_93').checked = false;}else{document.getElementById('check_93').checked = true;}
if(data.data[0].check_94=='false'){document.getElementById('check_94').checked = false;}else{document.getElementById('check_94').checked = true;}
if(data.data[0].check_95=='false'){document.getElementById('check_95').checked = false;}else{document.getElementById('check_95').checked = true;}
if(data.data[0].check_96=='false'){document.getElementById('check_96').checked = false;}else{document.getElementById('check_96').checked = true;}
if(data.data[0].check_97=='false'){document.getElementById('check_97').checked = false;}else{document.getElementById('check_97').checked = true;}
if(data.data[0].check_98=='false'){document.getElementById('check_98').checked = false;}else{document.getElementById('check_98').checked = true;}
if(data.data[0].check_99=='false'){document.getElementById('check_99').checked = false;}else{document.getElementById('check_99').checked = true;}
if(data.data[0].check_100=='false'){document.getElementById('check_100').checked = false;}else{document.getElementById('check_100').checked = true;}
if(data.data[0].check_101=='false'){document.getElementById('check_101').checked = false;}else{document.getElementById('check_101').checked = true;}
if(data.data[0].check_102=='false'){document.getElementById('check_102').checked = false;}else{document.getElementById('check_102').checked = true;}
if(data.data[0].check_103=='false'){document.getElementById('check_103').checked = false;}else{document.getElementById('check_103').checked = true;}
if(data.data[0].check_104=='false'){document.getElementById('check_104').checked = false;}else{document.getElementById('check_104').checked = true;}
if(data.data[0].check_105=='false'){document.getElementById('check_105').checked = false;}else{document.getElementById('check_105').checked = true;}
if(data.data[0].check_106=='false'){document.getElementById('check_106').checked = false;}else{document.getElementById('check_106').checked = true;}
if(data.data[0].check_107=='false'){document.getElementById('check_107').checked = false;}else{document.getElementById('check_107').checked = true;}
if(data.data[0].check_108=='false'){document.getElementById('check_108').checked = false;}else{document.getElementById('check_108').checked = true;}
if(data.data[0].check_109=='false'){document.getElementById('check_109').checked = false;}else{document.getElementById('check_109').checked = true;}
if(data.data[0].check_110=='false'){document.getElementById('check_110').checked = false;}else{document.getElementById('check_110').checked = true;}
if(data.data[0].check_111=='false'){document.getElementById('check_111').checked = false;}else{document.getElementById('check_111').checked = true;}
if(data.data[0].check_112=='false'){document.getElementById('check_112').checked = false;}else{document.getElementById('check_112').checked = true;}
if(data.data[0].check_113=='false'){document.getElementById('check_113').checked = false;}else{document.getElementById('check_113').checked = true;}
if(data.data[0].check_114=='false'){document.getElementById('check_114').checked = false;}else{document.getElementById('check_114').checked = true;}
if(data.data[0].check_115=='false'){document.getElementById('check_115').checked = false;}else{document.getElementById('check_115').checked = true;}
if(data.data[0].check_116=='false'){document.getElementById('check_116').checked = false;}else{document.getElementById('check_116').checked = true;}
if(data.data[0].check_117=='false'){document.getElementById('check_117').checked = false;}else{document.getElementById('check_117').checked = true;}
if(data.data[0].check_118=='false'){document.getElementById('check_118').checked = false;}else{document.getElementById('check_118').checked = true;}
if(data.data[0].check_119=='false'){document.getElementById('check_119').checked = false;}else{document.getElementById('check_119').checked = true;}
if(data.data[0].check_120=='false'){document.getElementById('check_120').checked = false;}else{document.getElementById('check_120').checked = true;}
if(data.data[0].check_121=='false'){document.getElementById('check_121').checked = false;}else{document.getElementById('check_121').checked = true;}
if(data.data[0].check_122=='false'){document.getElementById('check_122').checked = false;}else{document.getElementById('check_122').checked = true;}
if(data.data[0].check_123=='false'){document.getElementById('check_123').checked = false;}else{document.getElementById('check_123').checked = true;}
if(data.data[0].check_124=='false'){document.getElementById('check_124').checked = false;}else{document.getElementById('check_124').checked = true;}
if(data.data[0].check_125=='false'){document.getElementById('check_125').checked = false;}else{document.getElementById('check_125').checked = true;}
if(data.data[0].check_126=='false'){document.getElementById('check_126').checked = false;}else{document.getElementById('check_126').checked = true;}
if(data.data[0].check_127=='false'){document.getElementById('check_127').checked = false;}else{document.getElementById('check_127').checked = true;}
if(data.data[0].check_128=='false'){document.getElementById('check_128').checked = false;}else{document.getElementById('check_128').checked = true;}
if(data.data[0].check_129=='false'){document.getElementById('check_129').checked = false;}else{document.getElementById('check_129').checked = true;}
if(data.data[0].check_130=='false'){document.getElementById('check_130').checked = false;}else{document.getElementById('check_130').checked = true;}
if(data.data[0].check_131=='false'){document.getElementById('check_131').checked = false;}else{document.getElementById('check_131').checked = true;}
if(data.data[0].check_132=='false'){document.getElementById('check_132').checked = false;}else{document.getElementById('check_132').checked = true;}
if(data.data[0].check_133=='false'){document.getElementById('check_133').checked = false;}else{document.getElementById('check_133').checked = true;}
if(data.data[0].check_134=='false'){document.getElementById('check_134').checked = false;}else{document.getElementById('check_134').checked = true;}
if(data.data[0].check_135=='false'){document.getElementById('check_135').checked = false;}else{document.getElementById('check_135').checked = true;}
if(data.data[0].check_136=='false'){document.getElementById('check_136').checked = false;}else{document.getElementById('check_136').checked = true;}
if(data.data[0].check_137=='false'){document.getElementById('check_137').checked = false;}else{document.getElementById('check_137').checked = true;}
if(data.data[0].check_138=='false'){document.getElementById('check_138').checked = false;}else{document.getElementById('check_138').checked = true;}
if(data.data[0].check_139=='false'){document.getElementById('check_139').checked = false;}else{document.getElementById('check_139').checked = true;}
if(data.data[0].check_140=='false'){document.getElementById('check_140').checked = false;}else{document.getElementById('check_140').checked = true;}
if(data.data[0].check_141=='false'){document.getElementById('check_141').checked = false;}else{document.getElementById('check_141').checked = true;}
if(data.data[0].check_142=='false'){document.getElementById('check_142').checked = false;}else{document.getElementById('check_142').checked = true;}
if(data.data[0].check_143=='false'){document.getElementById('check_143').checked = false;}else{document.getElementById('check_143').checked = true;}
if(data.data[0].check_144=='false'){document.getElementById('check_144').checked = false;}else{document.getElementById('check_144').checked = true;}
if(data.data[0].check_145=='false'){document.getElementById('check_145').checked = false;}else{document.getElementById('check_145').checked = true;}
if(data.data[0].check_146=='false'){document.getElementById('check_146').checked = false;}else{document.getElementById('check_146').checked = true;}
if(data.data[0].check_147=='false'){document.getElementById('check_147').checked = false;}else{document.getElementById('check_147').checked = true;}
if(data.data[0].check_148=='false'){document.getElementById('check_148').checked = false;}else{document.getElementById('check_148').checked = true;}
if(data.data[0].check_149=='false'){document.getElementById('check_149').checked = false;}else{document.getElementById('check_149').checked = true;}
if(data.data[0].check_150=='false'){document.getElementById('check_150').checked = false;}else{document.getElementById('check_150').checked = true;}
if(data.data[0].check_151=='false'){document.getElementById('check_151').checked = false;}else{document.getElementById('check_151').checked = true;}
if(data.data[0].check_152=='false'){document.getElementById('check_152').checked = false;}else{document.getElementById('check_152').checked = true;}
if(data.data[0].check_153=='false'){document.getElementById('check_153').checked = false;}else{document.getElementById('check_153').checked = true;}
if(data.data[0].check_154=='false'){document.getElementById('check_154').checked = false;}else{document.getElementById('check_154').checked = true;}
if(data.data[0].check_155=='false'){document.getElementById('check_155').checked = false;}else{document.getElementById('check_155').checked = true;}
if(data.data[0].check_156=='false'){document.getElementById('check_156').checked = false;}else{document.getElementById('check_156').checked = true;}
if(data.data[0].check_157=='false'){document.getElementById('check_157').checked = false;}else{document.getElementById('check_157').checked = true;}
if(data.data[0].check_158=='false'){document.getElementById('check_158').checked = false;}else{document.getElementById('check_158').checked = true;}
if(data.data[0].check_159=='false'){document.getElementById('check_159').checked = false;}else{document.getElementById('check_159').checked = true;}
if(data.data[0].check_160=='false'){document.getElementById('check_160').checked = false;}else{document.getElementById('check_160').checked = true;}
if(data.data[0].check_161=='false'){document.getElementById('check_161').checked = false;}else{document.getElementById('check_161').checked = true;}
if(data.data[0].check_167=='false'){document.getElementById('check_167').checked = false;}else{document.getElementById('check_167').checked = true;}
if(data.data[0].check_168=='false'){document.getElementById('check_168').checked = false;}else{document.getElementById('check_168').checked = true;}
if(data.data[0].check_169=='false'){document.getElementById('check_169').checked = false;}else{document.getElementById('check_169').checked = true;}
if(data.data[0].check_170=='false'){document.getElementById('check_170').checked = false;}else{document.getElementById('check_170').checked = true;}
if(data.data[0].check_171=='false'){document.getElementById('check_171').checked = false;}else{document.getElementById('check_171').checked = true;}
if(data.data[0].check_172=='false'){document.getElementById('check_172').checked = false;}else{document.getElementById('check_172').checked = true;}
if(data.data[0].check_173=='false'){document.getElementById('check_173').checked = false;}else{document.getElementById('check_173').checked = true;}
if(data.data[0].check_174=='false'){document.getElementById('check_174').checked = false;}else{document.getElementById('check_174').checked = true;}
if(data.data[0].check_175=='false'){document.getElementById('check_175').checked = false;}else{document.getElementById('check_175').checked = true;}
if(data.data[0].check_176=='false'){document.getElementById('check_176').checked = false;}else{document.getElementById('check_176').checked = true;}
if(data.data[0].check_177=='false'){document.getElementById('check_177').checked = false;}else{document.getElementById('check_177').checked = true;}
if(data.data[0].check_178=='false'){document.getElementById('check_178').checked = false;}else{document.getElementById('check_178').checked = true;}
if(data.data[0].check_179=='false'){document.getElementById('check_179').checked = false;}else{document.getElementById('check_179').checked = true;}
if(data.data[0].check_180=='false'){document.getElementById('check_180').checked = false;}else{document.getElementById('check_180').checked = true;}
if(data.data[0].check_181=='false'){document.getElementById('check_181').checked = false;}else{document.getElementById('check_181').checked = true;}
if(data.data[0].check_182=='false'){document.getElementById('check_182').checked = false;}else{document.getElementById('check_182').checked = true;}
if(data.data[0].check_183=='false'){document.getElementById('check_183').checked = false;}else{document.getElementById('check_183').checked = true;}
if(data.data[0].check_184=='false'){document.getElementById('check_184').checked = false;}else{document.getElementById('check_184').checked = true;}
if(data.data[0].check_185=='false'){document.getElementById('check_185').checked = false;}else{document.getElementById('check_185').checked = true;}
if(data.data[0].check_186=='false'){document.getElementById('check_186').checked = false;}else{document.getElementById('check_186').checked = true;}
if(data.data[0].check_187=='false'){document.getElementById('check_187').checked = false;}else{document.getElementById('check_187').checked = true;}
if(data.data[0].check_188=='false'){document.getElementById('check_188').checked = false;}else{document.getElementById('check_188').checked = true;}
if(data.data[0].check_189=='false'){document.getElementById('check_189').checked = false;}else{document.getElementById('check_189').checked = true;}
if(data.data[0].check_190=='false'){document.getElementById('check_190').checked = false;}else{document.getElementById('check_190').checked = true;}
if(data.data[0].check_191=='false'){document.getElementById('check_191').checked = false;}else{document.getElementById('check_191').checked = true;}
if(data.data[0].check_192=='false'){document.getElementById('check_192').checked = false;}else{document.getElementById('check_192').checked = true;}
if(data.data[0].check_193=='false'){document.getElementById('check_193').checked = false;}else{document.getElementById('check_193').checked = true;}
if(data.data[0].check_194=='false'){document.getElementById('check_194').checked = false;}else{document.getElementById('check_194').checked = true;}
if(data.data[0].check_195=='false'){document.getElementById('check_195').checked = false;}else{document.getElementById('check_195').checked = true;}
if(data.data[0].check_196=='false'){document.getElementById('check_196').checked = false;}else{document.getElementById('check_196').checked = true;}
if(data.data[0].check_197=='false'){document.getElementById('check_197').checked = false;}else{document.getElementById('check_197').checked = true;}
if(data.data[0].check_198=='false'){document.getElementById('check_198').checked = false;}else{document.getElementById('check_198').checked = true;}
if(data.data[0].check_199=='false'){document.getElementById('check_199').checked = false;}else{document.getElementById('check_199').checked = true;}
if(data.data[0].check_200=='false'){document.getElementById('check_200').checked = false;}else{document.getElementById('check_200').checked = true;}
if(data.data[0].check_201=='false'){document.getElementById('check_201').checked = false;}else{document.getElementById('check_201').checked = true;}
if(data.data[0].check_202=='false'){document.getElementById('check_202').checked = false;}else{document.getElementById('check_202').checked = true;}
if(data.data[0].check_203=='false'){document.getElementById('check_203').checked = false;}else{document.getElementById('check_203').checked = true;}
if(data.data[0].check_204=='false'){document.getElementById('check_204').checked = false;}else{document.getElementById('check_204').checked = true;}
if(data.data[0].check_205=='false'){document.getElementById('check_205').checked = false;}else{document.getElementById('check_205').checked = true;}
if(data.data[0].check_206=='false'){document.getElementById('check_206').checked = false;}else{document.getElementById('check_206').checked = true;}
if(data.data[0].check_207=='false'){document.getElementById('check_207').checked = false;}else{document.getElementById('check_207').checked = true;}
if(data.data[0].check_208=='false'){document.getElementById('check_208').checked = false;}else{document.getElementById('check_208').checked = true;}
if(data.data[0].check_209=='false'){document.getElementById('check_209').checked = false;}else{document.getElementById('check_209').checked = true;}
if(data.data[0].check_210=='false'){document.getElementById('check_210').checked = false;}else{document.getElementById('check_210').checked = true;}
if(data.data[0].check_211=='false'){document.getElementById('check_211').checked = false;}else{document.getElementById('check_211').checked = true;}
if(data.data[0].check_212=='false'){document.getElementById('check_212').checked = false;}else{document.getElementById('check_212').checked = true;}
if(data.data[0].check_213=='false'){document.getElementById('check_213').checked = false;}else{document.getElementById('check_213').checked = true;}
if(data.data[0].check_214=='false'){document.getElementById('check_214').checked = false;}else{document.getElementById('check_214').checked = true;}
if(data.data[0].check_215=='false'){document.getElementById('check_215').checked = false;}else{document.getElementById('check_215').checked = true;}
if(data.data[0].check_216=='false'){document.getElementById('check_216').checked = false;}else{document.getElementById('check_216').checked = true;}
if(data.data[0].check_217=='false'){document.getElementById('check_217').checked = false;}else{document.getElementById('check_217').checked = true;}
if(data.data[0].check_218=='false'){document.getElementById('check_218').checked = false;}else{document.getElementById('check_218').checked = true;}
if(data.data[0].check_219=='false'){document.getElementById('check_219').checked = false;}else{document.getElementById('check_219').checked = true;}
if(data.data[0].check_220=='false'){document.getElementById('check_220').checked = false;}else{document.getElementById('check_220').checked = true;}
if(data.data[0].check_221=='false'){document.getElementById('check_221').checked = false;}else{document.getElementById('check_221').checked = true;}
if(data.data[0].check_222=='false'){document.getElementById('check_222').checked = false;}else{document.getElementById('check_222').checked = true;}
if(data.data[0].check_223=='false'){document.getElementById('check_223').checked = false;}else{document.getElementById('check_223').checked = true;}
if(data.data[0].check_224=='false'){document.getElementById('check_224').checked = false;}else{document.getElementById('check_224').checked = true;}
if(data.data[0].check_225=='false'){document.getElementById('check_225').checked = false;}else{document.getElementById('check_225').checked = true;}
if(data.data[0].check_226=='false'){document.getElementById('check_226').checked = false;}else{document.getElementById('check_226').checked = true;}
if(data.data[0].check_227=='false'){document.getElementById('check_227').checked = false;}else{document.getElementById('check_227').checked = true;}
if(data.data[0].check_228=='false'){document.getElementById('check_228').checked = false;}else{document.getElementById('check_228').checked = true;}
if(data.data[0].check_229=='false'){document.getElementById('check_229').checked = false;}else{document.getElementById('check_229').checked = true;}
if(data.data[0].check_230=='false'){document.getElementById('check_230').checked = false;}else{document.getElementById('check_230').checked = true;}
if(data.data[0].check_231=='false'){document.getElementById('check_231').checked = false;}else{document.getElementById('check_231').checked = true;}
if(data.data[0].check_232=='false'){document.getElementById('check_232').checked = false;}else{document.getElementById('check_232').checked = true;}
if(data.data[0].check_233=='false'){document.getElementById('check_233').checked = false;}else{document.getElementById('check_233').checked = true;}
if(data.data[0].check_234=='false'){document.getElementById('check_234').checked = false;}else{document.getElementById('check_234').checked = true;}
if(data.data[0].check_235=='false'){document.getElementById('check_235').checked = false;}else{document.getElementById('check_235').checked = true;}
if(data.data[0].check_236=='false'){document.getElementById('check_236').checked = false;}else{document.getElementById('check_236').checked = true;}
if(data.data[0].check_237=='false'){document.getElementById('check_237').checked = false;}else{document.getElementById('check_237').checked = true;}
if(data.data[0].check_238=='false'){document.getElementById('check_238').checked = false;}else{document.getElementById('check_238').checked = true;}
if(data.data[0].check_239=='false'){document.getElementById('check_239').checked = false;}else{document.getElementById('check_239').checked = true;}
if(data.data[0].check_240=='false'){document.getElementById('check_240').checked = false;}else{document.getElementById('check_240').checked = true;}
if(data.data[0].check_241=='false'){document.getElementById('check_241').checked = false;}else{document.getElementById('check_241').checked = true;}
if(data.data[0].check_242=='false'){document.getElementById('check_242').checked = false;}else{document.getElementById('check_242').checked = true;}
if(data.data[0].check_243=='false'){document.getElementById('check_243').checked = false;}else{document.getElementById('check_243').checked = true;}
if(data.data[0].check_244=='false'){document.getElementById('check_244').checked = false;}else{document.getElementById('check_244').checked = true;}
if(data.data[0].check_245=='false'){document.getElementById('check_245').checked = false;}else{document.getElementById('check_245').checked = true;}
if(data.data[0].check_246=='false'){document.getElementById('check_246').checked = false;}else{document.getElementById('check_246').checked = true;}
if(data.data[0].check_247=='false'){document.getElementById('check_247').checked = false;}else{document.getElementById('check_247').checked = true;}
if(data.data[0].check_248=='false'){document.getElementById('check_248').checked = false;}else{document.getElementById('check_248').checked = true;}
if(data.data[0].check_249=='false'){document.getElementById('check_249').checked = false;}else{document.getElementById('check_249').checked = true;}
if(data.data[0].check_250=='false'){document.getElementById('check_250').checked = false;}else{document.getElementById('check_250').checked = true;}
if(data.data[0].check_251=='false'){document.getElementById('check_251').checked = false;}else{document.getElementById('check_251').checked = true;}
if(data.data[0].check_252=='false'){document.getElementById('check_252').checked = false;}else{document.getElementById('check_252').checked = true;}
if(data.data[0].check_253=='false'){document.getElementById('check_253').checked = false;}else{document.getElementById('check_253').checked = true;}
if(data.data[0].check_254=='false'){document.getElementById('check_254').checked = false;}else{document.getElementById('check_254').checked = true;}
if(data.data[0].check_255=='false'){document.getElementById('check_255').checked = false;}else{document.getElementById('check_255').checked = true;}
if(data.data[0].check_256=='false'){document.getElementById('check_256').checked = false;}else{document.getElementById('check_256').checked = true;}
if(data.data[0].check_257=='false'){document.getElementById('check_257').checked = false;}else{document.getElementById('check_257').checked = true;}
if(data.data[0].check_258=='false'){document.getElementById('check_258').checked = false;}else{document.getElementById('check_258').checked = true;}
if(data.data[0].check_259=='false'){document.getElementById('check_259').checked = false;}else{document.getElementById('check_259').checked = true;}
if(data.data[0].check_260=='false'){document.getElementById('check_260').checked = false;}else{document.getElementById('check_260').checked = true;}
if(data.data[0].check_261=='false'){document.getElementById('check_261').checked = false;}else{document.getElementById('check_261').checked = true;}
if(data.data[0].check_262=='false'){document.getElementById('check_262').checked = false;}else{document.getElementById('check_262').checked = true;}
if(data.data[0].check_263=='false'){document.getElementById('check_263').checked = false;}else{document.getElementById('check_263').checked = true;}
if(data.data[0].check_264=='false'){document.getElementById('check_264').checked = false;}else{document.getElementById('check_264').checked = true;}
if(data.data[0].check_265=='false'){document.getElementById('check_265').checked = false;}else{document.getElementById('check_265').checked = true;}




                 if(data.data[0].tipo!=''){

                    var value =data.data[0].tipo.replace(' ','_');

                    $("#accidente_tipo").html('<option value="'+value+'" selected hidden >'+data.data[0].tipo+'</option><option value="ACCIDENTE_DEL_TRABAJO" >ACCIDENTE DEL TRABAJO</option><option value="ACCIDENTE_DEL_TRAYECTO">ACCIDENTE DEL TRAYECTO</option><option value="ENFERMEDAD_PROFESIONAL">ENFERMEDAD PROFESIONAL</option><option value="CUASI-ACCIDENT">CUASI-ACCIDENTE</option');

                  }else{

                    $("#accidente_tipo").html('<option value="" selected hidden >Seleccione Tipo....</option><option value="ACCIDENTE_DEL_TRABAJO">ACCIDENTE DEL TRABAJO</option><option value="ACCIDENTE_DEL_TRAYECTO">ACCIDENTE DEL TRAYECTO</option><option value="ENFERMEDAD_PROFESIONAL">ENFERMEDAD PROFESIONAL</option><option value="CUASI-ACCIDENT">CUASI-ACCIDENTE</option');

                  }

                  
       
                    if(data.data[0].danio_equipo=='false'){document.getElementById("check_equipo").checked = false;}else{document.getElementById("check_equipo").checked = true;}
                    if(data.data[0].danio_material=='false'){document.getElementById("check_material").checked = false;}else{document.getElementById("check_material").checked = true;}
                    if(data.data[0].danio_ambiente=='false'){document.getElementById("check_ambiente").checked = false;}else{document.getElementById("check_ambiente").checked = true;}
                    if(data.data[0].danio_personas=='false'){document.getElementById("check_personas").checked = false;}else{document.getElementById("check_personas").checked = true;}
                    if(data.data[0].otros_danios=='false'){document.getElementById("check_otros").checked = false;}else{document.getElementById("check_otros").checked = true;}


                    $("#especificacion_otros").val(data.data[0].especifica_otros_danios);
                    $("#equipo_involucrado").val(data.data[0].especifica_otro_equipo);
                    $("#actividad_que_realizaba").val(data.data[0].actividad_realizada);

                    $("#fecha_accidente").val(data.data[0].fecha_accidente);
                    $("#hora_accidente").val(data.data[0].hora_accidente);
                    if(data.data[0].actividad_rutinaria=='false'){document.getElementById("check_rutinaria").checked = false;}else{document.getElementById("check_rutinaria").checked = true;}
                    if(data.data[0].actividad_planificada=='false'){document.getElementById("check_planificada").checked = false;}else{document.getElementById("check_planificada").checked = true;}
                    if(data.data[0].actividad_no_planificada=='false'){document.getElementById("check_no_planificada").checked = false;}else{document.getElementById("check_no_planificada").checked = true;}


                    var relato_aux =data.data[0].relato_accidente;
                    var relato_final=relato_aux.replace(/<br>/g,"\n");
                    $("#relato").val(relato_final);




                    $("#parte_lesionada").val(data.data[0].parte_cuerpo_lesiona);
                    $("#elemento_provoca_lesion").val(data.data[0].elemento_provoca_lesion);
                    $("#fuente").val(data.data[0].fuente);
                    $("#lugar_del_accidente").val(data.data[0].lugar_exacto_accidente);
                     var id_tipo_accidente = data.data[0].id_tipo_accidente;
                     var tipo_accidente = data.data[0].tipo_accidente;


                    carga_tipo_accidentes(id_tipo_accidente,tipo_accidente);
                    carga_listado_medidas_de_control(id_informe);
                    carga_listado_plan_de_accion(id_informe);
                    carga_firmas_del_informe(id_informe);
                    carga_galeria_adjuntos();
                    carga_analisis_causal();


                  
                }
         });

}

function carga_tipo_accidentes(id_tipo_accidente, tipo_de_accidente){



    if(id_tipo_accidente=='' || id_tipo_accidente=='0'){
         
         $("#tipo_accidente").html('<option value="">Seleccione...</option>');
     }else{
         $("#tipo_accidente").html('<option value="'+id_tipo_accidente+'">'+tipo_de_accidente+'</option>');
     }

  
        $.ajax({
                url:'json/json.php?accion=carga_tipo_accidentes',
                data: {},
                type:'post',
                 dataType: "json", 
                success: function (json_jax)
                {

                    for (var i = 0; i < json_jax.data.length; i++) {
                                $('#tipo_accidente').append('<option value="' +json_jax.data[i].id_tipo_accidente+ '">'+json_jax.data[i].tipo_accidente+'</option>');
                                
                        }

                }
         });

}


