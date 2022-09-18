
<?php
// dto data transfer object
class Producto {
    //properties
    private $id, $nombre, $material, $stock, $uso, $serial;

    function __construct() {
        
    }

   function getId() {
        return $this->id;
    }


    function getNombre() {
        return $this->nombre;
    }

    function getMaterial() {
        return $this->material;
    }

    function getStock() {
        return $this->stock;
    }
    function getUso() {
        return $this->uso;
    }

    function getSerial() {
        return $this->serial;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setMaterial($material) {
        $this->material = $material;
    }

    function setStock($stock) {
        $this->stock = $stock;
    }

    function setUso($uso) {
        $this->uso = $uso;
    }

    function setSerial($serial) {
        $this->serial = $serial;
    }



    
    // Methods get y set parametrizados
    public function __set($nombre, $valor) {
        // Verifica que la propiedad exista
        if (property_exists('Producto', $nombre)) {
            $this->$nombre = $valor;
        } else {
            echo $nombre . " No existe.";
        }
    }

    public function __get($nombre) {
      // Verifica que exista la propiedad
        if (property_exists('Producto', $nombre)) {
            return $this->$nombre;
        }
// Retorna null si no existe
        return NULL;
    }

    
    
}
