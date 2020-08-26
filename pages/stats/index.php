<?php include 'functions/sessions.php' ?>
<?php include '../../functions/db_conexion.php' ?>


<?php include 'templates/header.php' ?>

    <!-- Navigation -->
   <?php include 'templates/nav-bar.php' ?>

    <div class="content">

        <div class="container-graph">
            <div class="title">Gastos anuales</div>
            <div class="graph-year" id="graph-year" style="height: 250px;"></div>
        </div>
        
        <?php include 'templates/cards.php' ?>

        <div class="container-graph">
            <div class="graph-expenses"id="graph-expenses"></div>
        </div>

        <div class="container-graph">
            <div class="title">Porcentaje de gastos anuales</div>
            <div class="graph-expenses"id="graph-expenses-percent"></div>
        </div>

        <?php include 'templates/product-stat.php' ?>


    </div>

<?php include 'templates/footer.php' ?>

