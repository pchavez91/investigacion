<head>
    
    <script src="script/loging.js"></script>
    
    <img src="tcpdf/images/logo.jpg" alt="Logo" style="width: 400px; height: auto; display: block; margin: 20px auto;">

    <hr style="border: 5px solid #ccc; margin: 20px 0;">

</head>

<body>    
    <form id="login-form" method="post" action="script/login.js" style="max-width: 400px; max-height: 400px; margin: auto; padding: 60px; background-color: #0de956ff; border-radius: 5px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">    
        <h1 style="text-align: center; color: #333;">Iniciar Sesión</h1>
    
        <div class="form-group">
            <label for="username"></label>
            <input type="text" id="username" name="username" required placeholder="RUT" style="width: 100%; padding: 10px; margin-bottom: 10px; border-radius: 5px; border: 1px solid #ccc; box-sizing: border-box;">
        </div>
        <div class="form-group">
            <label for="password"></label>
            <input type="password" id="password" name="password" required placeholder="Contraseña" style="width: 100%; padding: 10px; margin-bottom: 10px; border-radius: 5px; border: 1px solid #ccc; box-sizing: border-box;">    
        </div>
        <div class="form-group">
            <button type="submit" id="login-button" style="background-color:#2a31cd; color:white; padding:10px 20px; border:none; cursor:pointer;"
                onmouseover="this.style.backgroundColor='blue'" 
                onmouseout="this.style.backgroundColor='#2a31cd'">Iniciar Sesión
            </button>
            <button type="button" id="cancelar-button" style="background-color:#2a31cd; color:white; padding:10px 20px; border:none; cursor:pointer;"
                onmouseover="this.style.backgroundColor='red'" 
                onmouseout="this.style.backgroundColor='#2a31cd'">Cancelar
            </button>
        </div>
        <div id="login-message" style="color:red; text-align:center; margin-top:10px;"></div>
    </form>    

</body>

<!-- Cargar JS -->
    <script src="script/login.js"></script>
