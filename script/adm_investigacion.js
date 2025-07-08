


function exportar_pdf(){

    var id_informe=$("#id_informe").val(); 

       window.open("tcpdf/pdf.php?id_informe="+id_informe,"","top=10,left=300,width=700,height=600");


}


function elimina_req_sistema(id_req_sistema,id_informe){

  confirmar=confirm("Realmente desea 'ELIMINAR EL REQ. DEL SISTEMA''"); 
      if (confirmar) {

                $.ajax({
                        url:'json/json.php?accion=elimina_req_sistema',
                        data: {id_informe:id_informe,
                                id_req_sistema:id_req_sistema},
                        type:'post',
                         dataType: "json", 
                        success: function (data)
                        {

                             carga_analisis_causal();
                          
                        }
                 });

      }
        
}



function elimina_causa_basica(id_causas_basicas,id_informe){

  confirmar=confirm("Realmente desea ''ELIMINAR LA CAUSA BÁSICA'', con ello se eliminara todo lo asociado a este item (Los Req de Sistemas)"); 
      if (confirmar) {

                $.ajax({
                        url:'json/json.php?accion=elimina_causa_basica',
                        data: {id_informe:id_informe,
                                id_causas_basicas:id_causas_basicas},
                        type:'post',
                         dataType: "json", 
                        success: function (data)
                        {

                             carga_analisis_causal();
                          
                        }
                 });

      }
        
}




function elimina_causa_inmediata(id_causas_inmediatas,id_informe){

  confirmar=confirm("Realmente desea ''ELIMINAR LA CAUSA INMEDIATA'', con ello se eliminara todo lo asociado a este item (causas básicas, etc...)"); 
      if (confirmar) {

                $.ajax({
                        url:'json/json.php?accion=elimina_causa_inmediata',
                        data: {id_informe:id_informe,
                                id_causas_inmediatas:id_causas_inmediatas},
                        type:'post',
                         dataType: "json", 
                        success: function (data)
                        {

                             carga_analisis_causal();
                          
                        }
                 });

      }
        
}



function elimina_incidente(id_incidente,id_informe){

  confirmar=confirm("Realmente desea'' ELIMINAR EL INCIDENTE'', con ello se eliminara todo lo asociado a este item (causas inmediatas, etc...)"); 
      if (confirmar) {


                $.ajax({
                        url:'json/json.php?accion=elimina_incidente',
                        data: {id_informe:id_informe,
                                id_incidente:id_incidente},
                        type:'post',
                         dataType: "json", 
                        success: function (data)
                        {

                             carga_analisis_causal();
                          
                        }
                 });

             
      }
        
}


function confirma_nuevo_tipo_accidente(){


    var nuevo_tipo_accidente=$("#nueva_tipo_accidente").val(); 

     if(nuevo_tipo_accidente==''){

        alert('Error, debe ingrear una descripción.');
        document.getElementById("nueva_tipo_accidente").focus(); 

     }else{

              $.ajax({
              url:'json/json.php?accion=nuevo_tipo_accidente',
              data:{nuevo_tipo_accidente:nuevo_tipo_accidente},
              type:'post',
              dataType: "json", 
              success: function (json_jax)
                {

                    var id_tipo_accidente='0';
                    var tipo_de_accidente='';

                    carga_tipo_accidentes(id_tipo_accidente, tipo_de_accidente);
                    $('#ventana_tipo_accidente').modal('hide');

                }
            });

    }
}


function confirma_nueva_parte_lesionada(){


    var nueva_parte_lesionada=$("#nueva_parte_lesionada").val(); 
    var id_informe=$("#id_informe").val();

     if(nueva_parte_lesionada==''){

        alert('Error, debe ingrear una descripción.');
        document.getElementById("nueva_parte_lesionada").focus(); 

     }else{

              $.ajax({
              url:'json/json.php?accion=nueva_parte_lesionada',
              data:{nueva_parte_lesionada:nueva_parte_lesionada},
              type:'post',
              dataType: "json", 
              success: function (json_jax)
                {
                    /*
                    var id_tipo_accidente='0';
                    var tipo_de_accidente='';

                    carga_tipo_accidentes(id_tipo_accidente, tipo_de_accidente);

                    */

                    carga_select_multiple(id_informe);
                    $('#ventana_partes_lesionadas').modal('hide');

                }
            });

    }
}



function agregar_incidente(){

    var id_informe=$("#id_informe").val(); 
    var id_danio=$("#id_danio_ingreso").val(); 
    var id_incidente=$("#id_incidente_ingreso").val(); 
    var id_causa_inmediata=$("#id_causa_inmediata_ingreso").val(); 
    var id_causa_basica=$("#id_causa_basica_ingreso").val(); 
    var accion_ingreso=$("#accion_ingreso").val(); 
    var nuevo_incidente=$("#nuevo_incidente").val();  

     if(nuevo_incidente==''){

        alert('Error, debe ingrear un incidente.');
        document.getElementById("nuevo_incidente").focus(); 

     }else{


        if(accion_ingreso=='ingresar_incidente'){

              $.ajax({
              url:'json/json.php?accion=agregar_incidente',
              data:{id_informe:id_informe,
                    id_danio:id_danio,
                    nuevo_incidente:nuevo_incidente},
              type:'post',
              dataType: "json", 
              success: function (json_jax)
                {

                    carga_analisis_causal();
                    $("#nuevo_incidente").val(''); 
                    $('#ventana_agrega_un_incidente').modal('hide');

                }
            });

        }else if(accion_ingreso=='ingresar_causas_inmediatas'){

            $.ajax({
              url:'json/json.php?accion=agregar_causa_inmediata',
              data:{id_informe:id_informe,
                    id_danio:id_danio,
                    id_incidente:id_incidente,
                    nuevo_incidente:nuevo_incidente},
              type:'post',
              dataType: "json", 
              success: function (json_jax)
                {

                    carga_analisis_causal();
                    $("#nuevo_incidente").val(''); 
                    $('#ventana_agrega_un_incidente').modal('hide');

                }
            });



        }else if(accion_ingreso=='ingresar_causas_basicas'){

             $.ajax({
              url:'json/json.php?accion=agregar_causa_basicas',
              data:{id_informe:id_informe,
                    id_danio:id_danio,
                    id_incidente:id_incidente,
                    id_causa_inmediata:id_causa_inmediata,
                    nuevo_incidente:nuevo_incidente},
              type:'post',
              dataType: "json", 
              success: function (json_jax)
                {

                    carga_analisis_causal();
                    $("#nuevo_incidente").val(''); 
                    $('#ventana_agrega_un_incidente').modal('hide');

                }
            });




        }else if(accion_ingreso=='ingresar_req_del_sistema'){


                 $.ajax({
                  url:'json/json.php?accion=agregar_req_del_sistema',
                  data:{id_informe:id_informe,
                        id_danio:id_danio,
                        id_incidente:id_incidente,
                        id_causa_inmediata:id_causa_inmediata,
                        id_causa_basica:id_causa_basica,
                        nuevo_incidente:nuevo_incidente},
                  type:'post',
                  dataType: "json", 
                  success: function (json_jax)
                    {

                        carga_analisis_causal();
                        $("#nuevo_incidente").val(''); 
                        $('#ventana_agrega_un_incidente').modal('hide');

                    }
                });



        }

       

     }
        
}




