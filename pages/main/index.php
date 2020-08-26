<?php include 'functions/sessions.php' ?>
<?php include '../../functions/db_conexion.php' ?>
<?php include 'templates/header.php' ?>

    <!-- Navigation -->

    <?php include 'templates/nav.php' ?>

    <div class="container">
        <!-- APPLICATION -->
        <div id="App" class="row pt-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4> Añadir Un Producto</h4>
                    </div>
                    <form id="product-form" name="product-form" class="card-body" autocomplete="off" method="post" action="functions/add_product.php?id=<?php echo $_SESSION['id'];?>">
                        <div class="form-group">
                            <select name="category" id="category" name="category" class="custom-select">
                                <option value="Automovil">Automovil</option>
                                <option value="Alimentación">Alimentación</option>
                                <option value="Servicios">Servicios</option>
                                <option value="Seguros">Seguros</option>
                                <option value="Comunidad">Comunidad</option>
                                <option value="Restaurantes">Restaurantes</option>
                                <option value="Salud">Salud</option>
                                <option value="Viajes">Viajes</option>
                                <option value="Caprichos">Caprichos</option>
                                <option value="Hogar">Hogar</option>
                                <option value="Ropa">Ropa</option>
                                <option value="Peluquería">Peluquería</option>
                                <option value="Casica">Casica</option>
                                <option value="Impuestos">Impuestos</option>
                            </select>
                        </div>  
                        <div class="form-group">
                            <input type="text" id="name" name="name" placeholder="Nombre del Producto" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="number" id="price" step="0.01" min="0" name="price" placeholder="Precio del Producto" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="month" id="year" class="form-control" name="date" value="2020-08">
                        </div>
                        <input type="submit" value="Añadir" class="btn btn-primary btn-block">
                    </form>
                </div>
            </div>

            <div id="product-list" class="col-md-8 product-list">
            
<?php 




$id_session = $_SESSION['id'];

try{
    $sql_productos = "SELECT * FROM productos WHERE id_propietario = $id_session";
    $resultado_productos = $conn->query($sql_productos);

}catch(\Exception $e){
    echo $e->getMessage();
}


$conn -> multi_query($sql_productos);

do{
    $resultado_productos = $conn->store_result();
    $row = $resultado_productos->fetch_all(MYSQLI_ASSOC);
}while($conn->more_results());
?>

<?php foreach ($row as $productos): ?>

            <div class="card text-center mb-4">
                <div class="card-body">
                    <strong>Categoría</strong>: <?php echo $productos['categoria'] ?>
                    <strong>Nombre del Producto</strong>: <?php echo $productos['nombre'] ?>
                    <strong>Precio</strong>:  <?php echo $productos['precio'] ?>
                    <strong>Fecha</strong>:  <?php echo $productos['fecha'] ?>
                    <a href="functions/delete_product.php" data-id="<?php echo $productos['id_producto']?>" class="btn btn-danger delete" name="delete">Borrar</a>
                </div>
            </div>

<?php endforeach ?>
        </div>
    </div>
</div>

<?php include 'templates/footer.php' ?>
