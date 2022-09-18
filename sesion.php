<?php
// Autor: ULLOA ESPINOZA STEVEN GABRIEL
session_start();
if(isset($_GET['cerrar_sesion'])){
    session_unset();

    session_destroy();
}
if(isset($_SESSION['rol'])){
    switch($_SESSION['rol']){
        case 1:
            header('lotion: index.php?c=productos&f=index');
            break;
        case 2:
            header('location: index.php?c=productos&f=index');
            break;
        
        case 3:
            header('location: index.php?c=productos&f=index');
            break;
        default:
            
    }
}