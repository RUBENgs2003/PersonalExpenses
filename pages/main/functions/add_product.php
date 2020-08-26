<?php
   include_once '../../../functions/db_conexion.php';

    $categoria = $_POST['category'];
    $nombre = strtolower($_POST['name']);
    $precio = $_POST['price'];
    $fecha = $_POST['date'];
    $id_propietario = $_GET['id'];

    

    try {
        $stmt = $conn->prepare("INSERT INTO productos (id_propietario, categoria, nombre, precio, fecha) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $id_propietario , $categoria, $nombre, $precio, $fecha);
        $stmt->execute();
        $id = $stmt->insert_id;
        if($id > 0) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_registro' => $id
            );
            
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    die(json_encode($respuesta));

?>