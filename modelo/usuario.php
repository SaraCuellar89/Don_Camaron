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

    // Obtener usuario por id
    public function obtener_usuario_id($id_usuario) {
        $sql = "SELECT * FROM usuario WHERE id_usuario = :id_usuario";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id_usuario'=>$id_usuario]);
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

    // Editar un usuario
    public function editar_usuario($id_usuario, $nombre, $rol, $documento, $correo, $telefono, $contrasena){
        $sql = "UPDATE usuario SET nombres = :nombre, rol = :rol, documento = :documento, Correo = :correo, telefono = :telefono, contrasena = :contrasena WHERE id_usuario = :id_usuario";
        $consul = $this->db->prepare($sql);
        $consul->execute([':nombre'=>$nombre, ':rol'=>$rol, ':documento'=>$documento, ':correo'=>$correo, ':telefono'=>$telefono, ':contrasena'=>$contrasena, ':id_usuario'=>$id_usuario]);

        return true;
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