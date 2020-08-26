<?php

$email = $_POST['email'];
$password_login = $_POST['password'];

try {
    include_once 'db_conexion.php';
    $stmt = $conn->prepare("SELECT * FROM registros WHERE email = ?;");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($id, $nombre, $email, $password);
    if($stmt->affected_rows) {
        $existe = $stmt->fetch();
        if($existe) {
            if(password_verify($password_login, $password)) {
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['id'] = $id;
                $_SESSION['nombre'] = $nombre;
 
                $respuesta = array(
                    'respuesta' => 'exitoso',
                    'usuario' => $nombre
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'error'
                );
            }
        } else {
            $respuesta = array(
                'respuesta' => 'error 2'
            );
        }
    }
    $stmt->close();
    $conn->close();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
die(json_encode($respuesta));

?>