function abre_ventana_agregar_incidente(id_danio,id_incidente,id_causas_inmediatas,id_causas_basicas,descripocion_danio,accion){

    $("#id_danio_ingreso").val(id_danio); 
    $("#id_incidente_ingreso").val(id_incidente); 
    $("#id_causa_inmediata_ingreso").val(id_causas_inmediatas); 
    $("#id_causa_basica_ingreso").val(id_causas_basicas); 
    $("#accion_ingreso").val(accion); 

    if(accion=='ingresar_incidente'){
        $("#descripcion_del_danio").html('DAÑO: '+descripocion_danio+'<br>');
        $("#titulo_ventana").html('AGREGAR UN INCIDENTE');
        $("#enunciado_input").html('AGREGAR DESCRIPCION DE UN INCIDENTE ');
        $("#ventana_agrega_un_incidente").modal('show');
    }
    if(accion=='ingresar_causas_inmediatas'){
        $("#descripcion_del_danio").html('INCIDENTE: '+descripocion_danio+'<br>');
        $("#titulo_ventana").html('AGREGAR UNA CAUSA INMEDIATA');
        $("#enunciado_input").html('AGREGAR DESCRIPCIÓN DE UNA CAUSA INMEDIATA');
        $("#ventana_agrega_un_incidente").modal('show');
    }


    if(accion=='ingresar_causas_basicas'){
        $("#descripcion_del_danio").html('CAUSA INMEDIATA: '+descripocion_danio+'<br>');
        $("#titulo_ventana").html('AGREGAR UNA CAUSA BÁSICA');
        $("#enunciado_input").html('AGREGAR DESCRIPCIÓN DE UNA CAUSA BÁSICA');
        $("#ventana_agrega_un_incidente").modal('show');
    }

    if(accion=='ingresar_req_del_sistema'){
        $("#descripcion_del_danio").html('CAUSA BÁSICA: '+descripocion_danio+'<br>');
        $("#titulo_ventana").html('AGREGAR UN REQ DEL SISTEMA');
        $("#enunciado_input").html('AGREGAR DESCRIPCIÓN PARA UN REQ DEL SISTEMA');
        $("#ventana_agrega_un_incidente").modal('show');
    }
    
    
    


    
        
}




function elimina_danio(id_danio,id_informe){

  confirmar=confirm("Realmente desea ELIMINAR el daño, con ello se eliminara todo lo asociado a este item (incidente, causas inmediatas, etc...)"); 
      if (confirmar) {


                $.ajax({
                        url:'json/json.php?accion=elimina_danio',
                        data: {id_informe:id_informe,
                                id_danio:id_danio},
                        type:'post',
                         dataType: "json", 
                        success: function (data)
                        {

                             carga_analisis_causal();
                          
                        }
                 });

             
      }
        
}


function agrega_danio(){

    var id_informe=$("#id_informe").val(); 
     var danio=$("#danio").val();  


     if(danio==''){

        alert('Error, debe ingrear un daño.');
        document.getElementById("danio").focus(); 

     } else{

         $.ajax({
              url:'json/json.php?accion=agrega_danio',
              data:{id_informe:id_informe,
                    danio:danio},
              type:'post',
              dataType: "json", 
              success: function (json_jax)
                {

                    carga_analisis_causal();

                }
            });

     }
        
}




function carga_analisis_causal(){

    var id_informe=$("#id_informe").val();  
    var tabla_incidentes=''; 
    var td_incidentes='';

    $("#grid_analisia_causal").html(''); 

 
        $.ajax({
              url:'json/json.php?accion=carga_analisis_causal_danios',
              data:{id_informe:id_informe},
              type:'post',
              success: function (json_jax)
                {

                    $("#grid_analisia_causal").html(json_jax);

                  //  console.log(json_jax);
                    

                }
            });
        
}





function eliminar_adjunto(id_ruta){

    var id_informe=$("#id_informe").val();   


        $.ajax({
              url:'json/json.php?accion=eliminar_adjunto',
              data:{id_informe:id_informe,
              id_ruta:id_ruta},
              type:'post',
              dataType: "json", 
              success: function (json_jax)
                {
          
                    carga_galeria_adjuntos();
                   

                }
            });

        
}




function carga_galeria_adjuntos(){

    var id_informe=$("#id_informe").val();   

    $("#galeria_adjuntos").html(''); 


        $.ajax({
              url:'json/json.php?accion=carga_galeria_adjuntos',
              data:{id_informe:id_informe},
              type:'post',
              dataType: "json", 
              success: function (json_jax)
                {
          
                    for (var i = 0; i < json_jax.length; i++) {

                        var boton_firma_aprobador="<div class='d-grid gap-2'><button class='btn btn-danger'  type='button' title='Eliminar Archivo' onclick='eliminar_adjunto("+json_jax[i].id_ruta+")' class='a'>X</button></div>";

                        if(json_jax[i].tipo_adjunto=='imagen'){
                            var imagen= json_jax[i].ruta_documento;
                        }else if(json_jax[i].tipo_adjunto=='video'){
                            var imagen='video.PNG';
                        }else{
                            var imagen='documento.jpg';
                        }

             
                        $("#galeria_adjuntos").append("<tr><td style='text-align:center'><img src='adjuntos/"+imagen+"' onclick='ver_archivo("+json_jax[i].id_ruta+")' style='max-width: 100px;'></td><td>"+json_jax[i].ruta_documento+"</td><td style='text-align:center'>"+boton_firma_aprobador+"</td></tr>");


                    }

                   

                }
            });

        
}


function ver_archivo(id_ruta){

    var id_informe=$("#id_informe").val();   

    $("#div_galeria").html(''); 


        $.ajax({
              url:'json/json.php?accion=ver_archivo',
              data:{id_ruta:id_ruta, 
                    id_informe:id_informe},
              type:'post',
              dataType: "json", 
              success: function (json_jax)
                {
          
                    for (var i = 0; i < json_jax.data.length; i++) {

                        if(json_jax.data[i].tipo_adjunto=='imagen'){

                          $("#div_galeria").append('<figure class="col-lg-12"><img alt="picture" width="100%" src="adjuntos/'+json_jax.data[i].ruta_documento+'" class="img-fluid"></figure></br></br>'); 


                           $('#modal_galeria_fotos').modal('show');
                        }else{

                             // Abrir nuevo tab
                                    var win = window.open('adjuntos/'+json_jax.data[i].ruta_documento, '_blank');
                                    // Cambiar el foco al nuevo tab (punto opcional)
                                    win.focus();

                        }
                    }

                   

                }
            });

        
}



