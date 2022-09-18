<?php
//autor:ULLOA ESPINOZA STEVEN GABRIEL
require_once 'model/dao/UsuariosDAO.php';

class LoginController {
    private $model;
    
    public function __construct() {// constructor
        $this->model = new UsuariosDAO();
    }
    public function SeleccionarUsuario() {
        // sql de la sentencia
        $parametro = $_POST["username"];
        $parametro2=$_POST["contraseña"];
        $resultUsuario = $this-> model->SeleccionarUsuario($parametro, $parametro2);
        //echo($resultUsuario);
        session_start();
        $_SESSION['rol'] = $resultUsuario['rol'];
        echo($_SESSION['rol']);
        header('Location:index.php?c=productos&f=index');
        
      
  }
  public function InicioSesion() {
    // sql de la sentencia
    echo (".....");
     // comunicarse con la vista
   require_once VLOGIN.'login.php';

    
}

}



?>