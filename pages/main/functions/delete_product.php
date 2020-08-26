<?php
 
include_once '../../../functions/db_conexion.php';

error_reporting(E_ALL ^ E_NOTICE);

$id_borrar = $_POST['id'];
    
try {
    $stmt = $conn->prepare("DELETE FROM productos WHERE id_producto = ?");
    $stmt->bind_param("i", $id_borrar);
    $stmt->execute();
    if($stmt->affected_rows) {
        $respuesta = array(
            'respuesta' => 'correcto',
            'id_actualizado' => $id_borrar
        );
    } else {
        $respuesta = array(
            'respuesta' => 'error'
        );
    }
    $stmt->close();
    $conn->close();

    }catch (Exception $e) {
    $respuesta = array(
        'respuesta' => $e->getMessage()
    );
}

die(json_encode($respuesta));


?>