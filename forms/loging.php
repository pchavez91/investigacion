<head>
    <style>
    
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }


    </style>
    <script src="script/loging.js"></script>
    
    <img src="tcpdf/images/logo.jpg" alt="Logo" style="width: 400px; height: auto; display: block; margin: 20px auto;">

    <dev class="Titulo">
        <h3 style="text-align: center; color: #7b70d9e1; font-size 36px; font-family : tahoma, sans-serif; font: size 36px; text-shadow: 2px 2px 4px #000000; background-color: #978e8e; padding: 10px; border-radius: 5px;">Iniciar Sesión</h3>    
        
    </dev>

</head>

<body>    
    <form id="login-form" method="post" action="forms/loging.php">
        <div class="form-group">
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" id="login-button">Iniciar Sesión</button>
        <div class="form-group">
            <button type="button" id="cancelar-button">Cancelar</button>
        </div>
    </form>
    <div id="login-message"></div>
   
    

</body>
