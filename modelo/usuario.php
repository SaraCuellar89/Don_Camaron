<?php

require_once "../configuracion/conexion.php";

class Usuario{
    private $db;

    public function __construct() {
       $this -> db = Database::connect();
    }

    public function obtener_usuario($email){
        $sql = "SELECT * FROM usuario WHERE Correo = :email LIMIT 1";
        $consul = $this -> db -> prepare($sql);
        $consul -> execute([":email" => $email]);

        return $consul -> fetch();
    }

    // Iniciar Sesion
    public function login($email, $pass){
        $usuario = $this -> obtener_usuario(($email));
        
        if($usuario && $pass === $usuario['contrasena']){
            return $usuario;
        }
        else{
            return false;
        }
    }

    // Listar todos los usuarios
    public function listar_usuarios() {
        $sql = "SELECT * FROM usuario";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        // Retorna todos los usuarios como un array asociativo
        $resu = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resu;
    }

    // Crear o registrar un usuario
    public function crear_usuario($rol, $nombre, $documento, $correo, $telefono, $contrasena){
        //$pass = password_hash("admin1234", PASSWORD_BCRYPT);  -> HAY QUE ENCRIPTAR
        $sql = "INSERT INTO usuario (rol, nombres, documento, telefono, Correo, contrasena) VALUES(:rol, :nombre, :documento, :telefono, :correo ,:contrasena )";
        $consul = $this->db->prepare($sql);

        return $consul->execute([':rol'=>$rol,':nombre'=>$nombre, ':documento'=>$documento, ':telefono'=>$telefono, ':correo'=>$correo, ':contrasena'=>$contrasena]);
    }

    // Eliminar un usuario
    public function eliminar_usuario($id_usuario){
        $sql = "DELETE FROM usuario WHERE id_usuario = :id_usuario";
        $consul = $this->db->prepare($sql);
        $consul->execute([':id_usuario'=>$id_usuario]);

        return true;
    }
}

?>