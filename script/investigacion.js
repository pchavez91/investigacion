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