function guardar_adjunto(adjunto,numero_arreglo,total_arreglo){

   var id_informe=$("#id_informe").val();  
   var adj_tipo_adjunto=$("#adj_tipo_adjunto").val();      

    $.ajax({
    url:'json/json.php?accion=guardar_adjunto',
    data:{
    id_informe: id_informe,
    adj_tipo_adjunto: adj_tipo_adjunto,
    ruta      : adjunto
        },
    type: "POST",
    contentType: "application/x-www-form-urlencoded",
    dataType: "json",
    success: function(data){
        if(data != null && $.isArray(data)){
            $.each(data, function(index, value){    


            carga_galeria_adjuntos();    

      
            /*    
                
             if(numero_arreglo == total_arreglo1-1 ){
             
                toastr.success('Datos Ingresados Correctamente', 'AVISO');
                $(".val_error").removeClass("has-error");
        
                $("#archivos_subidos").html('');
                document.getElementById("archivo").value='';    
                document.getElementById("doc_adjunto").value='';
                $("#respuesta").removeClass('alert-success').removeClass('alert-danger').html('');
                document.getElementById("respuesta").style.display = "none";
            
                  combo_tipo_adjunto(); 
                 // tabla_adjuntos('buscar',$("#codigo").val());
            }

            */

                document.getElementById("archivo").value='';    
                document.getElementById("doc_adjunto").value='';
        
        });
        
        // limpiar();
         // $('#crear_modal').modal('hide');

    
        }
    }
})

         
}












function firmar_elaborador(){


    var id_informe=$("#id_informe").val();

     confirmar=confirm("Realmente desea firmar este informe"); 
      if (confirmar) {


                $.ajax({
                        url:'json/json.php?accion=firmar_informe',
                        data: {id_informe:id_informe,
                                firmador:'elaborador'},
                        type:'post',
                         dataType: "json", 
                        success: function (data)
                        {

                            carga_firmas_del_informe(id_informe);
                            tabla_investigaciones();
                          
                        }
                 });

             
      }

}


function firmar_revision(){

    var id_informe=$("#id_informe").val();


    $.ajax({
              url:'json/json.php?accion=consulta_para_imprimir',
              data:{id_informe:id_informe},
              type:'post',
              dataType: "json", 
              success: function (json_jax)
                {
          
                        if(json_jax[0].fecha_firma_elaborador==''){
                            alert('LO LAMENTAMOS, NO ES POSIBLE FIRMAR LA REVISIÓN DE ESTE DOCUMENTO.\n \n RAZÓN: Falta la firma del ELABORADOR/A de la investigación');
                        }else{

                            confirmar=confirm("Realmente desea firmar la revisión de este informe"); 
                                  if (confirmar) {

                                     $.ajax({
                                                    url:'json/json.php?accion=firmar_informe',
                                                    data: {id_informe:id_informe,
                                                            firmador:'revisor'},
                                                    type:'post',
                                                     dataType: "json", 
                                                    success: function (data)
                                                    {

                                                        carga_firmas_del_informe(id_informe);
                                                        tabla_investigaciones();
                                                      
                                                    }
                                             });

                                         
                                  }


                        }
                }
            });


}


function firmar_autorizacion(){

    var id_informe=$("#id_informe").val();

     $.ajax({
              url:'json/json.php?accion=consulta_para_imprimir',
              data:{id_informe:id_informe},
              type:'post',
              dataType: "json", 
              success: function (json_jax)
                {
          
                        if(json_jax[0].fecha_firma_revision==''){
                            alert('LO LAMENTAMOS, NO ES POSIBLE FIRMAR LA AUTORIZACIÓN DE ESTE DOCUMENTO.\n \n RAZÓN: Falta la firma de REVISIÓN de la investigación');
                        }else{

                            confirmar=confirm("Realmente desea firmar la autorización de este informe."); 
                              if (confirmar) {


                                 $.ajax({
                                                url:'json/json.php?accion=firmar_informe',
                                                data: {id_informe:id_informe,
                                                        firmador:'aprobador'},
                                                type:'post',
                                                 dataType: "json", 
                                                success: function (data)
                                                {

                                                    carga_firmas_del_informe(id_informe);
                                                    tabla_investigaciones();
                                                  
                                                }
                                         });

                                     
                              }


                        }
                }
            });



}


function carga_firmas_del_informe(id_informe){

    $("#grid_firmas_del_informe").html('');


    var boton_firma_elaborador="<div class='d-grid gap-2'><button class='btn btn-success' type='button' onclick='firmar_elaborador()'>FIRMAR</button></div>";
    var boton_firma_revisor="<div class='d-grid gap-2'><button class='btn btn-success' type='button' onclick='firmar_revision()'>FIRMAR</button></div>";
    var boton_firma_aprobador="<div class='d-grid gap-2'><button class='btn btn-success' type='button' onclick='firmar_autorizacion()'>FIRMAR</button></div>";

        $.ajax({
                url:'json/json.php?accion=busca_firmas_informe',
                data: {id_informe:id_informe},
                type:'post',
                 dataType: "json", 
                success: function (json_jax)
                {

                        if(json_jax[0].fecha_firma_elaborador!=''){
                            boton_firma_elaborador=json_jax[0].nick_registro+"<br>"+json_jax[0].cargo_nombre+"<br>"+json_jax[0].fecha_firma_elaborador;;
                        }

                        if(json_jax[0].firma_revision!=''){
                            boton_firma_revisor=json_jax[0].firma_revision+"<br>"+json_jax[0].cargo_revisor+"<br>"+json_jax[0].fecha_firma_revision;;
                        }

                        if(json_jax[0].fecha_firma_autorizacion!=''){
                            boton_firma_aprobador=json_jax[0].firma_autorizacion+"<br>"+json_jax[0].cargo_autorizador+"<br>"+json_jax[0].fecha_firma_autorizacion;;
                        }


                  $("#grid_firmas_del_informe").append("<tr><td style='text-align:center' class='a'>"+boton_firma_elaborador+"</td><td style='text-align:center' class='a'>"+boton_firma_revisor+"</td><td style='text-align:center' class='a'>"+boton_firma_aprobador+"</td></tr>");
                  
                }
         });

}



function eliminar_plan_de_accion(id_plan_de_accion,id_informe){
     confirmar=confirm("Realmente desea eliminar el registro."); 
      if (confirmar) {

                $.ajax({
                        url:'json/json.php?accion=eliminar_plan_de_accion',
                        data: {id_informe:id_informe,
                                id_plan_de_accion:id_plan_de_accion},
                        type:'post',
                         dataType: "json", 
                        success: function (data)
                        {

                            carga_listado_plan_de_accion(id_informe);
                          
                        }
                 });
      }

}



