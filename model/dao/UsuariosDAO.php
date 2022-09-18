<?php
require_once 'config/Conexion.php';

class UsuariosDAO {
    private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }

    public function SeleccionarUsuario($parametro, $parametro2) {
        // sql de la sentencia
      $sql = "SELECT * FROM usuarios us INNER JOIN roles r ON us.rol_id =r.id where username = :username and contraseña = :contrasena";
      $stmt = $this->con->prepare($sql);
      // preparar la sentencia
      $data = ['username' => $parametro , 'contrasena' => $parametro2];
      // ejecutar la sentencia
      $stmt->execute($data);
      //recuperar  resultados
      $resultados = $stmt->fetch(PDO::FETCH_ASSOC);
      //retornar resultados
      var_dump($resultados);
      return $resultados;
      
  }

}


?>