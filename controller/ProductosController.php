<?php
//autor:ULLOA ESPINOZA STEVEN GABRIEL
require_once 'model/dao/ProductosDAO.php';
require_once 'model/dao/CategoriasDAO.php';
require_once 'model/dto/Producto.php';

class ProductosController {
    private $model;
    
    public function __construct() {// constructor
        $this->model = new ProductosDAO();
    }

    // funciones del controlador
    public function index() {
      //comunica con el modelo (enviar datos o obtener datos)
      $resultados = $this->model->selectAll("");
      // comunicarnos a la vista
     // require_once HEADERADICIONAL;
      require_once VPRODUCTOS.'list.php';
     // require_once FOOTER ;
      
    }
    // muestra el formulario de editar producto
   public function view_edit(){
        session_start();
        $roles = $_SESSION["rol"];
        echo($roles);
        if ($roles === "administrador" || $roles === "supersivor"){
            $id= $_REQUEST['id']; // verificar, limpiar
            if(!empty($id)){
                //leer parametro
                //comunicarse con el modelo de productos
                $prod = $this->model->selectOne($id);
                //comunicarse con el modelo de categorias
                $modeloCat = new CategoriasDAO();
                $categorias = $modeloCat->selectAll();

                // comunicarse con la vista
                require_once VPRODUCTOS.'edit.php';

            } 
        }else{
            header('Location:index.php?c=productos&f=index');
        }
    
 }

 public function delete(){
    //leeer parametros

          session_start();
          $roles = $_SESSION["rol"];
          echo($roles);
          if ($roles === "administrador" || $roles === "supersivor"){
            $prod = new Producto();
            $prod->setId(htmlentities($_REQUEST['id']));
            $prod->setNombre('nombre'); //$_SESSION['usuario'];
                //comunicando con el modelo
                $exito = $this->model->delete($prod);
               $msj = 'Producto eliminado exitosamente';
                   $color = 'primary';
                   if (!$exito) {
                       $msj = "No se pudo eliminar la actualizacion";
                       $color = "danger";
                   }
                    if(!isset($_SESSION)){ session_start();};
                   $_SESSION['mensaje'] = $msj;
                   $_SESSION['color'] = $color;
                }
      //llamar a la vista
        header('Location:index.php?c=productos&f=index');
}


    public function search(){
      // lectura de parametros enviados
      $parametro = (!empty($_POST["b"]))?htmlentities($_POST["b"]):"";
     //comunica con el modelo (enviar datos o obtener datos)
      $resultados = $this->model->selectAll($parametro);
     // comunicarnos a la vista
     require_once VPRODUCTOS.'list.php';
    }

        // buscar con ajax
        public function searchAjax() {
            //lectura de parametros
            $parametro = (!empty($_GET["b"]))?htmlentities($_GET["b"]):"";
            //llamar al modelo
            $resultados =  $this->model->selectAll($parametro);
                    //no llama a la vista 
                //require_once VPRODUCTOS.'list.php';       
            // imprime resultados para que la vista pueda leerlos a traves de js
            echo json_encode($resultados);
        }
    
        // muestra el formulario de nuevo producto
        public function view_new(){
              
            //comunicarse con el modelo
              $modeloCat = new CategoriasDAO();
              $categorias = $modeloCat->selectAll();
              // comunicarse con la vista
              require_once VPRODUCTOS.'nuevo.php';
    
        }
    
    // lee datos del formulario de nuevo producto y lo inserta en la bdd (llamando al modelo)
    public function new() {
      //cuando la solicitud es por post
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {// insertar el producto
          // considerar verificaciones
          //if(!isset($_POST['codigo'])){ header('');}
          $prod = new Producto();
          // lectura de parametros
          $prod->setNombre(htmlentities($_POST['nombre']));
          $prod->setMaterial(htmlentities($_POST['material']));
          $prod->setStock(htmlentities($_POST['stock']));
          $prod->setUso(htmlentities($_POST['uso']));
          $prod->setSerial(htmlentities($_POST['serial']));

         
          //comunicar con el modelo
          $exito = $this->model->insert($prod);

          $msj = 'Producto guardado exitosamente';
          $color = 'primary';
          if (!$exito) {
              $msj = "No se pudo realizar el guardado";
              $color = "danger";
          }
          if (!isset($_SESSION)) {
              session_start();
          };
          $_SESSION['mensaje'] = $msj;
          $_SESSION['color'] = $color;
          //llamar a la vista
          header('Location:index.php?c=Productos&f=index');
      } 
      
  }

  // lee datos del formulario de editar producto y lo actualiza en la bdd (llamando al modelo)
  public function edit(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {// actualizar
      // verificaciones
             //if(!isset($_POST['codigo'])){ header('');}
          // leer parametros
          $prod = new Producto();
          $prod->setId(htmlentities($_POST['id']));
          $prod->setNombre(htmlentities($_POST['nombre']));
          $prod->setMaterial(htmlentities($_POST['material']));
          $prod->setStock(htmlentities($_POST['stock']));
          $prod->setUso(htmlentities($_POST['uso']));
          $prod->setSerial(htmlentities($_POST['serial']));
        
          //llamar al modelo
          $exito = $this->model->update($prod);
          
          $msj = 'Producto actualizado exitosamente';
          $color = 'primary';
          if (!$exito) {
              $msj = "No se pudo realizar la actualizacion";
              $color = "danger";
          }
           if(!isset($_SESSION)){ session_start();};
          $_SESSION['mensaje'] = $msj;
          $_SESSION['color'] = $color;
      //llamar a la vista
       header('Location:index.php?c=productos&f=index');
         
      } 
   }

   /// sesion de la vista
   public function editarVista(){
   

}
}