function agrega_nuavo_plan_de_accion(){
    var id_informe=$("#id_informe").val();
    var plan_accion=$("#plan_accion").val();
    var responsable_plan_accion=$("#responsable_plan_accion").val();
    var cargo_responsable_plan=$("#cargo_responsable_plan").val();
    var fecha_plazo=$("#fecha_plazo_plan_accion").val();


    if(plan_accion==''){document.getElementById("plan_accion").focus(); 
    }else if(responsable_plan_accion==''){document.getElementById("responsable_plan_accion").focus();   
    }else if(cargo_responsable_plan==''){document.getElementById("cargo_responsable_plan").focus();   
    }else if(fecha_plazo==''){document.getElementById("fecha_plazo_plan_accion").focus();   
    }else{


          $.ajax({
                url:'json/json.php?accion=agregar_plan_de_accion',
                data: {id_informe:id_informe,
                        plan_accion:plan_accion,
                        responsable_plan_accion:responsable_plan_accion,
                        cargo_responsable_plan:cargo_responsable_plan,
                        fecha_plazo:fecha_plazo},
                type:'post',
                 dataType: "json", 
                success: function (data)
                {
                    $("#plan_accion").val('');
                    $("#responsable_plan_accion").val('');
                    $("#cargo_responsable_plan").val('');
                    
                    //console.log(data.data[0].cargo_nombre);
                    carga_listado_plan_de_accion(id_informe);
                  
                }
         });
      }
}


function carga_listado_plan_de_accion(id_informe){

$("#grid_lista_plan_de_accion").html('');
    $.ajax({
                url:'json/json.php?accion=listado_plan_de_accion',
                data: {id_informe:id_informe},
                type:'post',
                 dataType: "json", 
                success: function (json_jax)
                {


                     for (var i = 0; i < json_jax.length; i++) {

                               $("#grid_lista_plan_de_accion").append("<tr><td style='text-align:center'>"+(i+1)+ "</td><td>"+ json_jax[i].plan_de_accion + "</td><td>"+json_jax[i].responsable_plan + "</td><td>"+json_jax[i].cargo_responsable + "</td><td>"+json_jax[i].fecha_plazo + "</td><td style='text-align:center'><button type='button' class='btn btn-danger glyphicon glyphicon-remove btn-md pull-left' title='Eliminar registro' onClick='eliminar_plan_de_accion("+json_jax[i].id_medida_preventiva+","+id_informe+")'></button></td></tr>");
                                
                         
                        }

                  
                }
         });


}


function eliminar_medida_inmediata(id_medida_control,id_informe){
     confirmar=confirm("Realmente desea eliminar el registro."); 
      if (confirmar) {

                $.ajax({
                        url:'json/json.php?accion=eliminar_medida_de_control',
                        data: {id_informe:id_informe,
                                id_medida_control:id_medida_control},
                        type:'post',
                         dataType: "json", 
                        success: function (data)
                        {

                            carga_listado_medidas_de_control(id_informe);
                          
                        }
                 });



      }

}



function carga_listado_medidas_de_control(id_informe){

$("#grid_lista_medidas_control").html('');
    $.ajax({
                url:'json/json.php?accion=listado_medidas_de_control',
                data: {id_informe:id_informe},
                type:'post',
                 dataType: "json", 
                success: function (json_jax)
                {


                     for (var i = 0; i < json_jax.length; i++) {

                               $("#grid_lista_medidas_control").append("<tr><td style='text-align:center'>"+(i+1)+ "</td><td>"+ json_jax[i].medida_control + "</td><td>"+json_jax[i].responsable + "</td><td style='text-align:center'><button type='button' class='btn btn-danger glyphicon glyphicon-remove btn-md pull-left' title='Eliminar registro' onClick='eliminar_medida_inmediata("+json_jax[i].id_medida_control+","+id_informe+")'></button></td></tr>");
                                
                         
                        }

                  
                }
         });


}




function agrega_nuava_accion_inmediata(){
    var id_informe=$("#id_informe").val();
    var accion_inmediata_por_supervisor=$("#accion_inmediata_por_supervisor").val();
    var responsable_accion_inmediata=$("#responsable_accion_inmediata").val();


    if(accion_inmediata_por_supervisor==''){document.getElementById("accion_inmediata_por_supervisor").focus(); 
    }else if(responsable_accion_inmediata==''){document.getElementById("responsable_accion_inmediata").focus();   
    }else{


          $.ajax({
                url:'json/json.php?accion=agregar_medida_de_control',
                data: {id_informe:id_informe,
                        accion_inmediata_por_supervisor:accion_inmediata_por_supervisor,
                        responsable_accion_inmediata:responsable_accion_inmediata},
                type:'post',
                 dataType: "json", 
                success: function (data)
                {
                    $("#accion_inmediata_por_supervisor").val('');
                    $("#responsable_accion_inmediata").val('');
                    //console.log(data.data[0].cargo_nombre);
                    carga_listado_medidas_de_control(id_informe)
                  
                }
         });
      }
}






