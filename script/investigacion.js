// función para formatear el RUT con ". y -"
function formatearRut(valor) {
    valor = valor.replace(/[^0-9kK]/g, '').toUpperCase();

    if (valor.length < 2) return valor;

    let cuerpo = valor.slice(0, -1);
    let dv = valor.slice(-1);

    // Formatea el cuerpo con puntos cada 3 dígitos
    cuerpo = cuerpo.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

    return `${cuerpo}-${dv}`;
}

// Evento para formatear automáticamente el campo #rut al escribir
$('#rut').on('input', function () {
    const valor = $(this).val();
    const formateado = formatearRut(valor);
    $(this).val(formateado);
});


$(document).ready(function () {
    $('#btnBuscar').click(function () {
        const filtros = {
            accion: "datos_personales",
            nombre: $('#nombre').val(),
            rut: $('#rut').val(),
            correo: $('#correo').val(),
            vigente: $('#vigente').val(),
            cargo: $('#cargo').val(),
            area: $('#area').val()
        };

        console.log(filtros); // Para depuración

        $.ajax({
            url: 'json/investigacion.php',
            method: 'GET',
            data: filtros,
            dataType: 'json',
            success: function (respuesta) {
                const datos = respuesta.data;
                let html = '';
                if (datos.length === 0) {
                    html = '<tr><td colspan="6">No se encontraron resultados</td></tr>';
                } else {
                    datos.forEach(function (item) {
                        html += `<tr>
                                    <td>
                                        <button class="btnDetalle" data-id="${item.user_rut}" title="Ver detalles" style="padding: 2px 5px; font-size: 16px; background: none; border: none; cursor: pointer;">
                                            🔍
                                        </button>
                                    </td>
                                    <td>${item.nombre}</td>
                                    <td style="white-space: nowrap;">${item.user_rut}</td>
                                    <td>${item.user_vigente}</td>
                                    <td>${item.user_correo}</td>
                                    <td>${item.cargo_nombre}</td>
                                    <td>${item.area_nombre}</td>
                                </tr>`;
                        });  
                    }
                $('#tablaResultados tbody').html(html);
            },
            error: function () {
                alert('Error al buscar los datos');
            }
        });
    });
});

$('#btnExportarPDF').click(function () {
    const filtros = {
        accion: "exportar_pdf",
        nombre: $('#nombre').val(),
        rut: $('#rut').val(),
        correo: $('#correo').val(),
        vigente: $('#vigente').val(),
        cargo: $('#cargo').val(),
        area: $('#area').val()
    };

    const queryString = $.param(filtros);
    const url = 'json/investigacion.php?' + queryString;
    window.open(url, '_blank'); 
});


//boton exportar a excel
$('#btnExportarExcel').click(function () {
    const filtros = {
        accion: "exportar_excel",
        nombre: $('#nombre').val(),
        rut: $('#rut').val(),
        correo: $('#correo').val(),
        vigente: $('#vigente').val(),
        cargo: $('#cargo').val(),
        area: $('#area').val()
    };

    const queryString = $.param(filtros); 
    const url = 'json/investigacion.php?' + queryString;

    window.open(url, '_blank'); // descarga directa
});

//boton exportar a pdf nuevo
$('#btnExportarPDFNuevo').click(function () {

    var PDF=$('#tablaResultados').val();

    window.open("tcpdf/pdfNuevo.php?PDF="+PDF,"","top=10,left=300,width=700,height=600");
});

$(document).on('click', '.btnDetalle', function () {
    const rut = $(this).data('id');

    $.ajax({
        url: 'json/investigacion.php',
        method: 'GET',
        data: { accion: 'detalle_usuario', rut: rut },
        dataType: 'json',
        success: function (data) {
            $('#modalNombre').text(data.nombre);
            $('#modalRut').text(data.user_rut);
            $('#modalCorreo').text(data.user_correo);
            $('#modalCargo').text(data.cargo_nombre);
            $('#modalArea').text(data.area_nombre);
            $('#modalTelefono').text(data.telefono);
            $('#modalDireccion').text(data.direccion);

            $('#modalDetalle').fadeIn();
        },
        error: function () {
            alert('Error al cargar los detalles');
        }
    });
});

function cerrarModal() {
    $('#modalDetalle').fadeOut();
}

function mostrarTab(id) {
  // Ocultar todas las pestañas
  $('.tab-content').hide();
  $('.tab-btn').removeClass('active');
  // Mostrar la pestaña actual y activar su botón
  $('#' + id).show();
  $('button[onclick="mostrarTab(\'' + id + '\')"]').addClass('active');
}
