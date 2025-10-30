<?php

//Llamar a la conexion
require_once "conexion.php";

try{
    //Instanciar clase para la conexion
    $db = Database::connect();

    $email = "admin@gmail.com";

    //Consultar existencia de ese usuario
    $consul = $db -> prepare("SELECT * FROM usuario WHERE Correo = :email");
    $consul -> execute([":email" => $email]);

    //registrar los datos de usuario
    if(!$consul -> fetch()){
        $pass = password_hash("admin1234", PASSWORD_BCRYPT);

        //Crear insert
        $sql = "INSERT INTO usuario (Nombre, Correo, Contrasena, Rol, Telefono) VALUES('Admin', :email, :clave, 'Administrador', '3000000')";

        $consulta = $db -> prepare($sql);
        $consulta -> execute([":email" => $email, ":clave" => $pass]);

        echo "Usuario administrador creado";
    }
    else{
        echo "Usuario administrador ya existe";
    }


}
catch(PDOException $e){
    echo "Error de conexion: ".$e -> getMessage();
}



?>