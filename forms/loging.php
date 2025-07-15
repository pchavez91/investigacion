<head>
    
    <script src="script/loging.js"></script>
    
    <img src="tcpdf/images/logo.jpg" alt="Logo" style="width: 400px; height: auto; display: block; margin: 20px auto;">

    <hr style="border: 5px solid #ccc; margin: 20px 0;">

</head>

<body>    
    <form id="login-form" method="post" action="forms/loging.php" style="max-width: 400px; max-height: 400px; margin: auto; padding: 60px; background-color: #0de956ff; border-radius: 5px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">    
        <b style="text-align: center; color: blue; text-size: 24">Iniciar Sesión</b>
    
        <div class="form-group">
            <label for="username"></label>
            <input type="text" id="username" name="username" required placeholder="Usuario" style="width: 100%; padding: 10px; margin-bottom: 10px; border-radius: 5px; border: 1px solid #ccc; box-sizing: border-box;">
        </div>
        <div class="form-group">
            <label for="password"></label>
            <input type="password" id="password" name="password" required placeholder="Contraseña" style="width: 100%; padding: 10px; margin-bottom: 10px; border-radius: 5px; border: 1px solid #ccc; box-sizing: border-box;">    
        </div>
        <div class="form-group">
            <button type="submit" id="login-button" style="margin-right: 10px;">Iniciar Sesión</button>
            <button type="button" id="cancelar-button" style="margin-left: 10px;">Cancelar</button>
        </div>
    </form>
    <div id="login-message"></div>
   
    

</body>
