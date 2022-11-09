<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

// $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
// $pais = (isset($_POST['pais'])) ? $_POST['pais'] : '';
// $edad = (isset($_POST['edad'])) ? $_POST['edad'] : '';
// $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
// $id = (isset($_POST['id'])) ? $_POST['id'] : '';

$uid_num_emi = (isset($_POST['uid_num_emi'])) ? $_POST['uid_num_emi'] : '';
$uid_num_rec = (isset($_POST['uid_num_rec'])) ? $_POST['uid_num_rec'] : '';
$mensaje = (isset($_POST['mensaje'])) ? $_POST['mensaje'] : '';



switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO notificaciones (uid_num_emi, uid_num_rec, mensaje, estado) VALUES('$uid_num_emi', '$uid_num_rec', '$mensaje', 1) ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT id, uid_num_emi, uid_num_rec, mensaje, estado FROM notificaciones ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    // case 2: //modificación
    //     $consulta = "UPDATE personas SET nombre='$nombre', pais='$pais', edad='$edad' WHERE id='$id' ";		
    //     $resultado = $conexion->prepare($consulta);
    //     $resultado->execute();        
        
    //     $consulta = "SELECT id, nombre, pais, edad FROM personas WHERE id='$id' ";       
    //     $resultado = $conexion->prepare($consulta);
    //     $resultado->execute();
    //     $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    //     break;        
    // case 3://baja
    //     $consulta = "DELETE FROM personas WHERE id='$id' ";		
    //     $resultado = $conexion->prepare($consulta);
    //     $resultado->execute();                           
    //     break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
