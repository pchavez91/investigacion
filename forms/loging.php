<head>
    <script src="script/loging.js"></script>
    
    <img src="tcpdf/images/logo.jpg" alt="Logo" style="width: 400px; height: auto; display: block; margin: 20px auto;">

    <dev class="panel-title">
        <h3 style="text-align: center; font-weight: bold; color: #007BFF;">Iniciar Sesión</h3> 
    </dev>


</head>
<body>
    
    <form id="login-form" method="post" action="forms/loging.php" >
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
