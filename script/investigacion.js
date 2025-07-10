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
                            <td>${item.nombre}</td>
                            <td>${item.user_rut}</td>
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
    window.open(url, '_blank'); // así se abre directamente el PDF en una pestaña
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

    const queryString = $.param(filtros); // convierte el objeto en string ?key=value...
    const url = 'json/investigacion.php?' + queryString;

    window.open(url, '_blank'); // descarga directa
});

//boton exportar a pdf nuevo
$('#btnExportarPDFNuevo').click(function () {

    var PDF=$('#tablaResultados').val();

    window.open("tcpdf/pdfNuevo.php?PDF="+PDF,"","top=10,left=300,width=700,height=600");
});
