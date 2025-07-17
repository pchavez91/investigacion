document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('login-form');
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const datos = {
            username: document.getElementById('username').value,
            password: document.getElementById('password').value,
        };

        fetch('json/login_json.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(datos)
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                window.location.href = 'http://localhost/comasa/sistemas/bodega/home.php';
            } else {
                document.getElementById('login-message').innerText = data.message;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('login-message').innerText = 'Error al conectar con el servidor.';
        });
    });
});
