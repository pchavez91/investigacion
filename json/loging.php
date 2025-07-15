


if(accion == 'Usuario'){

    sql = "SELECT 
            (rtrim(user_nombre)+' '+user_paterno+' '+user_materno)as nombre
            FROM Seguridad.dbo.usuario
            WHERE user_nombre = 'Patricio'";
}

if(accion == password){
    sql = "SELECT user_contrasena FROM Seguridad.dbo.usuario WHERE user_contrasena = 'Comasa.2025'";
}
