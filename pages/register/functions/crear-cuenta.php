<?php
   include_once '../../../functions/db_conexion.php';

    $email = $_POST['email'];
    $nombre = $_POST['name'];
    $password = $_POST['password'];

    $opciones = array(
        'cost' => 12
    );
    $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);

    try {
        $stmt = $conn->prepare("INSERT INTO registros (nombre, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $email, $password_hashed);
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