function actualiza_permiso(){



  var id_informe=$("#id_informe").val();


  const tipoAccidente = document.querySelector('input[name="tipo_accidente"]:checked');

  if (tipoAccidente) {
    const valorSeleccionado = tipoAccidente.value;
    console.log("Tipo de accidente seleccionado:", valorSeleccionado);
  } else {
    console.log("No se ha seleccionado ningún tipo de accidente.");
  }




$.ajax({
              url:'json/json.php?accion=consulta_para_imprimir',
              data:{id_informe:id_informe},
              type:'post',
              dataType: "json", 
              success: function (json_jax)
                {
          
                        if(json_jax[0].fecha_firma_revision=='' || json_jax[0].fecha_firma_autorizacion==''){
                                var relato=$("#relato").val();
                                var relato_testigo=$("#relato_testigo").val();


                                var check_1 =document.getElementById('check_1').checked;
                                var check_2 =document.getElementById('check_2').checked;
                                var check_3 =document.getElementById('check_3').checked;
                                var check_4 =document.getElementById('check_4').checked;
                                var check_5 =document.getElementById('check_5').checked;
                                var check_6 =document.getElementById('check_6').checked;
                                var check_7 =document.getElementById('check_7').checked;
                                var check_8 =document.getElementById('check_8').checked;
                                var check_9 =document.getElementById('check_9').checked;
                                var check_10 =document.getElementById('check_10').checked;
                                var check_11 =document.getElementById('check_11').checked;
                                var check_12 =document.getElementById('check_12').checked;
                                var check_13 =document.getElementById('check_13').checked;
                                var check_14 =document.getElementById('check_14').checked;
                                var check_15 =document.getElementById('check_15').checked;
                                var check_16 =document.getElementById('check_16').checked;
                                var check_17 =document.getElementById('check_17').checked;
                                var check_18 =document.getElementById('check_18').checked;
                                var check_19 =document.getElementById('check_19').checked;
                                var check_20 =document.getElementById('check_20').checked;
                                var check_21 =document.getElementById('check_21').checked;
                                var check_22 =document.getElementById('check_22').checked;
                                var check_23 =document.getElementById('check_23').checked;
                                var check_24 =document.getElementById('check_24').checked;
                                var check_25 =document.getElementById('check_25').checked;
                                var check_26 =document.getElementById('check_26').checked;
                                var check_27 =document.getElementById('check_27').checked;
                                var check_28 =document.getElementById('check_28').checked;
                                var check_29 =document.getElementById('check_29').checked;
                                var check_30 =document.getElementById('check_30').checked;
                                var check_31 =document.getElementById('check_31').checked;
                                var check_32 =document.getElementById('check_32').checked;
                                var check_33 =document.getElementById('check_33').checked;
                                var check_34 =document.getElementById('check_34').checked;
                                var check_35 =document.getElementById('check_35').checked;
                                var check_36 =document.getElementById('check_36').checked;
                                var check_37 =document.getElementById('check_37').checked;
                                var check_38 =document.getElementById('check_38').checked;
                                var check_39 =document.getElementById('check_39').checked;
                                var check_40 =document.getElementById('check_40').checked;
                                var check_41 =document.getElementById('check_41').checked;
                                var check_42 =document.getElementById('check_42').checked;
                                var check_43 =document.getElementById('check_43').checked;
                                var check_44 =document.getElementById('check_44').checked;
                                var check_45 =document.getElementById('check_45').checked;
                                var check_46 =document.getElementById('check_46').checked;
                                var check_47 =document.getElementById('check_47').checked;
                                var check_48 =document.getElementById('check_48').checked;
                                var check_49 =document.getElementById('check_49').checked;
                                var check_50 =document.getElementById('check_50').checked;
                                var check_51 =document.getElementById('check_51').checked;
                                var check_52 =document.getElementById('check_52').checked;
                                var check_53 =document.getElementById('check_53').checked;
                                var check_54 =document.getElementById('check_54').checked;
                                var check_55 =document.getElementById('check_55').checked;
                                var check_56 =document.getElementById('check_56').checked;
                                var check_57 =document.getElementById('check_57').checked;
                                var check_58 =document.getElementById('check_58').checked;
                                var check_59 =document.getElementById('check_59').checked;
                                var check_60 =document.getElementById('check_60').checked;
                                var check_61 =document.getElementById('check_61').checked;
                                var check_62 =document.getElementById('check_62').checked;
                                var check_63 =document.getElementById('check_63').checked;
                                var check_64 =document.getElementById('check_64').checked;
                                var check_65 =document.getElementById('check_65').checked;
                                var check_66 =document.getElementById('check_66').checked;
                                var check_67 =document.getElementById('check_67').checked;
                                var check_68 =document.getElementById('check_68').checked;
                                var check_69 =document.getElementById('check_69').checked;
                                var check_70 =document.getElementById('check_70').checked;
                                var check_71 =document.getElementById('check_71').checked;
                                var check_72 =document.getElementById('check_72').checked;
                                var check_73 =document.getElementById('check_73').checked;
                                var check_74 =document.getElementById('check_74').checked;
                                var check_75 =document.getElementById('check_75').checked;
                                var check_76 =document.getElementById('check_76').checked;
                                var check_77 =document.getElementById('check_77').checked;
                                var check_78 =document.getElementById('check_78').checked;
                                var check_79 =document.getElementById('check_79').checked;
                                var check_80 =document.getElementById('check_80').checked;
                                var check_81 =document.getElementById('check_81').checked;
                                var check_82 =document.getElementById('check_82').checked;
                                var check_83 =document.getElementById('check_83').checked;
                                var check_84 =document.getElementById('check_84').checked;
                                var check_85 =document.getElementById('check_85').checked;
                                var check_86 =document.getElementById('check_86').checked;
                                var check_87 =document.getElementById('check_87').checked;
                                var check_88 =document.getElementById('check_88').checked;
                                var check_89 =document.getElementById('check_89').checked;
                                var check_90 =document.getElementById('check_90').checked;
                                var check_91 =document.getElementById('check_91').checked;
                                var check_92 =document.getElementById('check_92').checked;
                                var check_93 =document.getElementById('check_93').checked;
                                var check_94 =document.getElementById('check_94').checked;
                                var check_95 =document.getElementById('check_95').checked;
                                var check_96 =document.getElementById('check_96').checked;
                                var check_97 =document.getElementById('check_97').checked;
                                var check_98 =document.getElementById('check_98').checked;
                                var check_99 =document.getElementById('check_99').checked;
                                var check_100 =document.getElementById('check_100').checked;
                                var check_101 =document.getElementById('check_101').checked;
                                var check_102 =document.getElementById('check_102').checked;
                                var check_103 =document.getElementById('check_103').checked;
                                var check_104 =document.getElementById('check_104').checked;
                                var check_105 =document.getElementById('check_105').checked;
                                var check_106 =document.getElementById('check_106').checked;
                                var check_107 =document.getElementById('check_107').checked;
                                var check_108 =document.getElementById('check_108').checked;
                                var check_109 =document.getElementById('check_109').checked;
                                var check_110 =document.getElementById('check_110').checked;
                                var check_111 =document.getElementById('check_111').checked;
                                var check_112 =document.getElementById('check_112').checked;
                                var check_113 =document.getElementById('check_113').checked;
                                var check_114 =document.getElementById('check_114').checked;
                                var check_115 =document.getElementById('check_115').checked;
                                var check_116 =document.getElementById('check_116').checked;
                                var check_117 =document.getElementById('check_117').checked;
                                var check_118 =document.getElementById('check_118').checked;
                                var check_119 =document.getElementById('check_119').checked;
                                var check_120 =document.getElementById('check_120').checked;
                                var check_121 =document.getElementById('check_121').checked;
                                var check_122 =document.getElementById('check_122').checked;
                                var check_123 =document.getElementById('check_123').checked;
                                var check_124 =document.getElementById('check_124').checked;
                                var check_125 =document.getElementById('check_125').checked;
                                var check_126 =document.getElementById('check_126').checked;
                                var check_127 =document.getElementById('check_127').checked;
                                var check_128 =document.getElementById('check_128').checked;
                                var check_129 =document.getElementById('check_129').checked;
                                var check_130 =document.getElementById('check_130').checked;
                                var check_131 =document.getElementById('check_131').checked;
                                var check_132 =document.getElementById('check_132').checked;
                                var check_133 =document.getElementById('check_133').checked;
                                var check_134 =document.getElementById('check_134').checked;
                                var check_135 =document.getElementById('check_135').checked;
                                var check_136 =document.getElementById('check_136').checked;
                                var check_137 =document.getElementById('check_137').checked;
                                var check_138 =document.getElementById('check_138').checked;
                                var check_139 =document.getElementById('check_139').checked;
                                var check_140 =document.getElementById('check_140').checked;
                                var check_141 =document.getElementById('check_141').checked;
                                var check_142 =document.getElementById('check_142').checked;
                                var check_143 =document.getElementById('check_143').checked;
                                var check_144 =document.getElementById('check_144').checked;
                                var check_145 =document.getElementById('check_145').checked;
                                var check_146 =document.getElementById('check_146').checked;
                                var check_147 =document.getElementById('check_147').checked;
                                var check_148 =document.getElementById('check_148').checked;
                                var check_149 =document.getElementById('check_149').checked;
                                var check_150 =document.getElementById('check_150').checked;
                                var check_151 =document.getElementById('check_151').checked;
                                var check_152 =document.getElementById('check_152').checked;
                                var check_153 =document.getElementById('check_153').checked;
                                var check_154 =document.getElementById('check_154').checked;
                                var check_155 =document.getElementById('check_155').checked;
                                var check_156 =document.getElementById('check_156').checked;
                                var check_157 =document.getElementById('check_157').checked;
                                var check_158 =document.getElementById('check_158').checked;
                                var check_159 =document.getElementById('check_159').checked;
                                var check_160 =document.getElementById('check_160').checked;
                                var check_161 =document.getElementById('check_161').checked;
                                var check_167 =document.getElementById('check_167').checked;
                                var check_168 =document.getElementById('check_168').checked;
                                var check_169 =document.getElementById('check_169').checked;
                                var check_170 =document.getElementById('check_170').checked;
                                var check_171 =document.getElementById('check_171').checked;
                                var check_172 =document.getElementById('check_172').checked;
                                var check_173 =document.getElementById('check_173').checked;
                                var check_174 =document.getElementById('check_174').checked;
                                var check_175 =document.getElementById('check_175').checked;
                                var check_176 =document.getElementById('check_176').checked;
                                var check_177 =document.getElementById('check_177').checked;
                                var check_178 =document.getElementById('check_178').checked;
                                var check_179 =document.getElementById('check_179').checked;
                                var check_180 =document.getElementById('check_180').checked;
                                var check_181 =document.getElementById('check_181').checked;
                                var check_182 =document.getElementById('check_182').checked;
                                var check_183 =document.getElementById('check_183').checked;
                                var check_184 =document.getElementById('check_184').checked;
                                var check_185 =document.getElementById('check_185').checked;
                                var check_186 =document.getElementById('check_186').checked;
                                var check_187 =document.getElementById('check_187').checked;
                                var check_188 =document.getElementById('check_188').checked;
                                var check_189 =document.getElementById('check_189').checked;
                                var check_190 =document.getElementById('check_190').checked;
                                var check_191 =document.getElementById('check_191').checked;
                                var check_192 =document.getElementById('check_192').checked;
                                var check_193 =document.getElementById('check_193').checked;
                                var check_194 =document.getElementById('check_194').checked;
                                var check_195 =document.getElementById('check_195').checked;
                                var check_196 =document.getElementById('check_196').checked;
                                var check_197 =document.getElementById('check_197').checked;
                                var check_198 =document.getElementById('check_198').checked;
                                var check_199 =document.getElementById('check_199').checked;
                                var check_200 =document.getElementById('check_200').checked;
                                var check_201 =document.getElementById('check_201').checked;
                                var check_202 =document.getElementById('check_202').checked;
                                var check_203 =document.getElementById('check_203').checked;
                                var check_204 =document.getElementById('check_204').checked;
                                var check_205 =document.getElementById('check_205').checked;
                                var check_206 =document.getElementById('check_206').checked;
                                var check_207 =document.getElementById('check_207').checked;
                                var check_208 =document.getElementById('check_208').checked;
                                var check_209 =document.getElementById('check_209').checked;
                                var check_210 =document.getElementById('check_210').checked;
                                var check_211 =document.getElementById('check_211').checked;
                                var check_212 =document.getElementById('check_212').checked;
                                var check_213 =document.getElementById('check_213').checked;
                                var check_214 =document.getElementById('check_214').checked;
                                var check_215 =document.getElementById('check_215').checked;
                                var check_216 =document.getElementById('check_216').checked;
                                var check_217 =document.getElementById('check_217').checked;
                                var check_218 =document.getElementById('check_218').checked;
                                var check_219 =document.getElementById('check_219').checked;
                                var check_220 =document.getElementById('check_220').checked;
                                var check_221 =document.getElementById('check_221').checked;
                                var check_222 =document.getElementById('check_222').checked;
                                var check_223 =document.getElementById('check_223').checked;
                                var check_224 =document.getElementById('check_224').checked;
                                var check_225 =document.getElementById('check_225').checked;
                                var check_226 =document.getElementById('check_226').checked;
                                var check_227 =document.getElementById('check_227').checked;
                                var check_228 =document.getElementById('check_228').checked;
                                var check_229 =document.getElementById('check_229').checked;
                                var check_230 =document.getElementById('check_230').checked;
                                var check_231 =document.getElementById('check_231').checked;
                                var check_232 =document.getElementById('check_232').checked;
                                var check_233 =document.getElementById('check_233').checked;
                                var check_234 =document.getElementById('check_234').checked;
                                var check_235 =document.getElementById('check_235').checked;
                                var check_236 =document.getElementById('check_236').checked;
                                var check_237 =document.getElementById('check_237').checked;
                                var check_238 =document.getElementById('check_238').checked;
                                var check_239 =document.getElementById('check_239').checked;
                                var check_240 =document.getElementById('check_240').checked;
                                var check_241 =document.getElementById('check_241').checked;
                                var check_242 =document.getElementById('check_242').checked;
                                var check_243 =document.getElementById('check_243').checked;
                                var check_244 =document.getElementById('check_244').checked;
                                var check_245 =document.getElementById('check_245').checked;
                                var check_246 =document.getElementById('check_246').checked;
                                var check_247 =document.getElementById('check_247').checked;
                                var check_248 =document.getElementById('check_248').checked;
                                var check_249 =document.getElementById('check_249').checked;
                                var check_250 =document.getElementById('check_250').checked;
                                var check_251 =document.getElementById('check_251').checked;
                                var check_252 =document.getElementById('check_252').checked;
                                var check_253 =document.getElementById('check_253').checked;
                                var check_254 =document.getElementById('check_254').checked;
                                var check_255 =document.getElementById('check_255').checked;
                                var check_256 =document.getElementById('check_256').checked;
                                var check_257 =document.getElementById('check_257').checked;
                                var check_258 =document.getElementById('check_258').checked;
                                var check_259 =document.getElementById('check_259').checked;
                                var check_260 =document.getElementById('check_260').checked;
                                var check_261 =document.getElementById('check_261').checked;
                                var check_262 =document.getElementById('check_262').checked;
                                var check_263 =document.getElementById('check_263').checked;
                                var check_264 =document.getElementById('check_264').checked;
                                var check_265 =document.getElementById('check_265').checked;






                                
                                var elemento_provoca_lesion=$("#elemento_provoca_lesion").val();
                                var fuente=$("#fuente").val();
                                var lugar_del_accidente=$("#lugar_del_accidente").val();
                                var check_equipo=document.getElementById("check_equipo").checked;
                                var check_material=document.getElementById("check_material").checked;
                                var check_ambiente=document.getElementById("check_ambiente").checked;
                                var check_personas=document.getElementById("check_personas").checked;
                                var check_otros=document.getElementById("check_otros").checked;
                                var check_rutinaria=document.getElementById("check_rutinaria").checked;
                                var check_planificada=document.getElementById("check_planificada").checked;
                                var check_no_planificada=document.getElementById("check_no_planificada").checked;
                                var fecha_accidente=$("#fecha_accidente").val();
                                var hora_accidente=$("#hora_accidente").val();
                                var especificacion_otros=$("#especificacion_otros").val();
                                var equipo_involucrado=$("#equipo_involucrado").val();
                                var actividad_que_realizaba=$("#actividad_que_realizaba").val();
                                var tipo_accidente=$("#tipo_accidente").val();
                                var select = document.getElementById('tipo_accidente');
                                var tipo_de_accidente = select.options[select.selectedIndex].text;

                                var parte_lesionada ='';


                                var selectObject =document.getElementById("parte_lesionada");
                                for (var i = 0; i < selectObject.options.length; i++) {
                                    if(selectObject.options[i].selected ==true){              
                                       parte_lesionada += selectObject.options[i].value+', ';
                                      }
                                  }
                                                      

                                 //console.log('aqui');
                              //  var check_leve=$("#tipo_accidente_aux").val();
                               // console.log(check_leve);
                               // var check_leve = document.querySelector('input[name="tipo_accidente_aux"]:checked').value;
  const tipoAccidente = document.querySelector('input[name="tipo_accidente_aux"]:checked');

    const valorSeleccionado = tipoAccidente.value;
   


                                var tipo=$("#accidente_tipo").val();

                                $.ajax({
                                    url:'json/json.php?accion=actualiza_permiso',
                                    data: {id_informe:id_informe,
                                            tipo_accidente_aux:valorSeleccionado,
                                            relato:relato,
                                            relato_testigo:relato_testigo,
                                            parte_lesionada:parte_lesionada,
                                            elemento_provoca_lesion:elemento_provoca_lesion,
                                            fuente:fuente,
                                            lugar_del_accidente:lugar_del_accidente,
                                            check_equipo:check_equipo,
                                            check_material:check_material,
                                            check_ambiente:check_ambiente,
                                            check_personas:check_personas,
                                            check_otros:check_otros,
                                            check_rutinaria:check_rutinaria,
                                            check_planificada:check_planificada,
                                            check_no_planificada:check_no_planificada,
                                            fecha_accidente:fecha_accidente,
                                            hora_accidente:hora_accidente,
                                            especificacion_otros:especificacion_otros,
                                            equipo_involucrado:equipo_involucrado,
                                            actividad_que_realizaba:actividad_que_realizaba,
                                            tipo_accidente:tipo_accidente,
                                            tipo_de_accidente:tipo_de_accidente,
                                            tipo:tipo
                                            ,check_1:check_1,check_2:check_2,check_3:check_3,check_4:check_4,check_5:check_5,check_6:check_6,check_7:check_7,check_8:check_8,check_9:check_9,check_10:check_10,check_11:check_11,check_12:check_12
                                            ,check_13:check_13,check_14:check_14,check_15:check_15,check_16:check_16,check_17:check_17,check_18:check_18,check_19:check_19,check_20:check_20,check_21:check_21,check_22:check_22,check_23:check_23
                                            ,check_24:check_24,check_25:check_25,check_26:check_26,check_27:check_27,check_28:check_28,check_29:check_29,check_30:check_30,check_31:check_31,check_32:check_32,check_33:check_33,check_34:check_34
                                            ,check_35:check_35,check_36:check_36,check_37:check_37,check_38:check_38,check_39:check_39,check_40:check_40,check_41:check_41,check_42:check_42,check_43:check_43,check_44:check_44,check_45:check_45
                                            ,check_46:check_46,check_47:check_47,check_48:check_48,check_49:check_49,check_50:check_50,check_51:check_51,check_52:check_52,check_53:check_53,check_54:check_54,check_55:check_55,check_56:check_56
                                            ,check_57:check_57,check_58:check_58,check_59:check_59,check_60:check_60,check_61:check_61,check_62:check_62,check_63:check_63,check_64:check_64,check_65:check_65,check_66:check_66,check_67:check_67
                                            ,check_68:check_68,check_69:check_69,check_70:check_70,check_71:check_71,check_72:check_72,check_73:check_73,check_74:check_74,check_75:check_75,check_76:check_76,check_77:check_77,check_78:check_78
                                            ,check_79:check_79,check_80:check_80,check_81:check_81,check_82:check_82,check_83:check_83,check_84:check_84,check_85:check_85,check_86:check_86,check_87:check_87,check_88:check_88,check_89:check_89
                                            ,check_90:check_90,check_91:check_91,check_92:check_92,check_93:check_93,check_94:check_94,check_95:check_95,check_96:check_96,check_97:check_97,check_98:check_98,check_99:check_99,check_100:check_100
                                            ,check_101:check_101,check_102:check_102,check_103:check_103,check_104:check_104,check_105:check_105,check_106:check_106,check_107:check_107,check_108:check_108,check_109:check_109,check_110:check_110
                                            ,check_111:check_111,check_112:check_112,check_113:check_113,check_114:check_114,check_115:check_115,check_116:check_116,check_117:check_117,check_118:check_118,check_119:check_119,check_120:check_120
                                            ,check_121:check_121,check_122:check_122,check_123:check_123,check_124:check_124,check_125:check_125,check_126:check_126,check_127:check_127,check_128:check_128,check_129:check_129,check_130:check_130
                                            ,check_131:check_131,check_132:check_132,check_133:check_133,check_134:check_134,check_135:check_135,check_136:check_136,check_137:check_137,check_138:check_138,check_139:check_139,check_140:check_140
                                            ,check_141:check_141,check_142:check_142,check_143:check_143,check_144:check_144,check_145:check_145,check_146:check_146,check_147:check_147,check_148:check_148,check_149:check_149,check_150:check_150
                                            ,check_151:check_151,check_152:check_152,check_153:check_153,check_154:check_154,check_155:check_155,check_156:check_156,check_157:check_157,check_158:check_158,check_159:check_159,check_160:check_160
                                            ,check_161:check_161,check_167:check_167,check_168:check_168,check_169:check_169,check_170:check_170
                                            ,check_171:check_171,check_172:check_172,check_173:check_173,check_174:check_174,check_175:check_175,check_176:check_176,check_177:check_177,check_178:check_178,check_179:check_179,check_180:check_180
                                            ,check_181:check_181,check_182:check_182,check_183:check_183,check_184:check_184,check_185:check_185,check_186:check_186,check_187:check_187,check_188:check_188,check_189:check_189,check_190:check_190
                                            ,check_191:check_191,check_192:check_192,check_193:check_193,check_194:check_194,check_195:check_195,check_196:check_196,check_197:check_197,check_198:check_198,check_199:check_199,check_200:check_200
                                            ,check_201:check_201,check_202:check_202,check_203:check_203,check_204:check_204,check_205:check_205,check_206:check_206,check_207:check_207,check_208:check_208,check_209:check_209,check_210:check_210
                                            ,check_211:check_211,check_212:check_212,check_213:check_213,check_214:check_214,check_215:check_215,check_216:check_216,check_217:check_217,check_218:check_218,check_219:check_219,check_220:check_220
                                            ,check_221:check_221,check_222:check_222,check_223:check_223,check_224:check_224,check_225:check_225,check_226:check_226,check_227:check_227,check_228:check_228,check_229:check_229,check_230:check_230
                                            ,check_231:check_231,check_232:check_232,check_233:check_233,check_234:check_234,check_235:check_235,check_236:check_236,check_237:check_237,check_238:check_238,check_239:check_239,check_240:check_240
                                            ,check_241:check_241,check_242:check_242,check_243:check_243,check_244:check_244,check_245:check_245,check_246:check_246,check_247:check_247,check_248:check_248,check_249:check_249,check_250:check_250
                                            ,check_251:check_251,check_252:check_252,check_253:check_253,check_254:check_254,check_255:check_255,check_256:check_256,check_257:check_257,check_258:check_258,check_259:check_259,check_260:check_260
                                            ,check_261:check_261,check_262:check_262,check_263:check_263,check_264:check_264,check_265:check_265 },
                                    type:'post',
                                     dataType: "json", 
                                    success: function (data)
                                    {
                                        //console.log(data.data[0].cargo_nombre);
                                      
                                    }
                             });
                        }else{
                            alert('EL DOCUMENTO TIENE FIRMAS DE REVISIÓN O AUTORIZACIÓN, NO SE PUEDE MODIFICAR');
                        }
                }
            });




        
}

