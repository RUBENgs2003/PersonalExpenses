<?php
   include_once '../../../functions/db_conexion.php';
   include_once 'sessions.php';


   $id_propietario = $_SESSION['id'];

    try {
        $sql = "SELECT * FROM productos WHERE id_propietario = $id_propietario ";
        $resultado_productos = $conn->query($sql);  
        $conn -> multi_query($sql);
        do{
            $resultado_productos = $conn->store_result();
            $row = $resultado_productos->fetch_all(MYSQLI_ASSOC);
        }while($conn->more_results());

        
            
        $conn->close();

    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    $product = array_values($row);
    die(json_encode($product));

?>