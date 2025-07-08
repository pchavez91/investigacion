// 👉 Función para formatear el RUT con ". y -"
function formatearRut(valor) {
    // Elimina todo excepto números y la letra K
    valor = valor.replace(/[^0-9kK]/g, '').toUpperCase();

    if (valor.length < 2) return valor;

    let cuerpo = valor.slice(0, -1);
    let dv = valor.slice(-1);

    // Formatea el cuerpo con puntos cada 3 dígitos
    cuerpo = cuerpo.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

    return `${cuerpo}-${dv}`;
}

// 👉 Evento para formatear automáticamente el campo #rut al escribir
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

//boton exportar a pdf id=btnExportar
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

    $.ajax({
        url: 'json/investigacion.php',
        method: 'GET',
        data: filtros,
        dataType: 'json',
        success: function (respuesta) {
            if (respuesta.success) {
                window.open(respuesta.url, '_blank');
            } else {
                alert('Error al generar el PDF');
            }
        },
        error: function () {
            alert('Error al exportar a PDF');
        }
    });
});


