
<?php
// dao data access object
require_once 'config/Conexion.php';

class ProductosDAO {
    private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }

    public function selectAll($parametro) {
        // sql de la sentencia
      $sql = "SELECT * FROM productoslimpieza  where id = id and 
      (nombre like :b1)";
      $stmt = $this->con->prepare($sql);
      // preparar la sentencia
      $conlike = '%' . $parametro . '%';
      $data = array('b1' => $conlike);
      // ejecutar la sentencia
      $stmt->execute($data);
      //recuperar  resultados
      $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
      //retornar resultados
      return $resultados;
  }

  public function selectOne($id) { // buscar un producto por su id
        $sql = "select * from productoslimpieza where ".
        "id=:id";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        // ejecutar la sentencia
        $stmt->execute($data);
        // recuperar los datos (en caso de select)
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);// fetch retorna el primer registro
        // retornar resultados
        return $producto;
    }

    public function insert($prod){
        try{
        //sentencia sql
        $sql = "INSERT INTO productoslimpieza (nombre, material, stock, uso, serial) VALUES 
        (:nom, :mat, :stock, :uso, :serial)";

        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = [
        'nom' =>  $prod->getNombre(),
        'mat' =>  $prod->getMaterial(),
        'stock' =>  $prod->getStock(),
        'uso' =>  $prod->getUso(),
        'serial' =>  $prod->getSerial()

        ];
        //execute
        $sentencia->execute($data);
        //retornar resultados, 
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
        //rowCount permite obtner el numero de filas afectadas
           return false;
        }
    }catch(Exception $e){
        echo $e->getMessage();
        return false;
    }
        return true;
    }

    public function update($prod){

        try{
            //prepare
            $sql = "UPDATE `productoslimpieza` SET `nombre`=:nom,`material`=:mat,`stock`=:stock, `uso`=:uso," .
                    "`serial`=:serial WHERE id=:id";
           //bind parameters
            $sentencia = $this->con->prepare($sql);
            $data = [
                'nom' =>  $prod->getNombre(),
                'mat' =>  $prod->getMaterial(),
                'stock' =>  $prod->getStock(),
                'uso' =>  $prod->getUso(),
                'serial' =>  $prod->getSerial(),
                'id' =>  $prod->getId()
                ];
            //execute
            $sentencia->execute($data);
            //retornar resultados, 
            if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
                //rowCount permite obtner el numero de filas afectadas
                return false;
            }
        }catch(Exception $e){
          echo $e->getMessage();
            return false;
        }
            return true;       
    }
    public function delete($prod){
        try{
            //prepare
            $sql = "DELETE FROM `productoslimpieza` WHERE id=:id";
           //bind parameters
            $sentencia = $this->con->prepare($sql);
            $data = [
                'id' =>  $prod->getId(),
                ];
            //execute
            $sentencia->execute($data);
            //retornar resultados, 
            if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
                //rowCount permite obtner el numero de filas afectadas
                return false;
            }
        }catch(Exception $e){
          echo $e->getMessage();
            return false;
        }
            return true;       
    }
}