function abre_modal_partes_del_cuerpo(){
  $("#ventana_agrega_parte_cuerpo").modal('show');
  $("#nueva_parte_del_cuerpo").val('');

}



function abre_tipo_accidente(){
  $("#ventana_tipo_accidente").modal('show');
  $("#nueva_tipo_accidente").val('');
}

function abre_parte_lesionada(){
  $("#ventana_partes_lesionadas").modal('show');
  $("#nueva_parte_lesionada").val('');
}



function carga_select_multiple(id_informe){


         $.ajax({
                url:'json/json.php?accion=datos_partes_lesionadas',
                data: {id_informe:id_informe},
                type:'post',
                success: function (data)
                {

                   $("#parte_lesionada").html(data);

                }
         });


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



function confirma_nuevao_informe(){


  var area_accidentado=$("#area_accidentado").val();
  var gerencia_accidentado=$("#gerencia_accidentado").val();
  var jefe_directo=$("#jefe_directo").val();
  var cargo_accidentado=$("#cargo_accidentado").val();
  var rut_usuario=$("#rut_usuario").val();
  var edad_accidentado=$("#edad_accidentado").val();
  var antiguadad_accidentado=$("#antiguadad_accidentado").val();
  var antiguedad_cargo=$("#antiguedad_cargo").val();
  var fecha_nacimiento=$("#fecha_nacimiento").val();
  var horas_trabajadas=$("#horas_trabajadas").val();
  var jornada=$("#jornada").val();

    if(rut_usuario==''){alert('Debe seleccionar a un accidentado'); document.getElementById("seleccion_usuario").focus();          
    }else if(edad_accidentado==''){document.getElementById("edad_accidentado").focus(); 
    }else if(antiguadad_accidentado==''){document.getElementById("antiguadad_accidentado").focus(); 
    }else if(antiguedad_cargo==''){document.getElementById("antiguedad_cargo").focus();   
    }else if(fecha_nacimiento==''){document.getElementById("fecha_nacimiento").focus();   
    }else{

        
   $.ajax({
                url:'json/json.php?accion=confirma_nuevao_informe',
                data: {rut_usuario:rut_usuario,
                       area_accidentado:area_accidentado,
                    gerencia_accidentado:gerencia_accidentado,
                    jefe_directo:jefe_directo,
                    cargo_accidentado:cargo_accidentado,
                    rut_usuario:rut_usuario,
                    edad_accidentado:edad_accidentado,
                    antiguadad_accidentado:antiguadad_accidentado,
                    antiguedad_cargo:antiguedad_cargo,
                    fecha_nacimiento:fecha_nacimiento,
                    horas_trabajadas:horas_trabajadas,
                    jornada:jornada},
                type:'post',
                 dataType: "json", 
                success: function (data)
                {

                  tabla_investigaciones();
                  abrir_ventana_editar_informe(data.id_informe,data.numero);
                   correo_de_creacion(data.id_informe);
                   $("#ventana_crea_investigacion").modal('hide');
        

                  
                }
         });
         
    }

    

}



function calcularEdadDesdeInput() {
    const valor = $("#fecha_nacimiento").val();
    const mensaje = $("#mensaje_fecha");
    const edadInput = $("#edad_accidentado");

    let dia, mes, anio;

    if (/^\d{4}-\d{2}-\d{2}$/.test(valor)) {
        // Formato aaaa-mm-dd
        [anio, mes, dia] = valor.split("-").map(x => parseInt(x));
    } else if (/^\d{2}-\d{2}-\d{4}$/.test(valor)) {
        // Formato dd-mm-aaaa
        [dia, mes, anio] = valor.split("-").map(x => parseInt(x));
    } else {
        mensaje?.show();
        edadInput.val('');
        return;
    }

    const nacimiento = new Date(anio, mes - 1, dia);
    if (isNaN(nacimiento)) {
        mensaje?.show();
        edadInput.val('');
        return;
    }

    const hoy = new Date();
    let edad = hoy.getFullYear() - nacimiento.getFullYear();
    const diferenciaMes = hoy.getMonth() - nacimiento.getMonth();

    if (diferenciaMes < 0 || (diferenciaMes === 0 && hoy.getDate() < nacimiento.getDate())) {
        edad--;
    }

    mensaje?.hide();
    edadInput.val(edad);
}





function correo_de_creacion(id_informe){

  
        $.ajax({
                url:'json/json.php?accion=correo_creacion',
                data: {id_informe:id_informe},
                type:'post',
                 dataType: "json", 
                success: function (data)
                {

                  
                }
         });

}


function abrir_ventana_editar_informe(id_informe,numero){

  trae_datos_informe(id_informe);
  $("#id_informe").val(id_informe);
  $("#ventana_informe").modal('show');
}



function abrir_ventana_nueva_investigación(){

  carga_lista_sucursal();
  $("#area_accidentado").val('');
  $("#gerencia_accidentado").val('');
  $("#jefe_directo").val('');
  $("#cargo_accidentado").val('');
  $("#rut_usuario").val('');
  $("#edad_accidentado").val('');
  $("#antiguadad_accidentado").val('');
  $("#antiguedad_cargo").val('');
  $("#fecha_nacimiento").val('');
  
  $("#ventana_crea_investigacion").modal('show');

}

function setea_rut(){

  $("#rut_usuario").val($("#seleccion_usuario").val());

  carga_datos_personales($("#seleccion_usuario").val());

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

                  calcularEdadDesdeInput();
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


function carga_lista_sucursal(){

    $("#seleccion_usuario", "#seleccionar_usuario").html('<option value="0">Seleccione un usuario...</option>');
  
        $.ajax({
                url:'json/json.php?accion=buscar_nombre',
                data: {},
                type:'post',
                 dataType: "json", 
                success: function (json_jax)
                {

             for (var i = 0; i < json_jax.data.length; i++) {
                      $('#seleccion_usuario').append('<option value="' +json_jax.data[i].user_rut+ '">'+json_jax.data[i].nombre+'</option>');
                      $('#seleccionar_usuario').append('<option value="' +json_jax.data[i].user_rut+ '">'+json_jax.data[i].nombre+'</option>');
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



